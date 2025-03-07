<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PharmacienController;
use App\Http\Controllers\ProduitController;

// Route::middleware(['auth', 'role:admin,pharmacien'])->group(function () {
    //Route::resource('produits', ProduitController::class);
    Route::get ('produits', [ProduitController::class, 'index'])->name('produits.index');

// });

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

// Routes accessibles uniquement aux administrateurs
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('/admin', AdminController::class);
});

// Routes accessibles uniquement aux pharmaciens
Route::middleware(['auth', 'role:pharmacien'])->group(function () {
    Route::resource('/pharmacien', PharmacienController::class);
});

require __DIR__ . '/auth.php';
