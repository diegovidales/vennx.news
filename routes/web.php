<?php

use App\Livewire\Auth\{Login, Profile, Register};
use App\Livewire\Pages\{MyNews, AllNews};
use Illuminate\Support\Facades\Route;

Route::get('/', AllNews::class)->name('news');

// Auth
Route::get('/register', Register::class)->name('register');
Route::get('/login', Login::class)->name('login');
Route::get('/profile', Profile::class)->name('profile')->middleware('auth');

Route::get('/my-news', MyNews::class)->name('my_news')->middleware('auth');
