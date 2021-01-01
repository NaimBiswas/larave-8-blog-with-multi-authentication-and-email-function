<?php

namespace App\Http\Controllers;

use App\Models\subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'unique:subscribers,email',
        ]);
        if ($request->email) {
            $add = subscriber::create([
                'email' => $request->email,
            ]);
            return back()->with('success', 'Thank You For Your Subscription, Stay Connected With Us.');
        }
    }
}
