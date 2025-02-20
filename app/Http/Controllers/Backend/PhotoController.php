<?php

namespace App\Http\Controllers\Backend;

use App\Events\NewLikeNotification;
use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Models\Photo;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Notifications\NewLikeNotification as LikeNotification;

class PhotoController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'image' => 'required|mimes:png,jpg,jpeg',
                'title' => 'required|string',
                'description' => 'required|string',
                'album' => 'required|exists:albums,id'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors());
            }

            $user = Auth::user();

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $path = $image->store('images', 'public');
            } else {
                return response()->json('No Image Uploaded', 400);
            }

            $data = new Photo;
            $data->title = $request->post('title');
            $data->description = $request->post('description');
            $data->path = $path;
            $data->user_id = $user->id;
            $data->album_id = $request->post('album');
            $data->save();

            return response()->json(['message'=>'Successfully upload image'], 200);
        } catch (Exception $e) {
            Log::error("Internal Server Error", [$e->getMessage()]);
            return response()->json('Internal Server Error', 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'image' => 'nullable|mimes:png,jpg,jpeg',
                'title' => 'required|string',
                'description' => 'required|string',
                'album' => 'required|exists:albums,id'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors());
            }

            $user = Auth::user();

            $data = Photo::find($id);

            $data->title = $request->post('title');
            $data->description = $request->post('description');
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $path = $image->store('images', 'public');
                $data->path = $path;
            }
            $data->user_id = $user->id;
            $data->album_id = $request->post('album');
            $data->save();

            return response()->json('Successfully upload image', 200);
        } catch (Exception $e) {
            return response()->json('Internal Server Error', 500);
            Log::error("Internal Server Error", [$e->getMessage()]);
        }
    }

    public function retrieve()
    {
        try {
            $data = Photo::with(['user' => function ($q) {
                $q->select(['id', 'username', 'avatar']);
            }, 'like' => function ($q) {
                $q->select(['id', 'user_id', 'photo_id']);
            }])->inRandomOrder()->get();

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

            $resData = [
                'data' => $data,
                'message' => "Successfuly get Data"
            ];

            return response()->json($resData, 200);
        } catch (Exception $e) {
            Log::error("Internal Server Error", [$e->getMessage()]);
        }
    }

    public function retrieve_by_user(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            $sort = $request->input("sort");
            $order = $request->input("order");

            $data = Photo::with(['like', 'comment'])
                ->withCount(['like as like_count', 'comment as comment_count'])
                ->where('user_id', $user->id);

            if ($order && $sort) {
                if ($order == 1) {
                    $data = $data->orderBy('like_count', $sort);
                } elseif ($order == 2) {
                    $data = $data->orderBy('comment_count', $sort);
                } elseif ($order == 3) {
                    $data = $data->orderBy('created_at', $sort);
                }
            } else {
                $data = $data->latest();
            }

            $data = $data->get();


            $data = $data->map(function ($item) use ($user) {
                $item->like_total = $item->like->count();
                $item->comment_total = $item->comment->count();
                unset($item->comment, $item->like);
                return $item;
            });

            $resData = [
                'data' => $data,
                'message' => "Successfuly get Data"
            ];

            return response()->json($resData, 200);
        } catch (Exception $e) {
            Log::error("Internal Server Error", [$e->getMessage()]);
            return response()->json(["message" => "Internal Server Error"], 500);
        }
    }

    public function retrieve_by_id($id)
    {
        try {
            $data = Photo::find($id);
            $resData = [
                'data' => $data,
                'message' => "Successfuly get Data"
            ];

            return response()->json($resData, 200);
        } catch (Exception $e) {
            Log::error("Internal Server Error", [$e->getMessage()]);
        }
    }

    public function destroy(Request $request, $id)
    {
        try {
            $user = Auth::user();

            $data = Photo::where('user_id', $user->id)->where('id', $id)->first();

            if (!$data) {
                return response()->json('Photo Tidak Ditemukan', 404);
            }

            $data->delete();

            return response()->json(['message' => 'Photo Berhasil Dihapus'], 200);
        } catch (Exception $e) {
            Log::error("Internal Server Error", [$e->getMessage()]);
        }
    }

    public function likeOrUnlike(Request $request, $id)
    {
        try {
            $user = Auth::user();
            $photo = Photo::findOrFail($id);
            $checkLike = Like::where('user_id', $user->id)->where('photo_id', $id)->first();

            if ($checkLike) {
                $checkLike->delete();
                return response()->json(['message' => 'unliked'], 200);
            } else {
                $data = new Like;
                $data->user_id = $user->id;
                $data->photo_id = $id;
                $data->save();

                $photoOwner = $photo->user;
                if ($photoOwner->id !== $user->id) {
                    // Store notification in database
                    $photoOwner->notify(new LikeNotification($user, $photo));

                    // Get updated count and broadcast
                    $unreadCount = $photoOwner->unreadNotifications->count();
                    $message = $user->name . ' liked your photo';

                    event(new NewLikeNotification(
                        $photoOwner->id,
                        $unreadCount,
                        $message
                    ));
                }
                return response()->json(['message' => 'liked'], 200);
            }
        } catch (Exception $e) {
            Log::error("Internal Server Error", [$e->getMessage()]);
        }
    }
}
