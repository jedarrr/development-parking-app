<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview Struk Parkir</title>
    
    <!-- Tailwind CSS (via Vite jika di Laravel) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- CSS khusus Cetak/Print (Menyembunyikan UI dashboard saat tombol Ctrl+P ditekan) -->
    <style>
        @media print {
            body * {
                visibility: hidden;
            }
            #thermal-receipt, #thermal-receipt * {
                visibility: visible;
            }
            #thermal-receipt {
                position: absolute;
                left: 50%;
                top: 0;
                transform: translateX(-50%);
                border: none !important;
                box-shadow: none !important;
                width: 100% !important;
                max-width: 80mm !important; /* Ukuran standar kertas thermal 80mm */
            }
            .no-print {
                display: none !important;
            }
        }
    </style>
</head>
<body class="bg-gray-100 font-sans antialiased">

    <div class="flex h-screen overflow-hidden">
        
        <!-- SIDEBAR -->
        <aside class="w-64 bg-blue-600 text-white flex flex-col justify-between p-6 no-print">
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

                    <!-- Cetak Struk Parkir (Active) -->
                    <a href="{{ route('halaman.cetak-struk-parkir') }}" class="flex items-center space-x-3 bg-blue-700 px-4 py-3 rounded-lg text-white font-medium shadow-sm">
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
            <header class="flex justify-between items-center bg-white px-8 py-5 border-b border-gray-200 no-print">
                <h2 class="text-2xl font-bold text-gray-800">Cetak Struk Parkir</h2>
                
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
            <main class="p-8 flex flex-col items-center justify-start">
                
                <!-- PREVIEW CARD STRUK -->
                <div id="thermal-receipt" class="w-full max-w-sm bg-white rounded-2xl border border-gray-200 shadow-xs p-8 text-center my-4">
                    
                    <p class="text-xs font-bold text-gray-700 mb-6 no-print">Preview Struk</p>

                    <!-- Icon P -->
                    <div class="mb-4">
                        <span class="text-4xl font-extrabold text-blue-600 tracking-wider">P</span>
                    </div>

                    <!-- Header Struk -->
                    <h3 class="text-sm font-extrabold text-gray-900 uppercase tracking-wide">PARKIR MANAGEMENT</h3>
                    <p class="text-[10px] text-gray-500 mt-1 leading-tight">
                        Terima kasih telah parkir<br>di tempat kami
                    </p>

                    <!-- Divider -->
                    <hr class="my-5 border-gray-300 border-t">

                    <!-- Detail Data Struk -->
                    <div class="space-y-2.5 text-xs text-left max-w-[240px] mx-auto text-gray-700 font-medium">
                        <div class="flex justify-between">
                            <span class="w-24">No. Plat</span>
                            <span>:</span>
                            <span class="flex-1 text-right font-bold text-gray-900">KT 1234 AB</span>
                        </div>

                        <div class="flex justify-between">
                            <span class="w-24">Jenis</span>
                            <span>:</span>
                            <span class="flex-1 text-right">Mobil</span>
                        </div>

                        <div class="flex justify-between">
                            <span class="w-24">Waktu Masuk</span>
                            <span>:</span>
                            <span class="flex-1 text-right">06/08/2025 08.45</span>
                        </div>

                        <div class="flex justify-between">
                            <span class="w-24">Petugas</span>
                            <span>:</span>
                            <span class="flex-1 text-right">Petugas 1</span>
                        </div>
                    </div>

                    <!-- Divider -->
                    <hr class="my-5 border-gray-300 border-t">

                    <!-- Footer Struk -->
                    <div class="text-[11px] font-bold text-gray-800 space-y-0.5">
                        <p>Selamat jalan!</p>
                        <p class="text-[10px] text-gray-600 font-semibold">Hati-hati di jalan</p>
                    </div>

                </div>

                <!-- Tombol Cetak Langsung (Visual saja di browser) -->
                <div class="no-print mt-4">
                    <button onclick="window.print()" class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-6 py-2.5 rounded-lg text-xs shadow-sm transition duration-150 flex items-center space-x-2">
                        <i class="fas fa-print"></i>
                        <span>Cetak Struk Sekarang</span>
                    </button>
                </div>

            </main>
        </div>
    </div>

</body>
</html>