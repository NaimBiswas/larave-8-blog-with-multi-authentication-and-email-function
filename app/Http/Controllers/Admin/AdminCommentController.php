<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminCommentController extends Controller
{
    public function index()
    {
        $cmnt = Comment::latest()->get();

        return view('admin.comment.index', compact('cmnt'));
    }
    public function delete($id)
    {
        $cmnt = Comment::find($id);
        $cmnt->delete();
        return redirect()->back()->with('success', 'Comment has been deleted');
    }
}
