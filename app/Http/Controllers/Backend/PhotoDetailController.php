<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Photo;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class PhotoDetailController extends Controller
{
    public function index($id){
        $user = Auth::user();

        $data =  $data = Photo::with(['user' => function ($q) {
            $q->select(['id', 'username', 'photo']);
        }, 'like' => function ($q) {
            $q->select(['id','photo_id', 'user_id']);
        }])->find($id);

        $data->like_total = $data->like->count();
        $data->liked = $data->like->contains('user_id', $user->id);

        // dd($data);
        $data->created = $data->created_at->diffForHumans();

        unset($data->like);

        return view('photo.index', compact("data"));
    }

    public function storeComment(Request $request, $id){
        try {
            $validator = Validator::make($request->post(), [
                'content'=> 'required|string',
                'reply' => 'nullable|string'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors());
            }

            $user = Auth::user();

            $data = new Comment;
            $data->content = $request->post('content');
            $data->head_id = $request->post('reply') ?? null ;
            $data->user_id = $user->id;
            $data->photo_id = $id;
            $data->save();

            return response()->json('Album Berhasil Dibuat', 200);
        } catch (Exception $e) {
            Log::error("Internal Server Error", [$e->getMessage()]);
        }
    }

    public function retrieveComment($id){
        try {
            $data = Comment::with(['reply.user'=>function($q){
                $q->select(['id', 'username', 'photo']);
            }, 'user'=>function($q){
                $q->select(['id', 'username', 'photo']);
            }])->where('photo_id', $id)->whereNull('head_id')->latest()->get();
            $data = $data->map(function($item)  {

                $item->created = $item->created_at->diffForHumans();
                if ($item->reply && $item->reply->isNotEmpty()) {
                    $item->reply->map(function ($reply) {
                        $reply->created = $reply->created_at ? $reply->created_at->diffForHumans() : null;
                        return $reply;
                    });
                }
                return $item;
            });
            $resData= [
                'data' => $data,
                'message' => "Successfuly get Data"
            ];

            return response()->json($resData, 200);
        } catch (Exception $e) {
            Log::error("Internal Server Error", [$e->getMessage()]);
            return response()->json(['message'=> "Internal Server Error"], 500);
        }
    }
}
