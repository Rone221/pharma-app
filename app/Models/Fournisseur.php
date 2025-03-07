<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    use HasFactory;

    protected $fillable = ['Laboratoire', 'descriptionLab', 'Telephone'];

    /**
     * Un fournisseur peut effectuer plusieurs livraisons.
     */
    public function livraisons()
    {
        return $this->hasMany(Livraison::class, 'IdFournisseur');
    }
}
