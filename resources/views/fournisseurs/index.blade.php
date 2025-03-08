@extends('layouts.app')

@section('title', 'Liste des Fournisseurs')

@section('content')
    <div class="container my-4">
        <h1 class="mb-4">
            <i class="fas fa-truck"></i> Liste des Fournisseurs
        </h1>

        <!-- Bouton pour ajouter un fournisseur -->
        <a href="{{ route('fournisseurs.create') }}" class="btn btn-success mb-3">
            <i class="fas fa-plus"></i> Ajouter un Fournisseur
        </a>

        <!-- Tableau des fournisseurs -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Laboratoire</th>
                        <th>Description</th>
                        <th>Téléphone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fournisseurs as $fournisseur)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $fournisseur->Laboratoire }}</td>
                            <td>{{ $fournisseur->descriptionLab }}</td>
                            <td>{{ $fournisseur->Telephone }}</td>
                            <td>

                            <!-- Bouton pour modifier -->
                            <a href="{{ route('fournisseurs.show', $fournisseur->id) }}" class="btn btn-primary">
                                    <i class="fas fa-eye"></i> Details
                                </a>
                                <!-- Bouton pour modifier -->
                                <a href="{{ route('fournisseurs.edit', $fournisseur->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Modifier
                                </a>

                                <!-- Bouton pour supprimer -->
                                <form action="{{ route('fournisseurs.destroy', $fournisseur->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce fournisseur ?')">
                                        <i class="fas fa-trash"></i> Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection