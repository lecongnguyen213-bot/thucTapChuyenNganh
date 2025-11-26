
@extends('layout/admin')
@section('body')
<h3>Edit product</h3>
<form action="{{ route('admin.product.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ $product->name }}">
    </div>
    <button type="submit" class="btn btn-success">Update</button>
</form>
@endsection
