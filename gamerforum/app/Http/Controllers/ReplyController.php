<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reply;
use App\Models\Thread;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    public function store(Request $request, $thread_id)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $thread = Thread::findOrFail($thread_id);

        Reply::create([
            'thread_id' => $thread->id,
            'user_id' => Auth::id(),
            'content' => $request->content,
        ]);

        return redirect()->route('threads.show', $thread->id)->with('success', 'Reply added successfully!');
    }
}
