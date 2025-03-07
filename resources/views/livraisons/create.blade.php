@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">➕ Ajouter une Livraison</h2>

    <div class="card p-4 shadow-sm">
        <form action="{{ route('livraisons.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="IdFournisseur" class="form-label">Fournisseur</label>
                <select name="IdFournisseur" class="form-control">
                    @foreach ($fournisseurs as $fournisseur)
                        <option value="{{ $fournisseur->IdFounisseur }}">{{ $fournisseur->Laboratoire }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="idproduit" class="form-label">Produit</label>
                <select name="idproduit" class="form-control">
                    @foreach ($produits as $produit)
                        <option value="{{ $produit->idproduit }}">{{ $produit->libele }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" name="date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="quant" class="form-label">Quantité</label>
                <input type="number" name="quant" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">✔ Ajouter</button>
        </form>
    </div>
</div>
@endsection
