<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'landing']);
Route::get('/about', [PageController::class, 'about']);
Route::get('/contact', [PageController::class, 'contact']);
Route::get('/news-blog', [PageController::class, 'newsBlog']);
Route::get('/report', [PageController::class, 'report']);
Route::get('/profile', [PageController::class, 'profile']);
