@extends('layout/admin')
@section('body')
    <div class="container">
        <div class="row">
            <form action="{{ route('admin.product.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">product name</label>
                    <input type="text" name="name" class="form-control" placeholder="product name">
                    <label class="form-label">Title: </label>
                    <input type="text" name="title" class="form-control">
                    <label class="form-label">Price: </label>
                    <input type="number" name="price" class="form-control">
                    <label class="form-label">Description: </label>
                    <input type="text" name="description" class="form-control">
                    <label class="form-label">Author:</label>
                    <select name="category_id" class="form-control">
                        <option value="">Chọn tác giả
                            @foreach($categories as $category)
                            @if($category->status==1)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                        @endforeach
                        </option>
                    </select>
                    <label class="form-label">Content: </label>
                    <input type="text" name="content" class="form-control">
                    <label class="form-label">image</label>
                    <input type="text" name="image" class="form-control" id="image">
                    <!-- <label name="status" class="form-control">Satus</label> -->
                    <select name="status" class="form-control" id="">
                        <option value="1" selected>On</option>
                        <option value="0">Off</option>
                    </select>

                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{route('admin.product.index')}}" class="btn btn-secondary"><svg xmlns="http://www.w3.org/2000/svg"
                        width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5" />
                    </svg>Back</a>
            </form>

        </div>
    </div>
@endsection