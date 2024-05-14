<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ToDoController;
use App\Models\ToDo;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::controller(ToDoController::class)->group(function () {
    Route::get('/to_dos', [ToDoController::class, 'index']);
    Route::post('/to_dos', [ToDoController::class, 'store']);
    Route::get('/to_dos/{id}', [ToDoController::class, 'show']);
    Route::put('/to_dos/{id}/toggle-completed', [ToDoController::class, 'toggleCompleted']);
    Route::delete('/to_dos/completed', [ToDoController::class, 'destroyCompleted']);
    Route::delete('/to_dos', [ToDoController::class, 'destroyAll']);
});
