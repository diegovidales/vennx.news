<?php

use App\Livewire\Auth\{Login, Register};
use App\Livewire\MyNews\MyNewsIndex;
use App\Livewire\News\NewsIndex;
use Illuminate\Support\Facades\Route;

Route::get('/', NewsIndex::class)->name('news');

// Auth
Route::get('/register', Register::class)->name('register');
Route::get('/login', Login::class)->name('login');

Route::get('/my-news', MyNewsIndex::class)->name('my_news')->middleware('auth');
