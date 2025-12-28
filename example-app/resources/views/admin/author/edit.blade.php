@extends('layout.admin')
@section('body')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="bi bi-pencil-square"></i> Edit Author
                    </h5>
                </div>

                <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card-body">

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Author Name</label>
                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   value="{{ $category->name }}"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Image URL / Path</label>
                            <input type="text"
                                   name="image"
                                   class="form-control"
                                   value="{{ $category->image }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Status</label>
                            <select name="status" class="form-select">
                                <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>
                                    Active
                                </option>
                                <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>
                                    Inactive
                                </option>
                            </select>
                        </div>

                    </div>

                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('admin.category.index') }}"
                           class="btn btn-secondary">
                            <i class="bi bi-arrow-return-left"></i> Back
                        </a>

                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-check-circle"></i> Update
                        </button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
@endsection
