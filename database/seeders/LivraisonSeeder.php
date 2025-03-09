<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Livraison; // 🔹 Ajout du namespace

class LivraisonSeeder extends Seeder
{
    public function run()
    {
        Livraison::create([
            'IdFournisseur' => 1,
            'idproduit' => 1,
            'date' => '2025-03-07',
            'quant' => 50
        ]);
    }
}
