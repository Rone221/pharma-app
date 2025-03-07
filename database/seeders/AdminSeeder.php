<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Exécuter le Seeder pour créer un administrateur.
     */
    public function run(): void
    {
        // Vérifier si le rôle "admin" existe déjà, sinon le créer
        if (!Role::where('name', 'admin')->exists()) {
            Role::create(['name' => 'admin']);
        }

        // Vérifier si un administrateur existe déjà pour éviter les doublons
        if (!User::where('email', 'admin@pharma.com')->exists()) {
            $admin = User::create([
                'nom' => 'Admin',
                'prenom' => 'Principal',
                'email' => 'admin@pharma.com',
                'tel' => '770000000',
                'password' => Hash::make('Admin123'), // Mot de passe sécurisé
            ]);

            // Assignation du rôle "admin" à cet utilisateur
            $admin->assignRole('admin');
        }
    }
}
