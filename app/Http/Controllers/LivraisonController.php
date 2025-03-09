<?php

namespace App\Http\Controllers;

use App\Models\Livraison;
use Illuminate\Http\Request;
use App\Models\Fournisseur;
use App\Models\Produit;

class LivraisonController extends Controller
{
    /**
     * Liste toutes les livraisons avec leurs produits et fournisseurs.
     */
    public function index()
    {
        $livraisons = Livraison::with(['produit', 'fournisseur'])->get();
        return view('livraisons.index', compact('livraisons'));
    }
    

    public function create()
{
    $fournisseurs = Fournisseur::all();
    $produits = Produit::all();
    return view('livraisons.create', compact('fournisseurs', 'produits'));
}


    /**
     * Affiche une livraison spécifique.
     */
    public function show($id)
    {
        $livraison = Livraison::with(['produit', 'fournisseur'])->find($id);
    
        if (!$livraison) {
            return redirect()->route('livraisons.index')->with('error', 'Livraison introuvable.');
        }
    
        return view('livraisons.show', compact('livraison'));
    }
    

    /**
     * Ajoute une nouvelle livraison.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'IdFournisseur' => 'required|exists:fournisseurs,id',
            'idproduit' => 'required|exists:produits,id',
            'date' => 'required|date',
            'quant' => 'required|integer|min:1',
        ]);
    
        Livraison::create($validated);
    
        return redirect()->route('livraisons.index')->with('success', 'Livraison ajoutée avec succès !');
    }
    

    /**
     * Met à jour une livraison existante.
     */
    public function edit($id)
    {
        $livraison = Livraison::find($id);
        $fournisseurs = Fournisseur::all();
        $produits = Produit::all();
    
        if (!$livraison) {
            return redirect()->route('livraisons.index')->with('error', 'Livraison introuvable.');
        }
    
        return view('livraisons.edit', compact('livraison', 'fournisseurs', 'produits'));
    }
    
    public function update(Request $request, $id)
    {
        $livraison = Livraison::find($id);
    
        if (!$livraison) {
            return redirect()->route('livraisons.index')->with('error', 'Livraison introuvable.');
        }
    
        $validated = $request->validate([
            'IdFournisseur' => 'required|exists:fournisseurs,id',
            'idproduit' => 'required|exists:produits,id',
            'date' => 'required|date',
            'quant' => 'required|integer|min:1',
        ]);
    
        $livraison->update($validated);
    
        return redirect()->route('livraisons.index')->with('success', 'Livraison mise à jour avec succès !');
    }
    
    /**
     * Supprime une livraison.
     */
    public function destroy($id)
    {
        $livraison = Livraison::find($id);
    
        if (!$livraison) {
            return redirect()->route('livraisons.index')->with('error', 'Livraison introuvable.');
        }
    
        $livraison->delete();
    
        return redirect()->route('livraisons.index')->with('success', 'Livraison supprimée avec succès.');
    }
    
}
