<?php

use App\Http\Controllers\BuildingController;
use App\Http\Controllers\BuildingTypeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemTypeController;
use App\Http\Controllers\ProductionSheetController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware(['api'])->group(function () {
    Route::prefix('buildings')->group(function () {
        Route::prefix('types')->group(function () {
            Route::get('/', [BuildingTypeController::class, 'index']);
            Route::get('/{buildingType}', [BuildingTypeController::class, 'show']);
            Route::post('/', [BuildingTypeController::class, 'store']);
            Route::put('/{buildingType}', [BuildingTypeController::class, 'update']);
            Route::delete('/{buildingType}', [BuildingTypeController::class, 'destroy']);
        });

        Route::get('/', [BuildingController::class, 'index']);
        Route::get('/{buildingId}', [BuildingController::class, 'fetch']);
        Route::post('/', [BuildingController::class, 'store']);
        Route::put('/{building}', [BuildingController::class, 'update']);
        Route::delete('/{building}', [BuildingController::class, 'destroy']);
    });

    Route::prefix('items')->group(function () {
        Route::prefix('types')->group(function () {
            Route::get('/', [ItemTypeController::class, 'index']);
            Route::get('/{itemType}', [ItemTypeController::class, 'show']);
            Route::post('/', [ItemTypeController::class, 'store']);
            Route::put('/{itemType}', [ItemTypeController::class, 'update']);
            Route::delete('/{itemType}', [ItemTypeController::class, 'destroy']);
        });

        Route::get('/', [ItemController::class, 'index']);
        Route::get('/{item}', [ItemController::class, 'fetch']);
        Route::post('/', [ItemController::class, 'store']);
        Route::put('/{item}', [ItemController::class, 'update']);
        Route::delete('/{item}', [ItemController::class, 'destroy']);
    });

    Route::prefix('production-sheets')->group(function () {
        Route::get('/', [ProductionSheetController::class, 'index']);
        Route::get('/{productionSheet}', [ProductionSheetController::class, 'show']);
        Route::post('/', [ProductionSheetController::class, 'store']);
        Route::put('/{productionSheet}', [ProductionSheetController::class, 'update']);
        Route::delete('/{productionSheet}', [ProductionSheetController::class, 'destroy']);
    });
});