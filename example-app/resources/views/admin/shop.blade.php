@extends('layout/admin')
@section('body')

    <div class="card-footer small text-muted">

    <table class="table">
        <h3>Shop </h3>
        <a href="" class="btn btn-primary">Add</a>  
  <thead>
    <tr>
      <th scope="col">#ID</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Image</th>
      <!-- <th scope="col">Last</th> -->
      <!-- <th scope="col">Handle</th>
      <th scope="col">View</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th> -->
    </tr>
  </thead>
  <tbody>
    @forelse($shops as $s)
<tr>
    <th>{{ $s->id }}</th>
    <td>{{ $s->name }}</td>
    <td>{{ $s->address }}</td>
    <td>{{ $s->image }}</td>
</tr>
@empty
    <h3>Chưa có dữ liệu</h3>
@endforelse

  </tbody>
</table>
</div>  
@endsection