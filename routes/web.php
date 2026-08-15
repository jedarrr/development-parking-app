<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('register');
});

Route::post('/login-proses', 
[AuthController::class, 'loginProses'])->name('login.proses');

Route::get('/admin.dashboard-admin', function () {
    return view('admin.dashboard-admin');
});

Route::get('/admin.user', function () {
    return view('admin.user');
});

Route::get('/admin.tarif-parkir', function () {
    return view('admin.tarif-parkir');
});

Route::get('/admin.area-parkir', function () {
    return view('admin.area-parkir');
});

Route::get('/admin.kendaraan', function () {
    return view('admin.kendaraan');
});

Route::get('/owner.dashboard-owner', function () {
    return view('owner.dashboard-owner');
});

Route::get('/owner.rekap-transaksi', function () {
    return view('owner.rekap-transaksi');
});

Route::get('/owner.rekap-transaksi-detail', function () {
    return view('owner.rekap-transaksi-detail');
});
