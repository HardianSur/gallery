<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\RegistrationRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.index');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        try {
            $checkUser = User::where(function($q) use ($request){
                $q->where('username', $request->post('username'))
                ->orWhere('email', $request->post('email'));
            })->first();
            if (!$checkUser) {
                return response()->json('user tidak ditemukan', 400);
            }

            $checkHash = Hash::check($request->post('password'), $checkUser->password);
            if (!$checkHash) {
                return response()->json('email atau password salah', 400);
            }

            Auth::login($checkUser);

            return response()->json('Login berhasil', 200);
        } catch (\Exception $e) {
            Log::error("Internal Server Error", [$e->getMessage()]);
        }
    }

    public function pendingRegistration(Request $request){
        $validator = Validator::make($request->post(), [
            'name' => 'required|string',
            'username' => 'required|string|unique:users,username|unique:registration_requests,username',
            'email' => 'required|email|unique:users,email|unique:registration_requests,email',
            'password'=> 'required|confirmed',
            'alamat'=> 'string'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $data = new RegistrationRequest;
        $data->name = $request->post('name');
        $data->username = $request->post('username');
        $data->email = $request->post('email');
        $data->password = bcrypt($request->post('password'));
        $data->address = $request->post('alamat');
        $data->save();

        return response()->json([
            'message' => 'Registration successful! Please wait for admin approval',
        ], 200);
    }

    public function registerProcess(Request $request){
        try {
            $validator = Validator::make($request->post(), [
                'name' => 'required|string',
                'username' => 'required|string|unique:users,username|unique:registration_requests,username',
                'email' => 'required|email|unique:users,email|unique:registration_requests,email',
                'password'=> 'required|confirmed',
                'alamat'=> 'string'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors());
            }

            $data = new User;
            $data->name = $request->post('name');
            $data->username = $request->post('username');
            $data->email = $request->post('email');
            $data->password = bcrypt($request->post('password'));
            $data->address = $request->post('alamat');
            $data->save();

            return redirect('/');
        } catch (\Exception $e) {
            Log::error("Internal Server Error", [$e->getMessage()]);
            return response()->json('Internal Server Error', 500);

        }
    }

    public function logout(Request $request)
    {
        try {
            Auth::logout();

            return redirect('/');
        } catch (\Exception $e) {
            Log::error("Internal Server Error", [$e->getMessage()]);
        }
    }
}
