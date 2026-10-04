<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    public function index()
    {
        $threads = Thread::withCount('posts')->latest()->get();

        return view('threads.index', compact('threads'));
    }

    public function create()
    {
        return view('threads.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'title' => 'required|max:255',
            ],
            [
                'title.required' => 'スレッドタイトルを入力してください。',
                'title.max' => 'スレッドタイトルは255文字以内で入力してください。',
            ]
        );

        Thread::create($validated);

        return redirect('/threads');
    }

    public function show(Thread $thread)
    {
        $thread->load('posts');

        return view('threads.show', compact('thread'));
    }

    public function edit(Thread $thread)
    {
        return view('threads.edit', compact('thread'));
    }

    public function update(Request $request, Thread $thread)
    {
        $validated = $request->validate(
            [
                'title' => 'required|max:255',
            ],
            [
                'title.required' => 'スレッドタイトルを入力してください。',
                'title.max' => 'スレッドタイトルは255文字以内で入力してください。',
            ]
        );

        $thread->update($validated);

        return redirect('/threads/' . $thread->id);
    }

    public function storePost(Request $request, Thread $thread)
    {
        $validated = $request->validate(
            [
                'body' => 'required',
            ],
            [
                'body.required' => '投稿内容を入力してください。',
            ]
        );

        $thread->posts()->create($validated);

        return redirect('/threads/' . $thread->id);
    }

    public function destroyPost(Thread $thread, Post $post)
    {
        $post->delete();

        return redirect('/threads/' . $thread->id);
    }

    public function destroy(Thread $thread)
    {
        $thread->delete();

        return redirect('/threads');
    }
}