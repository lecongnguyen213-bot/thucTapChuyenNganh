@extends('layout.admin')

@section('body')
<div class="container-fluid">
    <div class="d-flex justify-content-between mb-3">
        <h4>Pages Management</h4>
        <a href="{{ route('admin.pages.create') }}" class="btn btn-primary">
            + Add Page
        </a>
    </div>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th width="5%">ID</th>
            <th width="20%">Title</th>
            <th>Content</th> {{-- ✅ THÊM --}}
            <th width="10%">Status</th>
            <th width="15%">Action</th>
        </tr>
        </thead>

        <tbody>
        @forelse($pages as $page)
            <tr>
                <td>{{ $page->id }}</td>
                <td>{{ $page->title }}</td>

                {{-- ✅ HIỂN THỊ CONTENT (CẮT NGẮN) --}}
                <td>{{ Str::limit(strip_tags($page->content), 100) }}</td>

                <td>{{ $page->status ? 'Active' : 'Inactive' }}</td>

                <td>
                    <a href="{{ route('admin.pages.edit', $page->id) }}"
                       class="btn btn-sm btn-warning">Edit</a>

                    <form action="{{ route('admin.pages.destroy', $page->id) }}"
                          method="POST"
                          class="d-inline"
                          onsubmit="return confirm('Delete this page?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">No data</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
