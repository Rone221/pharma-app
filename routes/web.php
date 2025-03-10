<?php

use App\Http\Controllers\CategorieController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\AdminController;
// use App\Http\Controllers\PharmacienController;
use App\Http\Controllers\LivraisonController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\ProduitController;

// Route::middleware(['auth', 'role:admin,pharmacien'])->group(function () {
//Route::resource('produits', ProduitController::class);->name('produits.index');
Route::resource('produits', ProduitController::class);

// });

Route::resource('fournisseurs', FournisseurController::class);
Route::resource('categories', CategorieController::class);


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
    // Route::resource('/admin', AdminController::class);
});

// Routes accessibles uniquement aux pharmaciens
Route::middleware(['auth', 'role:pharmacien'])->group(function () {
    // Route::resource('/pharmacien', PharmacienController::class);
});

Route::prefix('livraisons')->group(function () {
    Route::get('/', [LivraisonController::class, 'index'])->name('livraisons.index'); // Liste des livraisons
    Route::get('/create', [LivraisonController::class, 'create'])->name('livraisons.create'); // Formulaire de création
    Route::post('/', [LivraisonController::class, 'store'])->name('livraisons.store'); // Sauvegarde d'une nouvelle livraison
    Route::get('/{id}', [LivraisonController::class, 'show'])->name('livraisons.show'); // ✅ Voir une livraison
    Route::get('/{id}/edit', [LivraisonController::class, 'edit'])->name('livraisons.edit'); // Formulaire de modification
    Route::put('/{id}', [LivraisonController::class, 'update'])->name('livraisons.update'); // Mise à jour d'une livraison
    Route::delete('/{id}', [LivraisonController::class, 'destroy'])->name('livraisons.destroy'); // Suppression d'une livraison
});

require __DIR__ . '/auth.php';
