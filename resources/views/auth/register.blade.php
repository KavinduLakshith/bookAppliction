@extends('layouts.fronEnd')

@section('content')
<div class="container min-vh-100 d-flex justify-content-center" >
    <div class="col-md-8">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-success text-white text-center rounded-top-4">
                <h4 class="mb-0">{{ __('Register') }}</h4>
            </div>

            <div class="card-body px-4 py-4">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __('Name') }}</label>
                        <input id="name" type="text"
                               class="form-control @error('name') is-invalid @enderror"
                               name="name" value="{{ old('name') }}" required autofocus>

                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Role -->
                    <div class="mb-3">
                        <label for="role" class="form-label">{{ __('Role') }}</label>
                        <select name="role" id="role" class="form-select @error('role') is-invalid @enderror">
                            <option value="user" {{ old('role') === 'user' ? 'selected' : '' }}>User</option>
                            <option value="author" {{ old('role') === 'author' ? 'selected' : '' }}>Author</option>
                        </select>

                        @error('role')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email Address') }}</label>
                        <input id="email" type="email"
                               class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}" required>

                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror"
                               name="password" required>

                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-3">
                        <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password"
                               class="form-control" name="password_confirmation" required>
                    </div>

                    <!-- Submit -->
                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-success px-4">
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
