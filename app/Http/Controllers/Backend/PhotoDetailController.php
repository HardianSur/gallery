<?php

namespace App\Http\Controllers\Backend;

use App\Events\NewLikeNotification;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Photo;
use App\Notifications\NewCommentNotification;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class PhotoDetailController extends Controller
{
    public function index($id){

        $data =  $data = Photo::with(['user' => function ($q) {
            $q->select(['id', 'username', 'avatar']);
        }, 'like' => function ($q) {
            $q->select(['id','photo_id', 'user_id']);
        }])->find($id);

        $data->like_total = $data->like->count();
        $data->liked = null;

        if(Auth::check()){
            $user = Auth::user();
            $data->liked = $data->like->contains('user_id', $user->id);
        }

        // dd($data);
        $data->created = $data->created_at->diffForHumans();

        unset($data->like);

        return view('photo.index', compact("data"));
    }

    public function storeComment(Request $request, $id){
        try {
            $validator = Validator::make($request->post(), [
                'content'=> 'required|string',
                'reply' => 'nullable|string'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors());
            }

            $user = Auth::user();

            $data = new Comment;
            $data->content = $request->post('content');
            $data->head_id = $request->post('reply') ?? null ;
            $data->user_id = $user->id;
            $data->photo_id = $id;
            $data->save();

            $photo = Photo::find($id);
            $photoOwner = $photo->user;
                if ($photoOwner->id !== $user->id) {
                    // Store notification in database
                    $photoOwner->notify(new NewCommentNotification($user, $photo));

                    // Get updated count and broadcast
                    $unreadCount = $photoOwner->unreadNotifications->count();
                    $message = $user->name . ' comment on your photo';

                    event(new NewLikeNotification(
                        $photoOwner->id,
                        $unreadCount,
                        $message
                    ));
                }

            return response()->json('Album Berhasil Dibuat', 200);
        } catch (Exception $e) {
            Log::error("Internal Server Error", [$e->getMessage()]);
        }
    }

    public function retrieveComment($id){
        try {
            $data = Comment::with(['reply.user'=>function($q){
                $q->select(['id', 'username', 'avatar']);
            }, 'user'=>function($q){
                $q->select(['id', 'username', 'avatar']);
            }])->where('photo_id', $id)->whereNull('head_id')->latest()->get();

            $comment_total = $data->count();

            $data = $data->map(function($item)  {

                $item->created = $item->created_at->diffForHumans();
                if ($item->reply && $item->reply->isNotEmpty()) {
                    $item->reply->map(function ($reply) {
                        $reply->created = $reply->created_at ? $reply->created_at->diffForHumans() : null;
                        return $reply;
                    });
                }
                return $item;
            });
            $resData= [
                'data' => [$data,$comment_total],
                'message' => "Successfuly get Data"
            ];

            return response()->json($resData, 200);
        } catch (Exception $e) {
            Log::error("Internal Server Error", [$e->getMessage()]);
            return response()->json(['message'=> "Internal Server Error"], 500);
        }
    }

    public function download($id)
    {
        $photo = Photo::findOrFail($id);
        $filePath = storage_path('app/public/' . $photo->path);

        if (file_exists($filePath)) {
            return response()->download($filePath, $photo->title . '.' . pathinfo($filePath, PATHINFO_EXTENSION));
        } else {
            return redirect()->back()->with('error', 'File tidak ditemukan.');
        }
    }
}
