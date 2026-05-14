<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Katalog;
use App\Models\Event;
use App\Models\Berita;
use App\Models\LogAktivitas;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function dashboard()
    {
        // Data statistik
        $totalAdmin = User::where('peran', 'admin')->count();
        $totalKatalog = Katalog::count();
        $activeEvents = Event::where('status', 'belum selesai')->count();
        $totalBerita = Berita::count();

        // Data untuk tabel admin terbaru
        $latestAdmins = User::where('peran', 'admin')
            ->latest()
            ->take(5)
            ->get();

        // Data aktivitas terbaru
        $recentActivities = LogAktivitas::with('user')
            ->latest()
            ->take(5)
            ->get();

        return view('superadmin.dashboard', compact(
            'totalAdmin',
            'totalKatalog',
            'activeEvents',
            'totalBerita',
            'latestAdmins',
            'recentActivities'
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
}