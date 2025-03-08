@extends('layouts.app')

@section('title', 'Modifier un Fournisseur')

@section('content')
    <div class="container my-4">
        <h1 class="mb-4">
            <i class="fas fa-edit"></i> Modifier un Fournisseur
        </h1>

        <!-- Formulaire de modification -->
        <form action="{{ route('fournisseurs.update', $fournisseur->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="Laboratoire" class="form-label">Laboratoire</label>
                <input type="text" name="Laboratoire" id="Laboratoire" class="form-control" value="{{ $fournisseur->Laboratoire }}" required>
            </div>

            <div class="mb-3">
                <label for="descriptionLab" class="form-label">Description</label>
                <textarea name="descriptionLab" id="descriptionLab" class="form-control" rows="3">{{ $fournisseur->descriptionLab }}</textarea>
            </div>

            <div class="mb-3">
                <label for="Telephone" class="form-label">Téléphone</label>
                <input type="text" name="Telephone" id="Telephone" class="form-control" value="{{ $fournisseur->Telephone }}" required>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Mettre à jour
            </button>
            <a href="{{ route('fournisseurs.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Annuler
            </a>
        </form>
    </div>
@endsection