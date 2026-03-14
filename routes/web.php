<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return view("welcome");
});
Route::get('/posts', [PostController::class, 'index'])->name("posts.index");
Route::get("/posts/create", [PostController::class, "create"])->name("posts.create");
Route::get("/posts/restore", [PostController::class, "restore"])->name("posts.restore");
Route::post("/posts/store", [PostController::class, "store"])->name("posts.store");
Route::get("/posts/{post}/edit", [PostController::class, "edit"])->name("posts.edit");
Route::put("/posts/{post}", [PostController::class, "update"])->name("posts.update");
Route::get('/posts/{post}', [PostController::class, 'show'])->name("posts.show");
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name("posts.destroy");
Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name("comments.store");
