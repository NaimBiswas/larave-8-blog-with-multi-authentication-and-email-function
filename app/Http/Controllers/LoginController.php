<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::user()->role->id == 1) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('author.dashboard');
        }
    }
}
