<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\RegistrationRequest;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $data = RegistrationRequest::orderBy("created_at", "desc")->paginate(10);

        return view("admin.index", ["data" => $data]);
    }
}
