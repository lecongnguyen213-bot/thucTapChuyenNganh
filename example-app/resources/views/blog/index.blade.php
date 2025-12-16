@extends('layout.home')

@section('body')

<style>
    /* ===== BLOG STYLE INLINE ===== */

    body {
        font-family: 'Inter', sans-serif;
        color: #2c2c2c;
    }

    .blog-title {
        font-family: 'Playfair Display', serif;
        font-weight: 700;
    }

    .blog-card {
        border-radius: 12px;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .blog-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 28px rgba(0,0,0,0.08);
    }

    .blog-thumb {
        height: 200px;
        object-fit: cover;
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
    }

    .blog-card-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.1rem;
        line-height: 1.4;
        margin-bottom: 8px;
    }

    .blog-excerpt {
        font-size: 0.95rem;
        color: #6b7280;
        line-height: 1.6;

        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .blog-readmore {
        font-size: 0.85rem;
        font-weight: 500;
    }
</style>

{{-- Google Font --}}
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">

<div class="container py-5">

    <div class="text-center mb-5">
        <h1 class="blog-title">Blog</h1>
        <p class="text-muted">Tin tức & bài viết mới nhất</p>
    </div>

    <div class="row">
        @forelse ($posts as $post)
            <div class="col-md-4 mb-4">
                <div class="card blog-card h-100 border-0">

                    @if($post->thumbnail)
                        <img src="{{ asset($post->thumbnail) }}"
                             class="card-img-top blog-thumb"
                             alt="{{ $post->title }}">
                    @endif

                    <div class="card-body d-flex flex-column">

                        <h5 class="blog-card-title">
                            {{ $post->title }}
                        </h5>

                        <p class="blog-excerpt flex-grow-1">
                            {{ $post->excerpt }}
                        </p>

                        <a href="{{ route('blog.detail', $post) }}"
                           class="btn btn-outline-primary btn-sm blog-readmore mt-auto">
                            Đọc tiếp →
                        </a>

                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p>Chưa có bài viết</p>
            </div>
        @endforelse
    </div>

    <div class="mt-5 d-flex justify-content-center">
        {{ $posts->links() }}
    </div>

</div>
@endsection
