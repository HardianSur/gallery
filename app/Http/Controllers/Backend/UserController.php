<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index($id=null){
            $myProfile= false;
            $user = User::findOrFail($id);

            if (Auth::check() && Auth::user()->id == $user->id) {
                $myProfile= true;
            }

            return view('profile.index', compact('user', 'myProfile'));
    }

    public function update(Request $request, $id){
        try {
            $validator = Validator::make($request->all(), [
                'avatar' => 'nullable|mimes:png,jpg,jpeg',
                'name' => 'required|string',
                'username'=> 'required|string|unique:users,username,'. $id,
                'email'=> 'required|email',
                'address'=> 'string'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            $user = Auth::user();

            if (!$user->id == $id) {
                return response()->json(['message'=>'Id is invalid'], 400);
            }

            if ($request->hasFile('avatar')) {
                if ($user->avatar) {
                    Storage::delete($user->avatar);
                }

                $path = $request->file('avatar')->store('avatars', 'public');
                $user->avatar = $path;
            }
            $user->fill($request->only([
                'name',
                'username',
                'email',
                'address'
            ]));

            $user->save();
            return response()->json(['message'=>'Berhasil Di Update'], 200);
        } catch (\Exception $e) {
            Log::error("Internal Server Error", [$e->getMessage(), $e->getCode()]);
        }
    }

    // public function notification(){
    //     try {

    //     } catch (\Exception $e) {
    //         Log::error("Internal Server Error", [$e->getMessage(), $e->getCode()]);
    //     }
    // }
}
