<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Aktivitas Parking</title>
    <!-- Hubungkan ke aset Tailwind Laravel via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Font Awesome untuk Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 font-sans flex h-screen overflow-hidden">

   <!-- SIDEBAR -->
        <aside class="w-64 bg-blue-600 text-white flex flex-col justify-between p-6">
            <div>
                <!-- Logo / Title -->
                <h1 class="text-2xl font-bold tracking-wider uppercase mb-10">ADMIN</h1>

                <!-- Navigasi Menu -->
                <nav class="space-y-2">
                    <a href="{{ route('halaman.admin') }}" class="flex items-center space-x-3 text-blue-100 hover:bg-blue-700 px-4 py-3 rounded-lg font-medium transition">
                        <i class="fas fa-home w-5"></i>
                        <span>Home</span>
                    </a>
                    <a href="{{ route('halaman.user') }}" class="flex items-center space-x-3 text-blue-100 hover:bg-blue-700 px-4 py-3 rounded-lg font-medium transition">
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
                    <a href="{{ route('halaman.log-aktivitas') }}" class="flex items-center space-x-3 bg-blue-700 px-4 py-3 rounded-lg text-white font-medium shadow-sm">
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

    <!-- MAIN CONTENT AREA -->
    <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
        
        <!-- TOPBAR / HEADER -->
        <header class="bg-white border-b border-gray-100 flex items-center justify-between px-8 py-4 shrink-0">
            <h1 class="text-2xl font-bold text-gray-800">Log Aktivitas</h1>
            
            <!-- Info Profil -->
            <div class="flex items-center space-x-4">
                <button class="text-gray-400 hover:text-gray-600 focus:outline-none relative">
                    <span class="text-xl">🔔</span>
                    <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
                </button>
                <div class="flex items-center space-x-3">
                    <div class="text-right">
                        <p class="text-sm font-semibold text-gray-700 leading-tight">Zahra Cellyna</p>
                        <p class="text-xs text-gray-400">Admin</p>
                    </div>
                    <img class="w-10 h-10 rounded-full object-cover ring-2 ring-gray-100" src="https://unsplash.com" alt="Foto Profil">
                </div>
            </div>
        </header>

        <!-- KONTEN UTAMA (TABEL) -->
        <main class="flex-1 overflow-y-auto p-8">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-gray-100">
                                <th class="pb-4 pt-2 font-semibold text-sm text-blue-600 w-16">No.</th>
                                <th class="pb-4 pt-2 font-semibold text-sm text-blue-600 w-44">Waktu</th>
                                <th class="pb-4 pt-2 font-semibold text-sm text-blue-600 w-44">Pengguna</th>
                                <th class="pb-4 pt-2 font-semibold text-sm text-blue-600 w-40">Aktivitas</th>
                                <th class="pb-4 pt-2 font-semibold text-sm text-blue-600">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50 text-sm text-gray-700">
                            <!-- Baris 1 -->
                            <tr>
                                <td class="py-4">1</td>
                                <td class="py-4 font-medium text-gray-900">08 Mei 2026 08:30</td>
                                <td class="py-4">Zahra Cellyna</td>
                                <td class="py-4 font-medium">Login</td>
                                <td class="py-4 text-gray-500">Berhasil login ke sistem</td>
                            </tr>
                            <!-- Baris 2 -->
                            <tr>
                                <td class="py-4">2</td>
                                <td class="py-4 font-medium text-gray-900">08 Mei 2026 09:30</td>
                                <td class="py-4">Zahra Cellyna</td>
                                <td class="py-4 font-medium">Tambah Tarif</td>
                                <td class="py-4 text-gray-500">Menambah tarif Motor</td>
                            </tr>
                            <!-- Baris 3 -->
                            <tr>
                                <td class="py-4">3</td>
                                <td class="py-4 font-medium text-gray-900">08 Mei 2026 09:45</td>
                                <td class="py-4">Zahra Cellyna</td>
                                <td class="py-4 font-medium">Edit Area</td>
                                <td class="py-4 text-gray-500">Mengubah area B - Lantai 1</td>
                            </tr>
                            <!-- Baris 4 -->
                            <tr>
                                <td class="py-4">4</td>
                                <td class="py-4 font-medium text-gray-900">08 Mei 2026 10:15</td>
                                <td class="py-4">Zahra Cellyna</td>
                                <td class="py-4 font-medium">Hapus Kendaraan</td>
                                <td class="py-4 text-gray-500">Menghapus kendaraan KT 1234 AB</td>
                            </tr>
                            <!-- Baris 5 -->
                            <tr>
                                <td class="py-4">5</td>
                                <td class="py-4 font-medium text-gray-900">08 Mei 2026 10:22</td>
                                <td class="py-4">Zahra Cellyna</td>
                                <td class="py-4 font-medium">Logout</td>
                                <td class="py-4 text-gray-500">Logout dari sistem</td>
                            </tr>
                            <!-- Baris 6 -->
                            <tr>
                                <td class="py-4">6</td>
                                <td class="py-4 font-medium text-gray-900">08 Mei 2026 11:35</td>
                                <td class="py-4">Zahra Cellyna</td>
                                <td class="py-4 font-medium">Login</td>
                                <td class="py-4 text-gray-500">Berhasil login ke sistem</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- PAGINATION / PENOMORAN HALAMAN -->
                <div class="flex items-center justify-between mt-6 pt-4 border-t border-gray-100 text-xs text-gray-400">
                    <div>
                        Menampilkan 1 - 5 dari 5 data
                    </div>
                    <div class="flex items-center space-x-1">
                        <button class="p-2 border border-gray-200 rounded-lg text-gray-400 hover:bg-gray-50 transition">
                            &lt;
                        </button>
                        <button class="px-3 py-1.5 bg-blue-600 text-white rounded-lg font-medium shadow-sm">
                            1
                        </button>
                        <button class="px-3 py-1.5 text-blue-600 hover:bg-blue-50 rounded-lg font-medium transition">
                            2
                        </button>
                        <button class="px-3 py-1.5 text-blue-600 hover:bg-blue-50 rounded-lg font-medium transition">
                            3
                        </button>
                        <button class="p-2 border border-gray-200 rounded-lg text-gray-400 hover:bg-gray-50 transition">
                            &gt;
