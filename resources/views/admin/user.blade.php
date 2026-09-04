<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen User - Admin</title>
    
    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Chart.js -->
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
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 text-blue-100 hover:bg-blue-700 px-4 py-3 rounded-lg font-medium transition">
                        <i class="fas fa-home w-5"></i>
                        <span>Home</span>
                    </a>
                    <a href="{{ route('admin.user') }}" class="flex items-center space-x-3 bg-blue-700 px-4 py-3 rounded-lg text-white font-medium shadow-sm">
                        <i class="fas fa-users-cog w-5"></i>
                        <span>User</span>
                    </a>
                    <a href="{{ route('admin.tarif-parkir') }}" class="flex items-center space-x-3 text-blue-100 hover:bg-blue-700 px-4 py-3 rounded-lg font-medium transition">
                        <i class="fas fa-file-invoice-dollar w-5"></i>
                        <span>Tarif Parkir</span>
                    </a>
                    <a href="{{ route('admin.area-parkir') }}" class="flex items-center space-x-3 text-blue-100 hover:bg-blue-700 px-4 py-3 rounded-lg font-medium transition">
                        <i class="fas fa-parking w-5"></i>
                        <span>Area Parkir</span>
                    </a>
                    <a href="{{ route('admin.kendaraan') }}" class="flex items-center space-x-3 text-blue-100 hover:bg-blue-700 px-4 py-3 rounded-lg font-medium transition">
                        <i class="fas fa-car w-5"></i>
                        <span>Kendaraan</span>
                    </a>
                    <a href="{{ route('admin.log-aktivitas') }}" class="flex items-center space-x-3 text-blue-100 hover:bg-blue-700 px-4 py-3 rounded-lg font-medium transition">
                        <i class="fas fa-history w-5"></i>
                        <span>Log Aktifitas</span>
                    </a>
                    <a href="{{ route('admin.settings') }}" class="flex items-center space-x-3 text-blue-100 hover:bg-blue-700 px-4 py-3 rounded-lg font-medium transition">
                        <i class="fas fa-cog w-5"></i>
                        <span>Settings</span>
                    </a>
                </nav>
            </div>

            <!-- Logout -->
            <div>
                <form action="{{ route('authentication.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="flex items-center space-x-3 text-blue-100 hover:text-white transition w-full">
                        <i class="fas fa-sign-out-alt w-5"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- MAIN CONTENT -->
        <div class="flex-1 flex flex-col overflow-y-auto">
            
            <!-- HEADER -->
            <header class="flex justify-between items-center bg-white px-8 py-4 border-b border-gray-200">
                <h2 class="text-2xl font-bold text-gray-800">User</h2>
                
                <div class="flex items-center space-x-6">
                    <!-- Search Bar Header -->
                    <form action="{{ route('admin.user') }}" method="GET" class="relative">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari User..." class="bg-gray-100 text-xs rounded-lg pl-8 pr-4 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500 w-48">
                        <i class="fas fa-search absolute left-2.5 top-2.5 text-gray-400 text-xs"></i>
                    </form>

                    <!-- Notification Icon -->
                    <button class="relative text-gray-500 hover:text-gray-700">
                        <i class="far fa-bell text-lg"></i>
                    </button>

                    <!-- Profil Admin -->
                    <div class="flex items-center space-x-3">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->nama_lengkap ?? 'Admin') }}&background=0D8ABC&color=fff" alt="User Avatar" class="w-9 h-9 rounded-full">
                        <div>
                            <p class="text-xs font-semibold text-gray-800">{{ auth()->user()->nama_lengkap ?? 'Admin' }}</p>
                            <p class="text-[10px] text-gray-400 capitalize">{{ auth()->user()->role ?? 'Admin' }}</p>
                        </div>
                    </div>
                </div>
            </header>

            <!-- CONTENT BODY -->
            <main class="p-8 space-y-6">
                
                <!-- TOP CARDS STATISTIK -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-5">
                    <div class="bg-white p-5 rounded-xl border border-gray-100 shadow-sm flex items-center justify-between">
                        <div>
                            <p class="text-xs text-gray-400 font-medium">Total User</p>
                            <h3 class="text-2xl font-bold text-gray-800 mt-1">{{ $totalUser }}</h3>
                        </div>
                        <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>

                    <div class="bg-white p-5 rounded-xl border border-gray-100 shadow-sm flex items-center justify-between">
                        <div>
                            <p class="text-xs text-gray-400 font-medium">User Aktif</p>
                            <h3 class="text-2xl font-bold text-emerald-600 mt-1">{{ $userAktif }}</h3>
                        </div>
                        <div class="w-10 h-10 bg-emerald-50 text-emerald-600 rounded-lg flex items-center justify-center">
                            <i class="fas fa-user-check"></i>
                        </div>
                    </div>

                    <div class="bg-white p-5 rounded-xl border border-gray-100 shadow-sm flex items-center justify-between">
                        <div>
                            <p class="text-xs text-gray-400 font-medium">User Baru</p>
                            <h3 class="text-2xl font-bold text-indigo-600 mt-1">{{ $userBaru }}</h3>
                        </div>
                        <div class="w-10 h-10 bg-indigo-50 text-indigo-600 rounded-lg flex items-center justify-center">
                            <i class="fas fa-user-plus"></i>
                        </div>
                    </div>

                    <div class="bg-white p-5 rounded-xl border border-gray-100 shadow-sm flex items-center justify-between">
                        <div>
                            <p class="text-xs text-gray-400 font-medium">User Nonaktif</p>
                            <h3 class="text-2xl font-bold text-red-500 mt-1">{{ $userNonaktif }}</h3>
                        </div>
                        <div class="w-10 h-10 bg-red-50 text-red-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-user-slash"></i>
                        </div>
                    </div>
                </div>

                <!-- MAIN SECTION (TABEL + SIDE PANELS) -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    
                    <!-- KIRI: TABEL USER (Span 2 Kolom) -->
                    <div class="lg:col-span-2 bg-white p-6 rounded-xl border border-gray-100 shadow-sm flex flex-col justify-between">
                        <div>
                            <h4 class="font-bold text-gray-800 text-sm mb-4">Daftar Pengguna</h4>
                            <div class="overflow-x-auto">
                                <table class="w-full text-left text-xs">
                                    <thead class="bg-gray-50 text-gray-500 uppercase font-semibold">
                                        <tr>
                                            <th class="py-3 px-4">No</th>
                                            <th class="py-3 px-4">Nama Lengkap</th>
                                            <th class="py-3 px-4">Username</th>
                                            <th class="py-3 px-4">Role</th>
                                            <th class="py-3 px-4">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-100">
                                        @forelse($users as $index => $item)
                                        <tr class="hover:bg-gray-50 transition">
                                            <td class="py-3 px-4">{{ $users->firstItem() + $index }}</td>
                                            <td class="py-3 px-4 font-medium text-gray-800">{{ $item->nama_lengkap }}</td>
                                            <td class="py-3 px-4 text-gray-500">{{ $item->username }}</td>
                                            <td class="py-3 px-4"><span class="capitalize px-2 py-0.5 rounded bg-gray-100 text-gray-700 text-[11px] font-medium">{{ $item->role }}</span></td>
                                            <td class="py-3 px-4">
                                                @if($item->status_aktif)
                                                    <span class="bg-emerald-500 text-white text-[10px] px-2 py-0.5 rounded-full font-medium">Aktif</span>
                                                @else
                                                    <span class="bg-red-500 text-white text-[10px] px-2 py-0.5 rounded-full font-medium">Nonaktif</span>
                                                @endif
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="5" class="text-center py-6 text-gray-400">Data user tidak ditemukan.</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Table Footer / Pagination -->
                        <div class="mt-5 pt-3 border-t border-gray-100">
                            {{ $users->links() }}
                        </div>
                    </div>

                    <!-- KANAN: RIGHT SIDE PANELS -->
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
                                <div class="flex items-start space-x-3">
                                    <div class="w-7 h-7 bg-emerald-100 text-emerald-600 rounded flex items-center justify-center text-xs flex-shrink-0 mt-0.5">
                                        <i class="fas fa-user-plus"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-xs font-semibold text-gray-800">User baru ditambahkan</p>
                                        <p class="text-[10px] text-gray-400">Sistem</p>
                                    </div>
                                    <span class="text-[10px] text-gray-400">Terbaru</span>
                                </div>
                            </div>
                            
                            <a href="{{ route('admin.log-aktivitas') }}" class="block text-center text-xs text-blue-600 font-medium hover:underline mt-5">Lihat semua aktivitas</a>
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
                    data: [{{ $userAktif }}, {{ $userNonaktif }}],
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