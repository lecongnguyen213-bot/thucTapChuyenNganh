@extends('layout.admin')

@section('body')
<div class="container-fluid">
    <h4 class="mb-4">{{ isset($post) ? 'Edit' : 'Create' }} Post</h4>

    <form action="{{ isset($post) ? route('admin.posts.update', $post->id) : route('admin.posts.store') }}" method="POST">
        @csrf
        @if(isset($post))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ $post->title ?? '' }}" required>
        </div>

        <div class="mb-3">
            <label>Image URL</label>
            <input type="url" name="image" class="form-control" value="{{ $post->image ?? '' }}">
        </div>

        <div class="mb-3">
            <label>Excerpt</label>
            <textarea name="excerpt" rows="3" class="form-control">{{ $post->excerpt ?? '' }}</textarea>
        </div>

        <div class="mb-3">
            <label>Content</label>
            <textarea name="content" rows="8" class="form-control" required>{{ $post->content ?? '' }}</textarea>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-select">
                <option value="1" @if(isset($post) && $post->status) selected @endif>Active</option>
                <option value="0" @if(isset($post) && !$post->status) selected @endif>Inactive</option>
            </select>
        </div>

        <button class="btn btn-primary">{{ isset($post) ? 'Update' : 'Save' }}</button>
        <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
