<x-layouts.app.sidebar :heading="__('Liste des Produits')" :subheading="__('Gérez les produits de la pharmacie')">
    <flux:main class="p-6">
        <div class="my-6 w-full space-y-6">

            <!-- Messages de succès -->
            @if (session('success'))
                <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Bouton Ajouter un produit -->
            @can('ajouter un produit')
                <a href="{{ route('produits.create') }}"
                    class="block w-full bg-blue-600 text-white px-4 py-2 rounded-md text-center hover:bg-blue-700 transition">
                    <i class="fas fa-plus"></i> {{ __('Ajouter un Produit') }}
                </a>
            @endcan

            <!-- Table des Produits -->
            <div class="overflow-x-auto bg-white shadow-md rounded-lg">
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
                                <td class="px-6 py-4">{{ $produit->libelle }}</td>
                                <td class="px-6 py-4">{{ number_format($produit->prix_unitaire, 0, ',', ' ') }} FCFA
                                </td>
                                <td class="px-6 py-4">{{ $produit->stock }}</td>
                                <td class="px-6 py-4">{{ optional($produit->categorie)->libelleCategorie ?? 'N/A' }}
                                </td>
                                <td class="px-6 py-4 flex justify-center space-x-2">
                                    @can('voir les produits')
                                        <a href="{{ route('produits.show', $produit->id) }}"
                                            class="px-3 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    @endcan

                                    @can('modifier un produit')
                                        <a href="{{ route('produits.edit', $produit->id) }}"
                                            class="px-3 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    @endcan

                                    @can('supprimer un produit')
                                        <form action="{{ route('produits.destroy', $produit->id) }}" method="POST"
                                            onsubmit="return confirm('Supprimer ce produit ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="px-3 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    @endcan
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
