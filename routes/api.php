<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PlantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
    // return $request->user();
// })->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/connected', [AuthController::class, 'connected'])->middleware('auth:sanctum')->name('connected');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum')->name('logout');

Route::get('/plant', [PlantController::class, 'index'])->name('plant.index');
Route::post('/plant', [PlantController::class, 'create'])->name('plant.create');
Route::get('/plant/{plant}', [PlantController::class, 'edit'])->name('plant.edit');
