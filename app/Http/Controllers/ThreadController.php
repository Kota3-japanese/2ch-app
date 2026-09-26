<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    //
    public function index()
    {
        $threads = Thread::latest()->get();

        return view('threads.index', compact('threads'));
    }

    public function create()
    {
        return view('threads.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
        ]);
        Thread::create($validated);

        return redirect('/threads');
    }

    public function show(Thread $thread)
    {
        $thread->load('posts');

        return view('threads.show', compact('thread'));
    }
}
