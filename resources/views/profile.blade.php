@extends('layouts.fronEnd')

@section('content')
<div class="container min-vh-100 d-flex justify-content-center align-items-center">
    <div class="col-md-8">
        <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
            <!-- Card Header with Icon and Title -->
            <div class="card-header bg-gradient text-dark rounded-top-4 d-flex align-items-center gap-3" style="background: linear-gradient(45deg, #007bff, #6610f2);">
                <i class="bi bi-person-circle fs-2"></i>
                <h4 class="mb-0">{{ __('User Profile') }}</h4>
            </div>

            <!-- Card Body -->
            <div class="card-body px-5 py-4 bg-white">
                <!-- Name -->
                <div class="mb-4">
                    <label class="form-label fw-semibold text-muted">{{ __('Full Name') }}</label>
                    <div class="form-control-plaintext bg-light rounded px-4 py-3 border">{{ Auth::user()->name }}</div>
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label class="form-label fw-semibold text-muted">{{ __('Email Address') }}</label>
                    <div class="form-control-plaintext bg-light rounded px-4 py-3 border">{{ Auth::user()->email }}</div>
                </div>

                <!-- Role -->
                <div class="mb-4">
                    <label class="form-label fw-semibold text-muted">{{ __('Role') }}</label>
                    <div class="form-control-plaintext bg-light rounded px-4 py-3 border text-capitalize">{{ Auth::user()->role }}</div>
                </div>

                <!-- Role Description -->
                <div class="mb-4">
                    <label class="form-label fw-semibold text-muted">{{ __('Role Description') }}</label>
                    <div class="alert alert-info rounded-3 px-4 py-3">
                        @if(Auth::user()->role === 'author')
                            As an <strong>Author</strong>, you can create, update, and manage book records. You have access to advanced content features in the system.
                        @else
                            As a <strong>User</strong>, you can browse the book catalog, view details, and interact with available resources.
                        @endif
                    </div>
                </div>

                <!-- Logout Button -->
                {{-- <div class="d-grid">
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                       class="btn btn-danger btn-lg fw-bold">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div> --}}
                <!-- Logout Button -->
<div class="d-grid mt-4">
    <a href="{{ route('logout') }}"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
       class="btn btn-outline-danger fw-medium py-2 px-4 rounded-3 d-flex justify-content-center align-items-center gap-2"
       style="font-size: 1rem;">
        <i class="bi bi-box-arrow-right fs-5"></i> {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div>

            </div>
        </div>
    </div>
</div>
@endsection
