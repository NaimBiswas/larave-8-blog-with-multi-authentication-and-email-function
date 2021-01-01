<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Models\subscriber;
use Illuminate\Support\Facades\Auth;
use App\Notifications\AuthorPostApproval;
use App\Notifications\NewPostNotify;
use Illuminate\Support\Facades\Notification;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ap = Post::where('is_approved', true)->get();
        $posts = Post::latest()->get();
        return view('admin.post.index', compact(['posts', 'ap']));
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
        return view('admin.post.create', compact(['tags', 'categories']));
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
            'images' => 'required|max:2048',
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
        $post->is_approved = true;

        if ($request->status) {
            $post->status = true;
        } else {
            $post->status = false;
        }
        $post->save();

        $post->tags()->attach($request->tags);
        $post->categories()->attach($request->categories);
        // $save->posts()->attach($save->id);
        $subscriber = subscriber::all();

        foreach ($subscriber as $sb) {
            Notification::route('mail', $sb->email)->notify(new NewPostNotify($post));
        }

        return redirect()->back()->with('success', 'Post Create Success');


        // $save = new Post();
        // if ($request->hasFile('images')) {
        //     $image = $request->file('images');
        //     $fileName = time() . '.' . $request->images->extension();
        //     $image->move(public_path('storage/post/images'), $fileName);
        //     $save->images = $fileName;
        // } else {
        //     $save->images = 'default.png';
        // }
        // if ($request->status) {
        //     $save->status = true;
        // } else {
        //     $save->status = false;
        // }

        //     $post = Post::create([
        //         'title' => $request->title,
        //         'user_id' => Auth::id(),
        //         'slug' => Str::slug($request->title),
        //         'description' => $request->description,
        //         'is_approved' => true,

        //     ]);
        //     // $save->posts()->attach($save->id);
        //     $post->tags()->attach($request->tags);
        //     $post->categories()->attach($request->categories);
        //     return redirect()->back()->with('success', 'Post Create Success');

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Post $post)
    {
        return view('admin.post.show', compact(['post']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.post.edit', compact(['post', 'tags', 'categories']));
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
        } else {
            $post->status = false;
        }
        $post->update();
        return redirect()->route('admin.post.index')->with('success', "Post Updated Success");
    }
    public function approve($id)
    {
        $post = Post::find($id);

        $post->is_approved = true;
        $post->update();

        // Author Post Approval notification
        $post->user->notify(new AuthorPostApproval($post));


        // Notify Subscriber When admin Approve Author Post
        $subscriber = subscriber::all();
        foreach ($subscriber as $sb) {
            Notification::route('mail', $sb->email)->notify(new NewPostNotify($post));
        }
        return back()->with('success', 'Post Has Been Approved');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
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
    }
}
