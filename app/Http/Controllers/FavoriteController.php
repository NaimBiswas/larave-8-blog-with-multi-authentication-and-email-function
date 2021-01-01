<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $posts  = Auth::user()->fav_to_posts()->latest()->get();
        return view('favorite.index', compact('posts'));
    }
    public function add($post)
    {
        $user = Auth::user();
        $isFavorite = $user->fav_to_posts()->where('post_id', $post)->count();
        if ($isFavorite == 0) {
            $user->fav_to_posts()->attach($post);
            return back()->with('success', 'Post Added On Favorite List, Thank You');
        } else {
            $user->fav_to_posts()->detach($post);
            return back()->with('success', 'Post Remove Form Your  Favorite List, Thank You');
        }
    }
    public function delete($id)
    {
        $user = Auth::user();
        $user->fav_to_posts()->detach($id);
        return back()->with('success', 'Post Reomve Form Favorite List');
    }
}
