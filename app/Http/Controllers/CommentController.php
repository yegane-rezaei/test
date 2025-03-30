<?php

namespace App\Http\Controllers;

use App\Models\Book; // Or whatever model represents your books
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Book $book) // Inject the Book model
    {
        $request->validate([
            'body' => 'required',
        ]);

        $book->comments()->create([ // Use the relationship to create the comment
            'body' => $request->body,
            'user_id' => Auth::id(),
        ]);

        return back()->with('success', 'Comment added successfully!');
    }

    public function destroy(Comment $comment)
    {
        // Add authorization logic here (e.g., only allow the user who created the comment to delete it)
        if (Auth::id() !== $comment->user_id) {
            abort(403, 'Unauthorized');
        }

        $comment->delete();

        return back()->with('success', 'Comment deleted successfully!');
    }
}
