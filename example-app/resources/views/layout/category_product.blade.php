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

    @if($products->count())
        <div class="row g-4">
            @foreach($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card product-card h-100 border-0 shadow-sm">

                        {{-- Image --}}
                        <div class="product-image">
                            <img src="{{ asset($product->image) }}"
                                 alt="{{ $product->name }}"
                                 class="img-fluid">
                        </div>

                        {{-- Body --}}
                        <div class="card-body d-flex flex-column text-center">
                            <h6 class="card-title fw-semibold mb-2">
                                {{ $product->name }}
                            </h6>

                            <p class="price text-danger fw-bold mb-3">
                                {{ number_format($product->price) }} $
                            </p>

                            <a href="{{ route('product.detail', $product->id) }}"
                               class="btn btn-outline-primary btn-sm mt-auto">
                                Xem chi tiết
                            </a>
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
.product-card {
    transition: all 0.3s ease;
    border-radius: 12px;
    overflow: hidden;
}

.product-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 25px rgba(0,0,0,0.12);
}

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

.price {
    font-size: 1.1rem;
}
</style>
@endsection
