<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ReportController extends Controller
{
    public function index(){
        $user = Auth::user();
        $album = Album::where('user_id', $user->id)->get(['id', 'title']);
        // dd($album);
        return view('report.index', compact('album'));
    }

    public function retrieve(Request $request){
        try {
            $user = Auth::user();
            $album = $request->input("album");
            $sort = $request->input("sort");
            $order = $request->input("order");

            $data = Photo::with(['like', 'comment'])
                ->withCount(['like as like_count', 'comment as comment_count'])
                ->where('user_id', $user->id)
                ->where('album_id', $album);

            if ($order && $sort) {
                if ($order == 1) {
                    $data = $data->orderBy('like_count', $sort);
                } elseif ($order == 2) {
                    $data = $data->orderBy('comment_count', $sort);
                } elseif ($order == 3) {
                    $data = $data->orderBy('created_at', $sort);
                }
            } else {
                $data = $data->latest();
            }

            $data = $data->get();


            $data = $data->map(function ($item) use ($user) {
                $item->like_total = $item->like->count();
                $item->comment_total = $item->comment->count();
                unset($item->comment, $item->like);
                return $item;
            });

            return response()->json(['message'=>"Success" ,'data'=>$data]);
        } catch (\Exception $e) {
            Log::error("Internal Server Error", [$e->getMessage()]);
            return response()->json('error', 500);
        }
    }
}
