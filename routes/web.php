<?php

use App\Http\Controllers\AuthManager;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');

Route::get('/registration', [AuthManager::class, 'registration'])->name('registration'); // Corrected route name and view name
Route::post('/registration', [AuthManager::class, 'registrationPost'])->name('registration.post'); // Corrected route name


Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');
