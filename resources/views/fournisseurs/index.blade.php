<x-layouts.app.sidebar title="🚚 Gestion des Fournisseurs">
    <flux:main class="p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold">🚚 Liste des Fournisseurs</h2>
            <a href="{{ route('fournisseurs.create') }}"
                class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">
                <i class="fas fa-plus"></i> Ajouter un Fournisseur
            </a>
        </div>

        <!-- Tableau des fournisseurs -->
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 fade-in">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">#</th>
                        <th scope="col" class="px-6 py-3">Laboratoire</th>
                        <th scope="col" class="px-6 py-3">Description</th>
                        <th scope="col" class="px-6 py-3">Téléphone</th>
                        <th scope="col" class="px-6 py-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fournisseurs as $index => $fournisseur)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">{{ $index + 1 }}</td>
                            <td class="px-6 py-4">{{ optional($fournisseur)->Laboratoire }}</td>
                            <td class="px-6 py-4">{{ optional($fournisseur)->descriptionLab }}</td>
                            <td class="px-6 py-4">{{ optional($fournisseur)->Telephone }}</td>
                            <td class="px-6 py-4 flex justify-center space-x-2">
                                <a href="{{ route('fournisseurs.show', $fournisseur->id) }}"
                                    class="bg-blue-500 text-white px-3 py-2 rounded-md hover:bg-blue-600">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('fournisseurs.edit', $fournisseur->id) }}"
                                    class="bg-yellow-500 text-white px-3 py-2 rounded-md hover:bg-yellow-600">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('fournisseurs.destroy', $fournisseur->id) }}" method="POST"
                                    onsubmit="return confirm('Voulez-vous vraiment supprimer ce fournisseur ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 text-white px-3 py-2 rounded-md hover:bg-red-600">
                                        <i class="fas fa-trash"></i>
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
