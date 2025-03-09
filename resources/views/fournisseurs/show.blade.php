<x-layouts.app.sidebar :heading="__('Détails du Fournisseur')" :subheading="__('Informations complètes sur ce fournisseur')">
    <flux:main class="p-6">
        <div class="my-6 w-full space-y-6">

            <!-- Alternative à flux:card -->
            <div class="bg-white dark:bg-gray-800 p-6 shadow-md rounded-lg">
                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">
                    <i class="fas fa-truck text-emerald-500"></i> {{ $fournisseur->Laboratoire }}
                </h2>

                <p class="text-gray-700 dark:text-gray-300 mt-4">
                    <strong class="text-gray-900 dark:text-white">{{ __('Description :') }}</strong>
                    {{ $fournisseur->descriptionLab }}
                </p>

                <p class="text-gray-700 dark:text-gray-300 mt-2">
                    <strong class="text-gray-900 dark:text-white">{{ __('Téléphone :') }}</strong>
                    {{ $fournisseur->Telephone }}
                </p>
            </div>

            <!-- Bouton Retour -->
            <div class="flex justify-start">
                <a href="{{ route('fournisseurs.index') }}"
                    class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition">
                    <i class="fas fa-arrow-left"></i> {{ __('Retour') }}
                </a>
            </div>
        </div>
    </flux:main>
</x-layouts.app.sidebar>
