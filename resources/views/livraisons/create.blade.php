<x-layouts.app.sidebar title="➕ Ajouter une Livraison">
    <flux:main class="p-6">
        <h2 class="text-3xl font-bold text-blue-600 dark:text-blue-400 mb-6"><a href="" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">
                <i class="fas fa-plus"></i> Nouvelle Livraison
            </a></h2>

        <div class="bg-white dark:bg-gray-900 p-6 shadow-lg rounded-lg border border-blue-300 dark:border-blue-700">
            <form action="{{ route('livraisons.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <!-- Sélection du Fournisseur -->
                <div>
                    <label for="IdFournisseur" class="block font-medium text-gray-700 dark:text-gray-300">Fournisseur</label>
                    <select name="IdFournisseur" class="w-full border-blue-300 dark:border-blue-700 bg-blue-50 dark:bg-gray-800 text-gray-900 dark:text-white rounded-md shadow-sm p-3 focus:ring-blue-500 focus:border-blue-500">
                        @foreach ($fournisseurs as $fournisseur)
                            <option value="{{ $fournisseur->id }}">{{ $fournisseur->Laboratoire }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Sélection du Produit -->
                <div>
                    <label for="idproduit" class="block font-medium text-gray-700 dark:text-gray-300">Produit</label>
                    <select name="idproduit" class="w-full border-blue-300 dark:border-blue-700 bg-blue-50 dark:bg-gray-800 text-gray-900 dark:text-white rounded-md shadow-sm p-3 focus:ring-blue-500 focus:border-blue-500">
                        @foreach ($produits as $produit)
                            <option value="{{ $produit->id }}">{{ $produit->libele }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Date de Livraison -->
                <div>
                    <label for="date" class="block font-medium text-gray-700 dark:text-gray-300">Date de Livraison</label>
                    <input type="date" name="date" class="w-full border-blue-300 dark:border-blue-700 bg-blue-50 dark:bg-gray-800 text-gray-900 dark:text-white rounded-md shadow-sm p-3 focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <!-- Quantité -->
                <div>
                    <label for="quant" class="block font-medium text-gray-700 dark:text-gray-300">Quantité</label>
                    <input type="number" name="quant" class="w-full border-blue-300 dark:border-blue-700 bg-blue-50 dark:bg-gray-800 text-gray-900 dark:text-white rounded-md shadow-sm p-3 focus:ring-blue-500 focus:border-blue-500" min="1" required>
                </div>

                <!-- Bouton d'Envoi -->
                <div class="flex justify-end">
                    <button type="submit" class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-3 rounded-lg shadow-lg hover:from-blue-600 hover:to-indigo-700 transition">
                        ✅ Ajouter la Livraison
                    </button>
                </div>
            </form>
        </div>
    </flux:main>
</x-layouts.app.sidebar>
