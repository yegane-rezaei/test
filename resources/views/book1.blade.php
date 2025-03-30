@extends('layout')

@section('title', 'Product Details')

@section('content')
    <div class="product-details">
        <!-- Product Image -->
        <img src="{{ asset('images/9034597742378339.jpg') }}" class="product-image img-fluid" alt="Product Image">

        <div class="product-info">
            <h1 class="product-title">{{ "بیگانه" }}</h1>
            <p class="product-description">{{ "بیگانه (به فرانسوی: L'Étranger) رمانی نوشته آلبر کامو نویسنده فرانسوی در سال ۱۹۴۲ است. مضمون و چشم‌انداز آن اغلب به عنوان نمونه‌ای از فلسفه پوچ انگار و اگزیستانسیالیسم ذکر می‌شود. گرچه خود کامو مورد دوم را رد می‌کند. این اثر برنده جایزه نوبل ادبیات ۱۹۵۷ شد." }}</p>
        </div>
    </div>

    <div class="comments-section">
        <h3>Comments</h3>

        @auth
            <form action="{{ route('comments.store', $book->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <textarea name="body" class="form-control" placeholder="Add a comment"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit Comment</button>
            </form>
        @else
            <p>Please <a href="{{ route('login') }}">login</a> to add a comment.</p>
        @endauth

        <hr>

        @if(isset($comments) && count($comments) > 0)
            @foreach ($comments as $comment)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $comment->user->name }}
                            <small class="text-muted">at {{ $comment->created_at->format('Y-m-d H:i') }}</small>
                        </h5>
                        <p class="card-text">{{ $comment->body }}</p>

                        @auth
                            <form action="{{ route('replies.store', $comment->id) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <textarea name="body" class="form-control" placeholder="Add a reply"></textarea>
                                </div>
                                <button type="submit" class="btn btn-sm btn-primary">Submit Reply</button>
                            </form>
                        @else
                            <p>Please <a href="{{ route('login') }}">login</a> to reply.</p>
                        @endauth

                        <hr>

                        @if(isset($comment->replies) && count($comment->replies) > 0)
                            @foreach ($comment->replies as $reply)
                                <div class="card mb-2 ms-5">
                                    <div class="card-body">
                                        <h6 class="card-title">{{ $reply->user->name }}
                                            <small class="text-muted">at {{ $reply->created_at->format('Y-m-d H:i') }}</small>
                                        </h6>
                                        <p class="card-text">{{ $reply->body }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            @endforeach
        @else
            <p>No comments yet.</p>
        @endif
    </div>
@endsection

@section('styles')
    <style>
        .product-details {
            display: flex;
            align-items: center; /* Vertically center image and text */
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .product-image {
            max-width: 200px; /* Slightly smaller image */
            margin-right: 20px;
            border-radius: 8px;
        }

        .product-info {
            flex: 1; /* Take up remaining space */
        }

        .product-title {
            font-size: 2em;
            margin-bottom: 10px;
            color: #333;
        }

        .product-description {
            font-size: 1.1em;
            line-height: 1.6;
            color: #555;
        }

        .comments-section {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
        }

        .comments-section h3 {
            margin-bottom: 15px;
            color: #333;
        }
    </style>
@endsection