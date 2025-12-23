@extends('layout.admin')

@section('body')
<div class="container-fluid px-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">✏ Edit Book</h2>
        <a href="{{ route('admin.product.index') }}" class="btn btn-secondary">
            ← Back
        </a>
    </div>

    {{-- Form Card --}}
    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('admin.product.update', $product->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-3">

                    {{-- Book Name --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Book Name</label>
                        <input type="text"
                               name="name"
                               class="form-control"
                               value="{{ $product->name }}">
                    </div>

                    {{-- Title --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Title</label>
                        <input type="text"
                               name="title"
                               class="form-control"
                               value="{{ $product->title }}">
                    </div>

                    {{-- Price --}}
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Price ($)</label>
                        <input type="number"
                               name="price"
                               class="form-control"
                               value="{{ $product->price }}">
                    </div>

                    {{-- Author --}}
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Author</label>
                        <select name="category_id" class="form-select">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Status --}}
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Status</label>
                        <select name="status" class="form-select">
                            <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>On</option>
                            <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Off</option>
                        </select>
                    </div>

                    {{-- Image --}}
                    <div class="col-md-12">
                        <label class="form-label fw-semibold">Image Path</label>
                        <input type="text"
                               name="image"
                               class="form-control"
                               value="{{ $product->image }}">
                    </div>

                    {{-- Description --}}
                    <div class="col-md-12">
                        <label class="form-label fw-semibold">Description</label>
                        <textarea name="description"
                                  class="form-control"
                                  rows="3">{{ $product->description }}</textarea>
                    </div>

                    {{-- Content --}}
                    <div class="col-md-12">
                        <label class="form-label fw-semibold">Content</label>
                        <textarea name="content"
                                  class="form-control"
                                  rows="5">{{ $product->content }}</textarea>
                    </div>

                </div>

                {{-- Actions --}}
                <div class="mt-4">
                    <button type="submit" class="btn btn-success">
                        💾 Update
                    </button>

                    <a href="{{ route('admin.product.index') }}"
                       class="btn btn-outline-secondary ms-2">
                        Cancel
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
