<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index(){
        $user = Auth::user();
        $data = $user->notifications()->paginate(10);

        $data->each(function ($notification) {
            if ($notification->unread()) {
                $notification->markAsRead();
            }
        });

        return view('notification.index', ['data'=>$data]);
    }
}
