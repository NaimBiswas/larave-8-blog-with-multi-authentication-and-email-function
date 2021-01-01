<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        $posts = Post::where('is_approved', true)->published()->latest()->take(9)->get();
        return view('welcome', compact(['categories', 'posts']));
    }
    public function post(Request $request, $slug)
    {
        $randomPost = Post::approved()->published()->take(3)->inRandomOrder()->get();
        $tags = Tag::all()->random(6);
        $categories = Category::all()->random(6);
        $post = Post::where('slug', $slug)->with('tags', 'categories')->first();

        $blogKey = 'blog_' . $post->id;
        if (!Session::has($blogKey)) {
            $post->increment('view_count');
            Session::put($blogKey, 1);
        }

        return view('post', compact(['post', 'randomPost', 'tags', 'categories']));
    }
    public function category($slug)
    {

        $category = Category::where('slug', $slug)->first();
        $posts = $category->posts()->approved()->published()->get();

        return view('category', compact(['category', 'posts']));
    }
    public function tag($slug)
    {

        $tag = Category::where('slug', $slug)->first();
        $posts = $tag->posts()->approved()->published()->get();

        return view('tag', compact(['tag']));
    }
}
