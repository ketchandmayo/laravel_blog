<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\User\ThemeController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::view('/', 'home.index')->name('home');

Route::redirect('/home', '/');


//Route::get('/test', TestController::class)->middleware('token:'.config('app.test_token'));
Route::get('/test', TestController::class);

Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{post}', [BlogController::class, 'show'])->name('blog.show');
Route::post('/blog/{post}/like', [BlogController::class, 'like'])->name('blog.like');
Route::post('change_theme', [ThemeController::class, 'changeTheme'])->name('changeTheme');

Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'store'])->name('login.store');

    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register', [RegisterController::class, 'store'])->name('register.store');
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [LoginController::class, 'destroy'])->name('logout');
});

