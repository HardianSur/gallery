<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AlbumController extends Controller
{
    public function index(){
        return view('album.index');
    }

    public function retrieve(){
        try {
            $user = Auth::user();

            $data = Album::where('user_id', $user->id)->latest()->get();

            $resData= [
                'data' => $data,
                'message' => "Successfuly get Data"
            ];

            return response()->json($resData, 200);
        } catch (\Exception $e) {
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
            $data->name = $request->post('name');
            $data->description = $request->post('description');
            $data->user_id = $user->id;
            $data->save();

            return response()->json('Album Berhasil Dibuat', 200);
        } catch (\Exception $e) {
            Log::error("Internal Server Error", $e);
        }
    }
}
