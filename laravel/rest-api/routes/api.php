<?php

use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/students', [StudentController::class,'index']);
Route::post('/students', [StudentController::class,'store']);
// use App\Http\Controllers\AnimalController;
// use App\Http\Controllers\StudentController;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;

// // Rute Hewan
// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('/animals', [AnimalController::class, 'index']);
//     Route::post('/animals', [AnimalController::class, 'store']);
//     Route::put('/animals/{id}', [AnimalController::class, 'update']);
//     Route::delete('/animals/{id}', [AnimalController::class, 'destroy']);
    
//     // Rute Siswa
//     Route::get('/students', [StudentController::class, 'index']);
//     Route::post('/students', [StudentController::class, 'store']);
// });
