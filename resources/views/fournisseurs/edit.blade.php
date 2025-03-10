<x-layouts.app.sidebar :heading="__('Modifier un Fournisseur')" :subheading="__('Mettez à jour les informations du fournisseur')">
    <flux:main class="p-6">
        <div class="my-6 w-full space-y-6">

            <!-- Formulaire de modification -->
            <form action="{{ route('fournisseurs.update', $fournisseur->id) }}" method="POST"
                class="space-y-6 bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                @csrf
                @method('PUT')

                <!-- Champ Laboratoire -->
                <div>
                    <label for="Laboratoire" class="block text-sm font-medium text-gray-700 dark:text-white">
                        {{ __('Laboratoire') }}
                    </label>
                    <input type="text" name="Laboratoire" id="Laboratoire"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                        value="{{ $fournisseur->Laboratoire }}" required>
                </div>

                <!-- Champ Description -->
                <div>
                    <label for="descriptionLab" class="block text-sm font-medium text-gray-700 dark:text-white">
                        {{ __('Description') }}
                    </label>
                    <textarea name="descriptionLab" id="descriptionLab" rows="3"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">{{ $fournisseur->descriptionLab }}</textarea>
                </div>

                <!-- Champ Téléphone -->
                <div>
                    <label for="Telephone" class="block text-sm font-medium text-gray-700 dark:text-white">
                        {{ __('Téléphone') }}
                    </label>
                    <input type="text" name="Telephone" id="Telephone"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                        value="{{ $fournisseur->Telephone }}" required>
                </div>

                <!-- Boutons -->
                <div class="flex space-x-4">
                    <button type="submit"
                        class="bg-blue-500 text-white px-6 py-2 rounded-md shadow-md hover:bg-blue-600 transition">
                        <i class="fas fa-save"></i> {{ __('Mettre à jour') }}
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
