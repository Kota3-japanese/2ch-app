<?php

use App\Http\Controllers\ThreadController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/threads', [ThreadController::class, 'index']);
Route::get('/threads/create', [ThreadController::class, 'create']);
Route::post('/threads', [ThreadController::class, 'store']);

Route::get('/threads/{thread}/edit', [ThreadController::class, 'edit']);
Route::put('/threads/{thread}', [ThreadController::class, 'update']);

Route::get('/threads/{thread}', [ThreadController::class, 'show']);

Route::post('/threads/{thread}/posts', [ThreadController::class, 'storePost']);

Route::delete('/threads/{thread}', [ThreadController::class, 'destroy']);
Route::delete('/threads/{thread}/posts/{post}', [ThreadController::class, 'destroyPost']);