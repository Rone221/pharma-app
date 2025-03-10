<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Affiche la liste des catégories.
     */
    public function index()
    {
        $categories = Categorie::paginate(10);
        return view('categories.index', compact('categories'));
    }

    /**
     * Affiche le formulaire pour créer une catégorie.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Stocke une nouvelle catégorie.
     */
    public function store(Request $request)
    {
        $request->validate([
            'libeleCategorie' => 'required|string|max:255',
        ]);

        Categorie::create([
            'libeleCategorie' => $request->libeleCategorie,
        ]);

        return redirect()->route('categories.index')->with('success', 'Catégorie ajoutée avec succès');
    }


    /**
     * Affiche les détails d'une catégorie.
     */
    public function show($id)
    {
        $categorie = Categorie::findOrFail($id);
        return view('categories.show', compact('categorie'));
    }


    /**
     * Affiche le formulaire d'édition d'une catégorie.
     */
    public function edit($id)
    {
        $categorie = Categorie::findOrFail($id);
        return view('categories.edit', compact('categorie'));
    }


    /**
     * Met à jour une catégorie.
     */
    public function update(Request $request, Categorie $categorie)
    {
        $request->validate([
            'libeleCategorie' => 'required|string|max:255|unique:categories,libeleCategorie,' . $categorie->id,
        ]);

        $categorie->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Catégorie mise à jour avec succès.');
    }

    /**
     * Supprime une catégorie.
     */
    public function destroy($id)
    {
        $categorie = Categorie::findOrFail($id);
        $categorie->delete();

        return redirect()->route('categories.index')->with('success', 'Catégorie supprimée avec succès.');
    }
}
