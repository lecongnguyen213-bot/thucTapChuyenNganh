@extends('layout.home')

@section('body')
    <div class="container mt-4">
        <h2 class="mb-4">
            Danh mục:
            <span class="text-primary">{{ $category->name }}</span>
        </h2>

        @if($products->count())
            <div class="row g-4">
                @foreach($products as $product)
                    <div class="col-md-3">
                        <div class="card h-100 shadow-sm">
                            <img src="{{ asset($product->image) }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                            <div class="card-body text-center">
                                <h5 class="card-title">
                                    {{ $product->name }}
                                </h5>
                                <p class="text-danger fw-bold">
                                    {{ number_format($product->price) }} $
                                </p>
                                <a href="{{ route('product.detail', $product->id) }}" class="btn btn-outline-primary btn-sm">
                                    Detail
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-warning">
                Không có sản phẩm trong danh mục này
            </div>
        @endif
    </div>
@endsection