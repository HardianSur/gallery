<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Like;
use App\Models\Photo;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ReportController extends Controller
{
    public function index(){
        $user = Auth::user();
        $album = Album::where('user_id', $user->id)->get(['id', 'title']);

        $data = Photo::withCount(['like', 'comment'])
                ->where('user_id', $user->id)
                ->get()
                ->groupBy(function ($photo) {
                    return Carbon::parse($photo->created_at)->format('Y-m');
                })
                ->sortKeys();

        $labels = $data->keys()->map(function ($date) {
            return Carbon::createFromFormat('Y-m', $date)->format('F Y');
        })->toArray();

        $dataF = [
            'likes' => $data->map(fn($month) =>  $month->sum('like_count'))->values(),
            'comments' => $data->map(fn($month) => $month->sum('comment_count'))->values()
        ];

        return view('report.index', compact('album', 'labels', 'dataF'));
    }

    public function retrieve_chart(Request $request){
        try {
            $user = Auth::user();
            $album = $request->input("album");

            $data = Photo::withCount(['like', 'comment'])
                ->where('user_id', $user->id);

                if($album){
                    $data->whereHas('album',fn($q)=>$q->where('id', $album));
                }

            $data = $data->get()
                ->groupBy(function ($photo) {
                    return Carbon::parse($photo->created_at)->format('Y-m');
                })
                ->sortKeys();

            $labels = $data->keys()->map(function ($date) {
                return Carbon::createFromFormat('Y-m', $date)->format('F Y');
            })->toArray();

            $likes = $data->map(fn($month) =>  $month->sum('like_count'))->values();
            $comments = $data->map(fn($month) => $month->sum('comment_count'))->values();

            return response()->json(['Message'=>'Successfully get data', 'data'=>[
                'likes' => $likes,
                'comments'=>$comments,
                'labels'=>$labels
            ]]);

        } catch (\Exception $e) {
            Log::error("Internal Server Error", [$e->getMessage()]);
            return response()->json('error', 500);
        }
    }

    public function retrieve(Request $request){
        try {
            $user = Auth::user();
            $album = $request->input("album");
            $sort = $request->input("sort");
            $order = $request->input("order");

            $data = Album::withCount('photo')->with(['photo' => function ($q) {
                $q->withCount(['like as like_count', 'comment as comment_count']);
            }])
            ->where('user_id', $user->id);

            if ($album) {
                $data->where('id', $album);
            }

            if ($order && $sort) {
                if ($order == 1) {
                    $data->withCount(['photo as like_total' => function ($q) {
                        $q->withCount('like');
                    }])->orderBy('like_total', $sort);
                } elseif ($order == 2) {
                    $data->withCount(['photo as comment_total' => function ($q) {
                        $q->withCount('comment');
                    }])->orderBy('comment_total', $sort);
                } elseif ($order == 3) {
                    $data->orderBy('created_at', $sort);
                }
            } else {
                $data->withCount(['photo as like_total' => function ($q) {
                    $q->withCount('like');
                }])->orderBy('like_total', 'desc');
            }

            $data = $data->get();

            $totalLikes = 0;
            $totalComments = 0;
            $totalPhotos = 0;
            $data = $data->map(function ($item) use (&$totalLikes, &$totalComments, &$totalPhotos) {
                $item->like_total = $item->photo->sum('like_count');
                $item->comment_total = $item->photo->sum('comment_count');

                $totalLikes += $item->like_total;
                $totalComments += $item->comment_total;
                $totalPhotos += $item->photo_count;

                unset($item->photo);

                return $item;
            });

            return response()->json(['message'=>"Success" , "data"=>['album'=>$data, 'like_amount' => $totalLikes, 'comment_amount' => $totalComments, 'photo_amount' => $totalPhotos]]);
        } catch (\Exception $e) {
            Log::error("Internal Server Error", [$e->getMessage()]);
            return response()->json('error', 500);
        }
    }

    public function exportPDF(Request $request){
        try {
            $user = Auth::user();
            $album = $request->input("album");
            $sort = $request->input("sort");
            $order = $request->input("order");

            $data = Album::withCount('photo')->with(['photo' => function ($q) {
                $q->withCount(['like as like_count', 'comment as comment_count']);
            }])
            ->where('user_id', $user->id);

            if ($album) {
                $data->where('id', $album);
            }

            if ($order && $sort) {
                if ($order == 1) {
                    $data->withCount(['photo as like_total' => function ($q) {
                        $q->withCount('like');
                    }])->orderBy('like_total', $sort);
                } elseif ($order == 2) {
                    $data->withCount(['photo as comment_total' => function ($q) {
                        $q->withCount('comment');
                    }])->orderBy('comment_total', $sort);
                } elseif ($order == 3) {
                    $data->orderBy('created_at', $sort);
                }
            } else {
                $data->withCount(['photo as like_total' => function ($q) {
                    $q->withCount('like');
                }])->orderBy('like_total', 'desc');
            }

            $data = $data->get();

            $totalLikes = 0;
            $totalComments = 0;
            $totalPhotos = 0;
            $data = $data->map(function ($item) use (&$totalLikes, &$totalComments, &$totalPhotos) {
                $item->like_total = $item->photo->sum('like_count');
                $item->comment_total = $item->photo->sum('comment_count');

                $totalLikes += $item->like_total;
                $totalComments += $item->comment_total;
                $totalPhotos += $item->photo_count;

                unset($item->photo);

                return $item;
            });

            $finalData = [
                'user' => $user,
                'data' => $data,
                'like_amount' => $totalLikes,
                'comment_amount' => $totalComments,
                'photo_amount' => $totalPhotos,
            ];

            $pdf = Pdf::loadView('report.report_pdf', $finalData);

            return $pdf->download('REPORT-'. $user->name. '-'.now()->format('Y-m-d').'.pdf');

        } catch (\Exception $e) {
            Log::error("Internal Server Error", [$e->getMessage()]);
            return response()->json('error', 500);
        }
    }
}
