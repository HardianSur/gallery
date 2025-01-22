<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhotoDetailController extends Controller
{
    public function index($id){
        $user = Auth::user();

        $data =  $data = Photo::with(['user' => function ($q) {
            $q->select(['id', 'username', 'photo']);
        }, 'like' => function ($q) {
            $q->select(['id','photo_id']);
        }])->find($id);

        $data->like_total = $data->like->count();
        $data->liked = $data->like->contains('user_id', $user->id) ? true : null;
        $data->created = $data->created_at->diffForHumans();

        return view('photo.index', [$data]);
    }
}
