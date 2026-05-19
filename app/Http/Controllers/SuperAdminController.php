<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Katalog;
use App\Models\Event;
use App\Models\Berita;
use App\Models\LogAktivitas;
use App\Models\Galeri;
use App\Models\Personel;
use App\Models\ProfilSangsam;
use App\Models\ProfilSanggar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class SuperAdminController extends Controller
{
    
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
            'totalAdmin',
            'totalKatalog',
            'activeEvents',
            'totalBerita',
            'latestAdmins',
            'recentActivities'
        ));
    }

   
    public function logAktivitas(Request $request)
    {
        $query = LogAktivitas::with('user');

        if ($request->filled('search')) {
            $query->where('aktivitas', 'like', '%' . $request->search . '%')
                ->orWhere('deskripsi', 'like', '%' . $request->search . '%');
        }

        $logs = $query->latest()->paginate(15);

        // Statistik
        $totalAktivitas = LogAktivitas::count();
        $aktivitasHariIni = LogAktivitas::whereDate('created_at', today())->count();
        $aktivitasBulanIni = LogAktivitas::whereMonth('created_at', now()->month)->count();

        return view('superadmin.log-aktivitas.index', compact('logs', 'totalAktivitas', 'aktivitasHariIni', 'aktivitasBulanIni'));
    }

   
    public function kelolaBerita(Request $request)
    {
        $query = Berita::with('user', 'galeri');
        if ($request->filled('search')) {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }
        $beritas = $query->latest()->paginate(10);
        $totalBerita = Berita::count();
        $ditayangkan = Berita::where('status', 'tayang')->count();
        $tidakDitayangkan = Berita::where('status', 'tidak ditayangkan')->count();
        
        return view('superadmin.berita.index', compact('beritas', 'totalBerita', 'ditayangkan', 'tidakDitayangkan'));
    }

   
    public function kelolaProfil()
    {
        $profil = ProfilSanggar::with('logo', 'fotoPembina')->first();

        if (!$profil) {
            $profil = new ProfilSanggar();
        }
        $pengurus = Personel::where('peran', 'pengurus')->paginate(10);
        $pelatih = Personel::where('peran', 'pelatih')->paginate(10);

        return view('superadmin.profil.index', compact('profil', 'pengurus', 'pelatih'));
    }

    public function editProfil()
    {
        return view('superadmin.profil.update');
    }

    public function tambahPengurus()
    {
        return view('superadmin.profil.tambah-pengurus');
    }

    public function tambahPelatih()
    {
        return view('superadmin.profil.tambah-pelatih');
    }

   
    public function pengaturan()
    {
        return view('superadmin.pengaturan.index');
    }

    public function updateProfil(Request $request)
    {
        $user = auth()->user();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'no_handphone' => 'nullable|string|max:20',
        ]);

        $user->update($request->only('name', 'email', 'no_handphone'));

        // DIPERBAIKI: Mengarah ke rute baru kelompokmu (.index)
        return redirect()->route('superadmin.pengaturan.index')->with('success', 'Profil berhasil diperbarui.');
    }

    public function updatePassword(Request $request)
    {
        $user = auth()->user();
        $request->validate([
            'current_password' => [
                'required',
                function ($attribute, $value, $fail) use ($user) {
                    if (!Hash::check($value, $user->password)) {
                        $fail('Password saat ini salah.');
                    }
                }
            ],
            'password' => 'required|min:6|confirmed',
        ]);

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        // DIPERBAIKI: Mengarah ke rute baru kelompokmu (.index)
        return redirect()->route('superadmin.pengaturan.index')->with('success', 'Password berhasil diubah.');
    }
}