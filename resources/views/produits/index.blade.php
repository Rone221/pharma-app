<x-layouts.app.sidebar :heading="__('Liste des Produits')" :subheading="__('Gérez les produits de la pharmacie')">
    <flux:main class="p-6">
        <div class="my-6 w-full space-y-6">

            <!-- Messages de succès -->
            @if (session('success'))
                <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <!-- En-tête avec le bouton Ajouter un Produit -->
            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-bold text-gray-700 dark:text-white">{{ __('Produits Disponibles') }}</h2>
                <a href="{{ route('produits.create') }}"
                    class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">
                    <i class="fas fa-plus"></i>
                    <span>{{ __('Ajouter un Produit') }}</span>
                </a>
            </div>

            <!-- Table des Produits -->
            <div
                class="overflow-x-auto bg-white dark:bg-gray-900 shadow-md rounded-lg border border-gray-200 dark:border-gray-700">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th class="px-6 py-3">#</th>
                            <th class="px-6 py-3">{{ __('Libellé') }}</th>
                            <th class="px-6 py-3">{{ __('Prix Unitaire') }}</th>
                            <th class="px-6 py-3">{{ __('Stock') }}</th>
                            <th class="px-6 py-3">{{ __('Catégorie') }}</th>
                            <th class="px-6 py-3 text-center">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($produits as $produit)
                            <tr class="bg-white border-b hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4">{{ $produit->id }}</td>
                                <td class="px-6 py-4">{{ $produit->libele }}</td>
                                <td class="px-6 py-4">{{ number_format($produit->prixunitaire, 0, ',', ' ') }} FCFA
                                </td>
                                <td class="px-6 py-4">{{ $produit->stock }}</td>
                                <td class="px-6 py-4">{{ optional($produit->categorie)->libeleCategorie ?? 'N/A' }}
                                </td>
                                <td class="px-6 py-4 flex justify-center space-x-2">
                                    <a href="{{ route('produits.show', $produit->id) }}"
                                        class="px-3 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('produits.edit', $produit->id) }}"
                                        class="px-3 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('produits.destroy', $produit->id) }}" method="POST"
                                        onsubmit="return confirm('Supprimer ce produit ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                    {{ __('Aucun produit trouvé.') }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </flux:main>
</x-layouts.app.sidebar>
