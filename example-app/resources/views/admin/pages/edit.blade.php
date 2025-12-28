@extends('layout.admin')

@section('body')
<div class="container-fluid">
    <h4 class="mb-4">Edit Page</h4>

    <form action="{{ route('admin.pages.update', $page->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- TITLE --}}
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text"
                   name="title"
                   class="form-control"
                   value="{{ old('title') ?? $page->title }}"
                   required>
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- SLUG --}}
        <div class="mb-3">
            <label class="form-label">Slug (optional)</label>
            <input type="text"
                   name="slug"
                   class="form-control"
                   value="{{ old('slug') ?? $page->slug }}"
                   placeholder="auto-generate if empty">
            @error('slug')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- CONTENT --}}
        <div class="mb-3">
            <label class="form-label">Content</label>
            <textarea name="content"
                      rows="8"
                      class="form-control"
                      required>{{ old('content') ?? $page->content }}</textarea>
            @error('content')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- STATUS --}}
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select">
                <option value="1" {{ (old('status') ?? $page->status) == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ (old('status') ?? $page->status) == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- BUTTON --}}
        <div class="mt-4">
            <button class="btn btn-primary">Update</button>
            <a href="{{ route('admin.pages.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
</div>
@endsection
