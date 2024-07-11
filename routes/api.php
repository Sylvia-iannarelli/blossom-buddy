<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\PlantUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
    // return $request->user();
// })->middleware('auth:sanctum');

// Auth routes
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/connected', [AuthController::class, 'connected'])->middleware('auth:sanctum')->name('connected');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum')->name('logout');

// Plant routes
Route::prefix('/plant')->name('plant.')->group(function () {
    Route::get('/', [PlantController::class, 'index'])->name('index');
    Route::post('/', [PlantController::class, 'create'])->name('create');
    Route::get('/{plant}', [PlantController::class, 'read'])->name('read');
    Route::delete('/{plant}', [PlantController::class, 'delete'])->name('delete');
});

// PlantUser routes (routes where the user interact with plants)
Route::prefix('/user/plant')->name('user.plant.')->group(function () {
    Route::get('/', [PlantUserController::class, 'getPlantUser'])->middleware('auth:sanctum')->name('getPlantUser');
    Route::post('/', [PlantUserController::class, 'addPlantUser'])->middleware('auth:sanctum')->name('addPlantUser');
});
