<?php
use App\Http\Controllers\PostController;
use App\Http\Controllers\Posts\CommentController;
use Illuminate\Support\Facades\Route;

//Route::prefix('user')->middleware(['active', 'auth'])->as('user.')->group(function () {
Route::prefix('user')->as('user.')->group(function () {
    Route::redirect('/', 'user/posts');

    Route::get('posts', [PostController::class, 'index'])->name('posts');
    Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('posts/{post}', [PostController::class, 'delete'])->name('posts.delete');
    Route::put('posts/{post}/like', [PostController::class, 'like'])->name('posts.like');
    Route::resource('posts/{post}/comments', CommentController::class);
});
