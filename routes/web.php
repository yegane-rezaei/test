<?php

use App\Http\Controllers\AuthManager;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Models\Book;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');

Route::get('/registration', [AuthManager::class, 'registration'])->name('registration');
Route::post('/registration', [AuthManager::class, 'registrationPost'])->name('registration.post');


Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');

Route::group(["middleware" =>'auth'],function(){
    Route::get('/profile', function(){
        return "Hi";
    });
});



// Book Routes
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');
Route::post('/books/{book}/comments', [BookController::class, 'storeComment'])->name('comments.store');
Route::post('/replies/{commentId}', [BookController::class, 'storeReply'])->name('replies.store');
