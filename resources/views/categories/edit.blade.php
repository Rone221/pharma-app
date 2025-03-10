<x-layouts.app.sidebar title="✏️ Modifier la Catégorie">
    <flux:main class="p-6">
        <div class="bg-white dark:bg-gray-900 p-6 shadow-lg rounded-lg border border-gray-300 dark:border-gray-700">
            <form action="{{ route('categories.update', ['category' => $categorie->id]) }}" method="POST"
                class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="libeleCategorie" class="block font-medium text-gray-700 dark:text-gray-300">
                        Libellé de la Catégorie
                    </label>
                    <input type="text" name="libeleCategorie" id="libeleCategorie"
                        value="{{ old('libeleCategorie', $categorie->libeleCategorie) }}"
                        class="w-full border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-white rounded-md shadow-sm p-3 focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>

                <div class="flex justify-between">
                    <a href="{{ route('categories.index') }}"
                        class="px-6 py-3 bg-gray-500 text-white rounded-lg shadow-lg hover:bg-gray-600 transition">
                        ⬅️ Annuler
                    </a>
                    <button type="submit"
                        class="bg-blue-500 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-blue-600 transition">
                        ✅ Modifier
                    </button>
                </div>
            </form>
        </div>
    </flux:main>
</x-layouts.app.sidebar>
