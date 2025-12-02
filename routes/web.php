<?php

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
    Route::view('users', 'users.index')->name('users.index');
    Route::view('users/create', 'users.create')->name('users.create');
    Route::view('users/{user}', 'users.show')->name('users.show');
    Route::view('users/{user}/edit', 'users.edit')->name('users.edit');
});

Route::prefix('buildings')->group(function () {
    Route::view('buildings', 'buildings.index')->name('buildings.index');
    Route::view('buildings/create', 'buildings.create')->name('buildings.create');
    Route::view('buildings/{building}', 'buildings.show')->name('buildings.show');
    Route::view('buildings/{building}/edit', 'buildings.edit')->name('buildings.edit');
});

Route::prefix('items')->group(function () {
    Route::view('items', 'items.index')->name('items.index');
    Route::view('items/create', 'items.create')->name('items.create');
    Route::view('items/{item}', 'items.show')->name('items.show');
    Route::view('items/{item}/edit', 'items.edit')->name('items.edit');
});

Route::prefix('productions')->group(function () {
    Route::view('productions', 'productions.index')->name('productions.index');
    Route::view('productions/create', 'productions.create')->name('productions.create');
    Route::view('productions/{production}', 'productions.show')->name('productions.show');
    Route::view('productions/{production}/edit', 'productions.edit')->name('productions.edit');
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
