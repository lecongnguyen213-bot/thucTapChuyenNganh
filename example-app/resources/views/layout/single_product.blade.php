
@extends('layout.home')

@section('body')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-5">
            <img 
                src="{{ asset($product->image) }}"
                class="img-fluid rounded shadow"
                width="400"
            >
        </div>

        <div class="col-md-7">
            <h2>{{ $product->name }}</h2>
            <h4 class="text-danger">Price: 
                {{ number_format($product->price) }} $
            </h4>

            <p class="mt-3">
                {{ $product->description ?? 'Đang cập nhật mô tả...' }}
            </p>

            <a href="{{ url()->previous() }}" class="btn btn-secondary">
                ← Quay lại
            </a>
        </div>
    </div>
</div>
@endsection
