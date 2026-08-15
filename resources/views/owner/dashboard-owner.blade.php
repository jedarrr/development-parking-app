<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Owner Parking</title>
    
    <!-- Tailwind CSS (via Vite jika di Laravel) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Chart.js untuk Grafik -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">

    <div class="flex h-screen overflow-hidden">
        
        <!-- SIDEBAR OWNER -->
        <aside class="w-64 bg-blue-700 text-white flex flex-col justify-between p-6">
            <div>
                <!-- Logo / Title -->
                <h1 class="text-2xl font-bold tracking-wider uppercase mb-10">OWNER</h1>

                <!-- Navigasi Menu -->
                <nav class="space-y-2">
                    <a href="#" class="flex items-center space-x-3 bg-blue-800 px-4 py-3 rounded-lg text-white font-medium shadow-sm">
                        <i class="fas fa-home w-5"></i>
                        <span>Home</span>
                    </a>
                    <a href="#" class="flex items-center space-x-3 text-blue-100 hover:bg-blue-600 px-4 py-3 rounded-lg font-medium transition">
                        <i class="fas fa-file-invoice-dollar w-5"></i>
                        <span>Rekap Transaksi</span>
                    </a>
                </nav>
            </div>

            <!-- Logout -->
            <div>
                <a href="#" class="flex items-center space-x-3 text-blue-100 hover:text-white transition">
                    <i class="fas fa-sign-out-alt w-5"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>

        <!-- MAIN CONTENT -->
        <div class="flex-1 flex flex-col overflow-y-auto">
            
            <!-- HEADER -->
            <header class="flex justify-between items-center bg-white px-8 py-5 border-b border-gray-200">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Dashboard</h2>
                    <p class="text-xs text-gray-400 mt-0.5">Ringkasan hari ini</p>
                </div>
                
                <!-- Role Pill -->
                <div class="flex items-center space-x-2 bg-gray-100 border border-gray-200 px-3 py-1.5 rounded-full">
                    <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                    <span class="text-xs font-semibold text-gray-700">Owner</span>
                </div>
            </header>

            <!-- CONTENT BODY -->
            <main class="p-8 space-y-6">
                
                <!-- TOP CARDS (4 STATS) -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                    
                    <!-- Card 1: Total Pendapatan Hari Ini -->
                    <div class="bg-white p-5 rounded-xl border border-gray-100 shadow-sm flex items-center justify-between">
                        <div>
                            <p class="text-[11px] font-medium text-gray-400">Total Pendapatan</p>
                            <p class="text-[10px] text-gray-400">Hari Ini</p>
                            <h3 class="text-xl font-bold text-gray-800 mt-2">Rp 2.450.000</h3>
                        </div>
                        <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center text-lg">
                            <i class="fas fa-wallet"></i>
                        </div>
                    </div>

                    <!-- Card 2: Total Transaksi Hari Ini -->
                    <div class="bg-white p-5 rounded-xl border border-gray-100 shadow-sm flex items-center justify-between">
                        <div>
                            <p class="text-[11px] font-medium text-gray-400">Total Transaksi</p>
                            <p class="text-[10px] text-gray-400">Hari Ini</p>
                            <h3 class="text-xl font-bold text-gray-800 mt-2">320</h3>
                        </div>
                        <div class="w-10 h-10 bg-teal-50 text-teal-600 rounded-lg flex items-center justify-center text-lg">
                            <i class="fas fa-exchange-alt"></i>
                        </div>
                    </div>

                    <!-- Card 3: Kendaraan Masuk Hari Ini -->
                    <div class="bg-white p-5 rounded-xl border border-gray-100 shadow-sm flex items-center justify-between">
                        <div>
                            <p class="text-[11px] font-medium text-gray-400">Kendaraan Masuk</p>
                            <p class="text-[10px] text-gray-400">Hari Ini</p>
                            <h3 class="text-xl font-bold text-gray-800 mt-2">178</h3>
                        </div>
                        <div class="w-10 h-10 bg-amber-50 text-amber-500 rounded-lg flex items-center justify-center text-lg">
                            <i class="fas fa-arrow-down"></i>
                        </div>
                    </div>

                    <!-- Card 4: Kendaraan Keluar Hari Ini -->
                    <div class="bg-white p-5 rounded-xl border border-gray-100 shadow-sm flex items-center justify-between">
                        <div>
                            <p class="text-[11px] font-medium text-gray-400">Kendaraan Keluar</p>
                            <p class="text-[10px] text-gray-400">Hari Ini</p>
                            <h3 class="text-xl font-bold text-gray-800 mt-2">168</h3>
                        </div>
                        <div class="w-10 h-10 bg-purple-50 text-purple-600 rounded-lg flex items-center justify-center text-lg">
                            <i class="fas fa-arrow-up"></i>
                        </div>
                    </div>

                </div>

                <!-- CHARTS SECTION -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    
                    <!-- Line Chart: Grafik Pendapatan 7 Hari Terakhir (2 Columns Wide) -->
                    <div class="lg:col-span-2 bg-white p-6 rounded-xl border border-gray-100 shadow-sm">
                        <h4 class="font-bold text-gray-800 text-sm mb-1">Grafik Pendapatan 7 Hari Terakhir</h4>
                        <p class="text-[11px] text-gray-400 mb-6">Line chart pendapatan harian (Sen-Min)</p>
                        <div class="h-64">
                            <canvas id="revenueLineChart"></canvas>
                        </div>
                    </div>

                    <!-- Donut/Pie Chart: Pendapatan per Jenis Kendaraan (1 Column) -->
                    <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm flex flex-col justify-between">
                        <div>
                            <h4 class="font-bold text-gray-800 text-sm mb-1">Pendapatan per Jenis Kendaraan</h4>
                            <p class="text-[11px] text-gray-400 mb-6">Hari Ini</p>
                            <div class="relative flex justify-center items-center h-48">
                                <canvas id="vehiclePieChart"></canvas>
                            </div>
                        </div>
                        <div class="space-y-2 mt-4 text-xs border-t border-gray-50 pt-3">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-2">
                                    <span class="w-2.5 h-2.5 rounded-full bg-blue-600"></span>
                                    <span class="text-gray-600">Motor</span>
                                </div>
                                <span class="font-semibold text-gray-800">150 (47%)</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-2">
                                    <span class="w-2.5 h-2.5 rounded-full bg-sky-400"></span>
                                    <span class="text-gray-600">Mobil</span>
                                </div>
                                <span class="font-semibold text-gray-800">130 (41%)</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-2">
                                    <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span>
                                    <span class="text-gray-600">Lainnya</span>
                                </div>
                                <span class="font-semibold text-gray-800">40 (12%)</span>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- BOTTOM SUMMARY PANEL -->
                <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-5">
                    <h4 class="font-bold text-gray-800 text-sm mb-4">Ringkasan Hari Ini</h4>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        
                        <div class="bg-gray-50 p-4 rounded-lg flex items-center justify-between">
                            <div>
                                <p class="text-[11px] text-gray-400">Pendapatan</p>
                                <p class="text-sm font-bold text-gray-800 mt-0.5">Rp 2.450.000</p>
                            </div>
                            <i class="fas fa-coins text-gray-300"></i>
                        </div>

                        <div class="bg-gray-50 p-4 rounded-lg flex items-center justify-between">
                            <div>
                                <p class="text-[11px] text-gray-400">Transaksi</p>
                                <p class="text-sm font-bold text-gray-800 mt-0.5">320</p>
                            </div>
                            <i class="fas fa-receipt text-gray-300"></i>
                        </div>

                        <div class="bg-gray-50 p-4 rounded-lg flex items-center justify-between">
                            <div>
                                <p class="text-[11px] text-gray-400">Rata-rata per Transaksi</p>
                                <p class="text-sm font-bold text-gray-800 mt-0.5">Rp 7.656</p>
                            </div>
                            <i class="fas fa-chart-line text-gray-300"></i>
                        </div>

                        <div class="bg-gray-50 p-4 rounded-lg flex items-center justify-between">
                            <div>
                                <p class="text-[11px] text-gray-400">Jumlah Area Aktif</p>
                                <p class="text-sm font-bold text-gray-800 mt-0.5">5 Area</p>
                            </div>
                            <i class="fas fa-map-marker-alt text-gray-300"></i>
                        </div>

                    </div>
                </div>

            </main>
        </div>
    </div>

    <!-- SCRIPT CHART.JS -->
    <script>
        // Line Chart (Pendapatan 7 Hari Terakhir)
        const lineCtx = document.getElementById('revenueLineChart').getContext('2d');
        new Chart(lineCtx, {
            type: 'line',
            data: {
                labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
                datasets: [{
                    label: 'Pendapatan (Rp)',
                    data: [1500000, 1800000, 2100000, 1900000, 2450000, 2800000, 2300000],
                    borderColor: '#2563EB',
                    backgroundColor: 'rgba(37, 99, 235, 0.08)',
                    tension: 0.4,
                    fill: true,
                    pointBackgroundColor: '#2563EB',
                    pointRadius: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { beginAtZero: true, grid: { borderDash: [2, 4] } },
                    x: { grid: { display: false } }
                }
            }
        });

        // Donut Chart (Pendapatan per Jenis Kendaraan)
        const pieCtx = document.getElementById('vehiclePieChart').getContext('2d');
        new Chart(pieCtx, {
            type: 'doughnut',
            data: {
                labels: ['Motor', 'Mobil', 'Lainnya'],
                datasets: [{
                    data: [150, 130, 40],
                    backgroundColor: ['#2563EB', '#38BDF8', '#FBBF24'],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '70%',
                plugins: { legend: { display: false } }
            }
        });
    </script>
</body>
</html>