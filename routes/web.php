<?php

use App\Http\Middleware\realAuth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\unauth;

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('posts', [PostController::class, 'create'])->name('posts')->middleware('auth');
Route::post('posts/create', [PostController::class, 'store'])->name('post.create')->middleware(realAuth::class);
Route::delete('posts/destroy/{post}', [PostController::class, 'destroy'])->name('post.delete')->middleware(realAuth::class);

Route::get('/dashboard', [MainController::class, 'dashboard'])->name('dashboard')->middleware(realAuth::class);
Route::get('/register',[AuthController::class,'register'])->name('register')->middleware(unauth::class);
Route::get('/login',[AuthController::class,'login'])->name('login')->middleware(unauth::class);
Route::post('/login',[AuthController::class,'validate'])->name('login');
Route::post('/logout',[AuthController::class, 'logout'])->middleware(realAuth::class)->name('logout');
Route::post('/register',[AuthController::class,'store'])->name('register');

