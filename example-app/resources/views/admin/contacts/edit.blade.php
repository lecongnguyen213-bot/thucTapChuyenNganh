@extends('layout.admin')

@section('body')
<div class="container-fluid mt-4">
    <div class="card shadow-sm border-0 rounded">
        <!-- Header -->
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">
                <i class="bi bi-pencil-square"></i> Edit Contact
            </h5>
        </div>

        <!-- Body -->
        <div class="card-body">
            <form action="{{ route('admin.contacts.update', $contact->id) }}" method="POST" class="row g-3">
                @csrf
                @method('PUT')

                <div class="col-md-6">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" value="{{ old('name', $contact->name) }}"
                           class="form-control @error('name') is-invalid @enderror">
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" value="{{ old('email', $contact->email) }}"
                           class="form-control @error('email') is-invalid @enderror">
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" value="{{ old('phone', $contact->phone) }}"
                           class="form-control @error('phone') is-invalid @enderror">
                    @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-12">
                    <label class="form-label">Message</label>
                    <textarea name="message" rows="4"
                              class="form-control @error('message') is-invalid @enderror">{{ old('message', $contact->message) }}</textarea>
                    @error('message') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-12 text-end">
                    <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary me-2">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update Contact</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
