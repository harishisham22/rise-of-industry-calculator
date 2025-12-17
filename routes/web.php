<?php

use App\Http\Controllers\BuildingController;
use App\Http\Controllers\ItemController;
use App\Livewire\Buildings\Index as BuildingsIndex;
use App\Livewire\Buildings\Create as BuildingsCreate;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::prefix('users')->group(function () {
    Route::view('', 'users.index')->name('users.index');
    Route::view('/create', 'users.create')->name('users.create');
    Route::view('/{user}', 'users.show')->name('users.show');
    Route::view('/{user}/edit', 'users.edit')->name('users.edit');
});

Route::prefix('buildings')->group(function () {
    Route::view('', BuildingsIndex::class)->name('buildings.index');
    Route::view('/create', BuildingsCreate::class)->name('buildings.create');
    Route::view('/{building}', 'buildings.show')->name('buildings.show');
    Route::view('/{building}/edit', 'buildings.edit')->name('buildings.edit');
    Route::delete('/{building}', [BuildingController::class, 'destroy'])->name('buildings.destroy');
});

Route::prefix('items')->group(function () {
    Route::view('', ItemIndex::class)->name('items.index');
    Route::view('/create', 'items.create')->name('items.create');
    Route::view('/{item}', 'items.show')->name('items.show');
    Route::view('/{item}/edit', 'items.edit')->name('items.edit');
    Route::delete('/{item}', [ItemController::class, 'destroy'])->name('items.destroy');
});

Route::prefix('productions')->group(function () {
    Route::view('', 'productions.index')->name('productions.index');
    Route::view('/create', 'productions.create')->name('productions.create');
    Route::view('/{production}', 'productions.show')->name('productions.show');
    Route::view('/{production}/edit', 'productions.edit')->name('productions.edit');
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('user-password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});
