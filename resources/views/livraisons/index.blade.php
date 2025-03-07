@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="mb-4">📦 Liste des Livraisons</h2>
        <a href="{{ route('livraisons.create') }}" class="btn btn-primary">➕ Nouvelle Livraison</a>
    </div>

    <div class="mb-3">
        <input type="text" id="search" class="form-control" placeholder="🔍 Rechercher une livraison..." onkeyup="filterTable()">
    </div>

    <table class="table table-hover shadow-sm" id="livraisonTable">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Fournisseur</th>
                <th>Produit</th>
                <th>Date</th>
                <th>Quantité</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($livraisons as $livraison)
                <tr>
                    <td>{{ $livraison->id }}</td>
                    <td>{{ $livraison->fournisseur->Laboratoire }}</td>
                    <td>{{ $livraison->produit->libele }}</td>
                    <td>{{ $livraison->date }}</td>
                    <td>{{ $livraison->quant }}</td>
                    <td>
                        <a href="{{ route('livraisons.show', $livraison->id) }}" class="btn btn-info btn-sm">👁 Voir</a>
                        <a href="{{ route('livraisons.edit', $livraison->id) }}" class="btn btn-warning btn-sm">✏️ Modifier</a>
                        <form action="{{ route('livraisons.destroy', $livraison->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Confirmer la suppression ?')">🗑 Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

<script>
    function filterTable() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("search");
        filter = input.value.toUpperCase();
        table = document.getElementById("livraisonTable");
        tr = table.getElementsByTagName("tr");

        for (i = 1; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0]; // ID Livraison
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
@endsection
