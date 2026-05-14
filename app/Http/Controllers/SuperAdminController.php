<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Katalog;
use App\Models\Event;
use App\Models\Berita;
use App\Models\LogAktivitas;
use App\Models\Galeri;
use App\Models\ProfilSanggar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class SuperAdminController extends Controller
{
    // ===================== DASHBOARD =====================
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

        // Data aktivitas terbaru (jika tabel log_aktivitas sudah ada)
        $recentActivities = LogAktivitas::with('user')
            ->latest()
            ->take(5)
            ->get();

        return view('superadmin.dashboard', compact(
            'totalAdmin', 'totalKatalog', 'activeEvents', 'totalBerita',
            'latestAdmins', 'recentActivities'
        ));
    }

    // FUNGSI UNTUK HALAMAN KELOLA ADMIN
    public function kelolaAdmin()
    {
        // Ambil semua user yang memiliki peran 'admin'
        // Gunakan paginate(5) agar sesuai dengan tampilan "Menampilkan 5 dari X admin"
        $admins = User::where('peran', 'admin')->paginate(5);

        // Hitung statistik ringkas untuk kartu di atas
        $totalAdmin = User::where('peran', 'admin')->count();
        $totalAktif = User::where('peran', 'admin')->where('status', 'aktif')->count();
        $totalNonaktif = User::where('peran', 'admin')->where('status', 'nonaktif')->count();

        return view('superadmin.kelola-admin', compact(
            'admins',
            'totalAdmin',
            'totalAktif',
            'totalNonaktif'
        ));
    }

    // Method placeholder agar tidak error saat route diakses (tambahkan logic nanti)
    public function tambahAdmin()
    {
        return view('superadmin.tambah-admin');
    }
    public function kelolaEvent()
    {
        return view('superadmin.kelola-event');
    }
    public function tambahEvent()
    {
        return view('superadmin.tambah-event');
    }
    public function kelolaBerita()
    {
        return view('superadmin.kelola-berita');
    }
    public function publikasiBerita()
    {
        return view('superadmin.publikasi-berita');
    }
    public function kelolaProfil()
    {
        return view('superadmin.profil');
    }
    public function editProfil()
    {
        return view('superadmin.edit-profil');
    }
    public function tambahPengurus()
    {
        return view('superadmin.tambah-pengurus');
    }
    public function tambahPelatih()
    {
        return view('superadmin.tambah-pelatih');
    }
    public function pengaturan()
    {
        return view('superadmin.pengaturan');
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

        return view('superadmin.kelola-admin', compact('admins', 'totalAdmin', 'activeAdmins', 'inactiveAdmins'));
    }

    public function tambahAdmin()
    {
        return view('superadmin.tambah-admin');
    }

    public function storeAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'no_handphone' => 'required|string|max:20',
            'status' => 'required|in:aktif,nonaktif',
        ]);

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

    public function editAdmin($id)
    {
        $admin = User::where('peran', 'admin')->findOrFail($id);
        return view('superadmin.edit-admin', compact('admin'));
    }

    public function updateAdmin(Request $request, $id)
    {
        $admin = User::where('peran', 'admin')->findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'no_handphone' => 'required|string|max:20',
            'status' => 'required|in:aktif,nonaktif',
            'password' => 'nullable|min:6',
        ]);

        $data = $request->only(['name', 'email', 'no_handphone', 'status']);
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }
        $admin->update($data);
        return redirect()->route('superadmin.kelola-admin')->with('success', 'Admin berhasil diperbarui.');
    }

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
    public function tambahKatalog() { return view('superadmin.tambah-katalog'); }
    public function storeKatalog(Request $request) { /* validasi & simpan */ }
    public function editKatalog($id) { /* return view edit */ }
    public function updateKatalog(Request $request, $id) { /* update */ }
    public function deleteKatalog($id) { Katalog::findOrFail($id)->delete(); return redirect()->back(); }

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