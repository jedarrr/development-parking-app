<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    
    public function showLoginForm()
    {
        return view('authentication.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        // Cari user berdasarkan username dan status_aktif
        $user = User::where('username', $request->username)
                    ->where('status_aktif', 1)
                    ->first();

        if ($user) {
            $passwordIsValid = false;

            // 1. Cek jika password di DB sudah menggunakan Hash/Bcrypt
            if (Hash::needsRehash($user->password)) {
                // Jika password di DB berupa Plain Text / bukan Hash Bcrypt valid
                if ($user->password === $request->password) {
                    // Password Plain Text COCOK! Langsung Hash & Simpan ke DB secara otomatis
                    $user->password = Hash::make($request->password);
                    $user->save(); // Otomatis meng-update kolom password di database

                    $passwordIsValid = true;
                }
            } else {
                // Jika password di DB sudah berupa Hash Bcrypt
                if (Hash::check($request->password, $user->password)) {
                    $passwordIsValid = true;
                }
            }

            // 2. Jika Password Valid (Baik via Hash atau Plain Text yang baru saja di-hash)
            if ($passwordIsValid) {
                Auth::login($user);
                $request->session()->regenerate();

                // Redirect sesuai role
                return match ($user->role) {
                    'admin'   => redirect()->intended(route('admin.dashboard-admin')),
                    'owner'   => redirect()->intended(route('owner.dashboard'-owner)),
                    // 'petugas' => redirect()->intended(route('petugas.dashboard')),
                    default   => redirect('/'),
                };
            }
        }

        // Jika username tidak ditemukan atau password salah
        return back()->withErrors([
            'username' => 'Username atau password yang dimasukkan salah.',
        ])->onlyInput('username');
    }
}