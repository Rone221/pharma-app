<?php

namespace App\Http\Controllers;

use App\Models\Livraison;
use Illuminate\Http\Request;

class LivraisonController extends Controller
{
    /**
     * Liste toutes les livraisons avec leurs produits et fournisseurs.
     */
    public function index()
    {
        return response()->json(Livraison::with(['produit', 'fournisseur'])->get());
    }

    /**
     * Affiche une livraison spécifique.
     */
    public function show($id)
    {
        $livraison = Livraison::with(['produit', 'fournisseur'])->find($id);
        if (!$livraison) {
            return response()->json(['message' => 'Livraison non trouvée'], 404);
        }
        return response()->json($livraison);
    }

    /**
     * Ajoute une nouvelle livraison.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'IdFournisseur' => 'required|exists:fournisseurs,IdFounisseur',
            'idproduit' => 'required|exists:produits,idproduit',
            'date' => 'required|date',
            'quant' => 'required|integer|min:1',
        ]);

        $livraison = Livraison::create($validated);
        return response()->json($livraison, 201);
    }

    /**
     * Met à jour une livraison existante.
     */
    public function update(Request $request, $id)
    {
        $livraison = Livraison::find($id);
        if (!$livraison) {
            return response()->json(['message' => 'Livraison non trouvée'], 404);
        }

        $validated = $request->validate([
            'IdFournisseur' => 'exists:fournisseurs,IdFounisseur',
            'idproduit' => 'exists:produits,idproduit',
            'date' => 'date',
            'quant' => 'integer|min:1',
        ]);

        $livraison->update($validated);
        return response()->json($livraison);
    }

    /**
     * Supprime une livraison.
     */
    public function destroy($id)
    {
        $livraison = Livraison::find($id);
        if (!$livraison) {
            return response()->json(['message' => 'Livraison non trouvée'], 404);
        }

        $livraison->delete();
        return response()->json(['message' => 'Livraison supprimée avec succès']);
    }
}
