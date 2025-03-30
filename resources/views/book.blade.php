<!-- resources/views/book.blade.php -->

@extends('layouts.app') <!-- Assuming you are using a layout file -->

@section('content')
    <div class="container">
        <h1>{{ $book->title }}</h1>
        <p>{{ $book->description }}</p>

        <h2>Comments</h2>

        @if($comments->isEmpty())
            <p>No comments yet.</p>
        @else
            @foreach ($comments as $comment)
                <div class="comment">
                    <strong>{{ $comment->user->name }}</strong>: {{ $comment->body }}
                    <br>

                    <!-- Reply Form for each comment -->
                    <form action="{{ route('replies.store', $comment->id) }}" method="POST">
                        @csrf
                        <textarea name="body" required placeholder="Add a reply..."></textarea>
                        <button type="submit">Reply</button>
                    </form>

                    <!-- Display replies -->
                    @foreach ($comment->replies as $reply)
                        <div class="reply">
                            <strong>{{ $reply->user->name }}</strong>: {{ $reply->body }}
                        </div>
                    @endforeach
                </div>
            @endforeach
        @endif

        <!-- Comment Form -->
        <form action="{{ route('comments.store', $book->id) }}" method="POST">
            @csrf
            <h3>Add a Comment</h3>
            <textarea name="body" required placeholder="Add a comment..."></textarea>
            <button type="submit">Add Comment</button>
        </form>
    </div>
@endsection