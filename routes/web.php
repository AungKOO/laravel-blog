<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::get('/', [ArticleController::class, 'index']);
Route::get('/articles', [ArticleController::class, 'index']);

Route::get('/articles/more', function () {
    return redirect('/articles/detail');
});

Route::get('/articles/detail/{id}', [ArticleController::class, 'detail']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/articles/add', [ArticleController::class, 'add']);
Route::post('/articles/add', [ArticleController::class, 'create']);
Route::get('/articles/delete/{id}', [ArticleController::class, 'delete']);
Route::get('/articles/edit/{id}', [ArticleController::class, 'edit']);
Route::put('/articles/edit/{id}', [ArticleController::class, 'update'])->name('articles.update');

Route::post('/comments/add', [CommentController::class, 'create'])->name('comments.add');
Route::get('/comments/delete/{id}', [CommentController::class, 'delete']);
