<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

// Redirect root ke login
Route::redirect('/', '/login');

// Auth Routes (Guest Only)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});


// Route::get('/admin.dashboard-admin', function () {
//     return view('admin.dashboard-admin');
// })->name('halaman.admin');

// Route::get('/admin.user', function () {
//     return view('admin.user');
// })->name('halaman.user');

// Route::get('/admin.tarif-parkir', function () {
//     return view('admin.tarif-parkir');
// })->name('halaman.tarif-parkir');

// Route::get('/admin.area-parkir', function () {
//     return view('admin.area-parkir');
// })->name('halaman.area-parkir');

// Route::get('/admin.kendaraan', function () {
//     return view('admin.kendaraan');
// })->name('halaman.kendaraan');

// Route::get('/owner.dashboard-owner', function () {
//     return view('owner.dashboard-owner');
// })->name('halaman.owner');

// Route::get('/owner.rekap-transaksi', function () {
//     return view('owner.rekap-transaksi');
// })->name('halaman.rekap-transaksi');

// Route::get('/owner.rekap-transaksi-detail', function () {
//     return view('owner.rekap-transaksi-detail');
// })->name('halaman.rekap-transaksi-detail');

// Route::get('/admin.log-aktivitas', function () {
//     return view('admin.log-aktivitas');
// })->name('halaman.log-aktivitas');

// Route::get('/admin.settings', function () {
//     return view('admin.settings');
// })->name('halaman.settings');

// Route::get('/petugas.dashboard-petugas', function () {
//     return view('petugas.dashboard-petugas');
// })->name('halaman.petugas');

// Route::get('/petugas.cetak-struk-parkir', function () {
//     return view('petugas.cetak-struk-parkir');
// })->name('halaman.cetak-struk-parkir');

// Route::get('/petugas.preview-cetak-struk-parkir', function () {
//     return view('petugas.preview-cetak-struk-parkir');
// })->name('halaman.preview-cetak-struk-parkir');

// Route::get('/petugas.transaksi-pembayaran-parkir', function () {
//     return view('petugas.transaksi-pembayaran-parkir');
// })->name('halaman.transaksi-pembayaran-parkir');
