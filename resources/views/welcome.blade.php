<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>

</head>

<body class="bg-gray-100 text-gray-900 min-h-screen overflow-hidden relative">

    <!-- Background gradient -->
    <div class="absolute top-0 right-0 w-full h-full bg-gradient-to-br from-green-50 to-blue-50 opacity-70 -z-20"></div>

    <!-- Decorative circles -->
    <div class="absolute top-64 left-24 w-32 h-32 rounded-full bg-green-100 opacity-80 -z-10"></div>
    <div class="absolute top-48 right-1/4 w-16 h-16 rounded-full bg-blue-100 opacity-80 -z-10"></div>
    <div class="absolute bottom-32 left-32 w-24 h-24 rounded-full bg-teal-100 opacity-80 -z-10"></div>
    <div class="absolute bottom-1/4 right-1/4 w-8 h-8 rounded-full bg-emerald-100 opacity-80 -z-10"></div>
    <div class="absolute bottom-1/3 left-1/2 w-6 h-6 rounded-full bg-cyan-100 opacity-80 -z-10"></div>
    <div class="absolute top-2/3 left-1/3 w-10 h-10 rounded-full bg-green-200 opacity-80 -z-10"></div>

    <!-- HEADER -->
    <header class="bg-white shadow-md py-4">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-3xl font-bold text-gray-900">
                <span class="inline-block border-2 border-gray-800 rounded px-1 mr-1">
                    <span class="text-emerald-500">Pharm</span>
                </span>Gestion
            </a>
            <nav class="hidden md:flex space-x-6">
                <a href="/" class="text-emerald-500 font-medium">Accueil</a>
                <a href="/dashboard" class="text-gray-700 hover:text-emerald-500 transition-colors">Tableau de bord</a>
                <a href="/dashboard" class="text-gray-700 hover:text-emerald-500 transition-colors">Ventes</a>
                <a href="/login" class="text-gray-700 hover:text-emerald-500 transition-colors">Connexion</a>
            </nav>
        </div>
    </header>

    <!-- HERO SECTION -->
    <section class="py-32 flex flex-col lg:flex-row items-center justify-center container mx-auto px-6">
        <!-- Texte -->
        <div class="lg:w-1/2 text-center lg:text-left">
            <h1 class="text-5xl font-extrabold mb-6">
                <span class="text-emerald-500">Gérez Votre Pharmacie</span> Avec Efficacité
            </h1>
            <p class="text-lg text-gray-600 mb-6">
                Solution complète de gestion pour pharmacies .
                Gérez votre stock, vos ordonnances, vos clients et vos ventes en temps réel avec une interface réactive
                et intuitive.
            </p>
            <div class="flex items-center space-x-4 justify-center lg:justify-start">
                <a href="{{ route('login') }}"
                    class="bg-emerald-500 hover:bg-emerald-600 text-white font-semibold px-8 py-3 rounded-lg shadow-md transition">
                    Se connecter
                </a>
                <div class="flex items-center text-gray-600">
                    <svg class="w-5 h-5 text-amber-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m-1 4v-4m0 0H9m4 4v-4m0 0h1m4-4V4m0 0h-4m4 0h-4M4 20v-4m0 0H0m4 0H0">
                        </path>
                    </svg>
                    <span class="text-sm">Propulsé par No Woman No Cry</span>
                </div>
            </div>
        </div>

        <!-- Carte du tableau de bord -->
        <div class="lg:w-1/2 flex justify-center mt-10 lg:mt-0">
            <div class="bg-white rounded-3xl shadow-xl p-6 w-80">
                <h2 class="text-lg font-bold">Tableau de bord</h2>
                <p class="text-sm text-gray-500">Vue d’ensemble de votre pharmacie</p>

                <div class="grid grid-cols-3 gap-4 my-4">
                    <div class="bg-emerald-400 rounded-lg p-3 text-center">
                        <div class="text-white font-bold">2.4M FCFA</div>
                        <div class="text-white text-xs">ventes</div>
                    </div>
                    <div class="bg-blue-400 rounded-lg p-3 text-center">
                        <div class="text-white font-bold">128</div>
                        <div class="text-white text-xs">clients</div>
                    </div>
                    <div class="bg-amber-400 rounded-lg p-3 text-center">
                        <div class="text-white font-bold">24</div>
                        <div class="text-white text-xs">alertes</div>
                    </div>
                </div>

                <div class="flex space-x-4 mb-4">
                    <div class="bg-emerald-100 text-emerald-500 px-3 py-1 rounded-full text-xs font-medium">STOCK</div>
                    <div class="text-gray-400 px-3 py-1 text-xs font-medium">VENTES</div>
                    <div class="text-gray-400 px-3 py-1 text-xs font-medium">CLIENTS</div>
                    <div class="text-gray-400 px-3 py-1 text-xs font-medium">RAPPORTS</div>
                </div>

                <div class="bg-gray-200 h-1 w-full rounded-full">
                    <div class="bg-emerald-500 h-1 rounded-full w-2/3"></div>
                </div>
            </div>
        </div>
    </section>

</body>

@if (Route::has('login'))
    <div class="h-14.5 hidden lg:block"></div>
@endif
</body>

</html>
