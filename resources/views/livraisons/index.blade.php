<x-layouts.app.sidebar title="📦 Gestion des Livraisons">
    <flux:main class="p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold">📦 Liste des Livraisons</h2>
            <a href="{{ route('livraisons.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">
                <i class="fas fa-plus"></i> Nouvelle Livraison
            </a>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 fade-in">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID</th>
                        <th scope="col" class="px-6 py-3">Fournisseur</th>
                        <th scope="col" class="px-6 py-3">Produit</th>
                        <th scope="col" class="px-6 py-3">Date</th>
                        <th scope="col" class="px-6 py-3">Quantité</th>
                        <th scope="col" class="px-6 py-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($livraisons as $livraison)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">{{ $livraison->id }}</td>
                        <td class="px-6 py-4">{{ $livraison->fournisseur->Laboratoire }}</td>
                        <td class="px-6 py-4">{{ $livraison->produit->libele }}</td>
                        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($livraison->date)->format('d/m/Y') }}</td>
                        <td class="px-6 py-4">{{ $livraison->quant }}</td>
                        <td class="px-6 py-4 flex justify-center space-x-2">
                            <a href="{{ route('livraisons.show', $livraison->id) }}" class="bg-blue-500 text-white px-3 py-2 rounded-md hover:bg-blue-600">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('livraisons.edit', $livraison->id) }}" class="bg-yellow-500 text-white px-3 py-2 rounded-md hover:bg-yellow-600">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('livraisons.destroy', $livraison->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cette livraison ?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="bg-red-500 text-white px-3 py-2 rounded-md hover:bg-red-600">
        <i class="fas fa-trash-alt"></i> 
    </button>
</form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </flux:main>
</x-layouts.app.sidebar>


