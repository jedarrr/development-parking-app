<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('authentication.login');
});

Route::post('/login', 
[LoginController::class, 'authentication'])->name('login.submit');

Route::get('/authentication.logout', function () {
    return view('authentication.logout');
});

Route::post('/logout', 
[LoginController::class, 'logout'])->name('logout');


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
