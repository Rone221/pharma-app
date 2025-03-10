<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\DashboardController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\AdminController;
// use App\Http\Controllers\PharmacienController;
use App\Http\Controllers\LivraisonController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\ProduitController;
use Illuminate\Support\Facades\Auth;

// Route::middleware(['auth', 'role:admin,pharmacien'])->group(function () {
//Route::resource('produits', ProduitController::class);->name('produits.index');
Route::resource('produits', ProduitController::class);

// });

Route::resource('fournisseurs', FournisseurController::class);
Route::resource('categories', CategorieController::class);
Route::resource('livraisons', LivraisonController::class);

Route::resource('dashboard', DashboardController::class);


Route::get('/', function () {
    if (Auth::check())
        return redirect()->route("dashboard");
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



require __DIR__ . '/auth.php';
