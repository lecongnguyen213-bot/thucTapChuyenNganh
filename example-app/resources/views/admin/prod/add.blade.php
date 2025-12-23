@extends('layout.admin')

@section('body')
<div class="container-fluid px-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">➕ Add New Book</h2>
        <a href="{{ route('admin.product.index') }}" class="btn btn-secondary">
            ← Back
        </a>
    </div>

    {{-- Form Card --}}
    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('admin.product.store') }}" method="POST">
                @csrf

                <div class="row g-3">

                    {{-- Book Name --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Book Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter book name">
                    </div>

                    {{-- Title --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Short title">
                    </div>

                    {{-- Price --}}
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Price ($)</label>
                        <input type="number" name="price" class="form-control">
                    </div>

                    {{-- Author --}}
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Author</label>
                        <select name="category_id" class="form-select">
                            <option value="">-- Chọn tác giả --</option>
                            @foreach($categories as $category)
                                @if($category->status == 1)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    {{-- Status --}}
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Status</label>
                        <select name="status" class="form-select">
                            <option value="1" selected>On</option>
                            <option value="0">Off</option>
                        </select>
                    </div>

                    {{-- Image --}}
                    <div class="col-md-12">
                        <label class="form-label fw-semibold">Image Path</label>
                        <input type="text" name="image" class="form-control"
                               placeholder="images/books/book.jpg">
                    </div>

                    {{-- Description --}}
                    <div class="col-md-12">
                        <label class="form-label fw-semibold">Description</label>
                        <textarea name="description" class="form-control" rows="3"
                                  placeholder="Short description..."></textarea>
                    </div>

                    {{-- Content --}}
                    <div class="col-md-12">
                        <label class="form-label fw-semibold">Content</label>
                        <textarea name="content" class="form-control" rows="5"
                                  placeholder="Detailed content..."></textarea>
                    </div>

                </div>

                {{-- Actions --}}
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        💾 Save
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
