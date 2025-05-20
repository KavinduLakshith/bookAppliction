<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/home',[HomeController::class,'index'])->name('home');

// Book Route
Route::get('/books/create', [BookController::class, 'create'])->name('books.create'); // Show the book creation form
Route::post('/books', [BookController::class, 'store'])->name('book.store'); // Handle the form submission and store the book
Route::get('/books',[BookController::class,'index'])->name('books.index')->middleware('auth');
Route::get('/books/edit/{id}', [BookController::class, 'edit'])->name('books.edit');
Route::put('/books/{id}', [BookController::class, 'update'])->name('books.update');
Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');





// Assuming you just want to return a Blade view (not using a controller yet)
Route::get('/profile', function () {
return view('profile'); })->name('profile');




Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
