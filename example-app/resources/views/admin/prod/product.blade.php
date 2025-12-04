@extends('layout/admin')
@section('body')

  <div class="card-footer small text-muted">

    <table class="table">
      <h3>Product Page</h3>
      <a href="{{route('admin.product.create')}}" class="btn btn-primary">Add</a>
      <thead>
        <tr>
          <th scope="col">#ID</th>
          <th scope="col">Authors</th>
          <th scope="col">BookName</th>
          <th scope="col">Title</th>
          <th scope="col">Image</th>
          <th scope="col">Price</th>
          <th scope="col">Description</th>
          <th scope="col">Status</th>
          <th scope="col">Update</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
        @forelse($products as $product)
          <tr>
            <th>{{ $product->id }}</th>
            <td>{{ $product->category->name ?? 'No id' }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->title }}</td>
            <td><img src="{{ asset(path: $product->image) }}" alt="" width="100"></td>
            <td>{{ $product->price }}$</td>
            <td>{{ $product->description }}</td>
            <td>
              @if ($product->status == 1)
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle text-success"
                  viewBox="0 0 16 16">
                  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                  <path
                    d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05" />
                </svg>
              @else
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle text-secondary"
                  viewBox="0 0 16 16">
                  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                  <path
                    d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05" />
                </svg>
              @endif
            </td>
            <td>
              <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-sm btn-warning">Edit
              </a>
            </td>
            <td>
              <form action="{{ route('admin.product.destroy', $product->id) }}" method="POST"
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