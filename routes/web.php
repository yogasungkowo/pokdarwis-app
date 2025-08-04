<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TagController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoryController;

Route::get('/', [MainController::class, 'index'])->name('home');

Route::get('/posts/{slug}', [PostController::class, 'show'])->name('posts.show');

Route::prefix('category')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/{slug}', [CategoryController::class, 'show'])->name('category.show');
});

Route::get('/tags/{slug}', [TagController::class, 'show'])->name('tags.show');
Route::get('/search', [PostController::class, 'search'])->name('posts.search');

Route::get('/about', [AboutController::class, 'index'])->name('about.index');

Route::get('/kegiatan-kami', function () {
    return view('pages.kegiatan');
})->name('kegiatan.index');

Route::get('/malaria', function () {
    return view('pages.malaria');
})->name('malaria.index');
