<x-layouts.app.sidebar title="📦 Détails du Produit">
    <flux:main class="p-6">
        <h2 class="text-3xl font-bold text-blue-600 dark:text-blue-400 mb-6">
            <i class="fas fa-info-circle"></i> Informations du Produit
        </h2>

        <div class="bg-white dark:bg-gray-900 p-6 shadow-lg rounded-lg border border-blue-300 dark:border-blue-700">
            <div class="space-y-4">
                <!-- Libellé -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Libellé :</h3>
                    <p class="text-gray-900 dark:text-gray-200">{{ $produit->libele }}</p>
                </div>

                <!-- Prix Unitaire -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Prix Unitaire :</h3>
                    <p class="text-gray-900 dark:text-gray-200">{{ number_format($produit->prixunitaire, 0, ',', ' ') }}
                        FCFA</p>
                </div>

                <!-- Stock -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Stock Disponible :</h3>
                    <p class="text-gray-900 dark:text-gray-200">{{ $produit->stock }}</p>
                </div>

                <!-- Catégorie -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Catégorie :</h3>
                    <p class="text-gray-900 dark:text-gray-200">
                        {{ optional($produit->categorie)->libeleCategorie ?? 'Non catégorisé' }}</p>
                </div>
            </div>

            <!-- Boutons d'actions -->
            <div class="mt-6 flex justify-between">
                <a href="{{ route('produits.index') }}"
                    class="bg-gray-500 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-gray-600 transition">
                    <i class="fas fa-arrow-left"></i> Retour
                </a>

                <div class="flex space-x-3">
                    <a href="{{ route('produits.edit', $produit->id) }}"
                        class="bg-yellow-500 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-yellow-600 transition">
                        <i class="fas fa-edit"></i> Modifier
                    </a>

                    <form action="{{ route('produits.destroy', $produit->id) }}" method="POST"
                        onsubmit="return confirm('Supprimer ce produit ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="bg-red-600 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-red-700 transition">
                            <i class="fas fa-trash"></i> Supprimer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </flux:main>
</x-layouts.app.sidebar>
