<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Création des rôles
        $admin = Role::create(['name' => 'admin']);
        $pharmacien = Role::create(['name' => 'pharmacien']);

        // Définition des permissions
        $permissions = [
            'gérer les utilisateurs',
            'gérer les produits',
            'gérer les fournisseurs',
            'gérer les livraisons'
        ];

        // Assigner les permissions aux rôles
        foreach ($permissions as $permission) {
            $perm = Permission::create(['name' => $permission]);
            $admin->givePermissionTo($perm);
        }

        // Le pharmacien a seulement accès à la gestion des produits et livraisons
        $pharmacien->givePermissionTo('gérer les produits');
        $pharmacien->givePermissionTo('gérer les livraisons');
    }
}
