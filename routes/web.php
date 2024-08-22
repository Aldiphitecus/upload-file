<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');
Route::get('/allarticles', [ArticleController::class, 'articles'])->middleware(['auth', 'verified'])->name('articles');
Route::get('/create-article', [ArticleController::class, 'createArticle'])->middleware(['auth', 'verified'])->name('create');
Route::get('/editarticle', [ArticleController::class, 'myArticles'])->middleware(['auth', 'verified'])->name('edit');
Route::get('/article-edit/{id}', [ArticleController::class, 'articleToEdit'])->middleware(['auth', 'verified']);
Route::get('/article-edit/{id}', [ArticleController::class, 'articleById'])->middleware(['auth', 'verified']);
Route::post('article-edit/{id}', [ArticleController::class, 'update']);
Route::get('/article/cetak_pdf', [ArticleController::class, 'cetak_pdf']);
Route::resource('articles', ArticleController::class);

Route::middleware(['auth'])->group(function () {
    Route::get('/myprofile', [ProfileController::class, 'index']);
    Route::patch('/edit', [ProfileController::class, 'update'])->name('profile.update');
});

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
