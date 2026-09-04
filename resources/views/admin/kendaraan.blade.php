<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kendaraan - Parking Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gray-100 font-sans antialiased" x-data="{ openAdd: false, openEdit: false, openDelete: false, editData: {}, deleteUrl: '' }">

    <div class="flex h-screen overflow-hidden">
        <aside class="w-64 bg-blue-600 text-white flex flex-col justify-between p-6">
            <div>
                <h1 class="text-2xl font-bold tracking-wider uppercase mb-10">ADMIN</h1>
                <nav class="space-y-2">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 text-blue-100 hover:bg-blue-700 px-4 py-3 rounded-lg font-medium transition">
                        <i class="fas fa-home w-5"></i><span>Home</span>
                    </a>
                    <a href="{{ route('admin.kendaraan') }}" class="flex items-center space-x-3 bg-blue-700 px-4 py-3 rounded-lg text-white font-medium shadow-sm">
                        <i class="fas fa-car w-5"></i><span>Kendaraan</span>
                    </a>
                </nav>
            </div>
        </aside>

        <div class="flex-1 flex flex-col overflow-y-auto">
            <main class="p-8">
                @if(session('success'))
                    <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg text-sm">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="flex justify-end mb-6">
                    <button @click="openAdd = true" class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-5 py-2.5 rounded-lg font-medium flex items-center space-x-2 shadow-sm transition">
                        <i class="fas fa-plus text-xs"></i>
                        <span>Tambah Kendaraan</span>
                    </button>
                </div>

                <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6">
                    <form method="GET" action="{{ route('admin.kendaraan') }}" class="flex flex-wrap items-center gap-4 mb-6">
                        <div class="relative flex-1 min-w-[240px]">
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari no plat atau pemilik" class="w-full border border-gray-200 text-xs rounded-lg pl-9 pr-4 py-2.5 focus:outline-none focus:border-blue-500">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400 text-xs"></i>
                        </div>
                        <div class="w-44">
                            <select name="jenis" onchange="this.form.submit()" class="w-full border border-gray-200 text-xs rounded-lg px-3 py-2.5 text-gray-600 bg-white focus:outline-none focus:border-blue-500">
                                <option value="">Semua Jenis</option>
                                <option value="mobil" {{ request('jenis') == 'mobil' ? 'selected' : '' }}>Mobil</option>
                                <option value="motor" {{ request('jenis') == 'motor' ? 'selected' : '' }}>Motor</option>
                                <option value="Lainnya" {{ request('jenis') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                        </div>
                    </form>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm border-collapse">
                            <thead>
                                <tr class="text-gray-600 border-b border-gray-200">
                                    <th class="py-4 px-4 font-semibold">No.</th>
                                    <th class="py-4 px-4 font-semibold">Plat Nomor</th>
                                    <th class="py-4 px-4 font-semibold">Jenis</th>
                                    <th class="py-4 px-4 font-semibold">Warna</th>
                                    <th class="py-4 px-4 font-semibold">Pemilik</th>
                                    <th class="py-4 px-4 font-semibold text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 text-gray-700">
                                @forelse ($kendaraans as $index => $item)
                                    <tr class="hover:bg-gray-50/50 transition">
                                        <td class="py-4 px-4">{{ $kendaraans->firstItem() + $index }}</td>
                                        <td class="py-4 px-4 font-medium text-gray-800">{{ $item->plat_nomor }}</td>
                                        <td class="py-4 px-4 capitalize">{{ $item->jenis_kendaraan }}</td>
                                        <td class="py-4 px-4">{{ $item->warna }}</td>
                                        <td class="py-4 px-4">{{ $item->pemilik }}</td>
                                        <td class="py-4 px-4">
                                            <div class="flex items-center justify-center space-x-2">
                                                <button @click="editData = {{ json_encode($item) }}; openEdit = true" class="w-8 h-8 rounded-lg border border-blue-200 text-blue-600 hover:bg-blue-50 flex items-center justify-center transition">
                                                    <i class="fas fa-pencil-alt text-xs"></i>
                                                </button>
                                                <button @click="deleteUrl = '{{ route('admin.kendaraan.destroy', $item->id_kendaraan) }}'; openDelete = true" class="w-8 h-8 rounded-lg border border-red-200 text-red-500 hover:bg-red-50 flex items-center justify-center transition">
                                                    <i class="fas fa-trash-alt text-xs"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="py-6 text-center text-gray-400">Belum ada data kendaraan.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6 pt-4 text-xs text-gray-400 flex justify-between items-center">
                        <span>Menampilkan {{ $kendaraans->firstItem() ?? 0 }} - {{ $kendaraans->lastItem() ?? 0 }} dari {{ $kendaraans->total() }} data</span>
                        <div>{{ $kendaraans->links() }}</div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- MODAL TAMBAH -->
    <div x-show="openAdd" class="fixed inset-0 bg-black/40 flex items-center justify-center z-50" x-cloak>
        <div class="bg-white rounded-xl p-6 w-full max-w-md shadow-lg">
            <h3 class="text-lg font-bold text-gray-800 mb-4">Tambah Kendaraan</h3>
            <form action="{{ route('admin.kendaraan.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1">Plat Nomor</label>
                    <input type="text" name="plat_nomor" placeholder="Contoh: B 1234 ABC" required class="w-full border border-gray-300 rounded-lg p-2.5 text-sm outline-none">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1">Jenis Kendaraan</label>
                    <select name="jenis_kendaraan" required class="w-full border border-gray-300 rounded-lg p-2.5 text-sm outline-none">
                        <option value="mobil">Mobil</option>
                        <option value="motor">Motor</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1">Warna</label>
                    <input type="text" name="warna" placeholder="Contoh: Hitam" required class="w-full border border-gray-300 rounded-lg p-2.5 text-sm outline-none">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1">Pemilik</label>
                    <input type="text" name="pemilik" placeholder="Nama Pemilik" required class="w-full border border-gray-300 rounded-lg p-2.5 text-sm outline-none">
                </div>
                <div class="flex justify-end space-x-2 pt-4">
                    <button type="button" @click="openAdd = false" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg text-sm">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm hover:bg-blue-700">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- MODAL EDIT -->
    <div x-show="openEdit" class="fixed inset-0 bg-black/40 flex items-center justify-center z-50" x-cloak>
        <div class="bg-white rounded-xl p-6 w-full max-w-md shadow-lg">
            <h3 class="text-lg font-bold text-gray-800 mb-4">Edit Kendaraan</h3>
            <form :action="'/admin/kendaraan/' + editData.id_kendaraan" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1">Plat Nomor</label>
                    <input type="text" name="plat_nomor" x-model="editData.plat_nomor" required class="w-full border border-gray-300 rounded-lg p-2.5 text-sm outline-none">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1">Jenis Kendaraan</label>
                    <select name="jenis_kendaraan" x-model="editData.jenis_kendaraan" required class="w-full border border-gray-300 rounded-lg p-2.5 text-sm outline-none">
                        <option value="mobil">Mobil</option>
                        <option value="motor">Motor</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1">Warna</label>
                    <input type="text" name="warna" x-model="editData.warna" required class="w-full border border-gray-300 rounded-lg p-2.5 text-sm outline-none">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1">Pemilik</label>
                    <input type="text" name="pemilik" x-model="editData.pemilik" required class="w-full border border-gray-300 rounded-lg p-2.5 text-sm outline-none">
                </div>
                <div class="flex justify-end space-x-2 pt-4">
                    <button type="button" @click="openEdit = false" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg text-sm">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm hover:bg-blue-700">Perbarui</button>
                </div>
            </form>
        </div>
    </div>

    <!-- MODAL HAPUS -->
    <div x-show="openDelete" class="fixed inset-0 bg-black/40 flex items-center justify-center z-50" x-cloak>
        <div class="bg-white rounded-xl p-6 w-full max-w-sm shadow-lg text-center">
            <h3 class="text-lg font-bold text-gray-800 mb-2">Hapus Kendaraan?</h3>
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