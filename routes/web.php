<?php

use Illuminate\Support\Facades\Route;

Route::get('/landing', function () {
    return view('landing');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/news-blog', function () {
    return view('news-blog');
});

Route::get('/report', function () {
    return view('report');
});
