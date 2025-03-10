<x-layouts.app.sidebar title="➕ Ajouter une Catégorie">
    <flux:main class="p-6">
        <div class="bg-white dark:bg-gray-900 p-6 shadow-lg rounded-lg border border-gray-300 dark:border-gray-700">
            <form action="{{ route('categories.store') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="libeleCategorie"
                        class="block font-medium text-gray-700 dark:text-gray-300">Libellé</label>
                    <input type="text" name="libeleCategorie" id="libeleCategorie"
                        class="w-full border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-white rounded-md shadow-sm p-3 focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-green-600">
                        ✅ Ajouter la Catégorie
                    </button>
                </div>
            </form>
        </div>
    </flux:main>
</x-layouts.app.sidebar>
