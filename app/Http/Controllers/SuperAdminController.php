<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Katalog;
use App\Models\Event;
use App\Models\Berita;
use App\Models\LogAktivitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SuperAdminController extends Controller
{
    /**
     * Dashboard Super Admin
     */
    public function dashboard()
    {
        $totalAdmin = User::where('peran', 'admin')->count();
        $totalKatalog = Katalog::count();
        $activeEvents = Event::where('status', 'belum selesai')->count();
        $totalBerita = Berita::count();

        $latestAdmins = User::where('peran', 'admin')
            ->latest()
            ->take(5)
            ->get();

        $recentActivities = LogAktivitas::with('user')
            ->latest()
            ->take(5)
            ->get();

        return view('superadmin.dashboard', compact(
            'totalAdmin', 'totalKatalog', 'activeEvents', 'totalBerita',
            'latestAdmins', 'recentActivities'
        ));
    }

    /**
     * Menampilkan daftar admin (dengan pencarian & paginasi)
     */
    public function kelolaAdmin(Request $request)
    {
        $query = User::where('peran', 'admin');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $admins = $query->latest()->paginate(10);

        $totalAdmin = User::where('peran', 'admin')->count();
        $activeAdmins = User::where('peran', 'admin')->where('status', 'aktif')->count();
        $inactiveAdmins = User::where('peran', 'admin')->where('status', 'nonaktif')->count();

        return view('superadmin.dashboard-kelola-admin', compact('admins', 'totalAdmin', 'activeAdmins', 'inactiveAdmins'));
    }

    /**
     * Form tambah admin
     */
    public function tambahAdmin()
    {
        return view('superadmin.tambah-admin');
    }

    /**
     * Simpan admin baru
     */
    public function storeAdmin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'no_handphone' => 'required|string|max:20',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'peran' => 'admin',
            'no_handphone' => $request->no_handphone,
            'status' => $request->status,
        ]);

        return redirect()->route('superadmin.kelola-admin')->with('success', 'Admin berhasil ditambahkan.');
    }

    /**
     * Form edit admin
     */
    public function editAdmin($id)
    {
        $admin = User::where('peran', 'admin')->findOrFail($id);
        return view('superadmin.edit-admin', compact('admin'));
    }

    /**
     * Update admin
     */
    public function updateAdmin(Request $request, $id)
    {
        $admin = User::where('peran', 'admin')->findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'no_handphone' => 'required|string|max:20',
            'status' => 'required|in:aktif,nonaktif',
            'password' => 'nullable|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->only(['name', 'email', 'no_handphone', 'status']);
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $admin->update($data);

        return redirect()->route('superadmin.kelola-admin')->with('success', 'Admin berhasil diperbarui.');
    }

    /**
     * Hapus admin
     */
    public function deleteAdmin($id)
    {
        $admin = User::where('peran', 'admin')->findOrFail($id);
        $admin->delete();

        return redirect()->route('superadmin.kelola-admin')->with('success', 'Admin berhasil dihapus.');
    }

    public function logAktivitas()
{
    // Ambil semua log aktivitas, urutkan terbaru, dengan paginasi
    $logs = LogAktivitas::with('user')->latest()->paginate(15);
    return view('superadmin.log-aktivitas', compact('logs'));
}
    // ========== METHOD LAIN (BISA DITAMBAHKAN SESUAI KEBUTUHAN) ==========
    // Kelola Katalog
    public function kelolaKatalog() { return view('superadmin.kelola-katalog'); }
    public function tambahKatalog() { return view('superadmin.tambah-katalog'); }

    // Kelola Event
    public function kelolaEvent() { return view('superadmin.kelola-event'); }
    public function tambahEvent() { return view('superadmin.tambah-event'); }

    // Kelola Berita
    public function kelolaBerita() { return view('superadmin.kelola-berita'); }

    // Kelola Profil Sanggar
    public function kelolaProfil() { return view('superadmin.kelola-profil'); }
    public function editProfil() { return view('superadmin.edit-profil'); }
    public function tambahPengurus() { return view('superadmin.tambah-pengurus'); }
    public function tambahPelatih() { return view('superadmin.tambah-pelatih'); }

    // Pengaturan
    public function pengaturan() { return view('superadmin.pengaturan'); }
}