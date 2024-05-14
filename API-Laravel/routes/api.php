<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ToDoController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::controller(ToDoController::class)->group(function () {
    Route::get('/to-dos', 'index');
    Route::post('/to-do', 'store');
    Route::get('/to-do/{id}', 'show');
    Route::put('/to-do/{id}/toggle-completed', 'toggleCompleted');
    Route::delete('/to-dos/completed', 'destroyCompleted');
    Route::delete('/to-dos', 'destroyAll');
});
