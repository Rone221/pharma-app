<x-layouts.app.sidebar :heading="__('Ajouter une Livraison')" :subheading="__('Enregistrez une nouvelle livraison pour la pharmacie')">
    <flux:main class="p-6">
        <div class="my-6 w-full space-y-6">

            <!-- Formulaire d'ajout de livraison -->
            <div class="bg-white dark:bg-gray-900 p-6 shadow-lg rounded-lg border border-gray-200 dark:border-gray-700">
                <form action="{{ route('livraisons.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Sélection du Fournisseur -->
                    <div>
                        <label for="IdFournisseur" class="block font-medium text-gray-700 dark:text-gray-300">
                            {{ __('Fournisseur') }}
                        </label>
                        <select name="IdFournisseur" id="IdFournisseur"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                            @foreach ($fournisseurs as $fournisseur)
                                <option value="{{ $fournisseur->id }}">{{ $fournisseur->Laboratoire }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Sélection du Produit -->
                    <div>
                        <label for="idproduit" class="block font-medium text-gray-700 dark:text-gray-300">
                            {{ __('Produit') }}
                        </label>
                        <select name="idproduit" id="idproduit"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                            @foreach ($produits as $produit)
                                <option value="{{ $produit->id }}">{{ $produit->libele }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Date de Livraison -->
                    <div>
                        <label for="date" class="block font-medium text-gray-700 dark:text-gray-300">
                            {{ __('Date de Livraison') }}
                        </label>
                        <input type="date" name="date" id="date"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white"
                            required>
                    </div>

                    <!-- Quantité -->
                    <div>
                        <label for="quant" class="block font-medium text-gray-700 dark:text-gray-300">
                            {{ __('Quantité') }}
                        </label>
                        <input type="number" name="quant" id="quant" min="1"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white"
                            required>
                    </div>

                    <!-- Boutons -->
                    <div class="flex justify-end space-x-4">
                        <a href="{{ route('livraisons.index') }}"
                            class="bg-gray-500 text-white px-6 py-2 rounded-md shadow-md hover:bg-gray-600 transition">
                            <i class="fas fa-arrow-left"></i> {{ __('Annuler') }}
                        </a>
                        <button type="submit"
                            class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-3 rounded-lg shadow-md hover:from-blue-600 hover:to-indigo-700 transition">
                            ✅ {{ __('Ajouter la Livraison') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </flux:main>
</x-layouts.app.sidebar>
