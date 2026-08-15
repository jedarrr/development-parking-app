<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kendaraan-Parking Admin</title>
    
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
                    <a href="#" class="flex items-center space-x-3 text-blue-100 hover:bg-blue-700 px-4 py-3 rounded-lg font-medium transition">
                        <i class="fas fa-parking w-5"></i>
                        <span>Area Parkir</span>
                    </a>
                    
                    <!-- Menu Kendaraan Aktif -->
                    <a href="#" class="flex items-center space-x-3 bg-blue-700 px-4 py-3 rounded-lg text-white font-medium shadow-sm">
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
                <h2 class="text-2xl font-bold text-gray-800">Kendaraan</h2>
                
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
                        <span>Tambah Kendaraan</span>
                    </button>
                </div>

                <!-- TABLE CONTAINER CARD -->
                <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6">
                    
                    <!-- FILTER BAR (Search & Dropdowns) -->
                    <div class="flex flex-wrap items-center gap-4 mb-6">
                        <!-- Input Search -->
                        <div class="relative flex-1 min-w-[240px]">
                            <input type="text" placeholder="Cari no plat atau pemilik" class="w-full border border-gray-200 text-xs rounded-lg pl-9 pr-4 py-2.5 focus:outline-none focus:border-blue-500">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400 text-xs"></i>
                        </div>

                        <!-- Filter Dropdown: Jenis -->
                        <div class="w-44">
                            <select class="w-full border border-gray-200 text-xs rounded-lg px-3 py-2.5 text-gray-600 bg-white focus:outline-none focus:border-blue-500">
                                <option value="">Semua Jenis</option>
                                <option value="Mobil">Mobil</option>
                                <option value="Motor">Motor</option>
                            </select>
                        </div>

                        <!-- Filter Dropdown: Status -->
                        <div class="w-44">
                            <select class="w-full border border-gray-200 text-xs rounded-lg px-3 py-2.5 text-gray-600 bg-white focus:outline-none focus:border-blue-500">
                                <option value="">Semua Status</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>
                        </div>
                    </div>

                    <!-- TABLE DATA -->
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm border-collapse">
                            <thead>
                                <tr class="text-gray-600 border-b border-gray-200">
                                    <th class="py-4 px-4 font-semibold">No.</th>
                                    <th class="py-4 px-4 font-semibold">No Plat</th>
                                    <th class="py-4 px-4 font-semibold">Jenis</th>
                                    <th class="py-4 px-4 font-semibold">Pemilik</th>
                                    <th class="py-4 px-4 font-semibold">Status</th>
                                    <th class="py-4 px-4 font-semibold text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 text-gray-700">
                                
                                <!-- Row 1 -->
                                <tr class="hover:bg-gray-50/50 transition">
                                    <td class="py-4 px-4">1</td>
                                    <td class="py-4 px-4 font-medium text-gray-800">KT 1234 AB</td>
                                    <td class="py-4 px-4">Mobil</td>
                                    <td class="py-4 px-4">Zahra Cellyna</td>
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
                                    <td class="py-4 px-4 font-medium text-gray-800">KT 5678 CD</td>
                                    <td class="py-4 px-4">Motor</td>
                                    <td class="py-4 px-4">Zahra Cellyna</td>
                                    <td class="py-4 px-4">
                                        <span class="bg-red-200 text-red-600 text-[10px] px-3 py-1 rounded-full font-medium">Tidak Aktif</span>
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
                                    <td class="py-4 px-4 font-medium text-gray-800">KT 9753 QR</td>
                                    <td class="py-4 px-4">Motor</td>
                                    <td class="py-4 px-4">Zahra Cellyna</td>
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
                                    <td class="py-4 px-4 font-medium text-gray-800">KT 3456 GH</td>
                                    <td class="py-4 px-4">Motor</td>
                                    <td class="py-4 px-4">Zahra Cellyna</td>
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

                                <!-- Row 5 -->
                                <tr class="hover:bg-gray-50/50 transition">
                                    <td class="py-4 px-4">5</td>
                                    <td class="py-4 px-4 font-medium text-gray-800">KT 1357 MN</td>
                                    <td class="py-4 px-4">Motor</td>
                                    <td class="py-4 px-4">Zahra Cellyna</td>
                                    <td class="py-4 px-4">
                                        <span class="bg-red-200 text-red-600 text-[10px] px-3 py-1 rounded-full font-medium">Tidak Aktif</span>
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

                                <!-- Row 6 -->
                                <tr class="hover:bg-gray-50/50 transition">
                                    <td class="py-4 px-4">6</td>
                                    <td class="py-4 px-4 font-medium text-gray-800">KT 9101 EF</td>
                                    <td class="py-4 px-4">Mobil</td>
                                    <td class="py-4 px-4">Zahra Cellyna</td>
                                    <td class="py-4 px-4">
                                        <span class="bg-red-200 text-red-600 text-[10px] px-3 py-1 rounded-full font-medium">Tidak Aktif</span>
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

                </div>

            </main>
        </div>
    </div>

</body>
</html>