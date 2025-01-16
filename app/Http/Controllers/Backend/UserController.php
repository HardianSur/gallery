<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function update(Request $request, $id){
        try {
            $validator = Validator::make($request->post(), [
                'name' => 'required|string',
                'username'=> 'required|string|unique:users,username',
                'email'=> 'required|email',
                'alamat'=> 'string'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors());
            }

            $user = Auth::user();

            if (!$user->id == $id) {
                return response()->json('Id tidak balid', 400);
            }

            $data = User::find($id);
            $data->name = $request->post('name');
            $data->username = $request->post('username');
            $data->email = $request->post('email');
            $data->alamat = $request->post('alamat');
            $data->save();

            return response()->json('Berhasil Di Update', 200);
        } catch (\Exception $e) {
            Log::error("Internal Server Error", $e);
        }
    }
}
