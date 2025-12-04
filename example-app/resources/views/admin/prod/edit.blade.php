@extends('layout/admin')
@section('body')
    <h3>Edit product</h3>
    <form action="{{ route('admin.product.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $product->name }}">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ $product->title }}">

            <label>Price</label>
            <input type="number" name="price" class="form-control" value="{{ $product->price }}">

            <label>Image</label>
            <input type="text" name="image" class="form-control" value="{{ $product->image }}">

            <label>Description</label>
            <input type="text" name="description" class="form-control" value="{{ $product->description }}">

            <label>Category</label>
            <select name="category_id" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if($category->id == $product->category_id) selected @endif>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            <label>Content</label>
            <input type="text" name="content" class="form-control" value="{{ $product->content }}">

            <label>Status</label>
            <select name="status" class="form-control">
                <option value="1" @if($product->status == 1) selected @endif>On</option>
                <option value="0" @if($product->status == 0) selected @endif>Off</option>
            </select>

        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection