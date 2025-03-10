<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Affiche la liste des produits.
     */
    public function index()
    {
        $produits = Produit::with('categorie')->orderBy('id', 'desc')->paginate(10);
        return view('produits.index', compact('produits'));
    }

    /**
     * Affiche le formulaire d'ajout d'un produit.
     */
    public function create()
    {
        $categories = Categorie::orderBy('libeleCategorie', 'asc')->get();
        return view('produits.create', compact('categories'));
    }

    /**
     * Enregistre un nouveau produit.
     */
    public function store(Request $request)
    {


        // Validation des entrées
        $request->validate([
            'libele' => 'required|string|max:255',
            'prixunitaire' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'id_categorie' => 'required|exists:categories,id',
        ]);

        // Création du produit avec les bons champs
        Produit::create([
            'libele' => $request->libele,
            'prixunitaire' => $request->prixunitaire,
            'stock' => $request->stock,
            'IdCategorie' => $request->id_categorie, // Correction ici
        ]);

        return redirect()->route('produits.index')->with('success', 'Produit ajouté avec succès');
    }



    /**
     * Affiche les détails d'un produit.
     */
    public function show(Produit $produit)
    {
        return view('produits.show', compact('produit'));
    }

    /**
     * Affiche le formulaire de modification d'un produit.
     */
    public function edit(Produit $produit)
    {
        $categories = Categorie::orderBy('libeleCategorie', 'asc')->get();
        return view('produits.edit', compact('produit', 'categories'));
    }

    /**
     * Met à jour un produit existant.
     */
    public function update(Request $request, Produit $produit)
    {
        // Validation des entrées
        $request->validate([
            'libele' => 'required|string|max:255',
            'prixunitaire' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'id_categorie' => 'required|exists:categories,id',
        ]);

        // Mise à jour avec les bons champs
        $produit->update([
            'libele' => $request->libele,
            'prixunitaire' => $request->prixunitaire,
            'stock' => $request->stock,
            'IdCategorie' => $request->id_categorie, // Correction ici
        ]);

        return redirect()->route('produits.index')->with('success', '✅ Produit mis à jour avec succès.');
    }


    /**
     * Supprime un produit.
     */
    public function destroy(Produit $produit)
    {
        try {
            $produit->delete();
            return redirect()->route('produits.index')->with('success', '🗑️ Produit supprimé avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', '❌ Impossible de supprimer ce produit. Il est peut-être utilisé ailleurs.');
        }
    }
}
