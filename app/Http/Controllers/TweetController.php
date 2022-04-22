<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    public function index()
    {
        return view('home', [
            'tweets' => auth()->user()->timeline(),
        ]);
    }

    public function store(Request $request)
    {
        $validatedRequest = $request->validate(['body' => 'required|max:255']);

        auth()->user()->tweets()->create($validatedRequest);

        return redirect()->route('home');
    }
}