<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Petugas Parking</title>
    
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
                    <!-- Home (Active) -->
                    <a href="{{ route('halaman.petugas') }}" class="flex items-center space-x-3 bg-blue-700 px-4 py-3 rounded-lg text-white font-medium shadow-sm">
                        <i class="fas fa-home w-5"></i>
                        <span>Home</span>
                    </a>

                    <!-- Cetak Struk Parkir -->
                    <a href="{{ route('halaman.cetak-struk-parkir') }}" class="flex items-center space-x-3 text-blue-100 hover:bg-blue-700 px-4 py-3 rounded-lg font-medium transition">
                        <i class="fas fa-print w-5"></i>
                        <span>Cetak Struk Parkir</span>
                    </a>

                    <!-- Transaksi -->
                    <a href="{{ route('halaman.transaksi-pembayaran-parkir') }}" class="flex items-center space-x-3 text-blue-100 hover:bg-blue-700 px-4 py-3 rounded-lg font-medium transition">
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
                <h2 class="text-2xl font-bold text-gray-800">Home</h2>
                
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
            <main class="p-8 space-y-8">
                
                <!-- TOP STAT CARDS (4 COLUMNS) -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                    
                    <!-- Card 1: Kendaraan Masuk -->
                    <div class="bg-blue-100/70 p-5 rounded-2xl flex items-center justify-between border border-blue-200/50">
                        <div>
                            <p class="text-[11px] font-medium text-gray-600">Kendaraan Masuk</p>
                            <h3 class="text-2xl font-bold text-gray-800 mt-1">12</h3>
                            <p class="text-[10px] text-gray-400 mt-0.5">Hari ini</p>
                        </div>
                        <div class="w-10 h-10 bg-blue-200/60 text-blue-600 rounded-xl flex items-center justify-center text-base">
                            <i class="fas fa-car"></i>
                        </div>
                    </div>

                    <!-- Card 2: Kendaraan Keluar -->
                    <div class="bg-emerald-100/70 p-5 rounded-2xl flex items-center justify-between border border-emerald-200/50">
                        <div>
                            <p class="text-[11px] font-medium text-gray-600">Kendaraan Keluar</p>
                            <h3 class="text-2xl font-bold text-gray-800 mt-1">8</h3>
                            <p class="text-[10px] text-gray-400 mt-0.5">Hari ini</p>
                        </div>
                        <div class="w-10 h-10 bg-emerald-200/60 text-emerald-600 rounded-xl flex items-center justify-center text-base">
                            <i class="fas fa-car-side"></i>
                        </div>
                    </div>

                    <!-- Card 3: Total Transaksi -->
                    <div class="bg-amber-100/70 p-5 rounded-2xl flex items-center justify-between border border-amber-200/50">
                        <div>
                            <p class="text-[11px] font-medium text-gray-600">Total Transaksi</p>
                            <h3 class="text-2xl font-bold text-gray-800 mt-1">20</h3>
                            <p class="text-[10px] text-gray-400 mt-0.5">Hari ini</p>
                        </div>
                        <div class="w-10 h-10 bg-amber-200/60 text-amber-600 rounded-xl flex items-center justify-center text-base">
                            <i class="fas fa-receipt"></i>
                        </div>
                    </div>

                    <!-- Card 4: Total Pendapatan -->
                    <div class="bg-indigo-100/70 p-5 rounded-2xl flex items-center justify-between border border-indigo-200/50">
                        <div>
                            <p class="text-[11px] font-medium text-gray-600">Total Pendapatan</p>
                            <h3 class="text-2xl font-bold text-gray-800 mt-1">Rp 450.000</h3>
                            <p class="text-[10px] text-gray-400 mt-0.5">Hari ini</p>
                        </div>
                        <div class="w-10 h-10 bg-indigo-200/60 text-indigo-600 rounded-xl flex items-center justify-center text-base">
                            <i class="fas fa-wallet"></i>
                        </div>
                    </div>

                </div>

                <!-- TABLE CARD -->
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-sm font-bold text-gray-800">Transaksi Terakhir</h3>
                        <a href="#" class="text-[11px] font-medium text-blue-600 hover:underline">Lihat Semua</a>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-xs border-collapse">
                            <thead>
                                <tr class="bg-gray-50 text-gray-500">
                                    <th class="py-3 px-4 font-semibold rounded-l-lg">No.</th>
                                    <th class="py-3 px-4 font-semibold">No. Plat</th>
                                    <th class="py-3 px-4 font-semibold">Jenis</th>
                                    <th class="py-3 px-4 font-semibold">Masuk</th>
                                    <th class="py-3 px-4 font-semibold">Keluar</th>
                                    <th class="py-3 px-4 font-semibold">Total</th>
                                    <th class="py-3 px-4 font-semibold text-center rounded-r-lg">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 text-gray-700">
                                
                                <!-- Row 1 -->
                                <tr class="hover:bg-gray-50/50 transition">
                                    <td class="py-3.5 px-4">1</td>
                                    <td class="py-3.5 px-4 font-medium text-gray-800">KT 1234 AB</td>
                                    <td class="py-3.5 px-4">Mobil</td>
                                    <td class="py-3.5 px-4">07.45</td>
                                    <td class="py-3.5 px-4">10.12</td>
                                    <td class="py-3.5 px-4 font-medium">Rp 5.000</td>
                                    <td class="py-3.5 px-4 text-center">
                                        <button class="text-gray-500 hover:text-blue-600 transition">
                                            <i class="far fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>

                                <!-- Row 2 -->
                                <tr class="hover:bg-gray-50/50 transition">
                                    <td class="py-3.5 px-4">2</td>
                                    <td class="py-3.5 px-4 font-medium text-gray-800">KT 5678 CD</td>
                                    <td class="py-3.5 px-4">Motor</td>
                                    <td class="py-3.5 px-4">08.21</td>
                                    <td class="py-3.5 px-4">11.23</td>
                                    <td class="py-3.5 px-4 font-medium">Rp 3.000</td>
                                    <td class="py-3.5 px-4 text-center">
                                        <button class="text-gray-500 hover:text-blue-600 transition">
                                            <i class="far fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>

                                <!-- Row 3 -->
                                <tr class="hover:bg-gray-50/50 transition">
                                    <td class="py-3.5 px-4">3</td>
                                    <td class="py-3.5 px-4 font-medium text-gray-800">KT 9101 EF</td>
                                    <td class="py-3.5 px-4">Mobil</td>
                                    <td class="py-3.5 px-4">09.04</td>
                                    <td class="py-3.5 px-4">12.45</td>
                                    <td class="py-3.5 px-4 font-medium">Rp 5.000</td>
                                    <td class="py-3.5 px-4 text-center">
                                        <button class="text-gray-500 hover:text-blue-600 transition">
                                            <i class="far fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>

                                <!-- Row 4 -->
                                <tr class="hover:bg-gray-50/50 transition">
                                    <td class="py-3.5 px-4">4</td>
                                    <td class="py-3.5 px-4 font-medium text-gray-800">KT 3456 GH</td>
                                    <td class="py-3.5 px-4">Motor</td>
                                    <td class="py-3.5 px-4">09.45</td>
                                    <td class="py-3.5 px-4">11.23</td>
                                    <td class="py-3.5 px-4 font-medium">Rp 3.000</td>
                                    <td class="py-3.5 px-4 text-center">
                                        <button class="text-gray-500 hover:text-blue-600 transition">
                                            <i class="far fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>

                                <!-- Row 5 -->
                                <tr class="hover:bg-gray-50/50 transition">
                                    <td class="py-3.5 px-4">5</td>
                                    <td class="py-3.5 px-4 font-medium text-gray-800">KT 1357 MN</td>
                                    <td class="py-3.5 px-4">Motor</td>
                                    <td class="py-3.5 px-4">10.10</td>
                                    <td class="py-3.5 px-4">-</td>
                                    <td class="py-3.5 px-4">-</td>
                                    <td class="py-3.5 px-4 text-center">
                                        <button class="text-gray-500 hover:text-blue-600 transition">
                                            <i class="far fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>

                                <!-- Row 6 -->
                                <tr class="hover:bg-gray-50/50 transition">
                                    <td class="py-3.5 px-4">6</td>
                                    <td class="py-3.5 px-4 font-medium text-gray-800">KT 4535 ST</td>
                                    <td class="py-3.5 px-4">Mobil</td>
                                    <td class="py-3.5 px-4">10.34</td>
                                    <td class="py-3.5 px-4">-</td>
                                    <td class="py-3.5 px-4">-</td>
                                    <td class="py-3.5 px-4 text-center">
                                        <button class="text-gray-500 hover:text-blue-600 transition">
                                            <i class="far fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>

                                <!-- Row 7 -->
                                <tr class="hover:bg-gray-50/50 transition">
                                    <td class="py-3.5 px-4">7</td>
                                    <td class="py-3.5 px-4 font-medium text-gray-800">KT 9753 QR</td>
                                    <td class="py-3.5 px-4">Motor</td>
                                    <td class="py-3.5 px-4">11.52</td>
                                    <td class="py-3.5 px-4">-</td>
                                    <td class="py-3.5 px-4">-</td>
                                    <td class="py-3.5 px-4 text-center">
                                        <button class="text-gray-500 hover:text-blue-600 transition">
                                            <i class="far fa-eye"></i>
                                        </button>
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