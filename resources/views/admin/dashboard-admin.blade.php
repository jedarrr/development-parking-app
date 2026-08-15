<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin Parking</title>
    
    <!-- Tailwind CSS (via Vite jika di Laravel) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Font Awesome untuk Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Chart.js untuk Grafik -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">

    <div class="flex h-screen overflow-hidden">
        
        <!-- SIDEBAR -->
        <aside class="w-64 bg-blue-700 text-white flex flex-col justify-between p-6">
            <div>
                <!-- Logo / Title -->
                <h1 class="text-2xl font-bold tracking-wider uppercase mb-10">ADMIN</h1>

                <!-- Navigation Menu -->
                <nav class="space-y-2">
                    <a href="#" class="flex items-center space-x-3 bg-blue-800 px-4 py-3 rounded-lg text-white font-medium shadow-sm">
                        <i class="fas fa-home w-5"></i>
                        <span>Home</span>
                    </a>
                    <a href="#" class="flex items-center space-x-3 text-blue-100 hover:bg-blue-600 px-4 py-3 rounded-lg font-medium transition">
                        <i class="fas fa-users-cog w-5"></i>
                        <span>User</span>
                    </a>
                    <a href="#" class="flex items-center space-x-3 text-blue-100 hover:bg-blue-600 px-4 py-3 rounded-lg font-medium transition">
                        <i class="fas fa-file-invoice-dollar w-5"></i>
                        <span>Tarif Parkir</span>
                    </a>
                    <a href="#" class="flex items-center space-x-3 text-blue-100 hover:bg-blue-600 px-4 py-3 rounded-lg font-medium transition">
                        <i class="fas fa-parking w-5"></i>
                        <span>Area Parkir</span>
                    </a>
                    <a href="#" class="flex items-center space-x-3 text-blue-100 hover:bg-blue-600 px-4 py-3 rounded-lg font-medium transition">
                        <i class="fas fa-car w-5"></i>
                        <span>Kendaraan</span>
                    </a>
                    <a href="#" class="flex items-center space-x-3 text-blue-100 hover:bg-blue-600 px-4 py-3 rounded-lg font-medium transition">
                        <i class="fas fa-history w-5"></i>
                        <span>Log Aktifitas</span>
                    </a>
                    <a href="#" class="flex items-center space-x-3 text-blue-100 hover:bg-blue-600 px-4 py-3 rounded-lg font-medium transition">
                        <i class="fas fa-cog w-5"></i>
                        <span>Settings</span>
                    </a>
                </nav>
            </div>

            <!-- Logout Button -->
            <div>
                <a href="#" class="flex items-center space-x-3 text-blue-100 hover:text-white transition">
                    <i class="fas fa-sign-out-alt w-5"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>

        <!-- MAIN CONTENT AREA -->
        <div class="flex-1 flex flex-col overflow-y-auto">
            
            <!-- HEADER -->
            <header class="flex justify-between items-center bg-white px-8 py-5 border-b border-gray-200">
                <h2 class="text-2xl font-bold text-gray-800">Dashboard</h2>
                
                <!-- Profile Section -->
                <div class="flex items-center space-x-3">
                    <img src="https://ui-avatars.com/api/?name=Zahra+Cellyna&background=0D8ABC&color=fff" alt="User Avatar" class="w-10 h-10 rounded-full border">
                    <div>
                        <p class="text-sm font-semibold text-gray-800">Zahra Cellyna</p>
                        <p class="text-xs text-gray-500">Admin</p>
                    </div>
                </div>
            </header>

            <!-- CONTENT BODY -->
            <main class="p-8 space-y-8">
                
                <!-- STATS CARDS -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    
                    <!-- Card 1 -->
                    <div class="bg-white p-5 rounded-xl border border-gray-100 shadow-sm flex items-center justify-between">
                        <div>
                            <p class="text-xs font-semibold text-gray-500 uppercase">Total Area</p>
                            <h3 class="text-2xl font-bold text-gray-800 mt-1">5</h3>
                            <p class="text-xs text-gray-400 mt-1">Area Parkir</p>
                        </div>
                        <div class="w-12 h-12 bg-purple-50 text-purple-600 rounded-lg flex items-center justify-center text-xl">
                            <i class="fas fa-layer-group"></i>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="bg-white p-5 rounded-xl border border-gray-100 shadow-sm flex items-center justify-between">
                        <div>
                            <p class="text-xs font-semibold text-gray-500 uppercase">Total Kendaraan</p>
                            <h3 class="text-2xl font-bold text-gray-800 mt-1">128</h3>
                            <p class="text-xs text-gray-400 mt-1">Kendaraan Terdaftar</p>
                        </div>
                        <div class="w-12 h-12 bg-green-50 text-green-600 rounded-lg flex items-center justify-center text-xl">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="bg-white p-5 rounded-xl border border-gray-100 shadow-sm flex items-center justify-between">
                        <div>
                            <p class="text-xs font-semibold text-gray-500 uppercase">Parkir Hari Ini</p>
                            <h3 class="text-2xl font-bold text-gray-800 mt-1">85</h3>
                            <p class="text-xs text-gray-400 mt-1">Kendaraan</p>
                        </div>
                        <div class="w-12 h-12 bg-gray-50 text-gray-600 rounded-lg flex items-center justify-center text-xl">
                            <i class="fas fa-car-side"></i>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="bg-white p-5 rounded-xl border border-gray-100 shadow-sm flex items-center justify-between">
                        <div>
                            <p class="text-xs font-semibold text-gray-500 uppercase">Pendapatan Hari Ini</p>
                            <h3 class="text-2xl font-bold text-gray-800 mt-1">Rp 1.250.000</h3>
                            <p class="text-xs text-green-500 font-medium mt-1">↑ 12% dari kemarin</p>
                        </div>
                    </div>

                </div>

                <!-- CHARTS & SUMMARY SECTION -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    
                    <!-- Line Chart Section (2 columns) -->
                    <div class="lg:col-span-2 bg-white p-6 rounded-xl border border-gray-100 shadow-sm">
                        <div class="flex justify-between items-center mb-6">
                            <h4 class="font-bold text-gray-800">Statistik Parkir (7 Hari Terakhir)</h4>
                            <button class="text-xs border px-3 py-1.5 rounded-lg text-gray-600 hover:bg-gray-50">7 Hari Terakhir</button>
                        </div>
                        <div class="h-64">
                            <canvas id="parkingChart"></canvas>
                        </div>
                    </div>

                    <!-- Active Vehicles Card (1 column) -->
                    <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm flex flex-col justify-between">
                        <div>
                            <h4 class="font-bold text-gray-800">Kendaraan Aktif Sekarang</h4>
                            <div class="mt-8">
                                <span class="text-5xl font-extrabold text-gray-800">32</span>
                                <p class="text-sm text-gray-500 mt-2">Kendaraan sedang berada di dalam area parkir.</p>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- TABLE SECTION -->
                <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h4 class="font-bold text-gray-800">Parkir Terbaru</h4>
                        <a href="#" class="text-xs text-blue-600 font-semibold hover:underline">Lihat Semua</a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse text-sm">
                            <thead>
                                <tr class="text-gray-400 text-xs border-b">
                                    <th class="py-3 px-4 font-semibold">No</th>
                                    <th class="py-3 px-4 font-semibold">No. Plat</th>
                                    <th class="py-3 px-4 font-semibold">Jenis</th>
                                    <th class="py-3 px-4 font-semibold">Area</th>
                                    <th class="py-3 px-4 font-semibold">Masuk</th>
                                    <th class="py-3 px-4 font-semibold">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 text-gray-700">
                                <tr>
                                    <td class="py-3 px-4">1</td>
                                    <td class="py-3 px-4 font-medium">KT 1234 AB</td>
                                    <td class="py-3 px-4">Mobil</td>
                                    <td class="py-3 px-4">A1</td>
                                    <td class="py-3 px-4">08.45</td>
                                    <td class="py-3 px-4"><span class="bg-green-100 text-green-700 text-xs font-semibold px-2.5 py-1 rounded-full">Parkir</span></td>
                                </tr>
                                <tr>
                                    <td class="py-3 px-4">2</td>
                                    <td class="py-3 px-4 font-medium">KT 5678 CD</td>
                                    <td class="py-3 px-4">Mobil</td>
                                    <td class="py-3 px-4">A2</td>
                                    <td class="py-3 px-4">08.21</td>
                                    <td class="py-3 px-4"><span class="bg-green-100 text-green-700 text-xs font-semibold px-2.5 py-1 rounded-full">Parkir</span></td>
                                </tr>
                                <tr>
                                    <td class="py-3 px-4">3</td>
                                    <td class="py-3 px-4 font-medium">KT 9101 EF</td>
                                    <td class="py-3 px-4">Motor</td>
                                    <td class="py-3 px-4">C1</td>
                                    <td class="py-3 px-4">07.54</td>
                                    <td class="py-3 px-4"><span class="bg-green-100 text-green-700 text-xs font-semibold px-2.5 py-1 rounded-full">Parkir</span></td>
                                </tr>
                                <tr>
                                    <td class="py-3 px-4">4</td>
                                    <td class="py-3 px-4 font-medium">KT 3456 GH</td>
                                    <td class="py-3 px-4">Motor</td>
                                    <td class="py-3 px-4">A3</td>
                                    <td class="py-3 px-4">07.12</td>
                                    <td class="py-3 px-4"><span class="bg-red-100 text-red-700 text-xs font-semibold px-2.5 py-1 rounded-full">Keluar</span></td>
                                </tr>
                                <tr>
                                    <td class="py-3 px-4">5</td>
                                    <td class="py-3 px-4 font-medium">KT 2457 IJ</td>
                                    <td class="py-3 px-4">Mobil</td>
                                    <td class="py-3 px-4">B2</td>
                                    <td class="py-3 px-4">06.50</td>
                                    <td class="py-3 px-4"><span class="bg-green-100 text-green-700 text-xs font-semibold px-2.5 py-1 rounded-full">Parkir</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </main>
        </div>
    </div>

    <!-- SCRIPT CHART.JS -->
    <script>
        const ctx = document.getElementById('parkingChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
                datasets: [{
                    label: 'Jumlah Parkir',
                    data: [40, 68, 55, 55, 80, 0, 0],
                    borderColor: '#3B82F6',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    tension: 0.4,
                    fill: true,
                    pointBackgroundColor: '#3B82F6'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: { beginAtZero: true, grid: { borderDash: [2, 4] } },
                    x: { grid: { display: false } }
                }
            }
        });
    </script>
</body>
</html>
