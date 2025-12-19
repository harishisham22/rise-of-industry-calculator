<?php

use App\Http\Controllers\BuildingController;
use App\Http\Controllers\ItemController;
use App\Livewire\Buildings\Index as BuildingsIndex;
use App\Livewire\Buildings\Create as BuildingsCreate;
use App\Livewire\Buildings\Edit as BuildingsEdit;
use App\Livewire\Items\Index as ItemIndex;
use App\Livewire\Items\Create as ItemCreate;
use App\Livewire\Items\Edit as ItemEdit;
use App\Livewire\Productions\Index as ProductionsIndex;
use App\Livewire\Productions\Create as ProductionsCreate;
use App\Livewire\Productions\Edit as ProductionsEdit;
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
    Route::get('', BuildingsIndex::class)->name('buildings.index');
    Route::get('/create', BuildingsCreate::class)->name('buildings.create');
    Route::get('/{building}', BuildingsEdit::class)->name('buildings.edit');
});

Route::prefix('items')->group(function () {
    Route::get('', ItemIndex::class)->name('items.index');
    Route::get('/create', ItemCreate::class)->name('items.create');
    Route::get('/{item}/edit', ItemEdit::class)->name('items.edit');
});

Route::prefix('productions')->group(function () {
    Route::get('', ProductionsIndex::class)->name('productions.index');
    Route::get('/create', ProductionsCreate::class)->name('productions.create');
    Route::get('/{production}', ProductionsEdit::class)->name('productions.edit');
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
