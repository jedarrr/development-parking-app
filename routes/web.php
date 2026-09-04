<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AreaParkirController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\KendaraanController;
use Illuminate\Support\Facades\Route;

// Redirect awal disesuaikan status login
Route::get('/', function () {
    if (auth()->check()) {
        $role = auth()->user()->role;
        return match ($role) {
            'admin'   => redirect()->route('admin.dashboard'),
            'petugas' => redirect()->route('petugas.dashboard'),
            'owner'   => redirect()->route('owner.dashboard'),
            default   => redirect()->route('authentication.login'),
        };
    }
    return redirect()->route('authentication.login');
});

// Guest Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('authentication.login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.submit');
});

// Auth Routes
Route::middleware('auth')->group(function () {
    
    // Logout Route
    Route::post('/logout', [LoginController::class, 'logout'])->name('authentication.logout');

    // Admin Routes
    Route::middleware('role:admin')->prefix('admin')->as('admin.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        
        // Perbaikan: /user (bukan /admin/user) dan name 'user' agar menjadi 'admin.user'
        Route::get('/user', [UserController::class, 'index'])->name('user');
        Route::post('/user', [UserController::class, 'store'])->name('user.store');
        Route::patch('/user/{id}/toggle', [UserController::class, 'toggleStatus'])->name('user.toggle');
        Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
        
        Route::get('/tarif-parkir', function () { return view('admin.tarif-parkir'); })->name('tarif-parkir');

        Route::get('/area-parkir', [AreaParkirController::class, 'index'])->name('area-parkir');
        Route::post('/area-parkir', [AreaParkirController::class, 'store'])->name('area-parkir.store');
        Route::put('/area-parkir/{id}', [AreaParkirController::class, 'update'])->name('area-parkir.update');
        Route::delete('/area-parkir/{id}', [AreaParkirController::class, 'destroy'])->name('area-parkir.destroy');

        Route::get('/kendaraan', [KendaraanController::class, 'index'])->name('kendaraan');
        Route::post('/kendaraan', [KendaraanController::class, 'store'])->name('kendaraan.store');
        Route::put('/kendaraan/{id}', [KendaraanController::class, 'update'])->name('kendaraan.update');
        Route::delete('/kendaraan/{id}', [KendaraanController::class, 'destroy'])->name('kendaraan.destroy');

        Route::get('/log-aktivitas', function () { return view('admin.log-aktivitas'); })->name('log-aktivitas');
        Route::get('/settings', function () { return view('admin.settings'); })->name('settings');
    });

    // Petugas Routes
    Route::middleware('role:petugas')->prefix('petugas')->as('petugas.')->group(function () {
        Route::get('/dashboard', function () {
            return view('petugas.dashboard');
        })->name('dashboard');
    });

    // Owner Routes
    Route::middleware('role:owner')->prefix('owner')->as('owner.')->group(function () {
        Route::get('/dashboard', function () {
            return view('owner.dashboard');
        })->name('dashboard');
    });

});