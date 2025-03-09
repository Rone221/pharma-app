<x-layouts.app.sidebar title="✏ Modifier la Livraison">
    <flux:main class="p-6">
        <h2 class="text-2xl font-semibold mb-4">✏ Modifier la Livraison</h2>

        <div class="bg-white p-6 shadow-md rounded-md">
            <form action="{{ route('livraisons.update', $livraison->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block font-medium text-gray-700">Fournisseur</label>
                    <select name="IdFournisseur" class="w-full border-gray-300 rounded-md shadow-sm">
                        @foreach ($fournisseurs as $fournisseur)
                            <option value="{{ $fournisseur->id }}" {{ $livraison->IdFournisseur == $fournisseur->id ? 'selected' : '' }}>
                                {{ $fournisseur->Laboratoire }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block font-medium text-gray-700">Produit</label>
                    <select name="idproduit" class="w-full border-gray-300 rounded-md shadow-sm">
                        @foreach ($produits as $produit)
                            <option value="{{ $produit->id }}" {{ $livraison->idproduit == $produit->id ? 'selected' : '' }}>
                                {{ $produit->libele }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block font-medium text-gray-700">Date de Livraison</label>
                    <input type="date" name="date" class="w-full border-gray-300 rounded-md shadow-sm" value="{{ $livraison->date }}" required>
                </div>

                <div class="mb-4">
                    <label class="block font-medium text-gray-700">Quantité</label>
                    <input type="number" name="quant" class="w-full border-gray-300 rounded-md shadow-sm" value="{{ $livraison->quant }}" min="1" required>
                </div>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                    ✅ Mettre à Jour
                </button>
            </form>
        </div>
    </flux:main>
</x-layouts.app.sidebar>
