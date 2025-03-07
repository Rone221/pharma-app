<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PharmacienController;
use App\Http\Controllers\LivraisonController;

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

Route::prefix('livraisons')->group(function () {
    Route::get('/', [LivraisonController::class, 'index'])->name('livraisons.index'); // Liste des livraisons (Vue Blade)
    Route::get('/create', [LivraisonController::class, 'create'])->name('livraisons.create'); // Formulaire de création
    Route::post('/', [LivraisonController::class, 'store'])->name('livraisons.store'); // Ajouter une livraison
    Route::get('/{id}', [LivraisonController::class, 'show'])->name('livraisons.show'); // Détails d’une livraison
    Route::get('/{id}/edit', [LivraisonController::class, 'edit'])->name('livraisons.edit'); // Formulaire d’édition
    Route::put('/{id}', [LivraisonController::class, 'update'])->name('livraisons.update'); // Modifier une livraison
    Route::delete('/{id}', [LivraisonController::class, 'destroy'])->name('livraisons.destroy'); // Supprimer une livraison
});

require __DIR__ . '/auth.php';
