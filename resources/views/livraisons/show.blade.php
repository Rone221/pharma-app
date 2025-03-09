<x-layouts.app.sidebar title="📦 Détails de la Livraison">
    <flux:main class="p-6">
        <h2 class="text-3xl font-bold text-blue-600 dark:text-blue-400 mb-6">📦 Détails de la Livraison</h2>

        <div class="bg-white dark:bg-gray-900 p-6 shadow-lg rounded-lg border border-blue-300 dark:border-blue-700">
            <div class="space-y-4 text-gray-800 dark:text-gray-200">
                <p class="text-lg"><strong class="text-blue-700 dark:text-blue-400">ID:</strong> {{ $livraison->id }}</p>
                <p class="text-lg"><strong class="text-blue-700 dark:text-blue-400">Fournisseur:</strong> {{ $livraison->fournisseur->Laboratoire }}</p>
                <p class="text-lg"><strong class="text-blue-700 dark:text-blue-400">Produit:</strong> {{ $livraison->produit->libele }}</p>
                <p class="text-lg"><strong class="text-blue-700 dark:text-blue-400">Date:</strong> {{ \Carbon\Carbon::parse($livraison->date)->format('d/m/Y') }}</p>
                <p class="text-lg"><strong class="text-blue-700 dark:text-blue-400">Quantité:</strong> {{ $livraison->quant }}</p>
            </div>
        </div>

        <div class="mt-6 flex justify-end">
            <a href="{{ route('livraisons.index') }}" class="bg-gradient-to-r from-gray-500 to-gray-700 text-white px-6 py-3 rounded-lg shadow-lg hover:from-gray-600 hover:to-gray-800 transition">
                ⬅ Retour à la Liste
            </a>
        </div>
    </flux:main>
</x-layouts.app.sidebar>
