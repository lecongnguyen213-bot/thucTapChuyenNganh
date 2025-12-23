@extends('layout.home')

@section('body')
<div class="container py-5">

    {{-- Breadcrumb --}}
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/') }}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('category.show', $product->category_id ?? '#') }}">
                    Danh mục
                </a>
            </li>
            <li class="breadcrumb-item active">
                {{ $product->name }}
            </li>
        </ol>
    </nav>

    <div class="row g-5 align-items-start">

        {{-- Product Image --}}
        <div class="col-lg-5 text-center">
            <div class="product-image-wrapper shadow-sm">
                <img src="{{ asset($product->image) }}"
                     alt="{{ $product->name }}"
                     class="img-fluid">
            </div>
        </div>

        {{-- Product Info --}}
        <div class="col-lg-7">
            <h1 class="fw-bold mb-3">
                {{ $product->name }}
            </h1>

            <p class="price text-danger fw-bold mb-3">
                {{ number_format($product->price) }} $
            </p>

            <hr>

            <div class="product-description mb-4">
                <h6 class="fw-semibold">Mô tả sách</h6>
                <p class="text-muted">
                    {{ $product->description ?? 'Đang cập nhật mô tả chi tiết cho sản phẩm này.' }}
                </p>
            </div>

            {{-- Actions --}}
            <div class="d-flex gap-3">
                <a href="{{ url()->previous() }}"
                   class="btn btn-outline-secondary">
                    ← Quay lại
                </a>

                <a href="#"
                   class="btn btn-primary">
                    🛒 Thêm vào giỏ hàng
                </a>
            </div>
        </div>

    </div>
</div>

{{-- Custom CSS --}}
<style>
.product-image-wrapper {
    border-radius: 14px;
    overflow: hidden;
    background: #fff;
    padding: 20px;
}

.product-image-wrapper img {
    max-height: 420px;
    object-fit: contain;
}

.price {
    font-size: 1.6rem;
}

.product-description p {
    line-height: 1.8;
}
</style>
@endsection
