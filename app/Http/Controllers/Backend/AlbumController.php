<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AlbumController extends Controller
{
    public function index(){
        $data = Album::with(['latestPhoto:id,album_id,path,created_at', 'user:id,username,avatar'])->inRandomOrder()->get();

        // $data = $data->map(function($item)  {
        //     $item->created = $item->latestPhoto->created_at->diffForHumans();
        //     return $item;
        // });

        return view('album.index', compact('data'));
    }

    public function retrieve(){
        try {
            $user = Auth::user();

            $data = Album::with('latestPhoto:id,album_id,path')
            ->where('user_id', $user->id)
            ->latest()
            ->get();

            $resData= [
                'data' => $data,
                'message' => "Successfuly get Data"
            ];

            return response()->json($resData, 200);
        } catch (Exception $e) {
            Log::error("Internal Server Error", [$e->getMessage()]);
        }
    }

    public function retrieve_by_id($id){
        try {
            $user = Auth::user();

            $data = Album::where('user_id', $user->id)->where('id', $id)->first();

            $resData= [
                'data' => $data,
                'message' => "Successfuly get Data"
            ];

            return response()->json($resData, 200);
        } catch (Exception $e) {
            Log::error("Internal Server Error", [$e->getMessage()]);
        }
    }

    public function get_options(){
        try {
            $user = Auth::user();

            $data = Album::where('user_id', $user->id)->orderBy('title', 'desc')->get(['id', 'title']);

            $resData= [
                'data' => $data,
                'message' => "Successfuly get Data"
            ];

            return response()->json($resData, 200);
        } catch (Exception $e) {
            Log::error("Internal Server Error", $e);
        }
    }

    public function store(Request $request){
        try {
            $validator = Validator::make($request->post(), [
                'name' => 'required|string',
                'description'=> 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors());
            }

            $user = Auth::user();


            $data = new Album;
            $data->title = $request->post('name');
            $data->description = $request->post('description');
            $data->user_id = $user->id;
            $data->save();

            return response()->json('Album Berhasil Dibuat', 200);
        } catch (Exception $e) {
            Log::error("Internal Server Error", [$e->getMessage()]);
        }
    }

    public function update(Request $request, $id){
        try {
            $validator = Validator::make($request->post(), [
                'name' => 'required|string',
                'description'=> 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors());
            }

            $user = Auth::user();

            $data = Album::where('user_id', $user->id)->where('id', $id)->first();

            if (!$data) {
                return response()->json('Album Tidak Ditemukan', 404);
            }
            $data->title = $request->post('name');
            $data->description = $request->post('description');
            $data->save();

            return response()->json('Album Berhasil Dibuat', 200);
        } catch (Exception $e) {
            Log::error("Internal Server Error", [$e->getMessage()]);
        }
    }

    public function destroy(Request $request, $id){
        try {
            $user = Auth::user();

            $data = Album::where('user_id', $user->id)->where('id', $id)->first();

            if (!$data) {
                return response()->json('Album Tidak Ditemukan', 404);
            }

            $data->delete();

            return response()->json(['message'=>'Album Berhasil Dihapus'], 200);
        } catch (Exception $e) {
            Log::error("Internal Server Error", [$e->getMessage()]);
        }
    }
}
