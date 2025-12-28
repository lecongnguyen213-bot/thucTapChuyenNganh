@extends('layout.admin')

@section('body')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Blog Posts</h4>
    <a href="{{ route('admin.posts.create') }}" class="btn btn-success">Create New Post</a>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="table-responsive">
    <table class="table table-striped table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Image</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>
                    @if($post->image)
                        <img src="{{ $post->image }}" alt="{{ $post->title }}" width="80" class="rounded">
                    @endif
                </td>
                <td>
                    <span class="badge {{ $post->status ? 'bg-success' : 'bg-secondary' }}">
                        {{ $post->status ? 'Active' : 'Inactive' }}
                    </span>
                </td>
                <td class="d-flex gap-2">
                    <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="mt-3">
    {{ route('admin.posts.index') }}
</div>
@endsection
