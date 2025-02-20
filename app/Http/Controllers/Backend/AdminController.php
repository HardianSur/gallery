<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\RegistrationRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        $data = RegistrationRequest::where('status', 'pending')->orderBy("created_at", "desc")->paginate(10);

        return view("admin.index", ["data" => $data]);
    }

    public function processRegister(Request $request, $id)
    {
        try {
            $request->validate([
                'status' => 'required|boolean',
            ]);

            $regist = RegistrationRequest::findOrFail($id);

            $role = Role::where('name', 'user')->first();

            if ($request->post('status') == true) {
                $data = new User;
                $data->role_id = $role->id;
                $data->name = $regist->name;
                $data->username = $regist->username;
                $data->email = $regist->email;
                $data->password = bcrypt($regist->password);
                $data->address = $regist->alamat;
                $regist->status = "approved";
            } else {
                $regist->status = "rejected";
            }

            $data->save();

            return redirect()->back();
        } catch (\Exception $e) {
            Log::error("Internal Server Error", [$e->getMessage()]);
            return response()->json('Internal Server Error', 500);

        }
    }
}
