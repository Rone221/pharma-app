<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Exécuter les seeders pour créer les rôles et permissions.
     */
    public function run(): void
    {
        // Suppression des anciens rôles et permissions
        Permission::truncate();
        Role::truncate();

        // Création des rôles
        $admin = Role::create(['name' => 'admin']);
        $pharmacien = Role::create(['name' => 'pharmacien']);
        $permissions = [
            'ajouter un produit',
            'modifier un produit',
            'supprimer un produit',
            'voir les produits'
        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
        // Création des permissions
        Permission::create(['name' => 'gérer utilisateurs']);
        Permission::create(['name' => 'gérer produits']);
        Permission::create(['name' => 'gérer fournisseurs']);
        Permission::create(['name' => 'gérer livraisons']);
        

        // Attribution des permissions aux rôles
        $admin->givePermissionTo(Permission::all());
        $pharmacien->givePermissionTo(['gérer produits', 'gérer livraisons']);
        $admin->givePermissionTo($permissions);
        $pharmacien->givePermissionTo(['ajouter un produit', 'modifier un produit', 'voir les produits']);
    }   
}
