@extends('layouts.fronEnd')

@section('content')
<div class="container py-2">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Edit Book</h5>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('books.update', $book->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Book Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $book->title }}">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Author Name</label>
                            <input type="text" name="author" class="form-control @error('author') is-invalid @enderror" value="{{ $book->author }}">
                            @error('author')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Genre</label>
                            <input type="text" name="genre" class="form-control @error('genre') is-invalid @enderror" value="{{ $book->genre }}">
                            @error('genre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Publication Year</label>
                            <input type="text" name="publicationYear" class="form-control @error('publicationYear') is-invalid @enderror" value="{{ $book->publicationYear }}">
                            @error('publicationYear')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="4">{{ $book->description }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Book Image</label>
                            <input class="form-control @error('image') is-invalid @enderror" name="image" type="file">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-success">Update Book</button>
                            <a href="{{ route('book.store') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
