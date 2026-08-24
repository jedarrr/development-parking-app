<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak-Struk-Parkir Petugas</title>
    
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
            <header class="flex justify-between items-center bg-white px-8 py-5 border-b border-gray-200">
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
            <main class="p-8 flex justify-center items-start">
                
                <!-- CARD FORM -->
                <div class="w-full max-w-2xl bg-white rounded-2xl border border-gray-200 shadow-xs p-8 mt-4">
                    
                    <h3 class="text-base font-bold text-gray-800 text-center mb-8">Data Kendaraan</h3>

                    <form action="#" method="POST" class="space-y-6 max-w-md mx-auto">
                        @csrf

                        <!-- Field 1: No. Plat -->
                        <div>
                            <label for="no_plat" class="block text-xs font-semibold text-gray-700 mb-2">No. Plat</label>
                            <input type="text" id="no_plat" name="no_plat" placeholder="Contoh: KT 1234 AB" 
                                   class="w-full border border-gray-300 text-xs rounded-lg px-4 py-3 focus:outline-none focus:border-blue-600 text-gray-700 transition placeholder-gray-400" required>
                        </div>

                        <!-- Field 2: Jenis Kendaraan -->
                        <div>
                            <label for="jenis_kendaraan" class="block text-xs font-semibold text-gray-700 mb-2">Jenis Kendaraan</label>
                            <div class="relative">
                                <select id="jenis_kendaraan" name="jenis_kendaraan" 
                                        class="w-full border border-gray-300 text-xs rounded-lg px-4 py-3 focus:outline-none focus:border-blue-600 text-gray-500 appearance-none bg-white transition" required>
                                    <option value="" disabled selected>Pilih jenis kendaraan</option>
                                    <option value="Motor" class="text-gray-700">Motor</option>
                                    <option value="Mobil" class="text-gray-700">Mobil</option>
                                    <option value="Lainnya" class="text-gray-700">Lainnya</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-400">
                                    <i class="fas fa-chevron-down text-xs"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Field 3: Waktu Masuk -->
                        <div>
                            <label for="waktu_masuk" class="block text-xs font-semibold text-gray-700 mb-2">Waktu Masuk</label>
                            <div class="relative">
                                <input type="text" id="waktu_masuk" name="waktu_masuk" placeholder="dd/mm/yyyy" onfocus="(this.type='datetime-local')" onblur="(this.type='text')"
                                       class="w-full border border-gray-300 text-xs rounded-lg pl-4 pr-10 py-3 focus:outline-none focus:border-blue-600 text-gray-700 transition placeholder-gray-400" required>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-400">
                                    <i class="far fa-calendar text-sm"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-4 text-center">
                            <button type="submit" 
                                    class="w-full max-w-xs bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 rounded-lg text-xs shadow-sm transition duration-150">
                                Cetak Struk
                            </button>
                        </div>

                    </form>

                </div>

            </main>
        </div>
    </div>

</body>
</html>