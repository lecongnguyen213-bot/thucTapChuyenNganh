
@extends('layout/admin')
@section('body')
<h3>Edit Category</h3>
<form action="{{ route('admin.category.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ $category->name }}">
    </div>
    <button type="submit" class="btn btn-success">Update</button>
</form>
@endsection
