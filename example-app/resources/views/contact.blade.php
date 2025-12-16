@extends('layout.home')

@section('body')

<style>
    body {
        font-family: 'Inter', sans-serif;
        color: #2c2c2c;
    }

    .contact-title {
        font-family: 'Playfair Display', serif;
        font-weight: 700;
    }

    .contact-card {
        border-left: 4px solid #2563eb;
    }

    .contact-item {
        margin-bottom: 8px;
    }

    .contact-label {
        font-weight: 600;
        color: #374151;
        min-width: 90px;
        display: inline-block;
    }

    .contact-message {
        background: #f8fafc;
        padding: 10px 12px;
        border-radius: 6px;
        color: #4b5563;
        white-space: pre-line;
    }
</style>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">

<div class="container py-5">

    <h1 class="contact-title mb-4 text-center">Contact</h1>

    @forelse ($contacts as $contact)
        <div class="card contact-card shadow-sm border-0 mb-4">
            <div class="card-body">
                <div class="contact-item">
                    <span class="contact-label">Name:</span>
                    {{ $contact->name }}
                </div>

                <div class="contact-item">
                    <span class="contact-label">Email:</span>
                    <a href="mailto:{{ $contact->email }}">
                        {{ $contact->email }}
                    </a>
                </div>

                <div class="contact-item">
                    <span class="contact-label">Phone:</span>
                    {{ $contact->phone }}
                </div>

                <div class="contact-item mt-2">
                    <span class="contact-label">Message:</span>
                    <div class="contact-message mt-1">
                        {{ $contact->message }}
                    </div>
                </div>

            </div>
        </div>
    @empty
        <div class="text-center">
            <p>Chưa có dữ liệu liên hệ</p>
        </div>
    @endforelse

</div>

@endsection
