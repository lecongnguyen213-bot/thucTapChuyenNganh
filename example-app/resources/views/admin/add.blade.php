@extends('layout/admin')
@section('body')
<div class="container">
   <div class="row">
      <form action="{{ route('category.store') }}" method="POST">
          @csrf
          <div class="mb-3">
              <label class="form-label">Category name</label>
              <input type="text" name="name" class="form-control" placeholder="category name">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>

   </div>
</div>
@endsection
