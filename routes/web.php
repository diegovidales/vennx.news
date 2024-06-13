<?php

use App\Livewire\Auth\{Login, Register};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('news');
})->name('news');

// Auth
Route::get('/register', Register::class)->name('register');
Route::get('/login', Login::class)->name('login');

Route::get('/my-news', function () {
    return view('my-news');
})->name('my_news')->middleware('auth');
