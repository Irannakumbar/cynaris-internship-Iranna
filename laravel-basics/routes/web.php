
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BlogController;

Route::resource('posts', BlogController::class);

Route::resource('students', StudentController::class);

// Home page
Route::get('/', [HomeController::class, 'index'])->name('home');

// About page
Route::get('/about', [HomeController::class, 'about'])->name('about');

// Contact page
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

// Contact form submission
Route::post('/contact', [HomeController::class, 'submitContact'])->name('contact.submit');
