
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;

// Home page - GET
Route::get('/', [HomeController::class, 'index'])->name('home');

// About page - GET
Route::get('/about', [HomeController::class, 'about'])->name('about');

// Contact page - GET
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

// Contact form submission - POST
Route::post('/contact', [HomeController::class, 'submitContact'])->name('contact.submit');

// Student page - GET
Route::get('/students', [StudentController::class, 'index'])->name('students');
