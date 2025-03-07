@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">📦 Détails de la Livraison</h2>

    <div class="card p-4 shadow-sm">
        <p><strong>ID :</strong> {{ $livraison->id }}</p>
        <p><strong>Fournisseur :</strong> {{ $livraison->fournisseur->Laboratoire }}</p>
        <p><strong>Produit :</strong> {{ $livraison->produit->libele }}</p>
        <p><strong>Date :</strong> {{ $livraison->date }}</p>
        <p><strong>Quantité :</strong> {{ $livraison->quant }}</p>

        <a href="{{ route('livraisons.index') }}" class="btn btn-secondary">⬅ Retour</a>
    </div>
</div>
@endsection
