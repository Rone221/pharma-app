<x-layouts.app.sidebar title="✏️ Modifier le Produit">
    <flux:main class="p-6">
        <h2 class="text-3xl font-bold text-yellow-600 dark:text-yellow-400 mb-6">
            <i class="fas fa-edit"></i> Modifier un Produit
        </h2>

        <!-- Messages d'erreur -->
        @if ($errors->any())
            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>⚠️ {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white dark:bg-gray-900 p-6 shadow-lg rounded-lg border border-yellow-300 dark:border-yellow-700">
            <form action="{{ route('produits.update', $produit->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Libellé -->
                <div>
                    <label for="libele" class="block font-medium text-gray-700 dark:text-gray-300">
                        Libellé du Produit
                    </label>
                    <input type="text" name="libele" id="libele" value="{{ old('libele', $produit->libele) }}"
                        required
                        class="w-full border-yellow-300 dark:border-yellow-700 bg-yellow-50 dark:bg-gray-800 
                               text-gray-900 dark:text-white rounded-md shadow-sm p-3 
                               focus:ring-yellow-500 focus:border-yellow-500">
                </div>

                <!-- Prix Unitaire -->
                <div>
                    <label for="prixunitaire" class="block font-medium text-gray-700 dark:text-gray-300">
                        Prix Unitaire (FCFA)
                    </label>
                    <input type="number" name="prixunitaire" id="prixunitaire" step="0.01" min="0"
                        value="{{ old('prixunitaire', $produit->prixunitaire) }}" required
                        class="w-full border-yellow-300 dark:border-yellow-700 bg-yellow-50 dark:bg-gray-800 
                               text-gray-900 dark:text-white rounded-md shadow-sm p-3 
                               focus:ring-yellow-500 focus:border-yellow-500">
                </div>

                <!-- Stock -->
                <div>
                    <label for="stock" class="block font-medium text-gray-700 dark:text-gray-300">
                        Stock Disponible
                    </label>
                    <input type="number" name="stock" id="stock" min="0"
                        value="{{ old('stock', $produit->stock) }}" required
                        class="w-full border-yellow-300 dark:border-yellow-700 bg-yellow-50 dark:bg-gray-800 
                               text-gray-900 dark:text-white rounded-md shadow-sm p-3 
                               focus:ring-yellow-500 focus:border-yellow-500">
                </div>

                <!-- Catégorie -->
                <div>
                    <label for="id_categorie" class="block font-medium text-gray-700 dark:text-gray-300">
                        Catégorie du Produit
                    </label>
                    <select name="id_categorie" id="id_categorie" required
                        class="w-full border-yellow-300 dark:border-yellow-700 bg-yellow-50 dark:bg-gray-800 
                               text-gray-900 dark:text-white rounded-md shadow-sm p-3 
                               focus:ring-yellow-500 focus:border-yellow-500">
                        @foreach ($categories as $categorie)
                            <option value="{{ $categorie->id }}"
                                {{ old('id_categorie', $produit->IdCategorie) == $categorie->id ? 'selected' : '' }}>
                                {{ $categorie->libeleCategorie }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Boutons d'actions -->
                <div class="flex justify-between">
                    <a href="{{ route('produits.index') }}"
                        class="bg-gray-500 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-gray-600 transition">
                        <i class="fas fa-arrow-left"></i> Annuler
                    </a>
                    <button type="submit"
                        class="bg-gradient-to-r from-yellow-500 to-orange-600 text-white px-6 py-3 rounded-lg 
                               shadow-lg hover:from-yellow-600 hover:to-orange-700 transition">
                        ✅ Mettre à Jour
                    </button>
                </div>
            </form>
        </div>
    </flux:main>
</x-layouts.app.sidebar>
