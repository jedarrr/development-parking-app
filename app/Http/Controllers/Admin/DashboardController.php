<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Stat Cards Data
        $totalArea = DB::table('area_parkir')->count();
        $totalKendaraan = DB::table('kendaraan')->count();
        
        $parkirHariIni = DB::table('transaksi')
            ->whereDate('waktu_masuk', Carbon::today())
            ->count();

        $pendapatanHariIni = DB::table('transaksi')
            ->whereDate('waktu_keluar', Carbon::today())
            ->sum('biaya_total');

        // Persentase kenaikan pendapatan dari kemarin
        $pendapatanKemarin = DB::table('transaksi')
            ->whereDate('waktu_keluar', Carbon::yesterday())
            ->sum('biaya_total');

        $persenKenaikan = 0;
        if ($pendapatanKemarin > 0) {
            $persenKenaikan = (($pendapatanHariIni - $pendapatanKemarin) / $pendapatanKemarin) * 100;
        }

        // 2. Kendaraan Aktif (Status 'masuk' / belum keluar)
        $kendaraanAktif = DB::table('transaksi')
            ->where('status', 'masuk')
            ->count();

        // 3. Tabel Parkir Terbaru (Menggunakan relasi FK: id_kendaraan & id_area)
        $parkirTerbaru = DB::table('transaksi')
            ->join('kendaraan', 'transaksi.id_kendaraan', '=', 'kendaraan.id_kendaraan')
            ->leftJoin('area_parkir', 'transaksi.id_area', '=', 'area_parkir.id_area')
            ->select(
                'transaksi.*',
                'kendaraan.plat_nomor',
                'kendaraan.jenis_kendaraan',
                'area_parkir.nama_area'
            )
            ->orderBy('transaksi.waktu_masuk', 'desc')
            ->limit(5)
            ->get();

        // 4. Data Chart (7 Hari Terakhir)
        $chartLabels = [];
        $chartData = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $chartLabels[] = $date->isoFormat('ddd');
            
            $count = DB::table('transaksi')
                ->whereDate('waktu_masuk', $date->format('Y-m-d'))
                ->count();
                
            $chartData[] = $count;
        }

        return view('admin.dashboard', compact(
            'totalArea',
            'totalKendaraan',
            'parkirHariIni',
            'pendapatanHariIni',
            'persenKenaikan',
            'kendaraanAktif',
            'parkirTerbaru',
            'chartLabels',
            'chartData'
        ));
    }
}