@extends('layout.home')

@section('body')

    <style>
        /* ===== BLOG DETAIL STYLE INLINE ===== */

        body {
            font-family: 'Inter', sans-serif;
            color: #2c2c2c;
        }

        .blog-detail-container {
            max-width: 760px;
        }

        .blog-detail-title {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            line-height: 1.3;
        }

        .blog-detail-thumb {
            width: 100%;
            border-radius: 12px;
            margin: 24px 0;
            object-fit: cover;
        }

        .blog-detail-content {
            font-size: 1.05rem;
            line-height: 1.8;
            color: #374151;
        }

        .blog-detail-content p {
            margin-bottom: 1.4rem;
        }

        .blog-detail-content h2,
        .blog-detail-content h3 {
            font-family: 'Playfair Display', serif;
            margin-top: 2.2rem;
            margin-bottom: 1rem;
        }

        .blog-detail-content img {
           width: 200px;
            border-radius: 10px;
            margin: 24px 0;
        }

        .blog-detail-content blockquote {
            border-left: 4px solid #2563eb;
            padding-left: 16px;
            color: #4b5563;
            font-style: italic;
            margin: 24px 0;
        }

        .back-btn {
            font-size: 0.9rem;
            padding: 6px 14px;
        }
    </style>

    {{-- Google Font --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Playfair+Display:wght@600;700&display=swap"
        rel="stylesheet">

    <div class="container blog-detail-container mt-5">

        <h1 class="blog-detail-title mb-3">
            {{ $post->title }}
        </h1>
            
        <div class="blog-detail-content">
            <img src="{{ asset($post->image . '/' . $post->thumbnail) }}" class="blog-detail-thumb">
            {!! $post->content !!}
        </div>

        <div class="mt-4">
            <a href="{{ route('blog') }}" class="btn btn-outline-secondary back-btn">
                ← Quay lại Blog
            </a>
        </div>

    </div>

@endsection