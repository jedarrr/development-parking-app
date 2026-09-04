<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    public function index(Request $request)
    {
        $query = Kendaraan::with('user');

        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('plat_nomor', 'like', '%' . $request->search . '%')
                  ->orWhere('pemilik', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('jenis')) {
            $query->where('jenis_kendaraan', $request->jenis);
        }

        $kendaraans = $query->paginate(10);

        return view('admin.kendaraan', compact('kendaraans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'plat_nomor' => 'required|string|unique:kendaraan,plat_nomor',
            'jenis_kendaraan' => 'required|string',
            'warna' => 'required|string',
            'pemilik' => 'required|string',
        ]);

        Kendaraan::create([
            'plat_nomor' => $request->plat_nomor,
            'jenis_kendaraan' => $request->jenis_kendaraan,
            'warna' => $request->warna,
            'pemilik' => $request->pemilik,
            'id_user' => auth()->id() ?? 2,
        ]);

        return redirect()->back()->with('success', 'Data kendaraan berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $kendaraan = Kendaraan::findOrFail($id);

        $request->validate([
            'plat_nomor' => 'required|string|unique:kendaraan,plat_nomor,' . $id . ',id_kendaraan',
            'jenis_kendaraan' => 'required|string',
            'warna' => 'required|string',
            'pemilik' => 'required|string',
        ]);

        $kendaraan->update([
            'plat_nomor' => $request->plat_nomor,
            'jenis_kendaraan' => $request->jenis_kendaraan,
            'warna' => $request->warna,
            'pemilik' => $request->pemilik,
        ]);

        return redirect()->back()->with('success', 'Data kendaraan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        $kendaraan->delete();

        return redirect()->back()->with('success', 'Data kendaraan berhasil dihapus.');
    }
}
