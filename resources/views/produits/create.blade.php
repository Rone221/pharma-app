<x-layouts.app.sidebar title="➕ Ajouter un Produit">
    <flux:main class="p-6">

        <!-- En-tête -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-blue-600 dark:text-blue-400">Ajouter un Nouveau Produit</h2>
            <a href="{{ route('produits.index') }}"
                class="flex items-center space-x-2 bg-gray-600 text-white px-4 py-2 rounded-md shadow-md hover:bg-gray-700 transition">
                <i class="fas fa-arrow-left"></i>
                <span>Retour à la liste</span>
            </a>
        </div>

        <!-- Formulaire -->
        <div class="bg-white dark:bg-gray-900 p-6 shadow-lg rounded-lg border border-blue-300 dark:border-blue-700">
            <form action="{{ route('produits.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Libellé du Produit -->
                <div>
                    <label for="libele" class="block font-medium text-gray-700 dark:text-gray-300">Libellé du
                        Produit</label>
                    <input type="text" name="libele" id="libele"
                        class="w-full border-blue-300 dark:border-blue-700 bg-blue-50 dark:bg-gray-800 text-gray-900 dark:text-white rounded-md shadow-sm p-3 focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>

                <!-- Prix Unitaire -->
                <div>
                    <label for="prixunitaire" class="block font-medium text-gray-700 dark:text-gray-300">Prix Unitaire
                        (FCFA)</label>
                    <input type="number" name="prixunitaire" id="prixunitaire" min="0"
                        class="w-full border-blue-300 dark:border-blue-700 bg-blue-50 dark:bg-gray-800 text-gray-900 dark:text-white rounded-md shadow-sm p-3 focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>

                <!-- Stock -->
                <div>
                    <label for="stock" class="block font-medium text-gray-700 dark:text-gray-300">Stock
                        Initial</label>
                    <input type="number" name="stock" id="stock" min="0"
                        class="w-full border-blue-300 dark:border-blue-700 bg-blue-50 dark:bg-gray-800 text-gray-900 dark:text-white rounded-md shadow-sm p-3 focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>

                <!-- Catégorie -->
                <div>
                    <label for="id_categorie"
                        class="block font-medium text-gray-700 dark:text-gray-300">Catégorie</label>
                    <select name="id_categorie" id="id_categorie"
                        class="w-full border-blue-300 dark:border-blue-700 bg-blue-50 dark:bg-gray-800 text-gray-900 dark:text-white rounded-md shadow-sm p-3 focus:ring-blue-500 focus:border-blue-500"
                        required>
                        <option value="" disabled selected>Choisir une catégorie</option>
                        @foreach ($categories as $categorie)
                            <option value="{{ $categorie->id }}">{{ $categorie->libeleCategorie }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Boutons -->
                <div class="flex justify-end space-x-3">
                    <a href="{{ route('produits.index') }}"
                        class="px-6 py-3 bg-gray-500 text-white rounded-lg shadow-md hover:bg-gray-600 transition">
                        <i class="fas fa-times"></i> Annuler
                    </a>
                    <button type="submit"
                        class="px-6 py-3 bg-green-600 text-white rounded-lg shadow-md hover:bg-green-700 transition">
                        <i class="fas fa-save"></i> Enregistrer
                    </button>
                </div>
            </form>
        </div>

    </flux:main>
</x-layouts.app.sidebar>
