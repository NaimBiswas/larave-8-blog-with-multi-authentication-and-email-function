<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\New_;

class CommentController extends Controller
{
    public function store(Request $request, $post)
    {
        $this->validate($request, [
            'comment' => 'required'

        ]);
        $cmnt = new Comment;
        $cmnt->post_id = $post;
        $cmnt->user_id = Auth::id();
        $cmnt->comment = $request->comment;
        $cmnt->save();
        return redirect()->back();
    }
}
