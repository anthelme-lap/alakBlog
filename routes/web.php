<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

Route::get('/', [HomeController::class, 'index'])->name('accueil');
Route::get('/home', [HomeController::class, 'index'])->name('accueil');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

    



// ADMIN ROUTE
Route::get('/dashboard', [DashboardController::class, 'index'])->name('index.admin');


// Route innaccessible aux users connectés
Route::middleware('guest')->group(function(){
    Route::get('/activate/{activate_code}',[UserController::class, 'confirm'])->name('confirmEmail');
    Route::get('/register', [UserController::class, 'register'])->name('register');
    Route::post('/register', [UserController::class, 'handleRegister'])->name('register.user');
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login', [UserController::class, 'handleLogin'])->name('auth.user');
});


// Route accessible aux users connectés
Route::middleware('auth')->group(function(){

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('index.admin');
    Route::get('/all-article', [ArticleController::class, 'index'])->name('article');
    Route::get('/article/create', [ArticleController::class, 'create'])->name('create.article');
    Route::post('/article', [ArticleController::class, 'store'])->name('store.article');
    Route::get('/detail/{article}', [HomeController::class, 'detail'])->name('detail.article')->withoutMiddleware('auth');
    Route::post('/comment/article', [HomeController::class, 'comment'])->name('article.comment')->withoutMiddleware('auth');
    Route::get('/article/{article}/edit', [ArticleController::class, 'edit'])->name('edit.article');
    Route::put('/{article}/edit', [ArticleController::class, 'updated'])->name('updated.article');
    Route::delete('/{article}/delete', [ArticleController::class, 'delete'])->name('delete.article');

    // Route category
    Route::get('/all-category', [CategoryController::class,'index'])->name('category');
    Route::get('/category/add', [CategoryController::class,'create'])->name('create.category');
    Route::post('/category', [CategoryController::class,'store'])->name('store.category');
    Route::get('/category/{categorie}', [CategoryController::class,'show'])->name('show.category');
    Route::get('/edit/{categorie}', [CategoryController::class,'edit'])->name('edit.category');
    Route::put('/updated/{categorie}', [CategoryController::class,'updated'])->name('updated.category');
    Route::delete('/delete/{categorie}', [CategoryController::class,'delete'])->name('delete.category');
    Route::get('category/article/{categorie}', [CategoryController::class, 'showByCategorie'])->name('showBycategorie')->withoutMiddleware('auth');

});


// Route::get('/comment', [CommentController])






