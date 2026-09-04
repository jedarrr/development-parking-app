<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ActivityLog; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Menampilkan halaman Manajemen User
     */
    public function index(Request $request)
    {
        // 1. Ambil Query Pencarian
        $search = $request->input('search');

        // 2. Query Data Table dengan Filter Search & Pagination (Gunakan id_user)
        $users = User::query()
            ->when($search, function ($query, $search) {
                $query->where('nama_lengkap', 'like', "%{$search}%")
                      ->orWhere('username', 'like', "%{$search}%");
            })
            ->orderBy('id_user', 'desc')
            ->paginate(10);

        // 3. Data Statistik Top Cards
        $totalUser    = User::count();
        $userAktif    = User::where('status_aktif', 1)->count();
        $userNonaktif = User::where('status_aktif', 0)->count();
        
        // Menghitung user baru berdasarkan 5 id_user terakhir
        $userBaru = User::orderBy('id_user', 'desc')->take(5)->count();

        // 4. Data Log Aktivitas Terbaru
        $recentActivities = class_exists(ActivityLog::class) 
            ? ActivityLog::with('user')->orderBy('id', 'desc')->take(3)->get() 
            : [];

        return view('admin.user', compact(
            'users',
            'totalUser',
            'userAktif',
            'userNonaktif',
            'userBaru',
            'recentActivities'
        ));
    }

    /**
     * Menyimpan data user baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'username'     => 'required|string|max:100|unique:users,username',
            'password'     => 'required|string|min:6',
            'role'         => 'required|in:admin,petugas,owner',
            'status_aktif' => 'required|boolean',
        ]);

        User::create([
            'nama_lengkap' => $request->nama_lengkap,
            'username'     => $request->username,
            'password'     => Hash::make($request->password),
            'role'         => $request->role,
            'status_aktif' => $request->status_aktif,
        ]);

        return redirect()->route('admin.user')->with('success', 'User berhasil ditambahkan.');
    }

    /**
     * Mengubah status aktif/nonaktif user secara cepat
     */
    public function toggleStatus($id)
    {
        $user = User::findOrFail($id);
        $user->status_aktif = !$user->status_aktif;
        $user->save();

        return redirect()->back()->with('success', 'Status user berhasil diperbarui.');
    }

    /**
     * Menghapus user
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.user')->with('success', 'User berhasil dihapus.');
    }
}   