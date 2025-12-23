@extends('layout.admin')

@section('body')
<div class="container-fluid px-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">📚 BookPage – Product Management</h2>
        <a href="{{ route('admin.product.create') }}" class="btn btn-primary">
            + Add New Book
        </a>
    </div>

    {{-- Table Card --}}
    <div class="card shadow-sm">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table align-middle table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>#ID</th>
                            <th>Author</th>
                            <th>Book Name</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td class="fw-semibold">{{ $product->id }}</td>
                                <td>{{ $product->category->name ?? 'N/A' }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->title }}</td>

                                {{-- Image --}}
                                <td>
                                    <img src="{{ asset($product->image) }}"
                                         class="rounded shadow-sm"
                                         width="70"
                                         alt="{{ $product->name }}">
                                </td>

                                {{-- Price --}}
                                <td class="text-danger fw-bold">
                                    {{ number_format($product->price) }} $
                                </td>

                                {{-- Description --}}
                                <td class="text-muted" style="max-width: 220px;">
                                    {{ Str::limit($product->description, 80) }}
                                </td>

                                {{-- Status --}}
                                <td>
                                    @if ($product->status == 1)
                                        <span class="badge bg-success">
                                            Active
                                        </span>
                                    @else
                                        <span class="badge bg-secondary">
                                            Inactive
                                        </span>
                                    @endif
                                </td>

                                {{-- Action --}}
                                <td class="text-center">
                                    <a href="{{ route('admin.product.edit', $product->id) }}"
                                       class="btn btn-sm btn-warning">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.product.destroy', $product->id) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Bạn có chắc muốn xóa sản phẩm này?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center text-muted py-4">
                                    Chưa có dữ liệu
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>
@endsection
