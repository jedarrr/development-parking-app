<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Parking</title>
    @vite('resources/css/app.css')
</head>

<body>

  <div class="relative flex min-h-screen items-center justify-center bg-gradient-to-b from-[#1b3c73] via-[#0b1b3d] to-[#030712] px-4 overflow-hidden font-sans">
    
    <!-- Ornamen Bintang Latar Belakang -->
    <div class="absolute top-[-5%] left-[-5%] text-[#254b8c] opacity-40 select-none">
        <svg class="w-48 h-48 md:w-64 md:h-64 fill-current" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.4 8.168L12 18.896l-7.334 3.857 1.4-8.168L.132 9.21l8.2-1.192z"/></svg>
    </div>
    <div class="absolute top-[-5%] right-[-5%] text-[#254b8c] opacity-40 select-none">
        <svg class="w-48 h-48 md:w-64 md:h-64 fill-current" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.4 8.168L12 18.896l-7.334 3.857 1.4-8.168L.132 9.21l8.2-1.192z"/></svg>
    </div>
    <div class="absolute bottom-[-5%] left-[-5%] text-[#254b8c] opacity-40 select-none">
        <svg class="w-48 h-48 md:w-64 md:h-64 fill-current" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.4 8.168L12 18.896l-7.334 3.857 1.4-8.168L.132 9.21l8.2-1.192z"/></svg>
    </div>
    <div class="absolute bottom-[-5%] right-[-5%] text-[#254b8c] opacity-40 select-none">
        <svg class="w-48 h-48 md:w-64 md:h-64 fill-current" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.4 8.168L12 18.896l-7.334 3.857 1.4-8.168L.132 9.21l8.2-1.192z"/></svg>
    </div>

    <!-- Kartu Pendaftaran (Glassmorphism) -->
    <div class="relative w-full max-w-md rounded-3xl border border-white/10 bg-white/5 p-8 md:p-10 text-white shadow-2xl backdrop-blur-xl">
        <h2 class="mb-8 text-center text-2xl font-bold tracking-wider text-white">SIGN UP</h2>
        
        <form action="/register-proses" method="POST" class="space-y-5">
            @csrf
            
            <!-- Input Nama -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-300 mb-2">Your Name</label>
                <input type="text" id="name" name="name" placeholder="Your Name" 
                    class="w-full rounded-xl border border-white/10 bg-[#253759]/40 px-4 py-3 text-sm text-white placeholder-gray-500 outline-none transition focus:border-blue-500 focus:bg-[#253759]/60">
            </div>

            <!-- Input Email / Phone -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email or Phone</label>
                <input type="text" id="email" name="email" placeholder="Email or Phone" 
                    class="w-full rounded-xl border border-white/10 bg-[#253759]/40 px-4 py-3 text-sm text-white placeholder-gray-500 outline-none transition focus:border-blue-500 focus:bg-[#253759]/60">
            </div>

            <!-- Input Password -->
            <div class="relative">
                <label for="password" class="block text-sm font-medium text-gray-300 mb-2">Password</label>
                <div class="relative">
                    <input type="password" id="password" name="password" placeholder="Password" 
                        class="w-full rounded-xl border border-white/10 bg-[#253759]/40 pl-4 pr-10 py-3 text-sm text-white placeholder-gray-500 outline-none transition focus:border-blue-500 focus:bg-[#253759]/60">
                    <!-- Ikon Sembunyikan Password -->
                    <button type="button" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-white">
                        <svg xmlns="http://w3.org" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                        </svg>
                    </button>
                </div>
                <div class="mt-2 text-right">
                    <a href="#" class="text-xs text-blue-400 hover:underline">Forgot password?</a>
                </div>
            </div>

            <!-- Tombol Submit -->
            <div class="pt-2">
                <button type="submit" class="w-full rounded-xl bg-[#254b8c] py-3 text-sm font-semibold tracking-wide text-white transition hover:bg-[#1e3d73] shadow-lg shadow-blue-900/40">
                    SIGN UP
                </button>
            </div>
        </form>

        <!-- Bagian Pendaftaran Sosial Media -->
        <div class="mt-6 text-center">
            <span class="text-xs text-gray-400">or sign in with</span>
            <div class="mt-4 flex justify-center space-x-4">
                <!-- Tombol Google -->
                <button class="flex h-8 w-8 items-center justify-center rounded-full bg-white transition hover:scale-105">
                    <svg class="h-4 w-4" viewBox="0 0 24 24">
                        <path fill="#EA4335" d="M12.24 10.285V14.4h6.887c-.648 2.41-2.519 4.114-5.136 4.114A5.79 5.79 0 0 1 8.2 12.725a5.79 5.79 0 0 1 5.79-5.79c1.496 0 2.87.55 3.93 1.565l3.23-3.23A9.94 9.94 0 0 0 13.99 2.025a9.98 9.98 0 0 0-9.98 9.98 9.98 0 0 0 9.98 9.98c5.44 0 9.87-4.32 9.87-9.87 0-.61-.06-1.22-.17-1.83H12.24Z"/>
                    </svg>
                </button>
                <!-- Tombol Apple -->
                <button class="flex h-8 w-8 items-center justify-center rounded-full bg-white transition hover:scale-105">
                    <svg class="h-4 w-4" fill="black" viewBox="0 0 24 24">
                        <path d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.81-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M15.97 4.17c.66-.81 1.11-1.93.99-3.06-1 .04-2.21.67-2.93 1.49-.62.69-1.16 1.84-1.01 2.96 1.12.09 2.27-.57 2.95-1.39z"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>

</body>
</html>