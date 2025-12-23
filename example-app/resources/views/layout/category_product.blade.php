@extends('layout.home')

@section('body')
    <div class="container py-5">

        {{-- Breadcrumb --}}
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    {{ $category->name }}
                </li>
            </ol>
        </nav>
        {{-- Title --}}
        <div class="text-center mb-5">
            <h2 class="fw-bold">
                Danh mục:
                <span class="text-primary">{{ $category->name }}</span>
            </h2>
            <p class="text-muted mt-2">
                Khám phá các đầu sách nổi bật trong danh mục này
            </p>
        </div>
        @if(session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif
        @if($products->count())
            <div class="row g-4">
                @foreach($products as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="card product-card h-100 border-0 shadow-sm">

                            {{-- Image --}}
                            <div class="product-image">
                                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                            </div>

                            {{-- Body --}}
                            <div class="card-body d-flex flex-column text-center">

                                <h6 class="card-title fw-semibold mb-2">
                                    {{ $product->name }}
                                </h6>

                                <p class="price text-danger fw-bold mb-3">
                                    {{ number_format($product->price) }} $
                                </p>

                                {{-- Buttons --}}
                                <div class="d-flex gap-2 mt-auto justify-content-center w-100">

                                    {{-- Detail --}}
                                    <a href="{{ route('product.detail', $product->id) }}"
                                        class="btn btn-outline-primary btn-sm action-btn">
                                        Detail
                                    </a>
                                    {{-- Add to cart --}}
                                    <form action="{{ route('cart.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <input type="hidden" name="quantity" value="1">

                                        <button type="submit" class="btn btn-primary btn-sm action-btn">
                                            🛒 Add to cart
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-warning text-center">
                Không có sản phẩm trong danh mục này
            </div>
        @endif
    </div>
    {{-- Custom CSS --}}
    <style>
        /* Card */
        .product-card {
            border-radius: 14px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.12);
        }

        /* Image */
        .product-image {
            height: 220px;
            overflow: hidden;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .product-card:hover .product-image img {
            transform: scale(1.08);
        }

        /* Price */
        .price {
            font-size: 1.1rem;
        }

        /* Buttons equal size */
        .action-btn {
            width: 120px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            font-weight: 500;
            border-radius: 8px;
        }
    </style>
    <script>
        document.querySelectorAll('.add-to-cart-form').forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault();

                fetch("{{ route('cart.store') }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                        "Accept": "application/json"
                    },
                    body: new FormData(this)
                })
                    .then(res => res.json())
                    .then(data => {
                        alert('Đã thêm vào giỏ hàng');
                    });
            });
        });
    </script>

@endsection