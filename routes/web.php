<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController; 
use App\Models\Comment; 
use App\Http\Controllers\SearchController;
use App\Http\Controllers\OpinionController; 
use App\Http\Controllers\OpinionVoteController;

Route::get('/', function () {
    
    if (Auth::check()) {
        return redirect()->route('home'); 
    }
    return view('landing'); 
})->name('landing');


Route::get('/home', function () {
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

Route::get('/cybersecurity/idor', function () {
    return view('idor'); 
})->name('cybersecurity.idor');

Route::get('/cybersecurity/binex', function () {
    return view('binex'); 
})->name('cybersecurity.binex');

Route::get('/cybersecurity/sql', function () {
    return view('sql'); 
})->name('cybersecurity.sql');

Route::get('/cybersecurity/xss', function () {
    return view('xss'); 
})->name('cybersecurity.xss');

Route::get('/cybersecurity/brokenaccess', function () {
    return view('brokenaccess'); 
})->name('cybersecurity.brokenaccess');

Route::get('/cybersecurity/reentry', function () {
    return view('reentry'); 
})->name('cybersecurity.reentry');

Route::get('/opinion', function () {
    return view('opinion');
})->name('opinion');

Route::get('/opinion', [OpinionController::class, 'index'])
    ->name('opinion');

Route::get('/opinion/create', [OpinionController::class, 'create'])
    ->name('createopinion');

Route::post('/opinion', [OpinionController::class, 'store'])
    ->name('opinion.store');

Route::post('/opinion/{opinion}/vote/{type}', [OpinionVoteController::class, 'vote'])
    ->name('opinion.vote');

Route::get('/search', [SearchController::class, 'index'])->name('search');