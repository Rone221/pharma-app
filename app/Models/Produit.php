<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = ['libele', 'prixunitaire', 'stock', 'IdCategorie'];

    /**
     * Un produit appartient à une catégorie.
     */
    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'IdCategorie');
    }

    /**
     * Un produit peut être livré plusieurs fois.
     */
    public function livraisons()
    {
        return $this->hasMany(Livraison::class, 'idproduit');
    }
}
