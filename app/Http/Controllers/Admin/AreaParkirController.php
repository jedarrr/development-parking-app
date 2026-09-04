<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AreaParkirController extends Controller
{
    public function index()
    {
        // Menghitung slot terisi secara real-time dari transaksi aktif (status = 'masuk')
        $areas = DB::table('area_parkir')
            ->leftJoin('transaksi', function ($join) {
                $join->on('area_parkir.id_area', '=', 'transaksi.id_area')
                     ->where('transaksi.status', '=', 'masuk');
            })
            ->select(
                'area_parkir.id_area',
                'area_parkir.nama_area',
                'area_parkir.kapasitas',
                DB::raw('COUNT(transaksi.id_parkir) as terisi')
            )
            ->groupBy('area_parkir.id_area', 'area_parkir.nama_area', 'area_parkir.kapasitas')
            ->orderBy('area_parkir.id_area', 'asc')
            ->paginate(10);

        return view('admin.area-parkir', compact('areas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_area' => 'required|string|max:50',
            'kapasitas' => 'required|integer|min:1',
        ]);

        DB::table('area_parkir')->insert([
            'nama_area' => $request->nama_area,
            'kapasitas' => $request->kapasitas,
            'terisi'    => 0,
        ]);

        return redirect()->back()->with('success', 'Area parkir berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_area' => 'required|string|max:50',
            'kapasitas' => 'required|integer|min:1',
        ]);

        DB::table('area_parkir')
            ->where('id_area', $id)
            ->update([
                'nama_area' => $request->nama_area,
                'kapasitas' => $request->kapasitas,
            ]);

        return redirect()->back()->with('success', 'Area parkir berhasil diperbarui!');
    }

    public function destroy($id)
    {
        DB::table('area_parkir')->where('id_area', $id)->delete();
        return redirect()->back()->with('success', 'Area parkir berhasil dihapus!');
    }
}