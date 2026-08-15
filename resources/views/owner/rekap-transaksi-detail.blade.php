<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail-Rekap-Transaksi Owner</title>
    
    <!-- Tailwind CSS (via Vite jika di Laravel) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
                    <a href="#" class="flex items-center space-x-3 text-blue-100 hover:bg-blue-600 px-4 py-3 rounded-lg font-medium transition">
                        <i class="fas fa-home w-5"></i>
                        <span>Home</span>
                    </a>
                    
                    <!-- Menu Rekap Transaksi Aktif -->
                    <a href="#" class="flex items-center space-x-3 bg-blue-800 px-4 py-3 rounded-lg text-white font-medium shadow-sm">
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
                    <h2 class="text-xl font-bold text-gray-800">Rekap Transaksi</h2>
                    <p class="text-xs text-gray-400 mt-0.5">Periode: 01/05/2025 - 07/05/2025</p>
                </div>
                
                <!-- Action: Export Excel -->
                <button class="bg-emerald-500 hover:bg-emerald-600 text-white text-xs px-4 py-2 rounded-lg font-medium flex items-center space-x-2 shadow-sm transition">
                    <i class="fas fa-file-excel"></i>
                    <span>Export Excel</span>
                </button>
            </header>

            <!-- CONTENT BODY -->
            <main class="p-8 space-y-6">
                
                <!-- TOP STAT CARDS -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
                    
                    <!-- Total Pendapatan -->
                    <div class="bg-white p-4 rounded-xl border border-gray-100 shadow-sm flex items-center justify-between">
                        <div>
                            <p class="text-[11px] font-medium text-gray-400">Total Pendapatan</p>
                            <h3 class="text-lg font-bold text-gray-800 mt-1">Rp 15.750.000</h3>
                        </div>
                        <div class="w-8 h-8 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center text-sm">
                            <i class="fas fa-wallet"></i>
                        </div>
                    </div>

                    <!-- Total Transaksi -->
                    <div class="bg-white p-4 rounded-xl border border-gray-100 shadow-sm flex items-center justify-between">
                        <div>
                            <p class="text-[11px] font-medium text-gray-400">Total Transaksi</p>
                            <h3 class="text-lg font-bold text-gray-800 mt-1">2.150</h3>
                        </div>
                        <div class="w-8 h-8 bg-teal-50 text-teal-600 rounded-lg flex items-center justify-center text-sm">
                            <i class="fas fa-exchange-alt"></i>
                        </div>
                    </div>

                    <!-- Motor -->
                    <div class="bg-white p-4 rounded-xl border border-gray-100 shadow-sm flex items-center justify-between">
                        <div>
                            <p class="text-[11px] font-medium text-gray-400">Motor</p>
                            <h3 class="text-lg font-bold text-gray-800 mt-1">1.320</h3>
                        </div>
                        <div class="w-8 h-8 bg-amber-50 text-amber-500 rounded-lg flex items-center justify-center text-sm">
                            <i class="fas fa-motorcycle"></i>
                        </div>
                    </div>

                    <!-- Mobil -->
                    <div class="bg-white p-4 rounded-xl border border-gray-100 shadow-sm flex items-center justify-between">
                        <div>
                            <p class="text-[11px] font-medium text-gray-400">Mobil</p>
                            <h3 class="text-lg font-bold text-gray-800 mt-1">780</h3>
                        </div>
                        <div class="w-8 h-8 bg-purple-50 text-purple-600 rounded-lg flex items-center justify-center text-sm">
                            <i class="fas fa-car"></i>
                        </div>
                    </div>

                    <!-- Lainnya -->
                    <div class="bg-white p-4 rounded-xl border border-gray-100 shadow-sm flex items-center justify-between">
                        <div>
                            <p class="text-[11px] font-medium text-gray-400">Lainnya</p>
                            <h3 class="text-lg font-bold text-gray-800 mt-1">50</h3>
                        </div>
                        <div class="w-8 h-8 bg-sky-50 text-sky-600 rounded-lg flex items-center justify-center text-sm">
                            <i class="fas fa-truck"></i>
                        </div>
                    </div>

                </div>

                <!-- TABLE CARD -->
                <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6">
                    <h3 class="text-sm font-bold text-gray-800 mb-4">Detail Rekap Transaksi</h3>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-xs border-collapse">
                            <thead>
                                <tr class="text-gray-500 border-b border-gray-200">
                                    <th class="py-3 px-4 font-semibold">Tanggal</th>
                                    <th class="py-3 px-4 font-semibold">Total Transaksi</th>
                                    <th class="py-3 px-4 font-semibold">Motor</th>
                                    <th class="py-3 px-4 font-semibold">Mobil</th>
                                    <th class="py-3 px-4 font-semibold">Lainnya</th>
                                    <th class="py-3 px-4 font-semibold text-right">Pendapatan</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 text-gray-700">
                                
                                <!-- Row 1 -->
                                <tr class="hover:bg-gray-50/50 transition">
                                    <td class="py-3.5 px-4 font-medium">01/05/2025</td>
                                    <td class="py-3.5 px-4">280</td>
                                    <td class="py-3.5 px-4">170</td>
                                    <td class="py-3.5 px-4">100</td>
                                    <td class="py-3.5 px-4">10</td>
                                    <td class="py-3.5 px-4 text-right font-medium">Rp 2.050.000</td>
                                </tr>

                                <!-- Row 2 -->
                                <tr class="hover:bg-gray-50/50 transition">
                                    <td class="py-3.5 px-4 font-medium">02/05/2025</td>
                                    <td class="py-3.5 px-4">310</td>
                                    <td class="py-3.5 px-4">190</td>
                                    <td class="py-3.5 px-4">110</td>
                                    <td class="py-3.5 px-4">10</td>
                                    <td class="py-3.5 px-4 text-right font-medium">Rp 2.250.000</td>
                                </tr>

                                <!-- Row 3 -->
                                <tr class="hover:bg-gray-50/50 transition">
                                    <td class="py-3.5 px-4 font-medium">03/05/2025</td>
                                    <td class="py-3.5 px-4">298</td>
                                    <td class="py-3.5 px-4">180</td>
                                    <td class="py-3.5 px-4">108</td>
                                    <td class="py-3.5 px-4">10</td>
                                    <td class="py-3.5 px-4 text-right font-medium">Rp 2.150.000</td>
                                </tr>

                                <!-- Row 4 -->
                                <tr class="hover:bg-gray-50/50 transition">
                                    <td class="py-3.5 px-4 font-medium">04/05/2025</td>
                                    <td class="py-3.5 px-4">300</td>
                                    <td class="py-3.5 px-4">185</td>
                                    <td class="py-3.5 px-4">110</td>
                                    <td class="py-3.5 px-4">5</td>
                                    <td class="py-3.5 px-4 text-right font-medium">Rp 2.200.000</td>
                                </tr>

                                <!-- Row 5 -->
                                <tr class="hover:bg-gray-50/50 transition">
                                    <td class="py-3.5 px-4 font-medium">05/05/2025</td>
                                    <td class="py-3.5 px-4">320</td>
                                    <td class="py-3.5 px-4">195</td>
                                    <td class="py-3.5 px-4">120</td>
                                    <td class="py-3.5 px-4">5</td>
                                    <td class="py-3.5 px-4 text-right font-medium">Rp 2.450.000</td>
                                </tr>

                                <!-- Row 6 -->
                                <tr class="hover:bg-gray-50/50 transition">
                                    <td class="py-3.5 px-4 font-medium">06/05/2025</td>
                                    <td class="py-3.5 px-4">335</td>
                                    <td class="py-3.5 px-4">205</td>
                                    <td class="py-3.5 px-4">125</td>
                                    <td class="py-3.5 px-4">5</td>
                                    <td class="py-3.5 px-4 text-right font-medium">Rp 2.550.000</td>
                                </tr>

                                <!-- Row 7 -->
                                <tr class="hover:bg-gray-50/50 transition">
                                    <td class="py-3.5 px-4 font-medium">07/05/2025</td>
                                    <td class="py-3.5 px-4">315</td>
                                    <td class="py-3.5 px-4">195</td>
                                    <td class="py-3.5 px-4">115</td>
                                    <td class="py-3.5 px-4">5</td>
                                    <td class="py-3.5 px-4 text-right font-medium">Rp 2.300.000</td>
                                </tr>

                            </tbody>

                            <!-- FOOTER TOTAL ROW -->
                            <tfoot>
                                <tr class="bg-blue-50/80 font-bold text-blue-900 border-t border-blue-100">
                                    <td class="py-3.5 px-4">Total</td>
                                    <td class="py-3.5 px-4">2.150</td>
                                    <td class="py-3.5 px-4">1.320</td>
                                    <td class="py-3.5 px-4">780</td>
                                    <td class="py-3.5 px-4">50</td>
                                    <td class="py-3.5 px-4 text-right">Rp 15.750.000</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>

            </main>
        </div>
    </div>

</body>
</html>