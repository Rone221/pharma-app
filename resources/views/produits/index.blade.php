<section class="w-full">
    @include('partials.settings-heading')

    <x-layouts.app :heading="__('Liste des Produits')" :subheading="__('Gérez les produits de la pharmacie')">
        <div class="my-6 w-full space-y-6">

            <!-- Messages de succès -->
            @if(session('success'))
                <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Bouton Ajouter un produit -->
            @can('ajouter un produit')
                <a href="{{ route('produits.create') }}" class="block w-full bg-blue-600 text-white px-4 py-2 rounded-md text-center">
                    {{ __('Ajouter un Produit') }}
                </a>
            @endcan

            <!-- Table des Produits -->
            <div class="overflow-x-auto bg-white shadow-md rounded-lg">
                <table class="w-full border-collapse border border-gray-200">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="p-3 border border-gray-300">{{ __('ID') }}</th>
                            <th class="p-3 border border-gray-300">{{ __('Libellé') }}</th>
                            <th class="p-3 border border-gray-300">{{ __('Prix Unitaire') }}</th>
                            <th class="p-3 border border-gray-300">{{ __('Stock') }}</th>
                            <th class="p-3 border border-gray-300">{{ __('Catégorie') }}</th>
                            <th class="p-3 border border-gray-300">{{ __('Actions') }}</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($produits as $produit)
                            <tr class="border-t hover:bg-gray-100">
                                <td class="p-3 border border-gray-300">{{ $produit->id }}</td>
                                <td class="p-3 border border-gray-300">{{ $produit->libelle }}</td>
                                <td class="p-3 border border-gray-300">{{ $produit->prix_unitaire }} FCFA</td>
                                <td class="p-3 border border-gray-300">{{ $produit->stock }}</td>
                                <td class="p-3 border border-gray-300">{{ $produit->categorie->libelleCategorie }}</td>
                                <td class="p-3 border border-gray-300 flex space-x-2">

                                    @can('voir les produits')
                                        <a href="{{ route('produits.show', $produit->id) }}" class="px-2 py-1 bg-gray-500 text-white rounded-md">
                                            {{ __('Voir') }}
                                        </a>
                                    @endcan

                                    @can('modifier un produit')
                                        <a href="{{ route('produits.edit', $produit->id) }}" class="px-2 py-1 bg-yellow-500 text-white rounded-md">
                                            {{ __('Modifier') }}
                                        </a>
                                    @endcan

                                    @can('supprimer un produit')
                                        <form action="{{ route('produits.destroy', $produit->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-2 py-1 bg-red-600 text-white rounded-md"
                                                onclick="return confirm('Supprimer ce produit ?')">
                                                {{ __('Supprimer') }}
                                            </button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="p-3 text-center text-gray-500">{{ __('Aucun produit trouvé.') }}</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $produits->links() }}
            </div>
        </div>
    </x-layouts.app>
</section>
