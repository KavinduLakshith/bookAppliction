@extends('layouts.fronEnd')

@section('content')
<div class="container py-4">
    <div  class="  text-white d-flex justify-content-between align-items-center">
        <div class="card-body">

            <!-- Table to Display Books -->
            <table class="table  table-hover table-bordered ">
                <thead  class="thead-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Book Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Genre</th>
                        <th scope="col">Publication Year</th>
                        <th scope="col">Description</th>
                        <th>Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->genre }}</td>
                            <td>{{ $book->publicationYear }}</td>
                            <td>{{ $book->description }}</td>
                            <td><img src="{{ asset('image/'.$book->image)}}" width="50" height="30" alt="Book Image"></td>

                            <td >
                                 <div class="d-flex align-items-center">
                                @if (auth()->user()->role === 'author')
                                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-sm btn-primary me-1">Edit</a>
                                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                @else
                                    <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#bookModal{{ $book->id }}">
                                        <i class="bi bi-eye-fill"></i>
                                    </button>
                                @endif
                                 </div>
                            </td>
                        </tr>

                        <!-- Modal for Each Book -->
                        <div class="modal fade" id="bookModal{{ $book->id }}" tabindex="-1" role="dialog" aria-labelledby="bookModalLabel{{ $book->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header bg-primary text-white d-flex justify-content-between align-items-center">
                                        <h5 class="modal-title mb-0" id="bookModalLabel{{ $book->id }}">
                                            <i class="fas fa-book-open me-2"></i> Book Details
                                        </h5>
                                        <button type="button" class="close text-black" data-dismiss="modal" aria-label="Close" style="font-size: 1rem;">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <!-- Modal Body -->
                                    <div class="modal-body">
                                        <div class="d-flex align-items-start">
                                            <div class="me-3">
                                                <p><strong>Title:</strong> {{ $book->title }}</p>
                                                <p><strong>Author:</strong> {{ $book->author }}</p>
                                                <p><strong>Genre:</strong> {{ $book->genre }}</p>
                                                <p><strong>Year:</strong> {{ $book->publicationYear }}</p>
                                                <p><strong>Description:</strong> {{ $book->description }}</p>
                                            </div>
                                            <img src="{{ asset('image/'.$book->image) }}" width="250" height="400" class="img-thumbnail" alt="Book Image">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
