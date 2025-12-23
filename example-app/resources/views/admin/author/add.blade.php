@extends('layout.admin')

@section('body')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="bi bi-person-plus"></i> Add New Author
                    </h5>
                </div>

                <form action="{{ route('admin.category.store') }}" method="POST">
                    @csrf

                    <div class="card-body">

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Author Name</label>
                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   placeholder="Enter author name"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Image URL / Path</label>
                            <input type="text"
                                   name="image"
                                   class="form-control"
                                   placeholder="images/authors/author.jpg">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Status</label>
                            <select name="status" class="form-select">
                                <option value="1" selected>Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>

                    </div>

                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('admin.category.index') }}"
                           class="btn btn-secondary">
                            <i class="bi bi-arrow-return-left"></i> Back
                        </a>

                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Save
                        </button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
@endsection
