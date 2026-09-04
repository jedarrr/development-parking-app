<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area Parkir - Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gray-100 font-sans antialiased" x-data="{ openAdd: false, openEdit: false, openDelete: false, editData: {}, deleteUrl: '' }">

    <div class="flex h-screen overflow-hidden">
        
        <!-- SIDEBAR -->
        <aside class="w-64 bg-blue-600 text-white flex flex-col justify-between p-6">
            <div>
                <h1 class="text-2xl font-bold tracking-wider uppercase mb-10">ADMIN</h1>
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
                    <a href="{{ route('admin.area-parkir') }}" class="flex items-center space-x-3 bg-blue-700 px-4 py-3 rounded-lg text-white font-medium shadow-sm">
                        <i class="fas fa-parking w-5"></i>
                        <span>Area Parkir</span>
                    </a>
                    <a href="{{ route('admin.kendaraan')}}" class="flex items-center space-x-3 text-blue-100 hover:bg-blue-700 px-4 py-3 rounded-lg font-medium transition">
                        <i class="fas fa-car w-5"></i>
                        <span>Kendaraan</span>
                    </a>
                    <a href="{{ route('admin.log-aktivitas')}}" class="flex items-center space-x-3 text-blue-100 hover:bg-blue-700 px-4 py-3 rounded-lg font-medium transition">
                        <i class="fas fa-history w-5"></i>
                        <span>Log Aktifitas</span>
                    </a>
                    <a href="{{ route('admin.settings') }}" class="flex items-center space-x-3 text-blue-100 hover:bg-blue-700 px-4 py-3 rounded-lg font-medium transition">
                        <i class="fas fa-cog w-5"></i>
                        <span>Settings</span>
                    </a>
                </nav>
            </div>
            <div>
                <a href="#" class="flex items-center space-x-3 text-blue-100 hover:text-white transition">
                    <i class="fas fa-sign-out-alt w-5"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>

        <!-- MAIN CONTENT -->
        <div class="flex-1 flex flex-col overflow-y-auto">
            
            <header class="flex justify-between items-center bg-white px-8 py-5 border-b border-gray-200">
                <h2 class="text-2xl font-bold text-gray-800">Area Parkir</h2>
                <div class="flex items-center space-x-6">
                    <button class="relative text-gray-500 hover:text-gray-700">
                        <i class="far fa-bell text-lg"></i>
                    </button>
                    <div class="flex items-center space-x-3">
                        <img src="https://ui-avatars.com/api/?name=Zahra+Cellyna&background=0D8ABC&color=fff" alt="User Avatar" class="w-9 h-9 rounded-full">
                        <div>
                            <p class="text-xs font-semibold text-gray-800">Zahra Cellyna</p>
                            <p class="text-[10px] text-gray-400">Admin</p>
                        </div>
                    </div>
                </div>
            </header>

            <main class="p-8">
                
                @if(session('success'))
                    <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg text-sm">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="flex justify-end mb-6">
                    <button @click="openAdd = true" class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-5 py-2.5 rounded-lg font-medium flex items-center space-x-2 shadow-sm transition">
                        <i class="fas fa-plus text-xs"></i>
                        <span>Tambah Area</span>
                    </button>
                </div>

                <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm border-collapse">
                            <thead>
                                <tr class="text-gray-600 border-b border-gray-200">
                                    <th class="py-4 px-4 font-semibold">No.</th>
                                    <th class="py-4 px-4 font-semibold">Nama Area</th>
                                    <th class="py-4 px-4 font-semibold">Kapasitas</th>
                                    <th class="py-4 px-4 font-semibold">Terisi</th>
                                    <th class="py-4 px-4 font-semibold text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 text-gray-700">
                                @forelse ($areas as $index => $area)
                                    <tr class="hover:bg-gray-50/50 transition">
                                        <td class="py-4 px-4">{{ $areas->firstItem() + $index }}</td>
                                        <td class="py-4 px-4 font-medium text-gray-800">{{ $area->nama_area }}</td>
                                        <td class="py-4 px-4">{{ $area->kapasitas }}</td>
                                        <td class="py-4 px-4 font-semibold {{ $area->terisi >= $area->kapasitas ? 'text-red-500' : 'text-blue-600' }}">
                                            {{ $area->terisi }}
                                        </td>
                                        <td class="py-4 px-4">
                                            <div class="flex items-center justify-center space-x-2">
                                                <button @click="editData = {{ json_encode($area) }}; openEdit = true" class="w-8 h-8 rounded-lg border border-blue-200 text-blue-600 hover:bg-blue-50 flex items-center justify-center transition">
                                                    <i class="fas fa-pencil-alt text-xs"></i>
                                                </button>
                                                <button @click="deleteUrl = '{{ route('admin.area-parkir.destroy', $area->id_area) }}'; openDelete = true" class="w-8 h-8 rounded-lg border border-red-200 text-red-500 hover:bg-red-50 flex items-center justify-center transition">
                                                    <i class="fas fa-trash-alt text-xs"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="py-6 text-center text-gray-400">Belum ada data area parkir.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6 pt-4 text-xs text-gray-400 flex justify-between items-center">
                        <span>Menampilkan {{ $areas->firstItem() ?? 0 }} - {{ $areas->lastItem() ?? 0 }} dari {{ $areas->total() }} data</span>
                        <div>{{ $areas->links() }}</div>
                    </div>
                </div>

            </main>
        </div>
    </div>

    <!-- MODAL TAMBAH AREA -->
    <div x-show="openAdd" class="fixed inset-0 bg-black/40 flex items-center justify-center z-50" x-cloak>
        <div class="bg-white rounded-xl p-6 w-full max-w-md shadow-lg">
            <h3 class="text-lg font-bold text-gray-800 mb-4">Tambah Area Parkir</h3>
            <form action="{{ route('admin.area-parkir.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1">Nama Area</label>
                    <input type="text" name="nama_area" placeholder="Contoh: A1" required class="w-full border border-gray-300 rounded-lg p-2.5 text-sm focus:ring-2 focus:ring-blue-500 outline-none">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1">Kapasitas</label>
                    <input type="number" name="kapasitas" placeholder="50" required class="w-full border border-gray-300 rounded-lg p-2.5 text-sm focus:ring-2 focus:ring-blue-500 outline-none">
                </div>
                <div class="flex justify-end space-x-2 pt-4">
                    <button type="button" @click="openAdd = false" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg text-sm">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm hover:bg-blue-700">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- MODAL EDIT AREA -->
    <div x-show="openEdit" class="fixed inset-0 bg-black/40 flex items-center justify-center z-50" x-cloak>
        <div class="bg-white rounded-xl p-6 w-full max-w-md shadow-lg">
            <h3 class="text-lg font-bold text-gray-800 mb-4">Edit Area Parkir</h3>
            <form :action="'/admin/area-parkir/' + editData.id_area" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1">Nama Area</label>
                    <input type="text" name="nama_area" x-model="editData.nama_area" required class="w-full border border-gray-300 rounded-lg p-2.5 text-sm focus:ring-2 focus:ring-blue-500 outline-none">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1">Kapasitas</label>
                    <input type="number" name="kapasitas" x-model="editData.kapasitas" required class="w-full border border-gray-300 rounded-lg p-2.5 text-sm focus:ring-2 focus:ring-blue-500 outline-none">
                </div>
                <div class="flex justify-end space-x-2 pt-4">
                    <button type="button" @click="openEdit = false" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg text-sm">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm hover:bg-blue-700">Perbarui</button>
                </div>
            </form>
        </div>
    </div>

    <!-- MODAL HAPUS AREA -->
    <div x-show="openDelete" class="fixed inset-0 bg-black/40 flex items-center justify-center z-50" x-cloak>
        <div class="bg-white rounded-xl p-6 w-full max-w-sm shadow-lg text-center">
            <h3 class="text-lg font-bold text-gray-800 mb-2">Hapus Area Parkir?</h3>
            <p class="text-xs text-gray-500 mb-6">Tindakan ini tidak dapat dibatalkan.</p>
            <form :action="deleteUrl" method="POST" class="flex justify-center space-x-2">
                @csrf
                @method('DELETE')
                <button type="button" @click="openDelete = false" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg text-sm">Batal</button>
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg text-sm hover:bg-red-700">Hapus</button>
            </form>
        </div>
    </div>

</body>
</html>