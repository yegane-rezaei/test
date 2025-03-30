@extends('layout')

@section('title', 'Product Details')

@section('content')
    <div class="product-details">
        <!-- Product Image -->
        <img src="{{ asset('images/3.jpg') }}" class="product-image img-fluid" alt="Product Image">

        <div class="product-info">
            <h1 class="product-title">{{ "سال بلوا" }}</h1>
            <p class="product-description">{{ "فاصله‌ها از میان برداشته شده‌اند و حال و گذشته در هم آمیخته اند: حسینای مسحور شده با زلفی آشفته ایستاده است، اما نه بر پله‌های شهرداری که در ذهن نوش آفرین؛ دکتر معصوم طناب دار حسینا را می‌بافد و با قنداق موزر به مغز نوش آفرین می کوبد؛ " }}</p>
        </div>
    </div>

    <div class="comments-section">
        <h3>Comments</h3>
        <p>This is where comments will go. You can add a comment form here.</p>
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