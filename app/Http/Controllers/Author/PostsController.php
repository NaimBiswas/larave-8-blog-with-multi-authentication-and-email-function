<?php

namespace App\Http\Controllers\Author;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Notifications\NewAuthorPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Auth::user()->posts()->latest()->get();
        return view('author.post.posts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::latest()->get();
        $categories = Category::latest()->get();
        return view('author.post.create', compact(['tags', 'categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:posts,title|max:100',
            'images' => 'required',
            'description' => 'required|min:200',
            'categories' => 'required',
            'tags' => 'required'
        ]);
        $post = new Post();
        if ($request->hasFile('images')) {
            $image = $request->file('images');
            $fileName = time() . '.' . $request->images->extension();
            $image->move(public_path('storage/post/images'), $fileName);
            $post->images = $fileName;
        }
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->description = $request->description;
        $post->is_approved = false;
        $post->user_id = Auth::user()->id;
        $post->images = $fileName;

        if ($request->status) {
            $post->status = true;
        } else {
            $post->status = false;
        }
        $post->save();

        $post->tags()->attach($request->tags);
        $post->categories()->attach($request->categories);
        // $save->posts()->attach($save->id);
        $users = User::where('role_id', '1')->get();

        Notification::send($users, new NewAuthorPost($post));
        return redirect()->back()->with('success', 'Post Create Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if ($post->user_id == Auth::user()->id) {
            return view('author.post.show', compact(['post']));
        } else {
            return redirect()->route('author.post.index')->with('warning', "You Don't Have Permission To Reach This Post ");
        }
        // return view('admin.post.show', compact(['post']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

        if ($post->user_id == Auth::user()->id) {
            $tags = Tag::all();
            $categories = Category::all();
            return view('author.post.edite', compact(['post', 'tags', 'categories']));
        } else {
            return redirect()->route('author.post.index')->with('warning', "You Don't Have Permission To Edit This Post ");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title' => 'required|max:120',
            'categories' => 'required',
            'tags' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('images')) {
            $image = $request->file('images');
            $fileName = time() . '.' . $request->images->extension();
            $imagePath = "storage/post/images/$post->images";
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
            $image->move(public_path('storage/post/images'), $fileName);
            $post->images = $fileName;
        }
        if ($request->title) {
            $post->title = $request->title;
            $post->slug = Str::slug($request->title);
        }
        if ($request->categories) {
            $post->categories()->sync($request->categories);
        }
        if ($request->tags) {
            $post->tags()->sync($request->tags);
        }
        if ($request->description) {
            $post->description = $request->description;
        }
        if ($request->status) {
            $post->status = true;
        }
        $post->update();
        return redirect()->route('author.post.index')->with('success', "Post Updated Success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post->user_id == Auth::user()->id) {
            if ($post->delete()) {
                $image_path = "storage/post/images/$post->images";  // Value is not URL but directory file path
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
                $post->categories()->detach();
                $post->tags()->detach();
                $post->delete();
            }
            return back()->with('success', 'Post Deleted Success');
        } else {
            return redirect()->route('author.post.index')->with('warning', "You Don't Have Permission To Delete This Post ");
        }
    }
}
