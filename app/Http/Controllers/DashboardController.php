<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $produits = Produit::with('categorie')->orderBy('id', 'desc')->paginate(10);
        return view('dashboard', compact('produits'));
    }
}
