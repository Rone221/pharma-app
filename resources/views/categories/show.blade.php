<x-layouts.app.sidebar title="📂 Détails de la Catégorie">
    <flux:main class="p-6">
        <div class="bg-white dark:bg-gray-900 p-6 shadow-lg rounded-lg border border-gray-300 dark:border-gray-700">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">{{ $categorie->libelleCategorie }}</h2>
            <p class="text-gray-600 dark:text-gray-300 mb-6">ID : {{ $categorie->id }}</p>

            <div class="flex justify-between">
                <a href="{{ route('categories.index') }}"
                    class="px-6 py-3 bg-gray-500 text-white rounded-lg shadow-lg hover:bg-gray-600">
                    ⬅️ Retour
                </a>
                <a href="{{ route('categories.edit', $categorie->id) }}"
                    class="px-6 py-3 bg-blue-500 text-white rounded-lg shadow-lg hover:bg-blue-600">
                    ✏️ Modifier
                </a>
            </div>
        </div>
    </flux:main>
</x-layouts.app.sidebar>
