<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
<<<<<<< HEAD

// Rutas para el recurso 'estudiantes'
Route::get('/estudiantes', [EstudianteController::class, 'index']);
Route::post('/estudiantes', [EstudianteController::class, 'store']);
Route::get('/estudiantes/{id}', [EstudianteController::class, 'show']);
Route::put('/estudiantes/{id}', [EstudianteController::class, 'update']);
Route::delete('/estudiantes/{id}', [EstudianteController::class, 'destroy']);

// Rutas para el recurso 'paralelos'
Route::get('/paralelos', [ParaleloController::class, 'index']);
Route::post('/paralelos', [ParaleloController::class, 'store']);
Route::get('/paralelos/{id}', [ParaleloController::class, 'show']);
Route::put('/paralelos/{id}', [ParaleloController::class, 'update']);
Route::delete('/paralelos/{id}', [ParaleloController::class, 'destroy']);
<<<<<<< HEAD
<<<<<<< HEAD


Route::get('/soap', [App\Http\Controllers\SoapController::class, 'consumirServicio']);
=======
>>>>>>> parent of ce6bea6 (AAA)
=======
>>>>>>> parent of 32c601b (update)
=======
>>>>>>> parent of 32c601b (update)
