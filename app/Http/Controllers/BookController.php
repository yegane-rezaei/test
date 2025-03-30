<?php

namespace App\Http\Controllers;

use App\Models\Book;  // Assuming you have a Book model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\Reply;

class BookController extends Controller
{
    // Optionally, add middleware to protect comment/reply creation
    public function __construct()
    {
        $this->middleware('auth')->only(['storeComment', 'storeReply']);
    }

    /**
     * Display the specified book.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\View\View
     */
    public function show(Book $book) // Route model binding
    {
        $comments = Comment::with('user', 'replies.user')
            ->where('book_id', $book->id)
            ->whereNull('parent_id') // Only get top-level comments
            ->get(); // Eager load relationships and filter by book_id

        return view('book', ['book' => $book, 'comments' => $comments]); // Pass $book and $comments to the view
    }

    /**
     * Store a newly created comment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeComment(Request $request, Book $book)
    {
        $request->validate([
            'body' => 'required',
        ]);

        $comment = new Comment();
        $comment->body = $request->body;
        $comment->user_id = Auth::id();
        $comment->book_id = $book->id; // Associate with the book
        $comment->save();

        return back()->with('success', 'Comment added successfully!');
    }

    /**
     * Store a newly created reply in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $commentId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeReply(Request $request, $commentId)
    {
        $request->validate([
            'body' => 'required',
        ]);

        $comment = Comment::findOrFail($commentId); // Find the parent comment

        $reply = new Comment(); // Replies are also comments
        $reply->body = $request->body;
        $reply->user_id = Auth::id();
        $reply->book_id = $comment->book_id; // Inherit book_id from the parent comment
        $reply->parent_id = $commentId;  // Set the parent_id
        $reply->save();

        return back()->with('success', 'Reply added successfully!');
    }
}
