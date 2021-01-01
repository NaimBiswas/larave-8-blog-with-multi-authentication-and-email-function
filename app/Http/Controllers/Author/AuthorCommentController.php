<?php

namespace App\Http\Controllers\Author;

use App\Models\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorCommentController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $cmnt = Comment::where('user_id', $id)->latest()->get();

        return view('author.comment.index', compact('cmnt'));
    }
    public function delete($id)
    {
        $cmnt = Comment::find($id);
        $cmnt->delete();
        return redirect()->back()->with('success', 'Comment has been deleted');
    }
}
