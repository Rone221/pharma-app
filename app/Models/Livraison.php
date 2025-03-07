<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{
    use HasFactory;

    protected $fillable = ['IdFournisseur', 'idproduit', 'date', 'quant'];

    /**
     * Une livraison appartient à un fournisseur.
     */
    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class, 'IdFournisseur');
    }

    /**
     * Une livraison concerne un produit.
     */
    public function produit()
    {
        return $this->belongsTo(Produit::class, 'idproduit');
    }
}
