@extends('layout.home')

@section('body')

  <style>
    body {
      font-family: 'Inter', sans-serif;
      color: #2c2c2c;
    }

    .about-hero {
      padding: 80px 0 60px;
      background: #F3F2EC;
    }

    .about-title {
      font-family: 'Playfair Display', serif;
      font-weight: 700;
      letter-spacing: 0.5px;
    }

    .about-subtitle {
      max-width: 640px;
      margin: auto;
      color: #6b7280;
    }

    .about-card {
      border-radius: 14px;
    }

    .about-content {
      font-size: 1.05rem;
      line-height: 1.8;
      color: #374151;
    }

    .about-content h2,
    .about-content h3 {
      font-family: 'Playfair Display', serif;
      margin-top: 2.2rem;
      margin-bottom: 1rem;
    }

    .about-content p {
      margin-bottom: 1.4rem;
    }

    .about-content img {
      max-width: 100%;
      border-radius: 12px;
      margin: 24px 0;
    }
  </style>

  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Playfair+Display:wght@600;700&display=swap"
    rel="stylesheet">

  {{-- HERO --}}
  <div class="about-hero text-center">
    <div class="container">
      <h1 class="about-title mb-3">About Booksaw</h1>
      <p class="about-subtitle">
        Nơi kết nối tri thức, lan tỏa văn hóa đọc và truyền cảm hứng học tập
      </p>
    </div>
  </div>

  {{-- CONTENT --}}
  <div class="container mb-5">
    <div class="row justify-content-center">
      <div class="col-lg-9">

        @forelse ($page as $p)
          <div class="card about-card shadow-sm border-0 mb-4">
            <div class="card-body p-4 p-md-5">
              <div class="about-content">
                {{$p->slug}}: {!! $p->content !!}
              </div>

            </div>
          </div>
        @empty
          <div class="alert alert-warning text-center">
            Không có nội dung trang About
          </div>
        @endforelse
        <div class="text-center mt-4">
          <a href="{{ route('home') }}" class="btn btn-outline-secondary px-4">
            ← Về trang chủ
          </a>
        </div>

      </div>
    </div>
  </div>

@endsection