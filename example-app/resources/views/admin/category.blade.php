@extends('layout/admin')
@section('body')

    <div class="card-footer small text-muted">

    <table class="table">
        <h3>Category </h3>
        <a href="{{route('category.create')}}" class="btn btn-primary">Add</a>  
  <thead>
    <tr>
      <th scope="col">#ID</th>
      <th scope="col">Name</th>
      <!-- <th scope="col">Last</th> -->
      <!-- <th scope="col">Handle</th>
      <th scope="col">View</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th> -->
    </tr>
  </thead>
  <tbody>
    @forelse($categories as $category)
<tr>
    <th>{{ $category->id }}</th>
    <td>{{ $category->name }}</td>
</tr>
@empty
    <h3>Chưa có dữ liệu</h3>
@endforelse

  </tbody>
</table>
</div>  
@endsection