<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Pharmacie</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Styles personnalisés avec Vite -->
    @if(config('app.env') === 'local')
        <!-- En mode développement, utilise Vite pour charger les assets -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <!-- En mode production, utilise le fichier compilé -->
        <link href="{{ asset('build/assets/app.css') }}" rel="stylesheet">
    @endif

    <!-- Styles personnalisés inline -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        .btn-primary {
            background-color: #51A2FF;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .btn-warning {
            background-color:#FFB900;
            border-color: #6c757d;
        }
        .btn-success {
            background-color: #009966 ;
            border-color: #28a745;
        }
        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
    </style>
</head>
<body>
   
    <!-- Contenu principal -->
    <div class="container my-4">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Scripts personnalisés avec Vite -->
    @if(config('app.env') === 'local')
        <!-- En mode développement, utilise Vite pour charger les assets -->
        @vite(['resources/js/app.js'])
    @else
        <!-- En mode production, utilise le fichier compilé -->
        <script src="{{ asset('build/assets/app.js') }}"></script>
    @endif
</body>
</html>