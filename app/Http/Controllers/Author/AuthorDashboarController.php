<?php

namespace App\Http\Controllers\Author;



use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthorDashboarController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $posts = $user->posts;
        $popular_posts = $user->posts()
            ->withCount('comments')
            ->withCount('fav_to_users')

            ->orderBy('view_count', 'DESC')
            ->orderBy('comments_count')
            ->orderBy('fav_to_users_count')
            ->take(5)->get();
        $all_panding_posts = $posts->where('is_approved', false)->count();
        $all_views = $posts->sum('view_count');
        return view('author.dashboard', compact(['popular_posts', 'posts', 'all_panding_posts', 'all_views']));
    }
}
