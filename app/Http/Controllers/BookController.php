<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Http\Requests\UpdateBookRequ0est;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function create()
    {
        return view('book.create');
    }

    // Handle the form submission and save the book
    public function store(BookRequest $request)
    {
        {
             // Create a new book record in the database
             $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('image'), $imageName);


              Book::create([
                'title' => $request->title,
                'author' => $request->author,
                'genre' => $request->genre,
                'publicationYear' => $request->publicationYear,
                'description' => $request->description,
                'image'=> $imageName,
              ]);

              // Redirect to a success page or back to the form
              return redirect()->route('books.index')->with('success', 'Book added successfully!');

        }


    }

    // Display the list of books
    public function index(Request $request)
    {
        $search = $request->input('search');

        $books = Book::query()
        ->when($search, function ($query, $search) {
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('author', 'like', "%{$search}%")
                  ->orWhere('genre', 'like', "%{$search}%")
                  ->orwhere('publicationYear','like',"%{$search}%");
        })
        ->get();

    return view('book.index', compact('books'));


        // // Fetch all books from the database
        // $books = Book::all();
        // // Return the view with the books data
        // return view('book.index', compact('books'));
    }

    // In BookController.php

public function edit($id)
{
    // Find the book by ID
    $book = Book::findOrFail($id);

    // Return the edit view with the book data
    return view('book.edit', compact('book'));
}

public function update(UpdateBookRequ0est $request, $id)
{
    // Find the book by ID
    $book = Book::findOrFail($id);

     // Handle image if uploaded
     if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('image'), $imageName);
        $book->image = $imageName;
     }
   {
         // Update the book record
    $book->update([
        'title' => $request->title,
        'author' => $request->author,
        'genre' => $request->genre,
        'publicationYear' => $request->publicationYear,
        'description' => $request->description,
        'image'=> $imageName,

    ]);

    // Redirect back to the books list with success message
    return redirect()->route('books.index')->with('success', 'Book updated successfully!');
    }


}

public function destroy($id)
{
    // Find the book by ID
    $book = Book::findOrFail($id);

    // Delete the book record
    $book->delete();

    // Redirect back to the books list with success message
    return redirect()->route('books.index')->with('success', 'Book deleted successfully!');
}


}
