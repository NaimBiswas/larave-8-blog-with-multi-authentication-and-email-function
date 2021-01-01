<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\subscriber;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboarController extends Controller
{

    public function index()
    {

        $posts = Post::all();
        $admin = User::where('role_id', 1)->count();
        $authors = User::where('role_id', 2)->count();
        $all_post = Post::all()->count();
        $total_pending_post = Post::where('is_approved', false)->count();
        $total_notpublished_post = Post::where('status', false)->count();
        $total_post_view = $posts->sum('view_count');
        $total_comment = Comment::count();
        $total_subscriber = subscriber::count();
        $total_category = Category::all()->count();
        $total_tags = Tag::all()->count();
        $new_user = User::where('created_at', Carbon::today())->count();
        $popular_posts = Post::withCount('comments')
            ->withCount('fav_to_users')
            ->orderBy('view_count', 'DESC')
            ->orderBy('comments_count')
            ->orderBy('fav_to_users_count')
            ->take(6)->get();

        $active_user = User::withCount('posts')
            ->withCount('comments')
            ->withCount('fav_to_posts')
            ->orderBy('posts_count', 'desc')
            ->orderBy('comments_count', 'desc')
            ->orderBy('fav_to_posts_count', 'desc')->take(10)->get();



        return view('admin.dashboard', compact([
            'posts',
            'admin',
            'authors',
            'all_post',
            'total_pending_post',
            'total_notpublished_post',
            'total_post_view',
            'popular_posts',
            'total_comment',
            'total_subscriber',
            'active_user',
            'total_category',
            'total_tags',
            'new_user',
        ]));
    }
}
