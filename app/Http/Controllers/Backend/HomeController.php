<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $data = Photo::with(['user' => function ($q) {
            $q->select(['id', 'username', 'avatar']);
        }, 'like' => function ($q) {
            $q->select(['id', 'user_id', 'photo_id']);
        }])->latest()->get();

        $user = null;

        if (Auth::check()) {
            $user = Auth::user();
        }
        $data = $data->map(function ($item) use ($user) {
            $item->like_total = $item->like->count();
            if (Auth::check()) {
                $item->liked = $item->like->contains('user_id', $user->id) ? true : null;
            } else {
                $item->liked = null;
            }

            $item->created = $item->created_at->diffForHumans();
            unset($item->like);
            return $item;
        });


        return view('home.index', compact('data'));
    }
}
