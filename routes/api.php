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

Route::middleware(['auth:sanctum', 'verified', 'api'])->group(function () {
    Route::prefix('buildings')->group(function () {
        Route::prefix('types')->group(function () {
            Route::get('/', [BuildingTypeController::class, 'index'])->name('building.types.index');
            Route::get('/{buildingType}', [BuildingTypeController::class, 'show'])->name('building.types.show');
            Route::post('/', [BuildingTypeController::class, 'store'])->name('building.types.store');
            Route::put('/{buildingType}', [BuildingTypeController::class, 'update'])->name('building.types.update');
            Route::delete('/{buildingType}', [BuildingTypeController::class, 'destroy'])->name('building.types.destroy');
        });

        Route::get('/', [BuildingController::class, 'index'])->name('buildings.index');
        Route::get('/{building}', [BuildingController::class, 'fetch'])->name('buildings.fetch');
        Route::post('/', [BuildingController::class, 'store'])->name('buildings.store');
        Route::put('/{building}', [BuildingController::class, 'update'])->name('buildings.update');
        Route::delete('/{building}', [BuildingController::class, 'destroy'])->name('buildings.destroy');
    });

    Route::prefix('items')->group(function () {
        Route::prefix('types')->group(function () {
            Route::get('/', [ItemTypeController::class, 'index'])->name('item.types.index');
            Route::get('/{itemType}', [ItemTypeController::class, 'show'])->name('item.types.show');
            Route::post('/', [ItemTypeController::class, 'store'])->name('item.types.store');
            Route::put('/{itemType}', [ItemTypeController::class, 'update'])->name('item.types.update');
            Route::delete('/{itemType}', [ItemTypeController::class, 'destroy'])->name('item.types.destroy');
        });

        Route::get('/', [ItemController::class, 'index'])->name('items.index');
        Route::get('/{item}', [ItemController::class, 'fetch'])->name('items.fetch');
        Route::post('/', [ItemController::class, 'store'])->name('items.store');
        Route::put('/{item}', [ItemController::class, 'update'])->name('items.update');
        Route::delete('/{item}', [ItemController::class, 'destroy'])->name('items.destroy');
    });

    Route::prefix('production-sheets')->group(function () {
        Route::get('/', [ProductionSheetController::class, 'index'])->name('production-sheets.index');
        Route::get('/{productionSheet}', [ProductionSheetController::class, 'show'])->name('production-sheets.show');
        Route::post('/', [ProductionSheetController::class, 'store'])->name('production-sheets.store');
        Route::put('/{productionSheet}', [ProductionSheetController::class, 'update'])->name('production-sheets.update');
        Route::delete('/{productionSheet}', [ProductionSheetController::class, 'destroy'])->name('production-sheets.destroy');
    });
});