<?php

use App\Livewire\Auth\{Login, Register};
use App\Livewire\MyNews\Index as MyNews;
use App\Livewire\News\Index as News;
use Illuminate\Support\Facades\Route;

Route::get('/', News::class)->name('news');

// Auth
Route::get('/register', Register::class)->name('register');
Route::get('/login', Login::class)->name('login');

Route::get('/my-news', MyNews::class)->name('my_news')->middleware('auth');
