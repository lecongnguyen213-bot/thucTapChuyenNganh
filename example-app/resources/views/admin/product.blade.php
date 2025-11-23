@extends('layout/admin')
@section('body')

    <<div class="card-footer small text-muted">

    <table class="table">
        <h3>Product </h3>
        <a href="" class="btn btn-primary">Add</a>  
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <!-- <th scope="col">Last</th> -->
      <!-- <th scope="col">Handle</th>
      <th scope="col">View</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th> -->
    </tr>
  </thead>
  <tbody>
    @forelse($products as $prod)
<tr>
    <th>{{ $prod->id }}</th>
    <td>{{ $prod->name }}</td>
</tr>
@empty
    <h3>Chưa có dữ liệu</h3>
@endforelse

  </tbody>
</table>
</div>  
@endsection