<?php
use App\Http\Controllers\LivraisonController;

Route::prefix('livraisons')->group(function () {
    Route::get('/', [LivraisonController::class, 'index']); // Lister toutes les livraisons
    Route::get('/{id}', [LivraisonController::class, 'show']); // Afficher une livraison spécifique
    Route::post('/', [LivraisonController::class, 'store']); // Ajouter une nouvelle livraison
    Route::put('/{id}', [LivraisonController::class, 'update']); // Modifier une livraison
    Route::delete('/{id}', [LivraisonController::class, 'destroy']); // Supprimer une livraison
});
