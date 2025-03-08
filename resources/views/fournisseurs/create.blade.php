@extends('layouts.app')

@section('title', 'Ajouter un Fournisseur')

@section('content')
    <div class="container my-4">
        <h1 class="mb-4">
            <i class="fas fa-plus"></i> Ajouter un Fournisseur
        </h1>

        <!-- Formulaire d'ajout -->
        <form action="{{ route('fournisseurs.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="Laboratoire" class="form-label">Laboratoire</label>
                <input type="text" name="Laboratoire" id="Laboratoire" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="descriptionLab" class="form-label">Description</label>
                <textarea name="descriptionLab" id="descriptionLab" class="form-control" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label for="Telephone" class="form-label">Téléphone</label>
                <input type="text" name="Telephone" id="Telephone" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i> Enregistrer
            </button>
            <a href="{{ route('fournisseurs.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Annuler
            </a>
        </form>
    </div>
@endsection