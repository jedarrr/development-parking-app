<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen User - Admin</title>
    
    <!-- Tailwind CSS (via Vite jika di Laravel) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Chart.js untuk Donut Chart Ringkasan User -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">

    <div class="flex h-screen overflow-hidden">
        
        <!-- SIDEBAR -->
        <aside class="w-64 bg-blue-600 text-white flex flex-col justify-between p-6">
            <div>
                <!-- Logo / Title -->
                <h1 class="text-2xl font-bold tracking-wider uppercase mb-10">ADMIN</h1>

                <!-- Navigasi -->
                <nav class="space-y-2">
                    <a href="{{ route('halaman.admin') }}" class="flex items-center space-x-3 text-blue-100 hover:bg-blue-700 px-4 py-3 rounded-lg font-medium transition">
                        <i class="fas fa-home w-5"></i>
                        <span>Home</span>
                    </a>
                    <!-- Menu User Aktif -->
                    <a href="{{ route('halaman.user') }}" class="flex items-center space-x-3 bg-blue-700 px-4 py-3 rounded-lg text-white font-medium shadow-sm">
                        <i class="fas fa-users-cog w-5"></i>
                        <span>User</span>
                    </a>
                    <a href="{{ route('halaman.tarif-parkir') }}" class="flex items-center space-x-3 text-blue-100 hover:bg-blue-700 px-4 py-3 rounded-lg font-medium transition">
                        <i class="fas fa-file-invoice-dollar w-5"></i>
                        <span>Tarif Parkir</span>
                    </a>
                    <a href="{{ route('halaman.area-parkir') }}" class="flex items-center space-x-3 text-blue-100 hover:bg-blue-700 px-4 py-3 rounded-lg font-medium transition">
                        <i class="fas fa-parking w-5"></i>
                        <span>Area Parkir</span>
                    </a>
                    <a href="{{ route('halaman.kendaraan') }}" class="flex items-center space-x-3 text-blue-100 hover:bg-blue-700 px-4 py-3 rounded-lg font-medium transition">
                        <i class="fas fa-car w-5"></i>
                        <span>Kendaraan</span>
                    </a>
                    <a href="{{ route('halaman.log-aktivitas') }}" class="flex items-center space-x-3 text-blue-100 hover:bg-blue-700 px-4 py-3 rounded-lg font-medium transition">
                        <i class="fas fa-history w-5"></i>
                        <span>Log Aktifitas</span>
                    </a>
                    <a href="{{ route('halaman.settings') }}" class="flex items-center space-x-3 text-blue-100 hover:bg-blue-700 px-4 py-3 rounded-lg font-medium transition">
                        <i class="fas fa-cog w-5"></i>
                        <span>Settings</span>
                    </a>
                </nav>
            </div>

            <!-- Logout -->
            <div>
                <a href="{{ route('halaman.logout') }}" class="flex items-center space-x-3 text-blue-100 hover:text-white transition">
                    <i class="fas fa-sign-out-alt w-5"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>

        <!-- MAIN CONTENT -->
        <div class="flex-1 flex flex-col overflow-y-auto">
            
            <!-- HEADER -->
            <header class="flex justify-between items-center bg-white px-8 py-4 border-b border-gray-200">
                <h2 class="text-2xl font-bold text-gray-800">User</h2>
                
                <div class="flex items-center space-x-6">
                    <!-- Search Bar Header -->
                    <div class="relative">
                        <input type="text" placeholder="Cari User..." class="bg-gray-100 text-xs rounded-lg pl-8 pr-4 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500 w-48">
                        <i class="fas fa-search absolute left-2.5 top-2.5 text-gray-400 text-xs"></i>
                    </div>

                    <!-- Notification Icon -->
                    <button class="relative text-gray-500 hover:text-gray-700">
                        <i class="far fa-bell text-lg"></i>
                    </button>

                    <!-- Profil Admin -->
                    <div class="flex items-center space-x-3">
                        <img src="https://ui-avatars.com/api/?name=Zahra+Cellyna&background=0D8ABC&color=fff" alt="User Avatar" class="w-9 h-9 rounded-full">
                        <div>
                            <p class="text-xs font-semibold text-gray-800">Zahra Cellyna</p>
                            <p class="text-[10px] text-gray-400">Admin</p>
                        </div>
                    </div>
                </div>
            </header>

            <!-- CONTENT BODY -->
            <main class="p-8 space-y-6">
                
                <!-- TOP CARDS (4 STATS) -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                    
                    <!-- Total User -->
                    <div class="bg-white p-4 rounded-xl border border-gray-100 shadow-sm flex items-center justify-between">
                        <div>
                            <p class="text-[11px] font-semibold text-gray-400 uppercase">Total User</p>
                            <h3 class="text-2xl font-bold text-gray-800 mt-1">24</h3>
                            <p class="text-[10px] text-gray-400 mt-0.5">Semua Pengguna</p>
                        </div>
                        <div class="w-10 h-10 bg-purple-50 text-purple-600 rounded-lg flex items-center justify-center text-lg">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>

                    <!-- User Aktif -->
                    <div class="bg-white p-4 rounded-xl border border-gray-100 shadow-sm flex items-center justify-between">
                        <div>
                            <p class="text-[11px] font-semibold text-gray-400 uppercase">User Aktif</p>
                            <h3 class="text-2xl font-bold text-gray-800 mt-1">18</h3>
                            <p class="text-[10px] text-gray-400 mt-0.5">Pengguna Aktif</p>
                        </div>
                        <div class="w-10 h-10 bg-emerald-50 text-emerald-500 rounded-lg flex items-center justify-center text-lg">
                            <i class="fas fa-user-check"></i>
                        </div>
                    </div>

                    <!-- User Baru -->
                    <div class="bg-white p-4 rounded-xl border border-gray-100 shadow-sm flex items-center justify-between">
                        <div>
                            <p class="text-[11px] font-semibold text-gray-400 uppercase">User Baru</p>
                            <h3 class="text-2xl font-bold text-gray-800 mt-1">6</h3>
                            <p class="text-[10px] text-gray-400 mt-0.5">Bulan Ini</p>
                        </div>
                        <div class="w-10 h-10 bg-amber-50 text-amber-500 rounded-lg flex items-center justify-center text-lg">
                            <i class="fas fa-user-plus"></i>
                        </div>
                    </div>

                    <!-- User Nonaktif -->
                    <div class="bg-white p-4 rounded-xl border border-gray-100 shadow-sm flex items-center justify-between">
                        <div>
                            <p class="text-[11px] font-semibold text-gray-400 uppercase">User Nonaktif</p>
                            <h3 class="text-2xl font-bold text-gray-800 mt-1">6</h3>
                            <p class="text-[10px] text-gray-400 mt-0.5">Tidak Aktif</p>
                        </div>
                        <div class="w-10 h-10 bg-red-50 text-red-500 rounded-lg flex items-center justify-center text-lg">
                            <i class="fas fa-user-slash"></i>
                        </div>
                    </div>

                </div>

                <!-- MAIN SECTION (TABLE + RIGHT SIDE PANEL) -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    
                    <!-- TABLE USER (2 Columns Wide) -->
                    <div class="lg:col-span-2 bg-white rounded-xl border border-gray-100 shadow-sm p-5 flex flex-col justify-between">
                        <div>
                            <!-- Header Table Controls -->
                            <div class="flex justify-between items-center mb-5">
                                <h4 class="font-bold text-gray-800">Daftar User</h4>
                                <div class="flex items-center space-x-3">
                                    <div class="relative">
                                        <input type="text" placeholder="Cari nama atau email..." class="border border-gray-200 text-xs rounded-lg pl-8 pr-3 py-2 w-48 focus:outline-none focus:border-blue-500">
                                        <i class="fas fa-search absolute left-2.5 top-2.5 text-gray-400 text-xs"></i>
                                    </div>
                                    <button class="bg-blue-600 hover:bg-blue-700 text-white text-xs px-3.5 py-2 rounded-lg font-medium flex items-center space-x-1 transition">
                                        <span>+ Tambah User</span>
                                    </button>
                                </div>
                            </div>

                            <!-- Table Data -->
                            <div class="overflow-x-auto">
                                <table class="w-full text-left text-xs">
                                    <thead>
                                        <tr class="text-gray-400 border-b border-gray-100">
                                            <th class="pb-3 px-2 font-medium">No</th>
                                            <th class="pb-3 px-2 font-medium">Nama</th>
                                            <th class="pb-3 px-2 font-medium">Email</th>
                                            <th class="pb-3 px-2 font-medium">Role</th>
                                            <th class="pb-3 px-2 font-medium">Status</th>
                                            <th class="pb-3 px-2 font-medium">Terakhir Aktif</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-50 text-gray-600">
                                        
                                        <!-- Row 1 -->
                                        <tr>
                                            <td class="py-2.5 px-2">1</td>
                                            <td class="py-2.5 px-2 font-medium text-gray-800 flex items-center space-x-2">
                                                <img src="https://ui-avatars.com/api/?name=Zahra+Cellyna&background=0D8ABC&color=fff" class="w-6 h-6 rounded-full">
                                                <span>Zahra Cellyna</span>
                                            </td>
                                            <td class="py-2.5 px-2">zahracell@gmail.com</td>
                                            <td class="py-2.5 px-2"><span class="bg-indigo-600 text-white text-[10px] px-2 py-0.5 rounded font-medium">Admin</span></td>
                                            <td class="py-2.5 px-2"><span class="bg-emerald-500 text-white text-[10px] px-2 py-0.5 rounded-full font-medium">Aktif</span></td>
                                            <td class="py-2.5 px-2 text-gray-400">Hari ini, 09:34</td>
                                        </tr>

                                        <!-- Row 2 -->
                                        <tr>
                                            <td class="py-2.5 px-2">2</td>
                                            <td class="py-2.5 px-2 font-medium text-gray-800 flex items-center space-x-2">
                                                <img src="https://ui-avatars.com/api/?name=Zahra+Cellyna&background=0D8ABC&color=fff" class="w-6 h-6 rounded-full">
                                                <span>Zahra Cellyna</span>
                                            </td>
                                            <td class="py-2.5 px-2">zahracell@gmail.com</td>
                                            <td class="py-2.5 px-2"><span class="bg-indigo-600 text-white text-[10px] px-2 py-0.5 rounded font-medium">Admin</span></td>
                                            <td class="py-2.5 px-2"><span class="bg-emerald-500 text-white text-[10px] px-2 py-0.5 rounded-full font-medium">Aktif</span></td>
                                            <td class="py-2.5 px-2 text-gray-400">Hari ini, 09:34</td>
                                        </tr>

                                        <!-- Row 3 -->
                                        <tr>
                                            <td class="py-2.5 px-2">3</td>
                                            <td class="py-2.5 px-2 font-medium text-gray-800 flex items-center space-x-2">
                                                <img src="https://ui-avatars.com/api/?name=Zahra+Cellyna&background=0D8ABC&color=fff" class="w-6 h-6 rounded-full">
                                                <span>Zahra Cellyna</span>
                                            </td>
                                            <td class="py-2.5 px-2">zahracell@gmail.com</td>
                                            <td class="py-2.5 px-2"><span class="bg-indigo-600 text-white text-[10px] px-2 py-0.5 rounded font-medium">Admin</span></td>
                                            <td class="py-2.5 px-2"><span class="bg-emerald-500 text-white text-[10px] px-2 py-0.5 rounded-full font-medium">Aktif</span></td>
                                            <td class="py-2.5 px-2 text-gray-400">Hari ini, 09:34</td>
                                        </tr>

                                        <!-- Row 4 -->
                                        <tr>
                                            <td class="py-2.5 px-2">4</td>
                                            <td class="py-2.5 px-2 font-medium text-gray-800 flex items-center space-x-2">
                                                <img src="https://ui-avatars.com/api/?name=Zahra+Cellyna&background=0D8ABC&color=fff" class="w-6 h-6 rounded-full">
                                                <span>Zahra Cellyna</span>
                                            </td>
                                            <td class="py-2.5 px-2">zahracell@gmail.com</td>
                                            <td class="py-2.5 px-2"><span class="bg-indigo-600 text-white text-[10px] px-2 py-0.5 rounded font-medium">Admin</span></td>
                                            <td class="py-2.5 px-2"><span class="bg-emerald-500 text-white text-[10px] px-2 py-0.5 rounded-full font-medium">Aktif</span></td>
                                            <td class="py-2.5 px-2 text-gray-400">Hari ini, 09:34</td>
                                        </tr>

                                        <!-- Row 5 -->
                                        <tr>
                                            <td class="py-2.5 px-2">5</td>
                                            <td class="py-2.5 px-2 font-medium text-gray-800 flex items-center space-x-2">
                                                <img src="https://ui-avatars.com/api/?name=Zahra+Cellyna&background=0D8ABC&color=fff" class="w-6 h-6 rounded-full">
                                                <span>Zahra Cellyna</span>
                                            </td>
                                            <td class="py-2.5 px-2">zahracell@gmail.com</td>
                                            <td class="py-2.5 px-2"><span class="bg-indigo-600 text-white text-[10px] px-2 py-0.5 rounded font-medium">Admin</span></td>
                                            <td class="py-2.5 px-2"><span class="bg-emerald-500 text-white text-[10px] px-2 py-0.5 rounded-full font-medium">Aktif</span></td>
                                            <td class="py-2.5 px-2 text-gray-400">Hari ini, 09:34</td>
                                        </tr>

                                        <!-- Row 6 (Nonaktif) -->
                                        <tr>
                                            <td class="py-2.5 px-2">6</td>
                                            <td class="py-2.5 px-2 font-medium text-gray-800 flex items-center space-x-2">
                                                <img src="https://ui-avatars.com/api/?name=Zahra+Cellyna&background=0D8ABC&color=fff" class="w-6 h-6 rounded-full">
                                                <span>Zahra Cellyna</span>
                                            </td>
                                            <td class="py-2.5 px-2">zahracell@gmail.com</td>
                                            <td class="py-2.5 px-2"><span class="bg-indigo-600 text-white text-[10px] px-2 py-0.5 rounded font-medium">Admin</span></td>
                                            <td class="py-2.5 px-2"><span class="bg-red-500 text-white text-[10px] px-2 py-0.5 rounded-full font-medium">Nonaktif</span></td>
                                            <td class="py-2.5 px-2 text-gray-400">3 Hari lalu, 11:23</td>
                                        </tr>

                                        <!-- Row 7 (Nonaktif) -->
                                        <tr>
                                            <td class="py-2.5 px-2">7</td>
                                            <td class="py-2.5 px-2 font-medium text-gray-800 flex items-center space-x-2">
                                                <img src="https://ui-avatars.com/api/?name=Zahra+Cellyna&background=0D8ABC&color=fff" class="w-6 h-6 rounded-full">
                                                <span>Zahra Cellyna</span>
                                            </td>
                                            <td class="py-2.5 px-2">zahracell@gmail.com</td>
                                            <td class="py-2.5 px-2"><span class="bg-indigo-600 text-white text-[10px] px-2 py-0.5 rounded font-medium">Admin</span></td>
                                            <td class="py-2.5 px-2"><span class="bg-red-500 text-white text-[10px] px-2 py-0.5 rounded-full font-medium">Nonaktif</span></td>
                                            <td class="py-2.5 px-2 text-gray-400">3 Hari lalu, 11:23</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Table Footer / Pagination -->
                        <div class="flex justify-between items-center mt-5 pt-3 border-t border-gray-100 text-xs text-gray-400">
                            <span>Menampilkan 1-10 dari 24 user</span>
                            <div class="flex space-x-1">
                                <button class="w-6 h-6 border rounded flex items-center justify-center hover:bg-gray-50"><i class="fas fa-chevron-left text-[10px]"></i></button>
                                <button class="w-6 h-6 bg-blue-600 text-white rounded flex items-center justify-center font-medium">1</button>
                                <button class="w-6 h-6 border rounded flex items-center justify-center hover:bg-gray-50">2</button>
                                <button class="w-6 h-6 border rounded flex items-center justify-center hover:bg-gray-50"><i class="fas fa-chevron-right text-[10px]"></i></button>
                            </div>
                        </div>
                    </div>

                    <!-- RIGHT SIDE PANELS (Ringkasan + Aktivitas Terbaru) -->
                    <div class="space-y-6">
                        
                        <!-- Panel 1: Ringkasan User (Donut Chart) -->
                        <div class="bg-white p-5 rounded-xl border border-gray-100 shadow-sm">
                            <h4 class="font-bold text-gray-800 text-sm mb-4">Ringkasan User</h4>
                            <div class="relative flex justify-center items-center h-44">
                                <canvas id="userSummaryChart"></canvas>
                            </div>
                            <div class="flex justify-center space-x-6 mt-4 text-xs">
                                <div class="flex items-center space-x-2">
                                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
                                    <span class="text-gray-500">User Aktif</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="w-2.5 h-2.5 rounded-full bg-gray-300"></span>
                                    <span class="text-gray-500">User Nonaktif</span>
                                </div>
                            </div>
                        </div>

                        <!-- Panel 2: Aktivitas Terbaru -->
                        <div class="bg-white p-5 rounded-xl border border-gray-100 shadow-sm">
                            <h4 class="font-bold text-gray-800 text-sm mb-4">Aktivitas Terbaru</h4>
                            <div class="space-y-4">
                                
                                <!-- Log item 1 -->
                                <div class="flex items-start space-x-3">
                                    <div class="w-7 h-7 bg-emerald-100 text-emerald-600 rounded flex items-center justify-center text-xs flex-shrink-0 mt-0.5">
                                        <i class="fas fa-user-plus"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-xs font-semibold text-gray-800">User baru ditambahkan</p>
                                        <p class="text-[10px] text-gray-400">Zahra Cellyna</p>
                                    </div>
                                    <span class="text-[10px] text-gray-400">09:34</span>
                                </div>

                                <!-- Log item 2 -->
                                <div class="flex items-start space-x-3">
                                    <div class="w-7 h-7 bg-blue-100 text-blue-600 rounded flex items-center justify-center text-xs flex-shrink-0 mt-0.5">
                                        <i class="fas fa-edit"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-xs font-semibold text-gray-800">Data user diperbarui</p>
                                        <p class="text-[10px] text-gray-400">Zahra Cellyna</p>
                                    </div>
                                    <span class="text-[10px] text-gray-400">09:34</span>
                                </div>

                                <!-- Log item 3 -->
                                <div class="flex items-start space-x-3">
                                    <div class="w-7 h-7 bg-red-100 text-red-500 rounded flex items-center justify-center text-xs flex-shrink-0 mt-0.5">
                                        <i class="fas fa-user-minus"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-xs font-semibold text-gray-800">User dinonaktifkan</p>
                                        <p class="text-[10px] text-gray-400">Zahra Cellyna</p>
                                    </div>
                                    <span class="text-[10px] text-gray-400">Kemarin, 11:23</span>
                                </div>

                            </div>
                            
                            <a href="#" class="block text-center text-xs text-blue-600 font-medium hover:underline mt-5">Lihat semua aktivitas</a>
                        </div>

                    </div>

                </div>

            </main>
        </div>
    </div>

    <!-- SCRIPT FOR DONUT CHART -->
    <script>
        const ctx = document.getElementById('userSummaryChart').getContext('2d');
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['User Aktif', 'User Nonaktif'],
                datasets: [{
                    data: [18, 6],
                    backgroundColor: ['#10B981', '#E5E7EB'],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '75%',
                plugins: {
                    legend: { display: false }
                }
            }
        });
    </script>
</body>
</html>