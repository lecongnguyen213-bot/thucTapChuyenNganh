@extends('layout.admin')

@section('body')
<div class="container-fluid mt-4">

    <div class="card shadow-sm border-0 rounded">
        <!-- Header -->
        <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
            <h5 class="mb-0">
                <i class="bi bi-envelope-fill"></i> Contact Management
            </h5>
        </div>

        <!-- Body -->
        <div class="card-body p-3">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle text-center mb-0">
                    <thead class="table-light text-center">
                        <tr>
                            <th>#ID</th>
                            <th class="text-start">Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th class="text-start">Message</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($contacts as $contact)
                        <tr>
                            <td>{{ $contact->id }}</td>

                            <td class="text-start">
                                <strong>{{ $contact->name }}</strong>
                            </td>

                            <td>{{ $contact->email }}</td>

                            <td>{{ $contact->phone ?? '—' }}</td>

                            <td class="text-start">
                                {{ Str::limit($contact->message, 60) }}
                            </td>

                            <td>
                                <a href="{{ route('admin.contacts.edit', $contact->id) }}"
                                   class="btn btn-sm btn-warning me-1 mb-1">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>

                                <form action="{{ route('admin.contacts.destroy', $contact->id) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Bạn có chắc muốn xóa contact này?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger mb-1">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-muted text-center py-4">
                                Chưa có dữ liệu
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Footer -->
        <div class="card-footer text-muted small text-end">
            Total Contacts: <strong>{{ $contacts->count() }}</strong>
        </div>
    </div>
</div>
@endsection
