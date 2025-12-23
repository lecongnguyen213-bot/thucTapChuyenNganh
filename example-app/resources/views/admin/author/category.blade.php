@extends('layout.admin')

@section('body')
<div class="container-fluid mt-4">

    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
                <i class="bi bi-people"></i> Author Management
            </h5>
            <a href="{{ route('admin.category.create') }}" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-circle"></i> Add Author
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle text-center">
                    <thead class="table-light">
                        <tr>
                            <th width="5%">#ID</th>
                            <th>Name</th>
                            <th width="15%">Image</th>
                            <th width="10%">Status</th>
                            <th width="20%">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>

                                <td class="text-start">
                                    <strong>{{ $category->name }}</strong>
                                </td>

                                <td>
                                    <img src="{{ asset($category->image) }}"
                                         class="rounded-circle border"
                                         width="60" height="60"
                                         style="object-fit: cover">
                                </td>

                                <td>
                                    @if ($category->status == 1)
                                        <span class="badge bg-success">
                                            Active
                                        </span>
                                    @else
                                        <span class="badge bg-secondary">
                                            Inactive
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('admin.category.edit', $category->id) }}"
                                       class="btn btn-sm btn-warning me-1">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>

                                    <form action="{{ route('admin.category.destroy', $category->id) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Bạn có chắc muốn xóa author này?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-muted text-center">
                                    Chưa có dữ liệu
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer text-muted small">
            Total Authors: {{ $categories->count() }}
        </div>
    </div>
</div>
@endsection
