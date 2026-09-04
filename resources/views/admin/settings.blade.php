<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings Parking Admin</title>
    <!-- Hubungkan ke aset Tailwind Laravel via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Font Awesome untuk Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-white text-gray-900">

<div class="flex min-h-screen">


    <!-- SIDEBAR -->
        <aside class="w-64 bg-blue-600 text-white flex flex-col justify-between p-6">
            <div>
                <!-- Logo / Title -->
                <h1 class="text-2xl font-bold tracking-wider uppercase mb-10">ADMIN</h1>

                <!-- Navigation Menu -->
                <nav class="space-y-2">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 text-blue-100 hover:bg-blue-700 px-4 py-3 rounded-lg font-medium transition">
                        <i class="fas fa-home w-5"></i>
                        <span>Home</span>
                    </a>
                    <a href="{{ route('admin.user') }}" class="flex items-center space-x-3 text-blue-100 hover:bg-blue-700 px-4 py-3 rounded-lg font-medium transition">
                        <i class="fas fa-users-cog w-5"></i>
                        <span>User</span>
                    </a>
                    <a href="{{ route('admin.tarif-parkir') }}" class="flex items-center space-x-3 text-blue-100 hover:bg-blue-700 px-4 py-3 rounded-lg font-medium transition">
                        <i class="fas fa-file-invoice-dollar w-5"></i>
                        <span>Tarif Parkir</span>
                    </a>
                    <a href="{{ route('admin.area-parkir') }}" class="flex items-center space-x-3 text-blue-100 hover:bg-blue-700 px-4 py-3 rounded-lg font-medium transition">
                        <i class="fas fa-parking w-5"></i>
                        <span>Area Parkir</span>
                    </a>
                    <a href="{{ route('admin.kendaraan') }}" class="flex items-center space-x-3 text-blue-100 hover:bg-blue-700 px-4 py-3 rounded-lg font-medium transition">
                        <i class="fas fa-car w-5"></i>
                        <span>Kendaraan</span>
                    </a>
                    <a href="{{ route('admin.log-aktivitas') }}" class="flex items-center space-x-3 text-blue-100 hover:bg-blue-700 px-4 py-3 rounded-lg font-medium transition">
                        <i class="fas fa-history w-5"></i>
                        <span>Log Aktifitas</span>
                    </a>
                    <a href="{{ route('admin.settings') }}" class="flex items-center space-x-3 bg-blue-700 px-4 py-3 rounded-lg text-white font-medium shadow-sm">
                        <i class="fas fa-cog w-5"></i>
                        <span>Settings</span>
                    </a>
                </nav>
            </div>

            <!-- Logout Button -->
            <div>
                <a href="{{ route('authentication.logout') }}" class="flex items-center space-x-3 text-blue-100 hover:text-white transition">
                    <i class="fas fa-sign-out-alt w-5"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>


    {{-- =========================================================
         MAIN CONTENT
    ========================================================== --}}
    <main class="min-w-0 flex-1">


        {{-- =====================================================
             HEADER
        ====================================================== --}}
        <header class="flex h-[80px] items-center justify-between px-12">

            {{-- Title --}}
            <h2 class="text-[23px] font-semibold">
                Settings
            </h2>


            {{-- Right Header --}}
            <div class="flex items-center gap-6">

                {{-- Notification --}}
                <button
                    type="button"
                    class="text-gray-800 transition hover:text-blue-600"
                >
                    <i class="fas fa-bell text-[18px]"></i>
                </button>


                {{-- Admin --}}
                <div class="flex items-center gap-3">

                    <img
                        src="https://i.pravatar.cc/100?img=47"
                        alt="Zahra Cellyna"
                        class="h-10 w-10 rounded-full object-cover"
                    >

                    <div class="leading-tight">

                        <p class="text-[13px] font-semibold">
                            Zahra Cellyna
                        </p>

                        <p class="mt-1 text-[10px] text-gray-400">
                            Admin
                        </p>

                    </div>

                </div>

            </div>

        </header>



        {{-- =====================================================
             CONTENT
        ====================================================== --}}
        <section class="px-12 pb-10">

            {{-- Cards --}}
            <div class="mt-2 flex items-start gap-14">


                {{-- =================================================
                     PROFIL ADMIN
                ================================================== --}}
                <div
                    class="w-[390px] rounded-xl border border-gray-200 bg-white p-7"
                >

                    {{-- Title --}}
                    <h3 class="text-[15px] font-semibold">
                        Profil admin
                    </h3>


                    {{-- Profile Information --}}
                    <div class="mt-7 flex items-center gap-8">

                        {{-- Photo --}}
                        <div class="shrink-0 text-center">

                            <img
                                src="https://i.pravatar.cc/150?img=47"
                                alt="Zahra Cellyna"
                                class="h-[70px] w-[70px] rounded-full object-cover"
                            >

                            <p class="mt-2 text-[10px] text-gray-500">
                                Admin
                            </p>

                        </div>


                        {{-- Information --}}
                        <div>

                            <h4 class="text-[16px] font-semibold">
                                Zahra Cellyna
                            </h4>

                            <p class="mt-1 text-[10px] text-gray-400">
                                zahra.cell@gmail.com
                            </p>

                            <button
                                type="button"
                                class="mt-5 rounded-md bg-blue-600 px-5 py-2 text-[10px] font-medium text-white transition hover:bg-blue-700"
                            >
                                Edit Profil
                            </button>

                        </div>

                    </div>



                    {{-- =================================================
                         NOTIFIKASI
                    ================================================== --}}
                    <div class="mt-10">

                        <h3 class="text-[15px] font-semibold">
                            Nontifikasi
                        </h3>


                        <div class="mt-7 space-y-6">


                            {{-- Notifikasi Parkir Masuk --}}
                            <div class="flex items-center justify-between">

                                <span class="text-[10px] text-gray-700">
                                    Nontifikasi Parkir Masuk
                                </span>

                                <label class="relative inline-flex cursor-pointer">

                                    <input
                                        type="checkbox"
                                        class="peer sr-only"
                                        checked
                                    >

                                    <div
                                        class="h-4 w-8 rounded-full bg-gray-300
                                        after:absolute after:left-[2px] after:top-[2px]
                                        after:h-3 after:w-3 after:rounded-full
                                        after:bg-white after:transition-all
                                        peer-checked:bg-blue-600
                                        peer-checked:after:translate-x-4"
                                    ></div>

                                </label>

                            </div>


                            {{-- Notifikasi Parkir Keluar --}}
                            <div class="flex items-center justify-between">

                                <span class="text-[10px] text-gray-700">
                                    Nontifikasi Parkir Keluar
                                </span>

                                <label class="relative inline-flex cursor-pointer">

                                    <input
                                        type="checkbox"
                                        class="peer sr-only"
                                        checked
                                    >

                                    <div
                                        class="h-4 w-8 rounded-full bg-gray-300
                                        after:absolute after:left-[2px] after:top-[2px]
                                        after:h-3 after:w-3 after:rounded-full
                                        after:bg-white after:transition-all
                                        peer-checked:bg-blue-600
                                        peer-checked:after:translate-x-4"
                                    ></div>

                                </label>

                            </div>


                            {{-- Laporan Harian --}}
                            <div class="flex items-center justify-between">

                                <span class="text-[10px] text-gray-700">
                                    Laporan Harian
                                </span>

                                <label class="relative inline-flex cursor-pointer">

                                    <input
                                        type="checkbox"
                                        class="peer sr-only"
                                        checked
                                    >

                                    <div
                                        class="h-4 w-8 rounded-full bg-gray-300
                                        after:absolute after:left-[2px] after:top-[2px]
                                        after:h-3 after:w-3 after:rounded-full
                                        after:bg-white after:transition-all
                                        peer-checked:bg-blue-600
                                        peer-checked:after:translate-x-4"
                                    ></div>

                                </label>

                            </div>


                            {{-- Kapasitas --}}
                            <div class="flex items-center justify-between">

                                <span class="text-[10px] text-gray-700">
                                    Peringatan Kapasitas Penuh
                                </span>

                                <label class="relative inline-flex cursor-pointer">

                                    <input
                                        type="checkbox"
                                        class="peer sr-only"
                                        checked
                                    >

                                    <div
                                        class="h-4 w-8 rounded-full bg-gray-300
                                        after:absolute after:left-[2px] after:top-[2px]
                                        after:h-3 after:w-3 after:rounded-full
                                        after:bg-white after:transition-all
                                        peer-checked:bg-blue-600
                                        peer-checked:after:translate-x-4"
                                    ></div>

                                </label>

                            </div>

                        </div>

                    </div>

                </div>



                {{-- =================================================
                     KEAMANAN
                ================================================== --}}
                <div
                    class="w-[300px] rounded-xl border border-gray-200 bg-white p-7"
                >

                    <h3 class="text-[15px] font-semibold">
                        Keamanan
                    </h3>


                    {{-- Ubah Password --}}
                    <button
                        type="button"
                        class="mt-7 flex h-9 w-full items-center gap-3 rounded-md border border-gray-200 bg-gray-50 px-4 text-[10px] text-blue-600 transition hover:bg-blue-50"
                    >

                        <i class="fas fa-lock text-[12px]"></i>

                        <span>
                            Ubah Password
                        </span>

                    </button>


                    {{-- Kelola Akun --}}
                    <button
                        type="button"
                        class="mt-3 flex h-9 w-full items-center gap-3 rounded-md border border-gray-200 bg-gray-50 px-4 text-[10px] text-blue-600 transition hover:bg-blue-50"
                    >

                        <i class="fas fa-user-plus text-[12px]"></i>

                        <span>
                            Kelola Akun Pengguna
                        </span>

                    </button>

                </div>

            </div>

        </section>

    </main>

</div>

</body>
</html>