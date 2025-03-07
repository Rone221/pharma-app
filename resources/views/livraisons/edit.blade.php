@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">✏️ Modifier la Livraison</h2>

    <div class="card p-4 shadow-sm">
        <form action="{{ route('livraisons.update', $livraison->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="quant" class="form-label">Quantité</label>
                <input type="number" name="quant" class="form-control" value="{{ $livraison->quant }}" required>
            </div>

            <button type="submit" class="btn btn-warning">✔ Modifier</button>
        </form>
    </div>
</div>
@endsection
