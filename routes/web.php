<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController; 
use App\Models\Comment; 
use App\Http\Controllers\SearchController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login', [LoginController::class, 'showLoginForm'])
    ->name('login');
Route::post('/login', [LoginController::class, 'login']); 
Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])
    ->name('register');
Route::post('/register', [RegisterController::class, 'register']); 

Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])
    ->name('password.request');

Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])
    ->name('password.email');

Route::get('/profile', [ProfileController::class, 'index'])
    ->name('profile');

Route::get('/profile/edit', [ProfileController::class, 'edit'])
    ->name('profile.edit');

Route::patch('/profile/update', [ProfileController::class, 'update'])
    ->name('profile.update');

// --- Article & Comments System ---

// 1. Article Display Route: Fetches comments from DB and passes them to the view
Route::get('/article/virus-sigma', function () {
    // Fetch comments with their associated user, ordered by newest first
    $comments = Comment::with('user')->latest()->get();
    
    return view('news', compact('comments')); 
})->name('news.show');

// 2. Store Comment Route: Handles the form submission
Route::post('/comments', [CommentController::class, 'store'])
    ->name('comments.store')
    ->middleware('auth'); // Only logged-in users can comment

Route::get('/news', function () {
    return view('news');
})->name('news');
// --- Other Static Pages ---
Route::get('/analysis', function () {
    return view('analysis');
})->name('analysis');

Route::get('/cybersecurity', function () {
    return view('cybersecurity');
})->name('cybersecurity');

Route::get('/opinion', function () {
    return view('opinion');
})->name('opinion');

Route::get('/search', [SearchController::class, 'index'])->name('search');