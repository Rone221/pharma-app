<x-layouts.app title="Dashboard">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <!-- Section Statistiques -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="p-6 bg-white dark:bg-neutral-800 rounded-xl shadow-lg flex flex-col items-center">
                <h2 class="text-lg font-semibold">Total Médicaments</h2>
                <p class="text-3xl font-bold text-blue-600">1,250</p>
            </div>
            <div class="p-6 bg-white dark:bg-neutral-800 rounded-xl shadow-lg flex flex-col items-center">
                <h2 class="text-lg font-semibold">Total livraisons</h2>
                <p class="text-3xl font-bold text-green-600">325</p>
            </div>
            <div class="p-6 bg-white dark:bg-neutral-800 rounded-xl shadow-lg flex flex-col items-center">
                <h2 class="text-lg font-semibold">Total fournisseurs</h2>
                <p class="text-3xl font-bold text-red-600">98</p>
            </div>
        </div>

        <!-- Graphique des ventes -->
        <div class="relative h-64 w-full bg-white dark:bg-neutral-800 rounded-xl shadow-lg p-4">
            <canvas id="salesChart"></canvas>
        </div>

        <!-- Section Médicaments en rupture de stock -->
        <div class="bg-white dark:bg-neutral-800 rounded-xl shadow-lg p-4">
            <h2 class="text-lg font-semibold mb-2">Médicaments en stock</h2>
            <ul class="divide-y divide-gray-300 dark:divide-gray-700">
                <li class="py-2">Paracétamol</li>
                <li class="py-2">Ibuprofène</li>
                <li class="py-2">Amoxicilline</li>
            </ul>
        </div>


    </div>

    <!-- Script Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('salesChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'],
                datasets: [{
                    label: 'Ventes',
                    data: [50, 60, 80, 100, 90, 120, 140],
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    </script>
</x-layouts.app>
