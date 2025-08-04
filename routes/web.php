<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TagController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;

Route::get('/', [MainController::class, 'index'])->name('home');

Route::get('/posts/{slug}', [PostController::class, 'show'])->name('posts.show');

Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/tags/{slug}', [TagController::class, 'show'])->name('tags.show');
Route::get('/search', [PostController::class, 'search'])->name('posts.search');
