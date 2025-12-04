@extends('layout/admin')
@section('body')
    <h3>Author - Rename</h3>
    <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $category->name }}">
            <label class="form-label">image</label>
            <input type="text" name="image" id="image" value="{{$category->image}}" class="form-control"
                aria-describedby="emailHelp">
            <select name="status" class="form-control" id="">
                <option value="1" selected>On</option>
                <option value="0">Off</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection