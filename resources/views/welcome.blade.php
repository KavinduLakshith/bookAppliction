@extends("layouts.fronEnd")

@section('content')

<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column body align-items-center py-5">
    {{-- <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ route('books.index') }}" class="text-sm text-gray-700 underline">Home</a>
                    <form method="POST" action="{{ route('logout') }}" class="text-sm text-gray-700 underline">
                        @csrf
                        <button type="submit" class="text-sm text-gray-700 underline">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                    @endif
                @endif
            </div>
        @endif


    </div> --}}
    <main class="d-flex justify-content-center align-items-center flex-column  px-3 text-center">
        <img src="{{ asset('OIP (2).png') }}" alt="Image">

        <h1>Book System</h1>
        <p class="lead">Cover is a one-page template for building simple and beautiful home pages. Download, edit the text, and add your own fullscreen background photo to make it your own.</p>
        <p class="lead">
            <a href="#" class="btn btn-lg btn-light fw-bold border-white bg-white">Learn more</a>
        </p>
    </main>
</div>



@endsection
