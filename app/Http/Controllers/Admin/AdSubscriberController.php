<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\subscriber;
use Illuminate\Http\Request;


class AdSubscriberController extends Controller
{
    public function index()
    {
        $subscribers = subscriber::latest()->get();
        return view('admin.subscribers.index', compact('subscribers'));
    }
    public function delete($id)
    {
        $sb = subscriber::findOrFial($id);
        $sb->delete();
        return back()->with('success', 'Subscriber Has Been Deleted');
    }
}
