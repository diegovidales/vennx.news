<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('news');
})->name('news');
Route::get('/my-news', function () {
    return view('my-news');
})->name('my_news');
