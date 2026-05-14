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
}