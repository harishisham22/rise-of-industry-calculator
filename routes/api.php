<?php

use App\Http\Controllers\BuildingController;
use App\Http\Controllers\ItemController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('buildings')->group(function () {
    Route::get('/', [BuildingController::class, 'index']);
    Route::get('/{building}', [BuildingController::class, 'fetch']);
    Route::post('/', [BuildingController::class, 'store']);
    Route::put('/{building}', [BuildingController::class, 'update']);
    Route::delete('/{building}', [BuildingController::class, 'destroy']);
});

Route::prefix('items')->group(function () {
    Route::get('/', [ItemController::class, 'index']);
    Route::get('/{item}', [ItemController::class, 'fetch']);
    Route::post('/', [ItemController::class, 'store']);
    Route::put('/{item}', [ItemController::class, 'update']);
    Route::delete('/{item}', [ItemController::class, 'destroy']);
});