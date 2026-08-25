<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Pembayaran Parkir</title>
    
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
                <h1 class="text-2xl font-bold tracking-wider uppercase mb-10 border-b border-blue-600 pb-3">PETUGAS</h1>

                <!-- Navigasi Menu -->
                <nav class="space-y-2">
                    <!-- Home -->
                    <a href="{{ route('halaman.petugas') }}" class="flex items-center space-x-3 text-blue-100 hover:bg-blue-700 px-4 py-3 rounded-lg font-medium transition">
                        <i class="fas fa-home w-5"></i>
                        <span>Home</span>
                    </a>

                    <!-- Cetak Struk Parkir -->
                    <a href="{{ route('halaman.cetak-struk-parkir') }}" class="flex items-center space-x-3 text-blue-100 hover:bg-blue-700 px-4 py-3 rounded-lg font-medium transition">
                        <i class="fas fa-print w-5"></i>
                        <span>Cetak Struk Parkir</span>
                    </a>

                    <!-- Transaksi (Active) -->
                    <a href="{{ route('halaman.transaksi-pembayaran-parkir') }}" class="flex items-center space-x-3 bg-blue-700 px-4 py-3 rounded-lg text-white font-medium shadow-sm">
                        <i class="fas fa-credit-card w-5"></i>
                        <span>Transaksi</span>
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
            <header class="flex justify-between items-center bg-white px-8 py-5 border-b border-gray-200">
                <h2 class="text-2xl font-bold text-gray-800">Transaksi</h2>
                
                <!-- Profil Admin / Petugas -->
                <div class="flex items-center space-x-3">
                    <img src="https://ui-avatars.com/api/?name=Zahra+Cellyna&background=0D8ABC&color=fff" alt="User Avatar" class="w-10 h-10 rounded-full object-cover">
                    <div>
                        <p class="text-xs font-semibold text-gray-800">Zahra Cellyna</p>
                        <p class="text-[10px] text-gray-400">Petugas</p>
                    </div>
                </div>
            </header>

            <!-- CONTENT BODY -->
            <main class="p-8 space-y-6">
                
                <!-- FILTER & SEARCH BAR -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    
                    <!-- Filter 1: Tanggal (Focus Active Border) -->
                    <div class="relative">
                        <input type="text" placeholder="dd/mm/yyy" onfocus="(this.type='date')" onblur="(this.type='text')"
                               class="w-full bg-white border-2 border-blue-500 rounded-xl px-4 py-2.5 text-xs text-gray-700 outline-none shadow-xs transition placeholder-gray-400">
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                            <i class="far fa-calendar text-xs"></i>
                        </div>
                    </div>

                    <!-- Filter 2: Jenis Kendaraan -->
                    <div class="relative">
                        <select class="w-full bg-white border border-gray-200 rounded-xl px-4 py-2.5 text-xs text-gray-700 outline-none appearance-none shadow-xs transition">
                            <option value="">Semua jenis</option>
                            <option value="Mobil">Mobil</option>
                            <option value="Motor">Motor</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-400">
                            <i class="fas fa-chevron-down text-xs"></i>
                        </div>
                    </div>

                    <!-- Search: Cari No. Plat -->
                    <div class="relative">
                        <input type="text" placeholder="Cari no. plat" 
                               class="w-full bg-white border border-gray-200 rounded-xl pl-4 pr-10 py-2.5 text-xs text-gray-700 outline-none shadow-xs transition placeholder-gray-400">
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-400">
                            <i class="fas fa-search text-xs"></i>
                        </div>
                    </div>

                </div>

                <!-- TABLE CARD -->
                <div class="bg-white rounded-2xl border border-gray-200 shadow-xs overflow-hidden">
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-xs border-collapse">
                            <thead>
                                <tr class="bg-gray-50/80 text-gray-500 border-b border-gray-100">
                                    <th class="py-3.5 px-6 font-semibold">No</th>
                                    <th class="py-3.5 px-6 font-semibold">No. Plat</th>
                                    <th class="py-3.5 px-6 font-semibold">Jenis</th>
                                    <th class="py-3.5 px-6 font-semibold">Masuk</th>
                                    <th class="py-3.5 px-6 font-semibold">Keluar</th>
                                    <th class="py-3.5 px-6 font-semibold">Durasi</th>
                                    <th class="py-3.5 px-6 font-semibold">Total</th>
                                    <th class="py-3.5 px-6 font-semibold text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 text-gray-700">
                                
                                <!-- Row 1 -->
                                <tr class="hover:bg-gray-50/50 transition">
                                    <td class="py-4 px-6">1</td>
                                    <td class="py-4 px-6 font-medium text-gray-800">KT 1234 AB</td>
                                    <td class="py-4 px-6">Mobil</td>
                                    <td class="py-4 px-6">08.45</td>
                                    <td class="py-4 px-6">10.12</td>
                                    <td class="py-4 px-6">1 jam 27 menit</td>
                                    <td class="py-4 px-6 font-medium text-gray-800">Rp 5.000</td>
                                    <td class="py-4 px-6 text-center">
                                        <button class="text-blue-600 hover:text-blue-800 transition">
                                            <i class="fas fa-print"></i>
                                        </button>
                                    </td>
                                </tr>

                                <!-- Row 2 -->
                                <tr class="hover:bg-gray-50/50 transition">
                                    <td class="py-4 px-6">2</td>
                                    <td class="py-4 px-6 font-medium text-gray-800">KT 5678 CD</td>
                                    <td class="py-4 px-6">Motor</td>
                                    <td class="py-4 px-6">08.21</td>
                                    <td class="py-4 px-6">10.23</td>
                                    <td class="py-4 px-6">2 jam 2 menit</td>
                                    <td class="py-4 px-6 font-medium text-gray-800">Rp 3.000</td>
                                    <td class="py-4 px-6 text-center">
                                        <button class="text-blue-600 hover:text-blue-800 transition">
                                            <i class="fas fa-print"></i>
                                        </button>
                                    </td>
                                </tr>

                                <!-- Row 3 -->
                                <tr class="hover:bg-gray-50/50 transition">
                                    <td class="py-4 px-6">3</td>
                                    <td class="py-4 px-6 font-medium text-gray-800">KT 9101 EF</td>
                                    <td class="py-4 px-6">Mobil</td>
                                    <td class="py-4 px-6">09.34</td>
                                    <td class="py-4 px-6">11.05</td>
                                    <td class="py-4 px-6">1 jam 31 menit</td>
                                    <td class="py-4 px-6 font-medium text-gray-800">Rp 5.000</td>
                                    <td class="py-4 px-6 text-center">
                                        <button class="text-blue-600 hover:text-blue-800 transition">
                                            <i class="fas fa-print"></i>
                                        </button>
                                    </td>
                                </tr>

                                <!-- Row 4 -->
                                <tr class="hover:bg-gray-50/50 transition">
                                    <td class="py-4 px-6">4</td>
                                    <td class="py-4 px-6 font-medium text-gray-800">KT 3456 GH</td>
                                    <td class="py-4 px-6">Motor</td>
                                    <td class="py-4 px-6">09.45</td>
                                    <td class="py-4 px-6">11.23</td>
                                    <td class="py-4 px-6">1 jam 38 menit</td>
                                    <td class="py-4 px-6 font-medium text-gray-800">Rp 3.000</td>
                                    <td class="py-4 px-6 text-center">
                                        <button class="text-blue-600 hover:text-blue-800 transition">
                                            <i class="fas fa-print"></i>
                                        </button>
                                    </td>
                                </tr>

                                <!-- Row 5 -->
                                <tr class="hover:bg-gray-50/50 transition">
                                    <td class="py-4 px-6">5</td>
                                    <td class="py-4 px-6 font-medium text-gray-800">KT 1357 MN</td>
                                    <td class="py-4 px-6">Motor</td>
                                    <td class="py-4 px-6">10.10</td>
                                    <td class="py-4 px-6">12.21</td>
                                    <td class="py-4 px-6">2 jam 11 menit</td>
                                    <td class="py-4 px-6 font-medium text-gray-800">Rp 3.000</td>
                                    <td class="py-4 px-6 text-center">
                                        <button class="text-blue-600 hover:text-blue-800 transition">
                                            <i class="fas fa-print"></i>
                                        </button>
                                    </td>
                                </tr>

                                <!-- Row 6 -->
                                <tr class="hover:bg-gray-50/50 transition">
                                    <td class="py-4 px-6">6</td>
                                    <td class="py-4 px-6 font-medium text-gray-800">KT 4826 ST</td>
                                    <td class="py-4 px-6">Mobil</td>
                                    <td class="py-4 px-6">10.34</td>
                                    <td class="py-4 px-6">12.53</td>
                                    <td class="py-4 px-6">2 jam 19 menit</td>
                                    <td class="py-4 px-6 font-medium text-gray-800">Rp 5.000</td>
                                    <td class="py-4 px-6 text-center">
                                        <button class="text-blue-600 hover:text-blue-800 transition">
                                            <i class="fas fa-print"></i>
                                        </button>
                                    </td>
                                </tr>

                                <!-- Row 7 -->
                                <tr class="hover:bg-gray-50/50 transition">
                                    <td class="py-4 px-6">7</td>
                                    <td class="py-4 px-6 font-medium text-gray-800">KT 9753 QR</td>
                                    <td class="py-4 px-6">Motor</td>
                                    <td class="py-4 px-6">11.52</td>
                                    <td class="py-4 px-6">13.45</td>
                                    <td class="py-4 px-6">1 jam 53 menit</td>
                                    <td class="py-4 px-6 font-medium text-gray-800">Rp 3.000</td>
                                    <td class="py-4 px-6 text-center">
                                        <button class="text-blue-600 hover:text-blue-800 transition">
                                            <i class="fas fa-print"></i>
                                        </button>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                    <!-- FOOTER PAGINATION -->
                    <div class="flex flex-col sm:flex-row justify-between items-center p-6 border-t border-gray-100 gap-4">
                        <p class="text-xs text-gray-400">Menampilkan 1 - 5 dari 20 data</p>

                        <div class="flex items-center space-x-2 text-xs">
                            <!-- Prev -->
                            <button class="w-7 h-7 flex items-center justify-center border border-gray-200 rounded-lg text-gray-400 hover:bg-gray-50 transition">
                                <i class="fas fa-chevron-left text-[10px]"></i>
                            </button>

                            <!-- Page Numbers -->
                            <button class="w-7 h-7 flex items-center justify-center bg-blue-600 text-white rounded-lg font-medium shadow-xs">1</button>
                            <button class="w-7 h-7 flex items-center justify-center border border-gray-200 text-blue-600 rounded-lg font-medium hover:bg-gray-50 transition">2</button>
                            <button class="w-7 h-7 flex items-center justify-center border border-gray-200 text-blue-600 rounded-lg font-medium hover:bg-gray-50 transition">3</button>

                            <!-- Next -->
                            <button class="w-7 h-7 flex items-center justify-center border border-gray-200 text-gray-400 hover:bg-gray-50 rounded-lg transition">
                                <i class="fas fa-chevron-right text-[10px]"></i>
                            </button>
                        </div>
                    </div>

                </div>

            </main>
        </div>
    </div>

</body>
</html>