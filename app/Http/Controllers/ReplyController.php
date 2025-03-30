<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    public function store(Request $request, Comment $comment)
    {
        $request->validate([
            'body' => 'required',
        ]);

        $reply = new Reply([
            'body' => $request->body,
            'user_id' => Auth::id(),
        ]);

        $comment->replies()->save($reply);

        return back()->with('success', 'Reply added successfully!');
    }

    public function destroy(Reply $reply)
    {
        // Add authorization logic here (e.g., only allow the user who created the reply to delete it)
        if (Auth::id() !== $reply->user_id) {
            abort(403, 'Unauthorized');
        }

        $reply->delete();

        return back()->with('success', 'Reply deleted successfully!');
    }
}
