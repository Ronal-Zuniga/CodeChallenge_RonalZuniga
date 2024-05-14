<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ToDoController;
use App\Models\ToDo;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('/to_dos', ToDoController::class)->only([
    'index', 'store', 'show', 'update', 'destroy'
]);

Route::put('/to_dos/{id}/toggle-completed', [ToDoController::class, 'toggleCompleted']);
Route::delete('/to_dos/completed', [ToDoController::class, 'destroyCompleted']);
Route::delete('/to_dos', [ToDoController::class, 'destroyAll']);
