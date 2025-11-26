@extends('layout/admin')
@section('body')

    <div class="card-footer small text-muted">

    <table class="table">
        <h3>Product Page</h3>
        <a href="{{route('admin.product.create')}}" class="btn btn-primary">Add</a>  
  <thead>
    <tr>
      <th scope="col">#ID</th>
      <th scope="col">Name</th>
      <th scope="col">Update value</th>
       <th scope="col">Delete value</th>
      <!--<th scope="col">View</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th> -->
    </tr>
  </thead>
  <tbody>
    @forelse($products as $product)
<tr>
    <th>{{ $product->id }}</th>
    <td>{{ $product->name }}</td>
    <td>
      <a href="{{ route('admin.product.edit', $product->id) }}"class="btn btn-sm btn-warning">Edit
      </a>
    </td>
      <td>
        <form action="{{ route('admin.product.destroy', $product->id) }}" 
            method="POST"
            onsubmit="return confirm('Bạn có chắc muốn xóa danh mục này?');">
              @csrf 
              @method('DELETE')
                <button class="btn btn-sm btn-danger" type="submit">Delete</button>
        </form>
      </td>
</tr>
@empty
    <h3>Chưa có dữ liệu</h3>
@endforelse

  </tbody>
</table>
</div>  
@endsection