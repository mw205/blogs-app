<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return view("welcome");
});
Route::get('/posts', [PostController::class, 'index'])->name("posts.index");
Route::get("/posts/create", [PostController::class, "create"])->name("posts.create");
Route::post("/posts/store", [PostController::class, "store"])->name("posts.store");
Route::get("/posts/{post_id}/edit", [PostController::class, "edit"])->name("posts.edit");
Route::put("/posts/{post_id}", [PostController::class, "update"])->name("posts.update");
Route::get('/posts/{post_id}', [PostController::class, 'show'])->name("posts.show");
Route::delete('/posts/{post_id}', [PostController::class, 'destroy'])->name("posts.destroy");
