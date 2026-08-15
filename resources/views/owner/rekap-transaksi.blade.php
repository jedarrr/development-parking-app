<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap-Transaksi-Owner Parking</title>
    
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
                    <p class="text-xs text-gray-400 mt-0.5">Pilih waktu untuk melihat transaksi</p>
                </div>
                
                <!-- Role Pill -->
                <div class="flex items-center space-x-2 bg-gray-100 border border-gray-200 px-3 py-1.5 rounded-full">
                    <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                    <span class="text-xs font-semibold text-gray-700">Owner</span>
                </div>
            </header>

            <!-- CONTENT BODY -->
            <main class="p-8 flex flex-col items-center justify-center min-h-[calc(100vh-80px)]">
                
                <!-- CARD FILTER PERIODE -->
                <div class="w-full max-w-xl bg-white rounded-2xl border border-gray-100 shadow-sm p-10 flex flex-col items-center">
                    
                    <h3 class="text-xl font-bold text-gray-800 mb-8">Pilih Periode</h3>

                    <form action="#" method="GET" class="w-full space-y-5 max-w-md">
                        
                        <!-- Input: Dari Tanggal -->
                        <div>
                            <label class="block text-xs font-medium text-gray-500 mb-1.5">Dari Tanggal</label>
                            <input type="text" value="01/05/2025" placeholder="DD/MM/YYYY" class="w-full bg-gray-50 border border-gray-200 text-gray-700 text-sm rounded-lg px-4 py-3 focus:outline-none focus:border-blue-500 transition">
                        </div>

                        <!-- Input: Sampai Tanggal -->
                        <div>
                            <label class="block text-xs font-medium text-gray-500 mb-1.5">Sampai Tanggal</label>
                            <input type="text" value="07/05/2025" placeholder="DD/MM/YYYY" class="w-full bg-gray-50 border border-gray-200 text-gray-700 text-sm rounded-lg px-4 py-3 focus:outline-none focus:border-blue-500 transition">
                        </div>

                        <!-- Dropdown: Jenis Kendaraan -->
                        <div>
                            <label class="block text-xs font-medium text-gray-500 mb-1.5">Jenis Kendaraan</label>
                            <select class="w-full bg-gray-50 border border-gray-200 text-gray-700 text-sm rounded-lg px-4 py-3 focus:outline-none focus:border-blue-500 transition">
                                <option value="">Semua Jenis</option>
                                <option value="Mobil">Mobil</option>
                                <option value="Motor">Motor</option>
                            </select>
                        </div>

                        <!-- Button Submit -->
                        <div class="pt-4">
                            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 rounded-lg text-sm shadow-sm transition duration-150">
                                Tampilkan Rekap
                            </button>
                        </div>

                    </form>
                </div>

                <!-- INFO ALERT BOTTOM -->
                <div class="mt-6 flex items-center space-x-2 bg-blue-50 border border-blue-100 px-5 py-3 rounded-lg text-blue-600 text-xs">
                    <span class="w-2 h-2 rounded-full bg-blue-600 flex-shrink-0"></span>
                    <span>Pilih periode waktu dan klik "Tampilkan Rekap" untuk melihat data.</span>
                </div>

            </main>
        </div>
    </div>

</body>
</html>