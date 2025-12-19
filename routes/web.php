<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [TaskController::class, 'index']);

//route POST
Route::post('/tasks', [TaskController::class, 'store']);

//route PATCH
Route::patch('/tasks/{task}/status', [TaskController::class, 'updateStatus']);

//route DELETE
Route::delete('/tasks/{task}', [TaskController::class, 'destroy']); // Gère la suppression