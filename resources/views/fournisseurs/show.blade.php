@extends('layouts.app')

@section('title', 'Détails du Fournisseur')

@section('content')
    <div class="container my-4">
        <h1 class="mb-4">
            <i class="fas fa-info-circle"></i> Détails du Fournisseur
        </h1>

        <!-- Carte pour afficher les détails -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $fournisseur->Laboratoire }}</h5>
                <p class="card-text"><strong>Description :</strong> {{ $fournisseur->descriptionLab }}</p>
                <p class="card-text"><strong>Téléphone :</strong> {{ $fournisseur->Telephone }}</p>
            </div>
        </div>

        <!-- Bouton pour retourner à la liste -->
        <div class="mt-3">
            <a href="{{ route('fournisseurs.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Retour
            </a>
        </div>
    </div>
@endsection