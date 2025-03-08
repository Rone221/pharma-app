<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    /**
     * Affiche la liste des fournisseurs.
     */
    public function index()
    {
        $fournisseurs = Fournisseur::all();
        return view('fournisseurs.index', compact('fournisseurs'));
    }

    /**
     * Affiche le formulaire de création d'un fournisseur.
     */
    public function create()
    {
        return view('fournisseurs.create');
    }

    /**
     * Enregistre un nouveau fournisseur dans la base de données.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Laboratoire' => 'required|string|max:255',
            'descriptionLab' => 'nullable|string',
            'Telephone' => 'required|string|max:20',
        ]);

        Fournisseur::create($request->all());
        return redirect()->route('fournisseurs.index')->with('success', 'Fournisseur ajouté avec succès.');
    }

    /**
     * Affiche les détails d'un fournisseur.
     */
    public function show(Fournisseur $fournisseur)
    {
        return view('fournisseurs.show', compact('fournisseur'));
    }

    /**
     * Affiche le formulaire de modification d'un fournisseur.
     */
    public function edit(Fournisseur $fournisseur)
    {
        return view('fournisseurs.edit', compact('fournisseur'));
    }

    /**
     * Met à jour un fournisseur dans la base de données.
     */
    public function update(Request $request, Fournisseur $fournisseur)
    {
        $request->validate([
            'Laboratoire' => 'required|string|max:255',
            'descriptionLab' => 'nullable|string',
            'Telephone' => 'required|string|max:20',
        ]);

        $fournisseur->update($request->all());
        return redirect()->route('fournisseurs.index')->with('success', 'Fournisseur mis à jour avec succès.');
    }

    /**
     * Supprime un fournisseur de la base de données.
     */
    public function destroy(Fournisseur $fournisseur)
    {
        // Supprime toutes les livraisons associées à ce fournisseur
    $fournisseur->livraisons()->delete();
        
    // Supprime le fournisseur en lui-même
        $fournisseur->delete();
        return redirect()->route('fournisseurs.index')->with('success', 'Fournisseur supprimé avec succès.');
    }
}