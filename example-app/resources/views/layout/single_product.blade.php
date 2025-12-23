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
                <a href="{{ route('category.show', $product->category_id) }}">
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

            {{-- ADD TO CART --}}
            <div class="add-cart-card">

                <form action="{{ route('cart.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <div class="row align-items-center g-3">

                        {{-- Quantity --}}
                        <div class="col-auto">
                            <div class="qty-wrapper">
                                <button type="button" class="qty-btn" onclick="changeQty(-1)">−</button>
                                <input type="number"
                                       id="qty"
                                       name="quantity"
                                       value="1"
                                       min="1">
                                <button type="button" class="qty-btn" onclick="changeQty(1)">+</button>
                            </div>
                        </div>

                        {{-- Add cart --}}
                        <div class="col-auto">
                            <button type="submit" class="btn btn-cart">
                                🛒 Thêm vào giỏ
                            </button>
                        </div>
                    </div>
                </form>

                @if(session('success'))
                    <div class="alert alert-success mt-3 mb-0">
                        {{ session('success') }}
                    </div>
                @endif
            </div>

            {{-- Back --}}
            <div class="mt-4">
                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
                    ← Quay lại
                </a>
            </div>

        </div>
    </div>
</div>

{{-- CSS --}}
<style>
.product-image-wrapper {
    border-radius: 16px;
    background: #fff;
    padding: 20px;
}

.product-image-wrapper img {
    max-height: 420px;
    object-fit: contain;
}

.price {
    font-size: 1.7rem;
}

/* Add cart box */
.add-cart-card {
    background: #fff;
    border: 1px solid #eee;
    border-radius: 16px;
    padding: 20px;
    box-shadow: 0 12px 30px rgba(0,0,0,.06);
}

/* Quantity */
.qty-wrapper {
    display: flex;
    align-items: center;
    border: 1px solid #ddd;
    border-radius: 12px;
    overflow: hidden;
}

.qty-wrapper input {
    width: 60px;
    height: 44px;
    border: none;
    text-align: center;
    font-weight: 600;
}

.qty-btn {
    width: 44px;
    height: 44px;
    background: #f8f9fa;
    border: none;
    font-size: 20px;
    cursor: pointer;
}

.qty-btn:hover {
    background: #e9ecef;
}

/* Buttons */
.btn-cart {
    height: 44px;
    padding: 0 28px;
    border-radius: 12px;
    font-weight: 600;
    background: linear-gradient(135deg, #0d6efd, #0b5ed7);
    color: #fff;
    border: none;
}

.btn-buy {
    height: 44px;
    padding: 0 24px;
    border-radius: 12px;
    border: 1px solid #0d6efd;
    color: #0d6efd;
    font-weight: 600;
    text-decoration: none;
}

.btn-buy:hover {
    background: #0d6efd;
    color: #fff;
}
</style>

{{-- JS --}}
<script>
function changeQty(val) {
    const input = document.getElementById('qty');
    let qty = parseInt(input.value) || 1;
    qty += val;
    if (qty < 1) qty = 1;
    input.value = qty;
}
</script>
@endsection
