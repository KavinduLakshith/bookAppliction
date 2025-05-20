@extends('layouts.fronEnd')

@section('content')
<div class="container py-2">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Add Book</h5>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form method="POST" action="{{ url('/books') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Book Title</label>
                            <input type="text" name="title"
                                   class="form-control @error('title') is-invalid @enderror"
                                   placeholder="Book title"
                                   value="{{ old('title') }}">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Author Name</label>
                            <input type="text" name="author"
                                   class="form-control @error('author') is-invalid @enderror"
                                   placeholder="Author name"
                                   value="{{ old('author') }}">
                            @error('author')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Genre</label>
                            <input type="text" name="genre"
                                   class="form-control @error('genre') is-invalid @enderror"
                                   placeholder="Genre"
                                   value="{{ old('genre') }}">
                            @error('genre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Publication Year</label>
                            <input type="text" name="publicationYear"
                                   class="form-control @error('publicationYear') is-invalid @enderror"
                                   placeholder="Publication year"
                                   value="{{ old('publicationYear') }}">
                            @error('publicationYear')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description"
                                      class="form-control @error('description') is-invalid @enderror"
                                      placeholder="Book description"
                                      rows="5">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Book Image</label>
                            <input type="file" name="image"
                                   class="form-control @error('image') is-invalid @enderror">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-success">Add Book</button>
                            <a href="{{ route('book.store') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
