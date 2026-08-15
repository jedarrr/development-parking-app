<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area-Parking Admin</title>
    
    <!-- Tailwind CSS (via Vite jika di Laravel) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans antialiased">

    <div class="flex h-screen overflow-hidden">
        
        <!-- SIDEBAR -->
        <aside class="w-64 bg-blue-600 text-white flex flex-col justify-between p-6">
            <div>
                <!-- Logo / Title -->
                <h1 class="text-2xl font-bold tracking-wider uppercase mb-10">ADMIN</h1>

                <!-- Navigasi Menu -->
                <nav class="space-y-2">
                    <a href="#" class="flex items-center space-x-3 text-blue-100 hover:bg-blue-700 px-4 py-3 rounded-lg font-medium transition">
                        <i class="fas fa-home w-5"></i>
                        <span>Home</span>
                    </a>
                    <a href="#" class="flex items-center space-x-3 text-blue-100 hover:bg-blue-700 px-4 py-3 rounded-lg font-medium transition">
                        <i class="fas fa-users-cog w-5"></i>
                        <span>User</span>
                    </a>
                    <a href="#" class="flex items-center space-x-3 text-blue-100 hover:bg-blue-700 px-4 py-3 rounded-lg font-medium transition">
                        <i class="fas fa-file-invoice-dollar w-5"></i>
                        <span>Tarif Parkir</span>
                    </a>
                    
                    <!-- Menu Area Parkir Aktif -->
                    <a href="#" class="flex items-center space-x-3 bg-blue-700 px-4 py-3 rounded-lg text-white font-medium shadow-sm">
                        <i class="fas fa-parking w-5"></i>
                        <span>Area Parkir</span>
                    </a>

                    <a href="#" class="flex items-center space-x-3 text-blue-100 hover:bg-blue-700 px-4 py-3 rounded-lg font-medium transition">
                        <i class="fas fa-car w-5"></i>
                        <span>Kendaraan</span>
                    </a>
                    <a href="#" class="flex items-center space-x-3 text-blue-100 hover:bg-blue-700 px-4 py-3 rounded-lg font-medium transition">
                        <i class="fas fa-history w-5"></i>
                        <span>Log Aktifitas</span>
                    </a>
                    <a href="#" class="flex items-center space-x-3 text-blue-100 hover:bg-blue-700 px-4 py-3 rounded-lg font-medium transition">
                        <i class="fas fa-cog w-5"></i>
                        <span>Settings</span>
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
                <h2 class="text-2xl font-bold text-gray-800">Area Parkir</h2>
                
                <div class="flex items-center space-x-6">
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
            <main class="p-8">
                
                <!-- Action Button Section -->
                <div class="flex justify-end mb-6">
                    <button class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-5 py-2.5 rounded-lg font-medium flex items-center space-x-2 shadow-sm transition">
                        <i class="fas fa-plus text-xs"></i>
                        <span>Tambah Area</span>
                    </button>
                </div>

                <!-- TABLE CARD -->
                <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm border-collapse">
                            <thead>
                                <tr class="text-gray-600 border-b border-gray-200">
                                    <th class="py-4 px-4 font-semibold">No.</th>
                                    <th class="py-4 px-4 font-semibold">Nama Area</th>
                                    <th class="py-4 px-4 font-semibold">Lokasi</th>
                                    <th class="py-4 px-4 font-semibold">Kapasitas</th>
                                    <th class="py-4 px-4 font-semibold">Terisi</th>
                                    <th class="py-4 px-4 font-semibold">Status</th>
                                    <th class="py-4 px-4 font-semibold text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 text-gray-700">
                                
                                <!-- Row 1 -->
                                <tr class="hover:bg-gray-50/50 transition">
                                    <td class="py-4 px-4">1</td>
                                    <td class="py-4 px-4 font-medium text-gray-800">A1</td>
                                    <td class="py-4 px-4">Lantai 1</td>
                                    <td class="py-4 px-4">40</td>
                                    <td class="py-4 px-4">25</td>
                                    <td class="py-4 px-4">
                                        <span class="bg-emerald-500 text-white text-[10px] px-3 py-1 rounded-full font-medium">Aktif</span>
                                    </td>
                                    <td class="py-4 px-4">
                                        <div class="flex items-center justify-center space-x-2">
                                            <button class="w-8 h-8 rounded-lg border border-blue-200 text-blue-600 hover:bg-blue-50 flex items-center justify-center transition">
                                                <i class="fas fa-pencil-alt text-xs"></i>
                                            </button>
                                            <button class="w-8 h-8 rounded-lg border border-red-200 text-red-500 hover:bg-red-50 flex items-center justify-center transition">
                                                <i class="fas fa-trash-alt text-xs"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Row 2 -->
                                <tr class="hover:bg-gray-50/50 transition">
                                    <td class="py-4 px-4">2</td>
                                    <td class="py-4 px-4 font-medium text-gray-800">C2</td>
                                    <td class="py-4 px-4">Lantai 2</td>
                                    <td class="py-4 px-4">25</td>
                                    <td class="py-4 px-4">10</td>
                                    <td class="py-4 px-4">
                                        <span class="bg-emerald-500 text-white text-[10px] px-3 py-1 rounded-full font-medium">Aktif</span>
                                    </td>
                                    <td class="py-4 px-4">
                                        <div class="flex items-center justify-center space-x-2">
                                            <button class="w-8 h-8 rounded-lg border border-blue-200 text-blue-600 hover:bg-blue-50 flex items-center justify-center transition">
                                                <i class="fas fa-pencil-alt text-xs"></i>
                                            </button>
                                            <button class="w-8 h-8 rounded-lg border border-red-200 text-red-500 hover:bg-red-50 flex items-center justify-center transition">
                                                <i class="fas fa-trash-alt text-xs"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Row 3 -->
                                <tr class="hover:bg-gray-50/50 transition">
                                    <td class="py-4 px-4">3</td>
                                    <td class="py-4 px-4 font-medium text-gray-800">A5</td>
                                    <td class="py-4 px-4">Lantai 1</td>
                                    <td class="py-4 px-4">30</td>
                                    <td class="py-4 px-4">18</td>
                                    <td class="py-4 px-4">
                                        <span class="bg-emerald-500 text-white text-[10px] px-3 py-1 rounded-full font-medium">Aktif</span>
                                    </td>
                                    <td class="py-4 px-4">
                                        <div class="flex items-center justify-center space-x-2">
                                            <button class="w-8 h-8 rounded-lg border border-blue-200 text-blue-600 hover:bg-blue-50 flex items-center justify-center transition">
                                                <i class="fas fa-pencil-alt text-xs"></i>
                                            </button>
                                            <button class="w-8 h-8 rounded-lg border border-red-200 text-red-500 hover:bg-red-50 flex items-center justify-center transition">
                                                <i class="fas fa-trash-alt text-xs"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Row 4 -->
                                <tr class="hover:bg-gray-50/50 transition">
                                    <td class="py-4 px-4">4</td>
                                    <td class="py-4 px-4 font-medium text-gray-800">C1</td>
                                    <td class="py-4 px-4">Lantai 2</td>
                                    <td class="py-4 px-4">50</td>
                                    <td class="py-4 px-4">35</td>
                                    <td class="py-4 px-4">
                                        <span class="bg-emerald-500 text-white text-[10px] px-3 py-1 rounded-full font-medium">Aktif</span>
                                    </td>
                                    <td class="py-4 px-4">
                                        <div class="flex items-center justify-center space-x-2">
                                            <button class="w-8 h-8 rounded-lg border border-blue-200 text-blue-600 hover:bg-blue-50 flex items-center justify-center transition">
                                                <i class="fas fa-pencil-alt text-xs"></i>
                                            </button>
                                            <button class="w-8 h-8 rounded-lg border border-red-200 text-red-500 hover:bg-red-50 flex items-center justify-center transition">
                                                <i class="fas fa-trash-alt text-xs"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                    <!-- Table Footer Information -->
                    <div class="mt-6 pt-4 text-xs text-gray-400">
                        <span>Menampilkan 1 - 4 dari 4 data</span>
                    </div>
                </div>

            </main>
        </div>
    </div>

</body>
</html>