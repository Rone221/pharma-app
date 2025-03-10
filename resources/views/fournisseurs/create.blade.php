<x-layouts.app.sidebar :heading="__('Ajouter un Fournisseur')" :subheading="__('Remplissez les informations du fournisseur')">
    <flux:main class="p-6">
        <div class="my-6 w-full space-y-6">

            <!-- Formulaire d'ajout -->
            <form action="{{ route('fournisseurs.store') }}" method="POST"
                class="space-y-6 bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                @csrf

                <!-- Champ Laboratoire -->
                <div>
                    <label for="Laboratoire" class="block text-sm font-medium text-gray-700 dark:text-white">
                        {{ __('Laboratoire') }}
                    </label>
                    <input type="text" name="Laboratoire" id="Laboratoire"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-emerald-500 focus:border-emerald-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                        required>
                </div>

                <!-- Champ Description -->
                <div>
                    <label for="descriptionLab" class="block text-sm font-medium text-gray-700 dark:text-white">
                        {{ __('Description') }}
                    </label>
                    <textarea name="descriptionLab" id="descriptionLab" rows="3"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-emerald-500 focus:border-emerald-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"></textarea>
                </div>

                <!-- Champ Téléphone -->
                <div>
                    <label for="Telephone" class="block text-sm font-medium text-gray-700 dark:text-white">
                        {{ __('Téléphone') }}
                    </label>
                    <input type="text" name="Telephone" id="Telephone"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-emerald-500 focus:border-emerald-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                        required>
                </div>

                <!-- Boutons -->
                <div class="flex space-x-4">
                    <button type="submit"
                        class="bg-emerald-500 text-white px-6 py-2 rounded-md shadow-md hover:bg-emerald-600 transition">
                        <i class="fas fa-save"></i> {{ __('Enregistrer') }}
                    </button>
                    <a href="{{ route('fournisseurs.index') }}"
                        class="bg-gray-500 text-white px-6 py-2 rounded-md shadow-md hover:bg-gray-600 transition">
                        <i class="fas fa-arrow-left"></i> {{ __('Annuler') }}
                    </a>
                </div>

            </form>
        </div>
    </flux:main>
</x-layouts.app.sidebar>
