<x-layouts.app.sidebar title="📂 Gestion des Catégories">
    <flux:main class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-blue-600 dark:text-blue-400">📂 Liste des Catégories</h2>
            <a href="{{ route('categories.create') }}"
                class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">
                <i class="fas fa-plus"></i> Nouvelle Catégorie
            </a>
        </div>

        <div class="bg-white dark:bg-gray-900 p-6 shadow-lg rounded-lg border border-gray-300 dark:border-gray-700">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-6 py-3">#</th>
                        <th class="px-6 py-3">Libellé</th>
                        <th class="px-6 py-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $categorie)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700">
                            <td class="px-6 py-4">{{ $categorie->id }}</td>
                            <td class="px-6 py-4">{{ $categorie->libeleCategorie }}</td>
                            <td class="px-6 py-4 flex justify-center space-x-2">
                                <a href="{{ route('categories.show', $categorie->id) }}"
                                    class="px-3 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('categories.edit', $categorie->id) }}"
                                    class="px-3 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('categories.destroy', $categorie->id) }}" method="POST"
                                    onsubmit="return confirm('Supprimer cette catégorie ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-center text-gray-500">Aucune catégorie trouvée.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </flux:main>
</x-layouts.app.sidebar>
