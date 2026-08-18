<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout Parking</title>
    <!-- Load Tailwind via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full flex items-center justify-center bg-[#1E1E1E] antialiased p-4">

    <!-- Backdrop / Background Gelap di Figma -->
    <div class="fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center p-4">
        
        <!-- Box Modal Konfirmasi -->
        <div class="w-full max-w-[400px] bg-white rounded-2xl p-6 text-center shadow-xl transform transition-all">
            
            <!-- Icon Peringatan (Kuning) -->
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-amber-50 mb-4">
                <svg class="h-6 w-6 text-amber-500" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
            </div>

            <!-- Teks Judul & Deskripsi -->
            <h3 class="text-base font-semibold text-gray-900 mb-1">Yakin ingin keluar?</h3>
            <p class="text-xs text-gray-500 mb-6">Anda perlu login ulang untuk akses kembali.</p>

            <!-- Tombol Aksi -->
            <div class="grid grid-cols-2 gap-3">
                <!-- Tombol Batal -->
                <button type="button" onclick="history.back()"
                    class="w-full inline-flex justify-center rounded-xl border border-gray-300 bg-white px-4 py-2.5 text-xs font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 transition-colors">
                    Batal
                </button>

                <!-- Tombol Logout (Form POST demi keamanan session) -->
                <form action="{{ route('logout') }}" method="POST" class="w-full">
                    @csrf
                    <button type="submit"
                        class="w-full inline-flex justify-center rounded-xl border border-transparent bg-red-600 px-4 py-2.5 text-xs font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-colors">
                        Logout
                    </button>
                </form>
            </div>

        </div>
    </div>

</body>
</html>
