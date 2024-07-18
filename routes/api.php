<?php

use App\Http\Controllers\PlantController;
use App\Http\Controllers\PlantUserController;
use App\Interfaces\AuthControllerInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
    // return $request->user();
// })->middleware('auth:sanctum');

// Auth routes
Route::post('/register', [AuthControllerInterface::class, 'register'])->name('register');
Route::post('/login', [AuthControllerInterface::class, 'login'])->name('login');
Route::post('/connected', [AuthControllerInterface::class, 'connected'])->middleware('auth:sanctum')->name('connected');
Route::post('/logout', [AuthControllerInterface::class, 'logout'])->middleware('auth:sanctum')->name('logout');

// Plant routes
Route::prefix('/plant')->name('plant.')->group(function () {
    Route::get('/', [PlantController::class, 'index'])->name('index');
    Route::post('/', [PlantController::class, 'create'])->name('create');
    Route::get('/{common_name}', [PlantController::class, 'read'])->name('read');
    Route::delete('/{plant}', [PlantController::class, 'delete'])->name('delete');
    Route::get('/update', [PlantController::class, 'update'])->name('update');
});

// PlantUser routes (routes where the user interact with plants)
Route::prefix('/user/plant')->name('user.plant.')->group(function () {
    Route::get('/', [PlantUserController::class, 'getPlantUser'])->middleware('auth:sanctum')->name('getPlantUser');
    Route::post('/', [PlantUserController::class, 'addPlantUser'])->middleware('auth:sanctum')->name('addPlantUser');
    Route::delete('/{id}', [PlantUserController::class, 'deletePlantUser'])->middleware('auth:sanctum')->name('deletePlantUser');
});
