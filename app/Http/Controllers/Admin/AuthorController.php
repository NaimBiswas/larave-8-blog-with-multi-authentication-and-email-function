<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $author = User::where('role_id', 2)->latest()->get();
        return view('admin.author.index', compact('author'));
    }
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return back()->with('success', 'Author Deleted Success');
    }
}
