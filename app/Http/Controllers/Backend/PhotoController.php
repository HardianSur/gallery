<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PhotoController extends Controller
{
    public function store(Request $request){
        try {
            $validator = Validator::make($request->all(), [
                'image' => 'required|mimes:png,jpg,jpeg',
                'title' => 'required|string',
                'description'=> 'required|string',
                'album'=> 'required|exists:albums,id'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors());
            }

            $user = Auth::user();

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $path = $image->store('images', 'public');
            }else {
                return response()->json('No Image Uploaded', 400);
            }

            $data = new Photo;
            $data->title = $request->post('title');
            $data->description = $request->post('description');
            $data->path = $path;
            $data->user_id = $user->id;
            $data->album_id = $request->post('album');
            $data->save();

            return response()->json('Successfully upload image', 200);
        } catch (Exception $e) {
            return response()->json('Internal Server Error', 500);
            Log::error("Internal Server Error", [$e->getMessage()]);
        }
    }

    public function update(Request $request,$id){
        try {
            $validator = Validator::make($request->all(), [
                'image' => 'required|mimes:png,jpg,jpeg',
                'title' => 'required|string',
                'description'=> 'required|string',
                'album'=> 'required|exists:albums,id'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors());
            }

            $user = Auth::user();

            $data = Photo::find($id)->first();

            $data->title = $request->post('title');
            $data->description = $request->post('description');
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $path = $image->store('images', 'public');
                $data->path = $path;
            }
            $data->user_id = $user->id;
            $data->album_id = $request->post('album');
            $data->save();

            return response()->json('Successfully upload image', 200);
        } catch (Exception $e) {
            return response()->json('Internal Server Error', 500);
            Log::error("Internal Server Error", [$e->getMessage()]);
        }
    }

    public function retrieve_by_user(){
        try {
            $user = Auth::user();

            $data = Photo::where('user_id', $user->id)->latest()->get();

            $resData= [
                'data' => $data,
                'message' => "Successfuly get Data"
            ];

            return response()->json($resData, 200);
        } catch (Exception $e) {
            Log::error("Internal Server Error", $e);
        }
    }

    public function retrieve_by_id($id){
        try {
            $data = Photo::find($id)->first();
            $resData= [
                'data' => $data,
                'message' => "Successfuly get Data"
            ];

            return response()->json($resData, 200);
        } catch (Exception $e) {
            Log::error("Internal Server Error", [$e->getMessage()]);
        }
    }

    public function destroy(Request $request, $id){
        try {
            $user = Auth::user();

            $data = Photo::where('user_id', $user->id)->where('id', $id)->first();

            if (!$data) {
                return response()->json('Photo Tidak Ditemukan', 404);
            }

            $data->delete();

            return response()->json(['message'=>'Photo Berhasil Dihapus'], 200);
        } catch (Exception $e) {
            Log::error("Internal Server Error", [$e->getMessage()]);
        }
    }
}
