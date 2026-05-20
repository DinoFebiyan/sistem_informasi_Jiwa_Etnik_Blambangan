<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Katalog;
use App\Models\Event;
use App\Models\Berita;
use App\Models\LogAktivitas;
use App\Models\Galeri;
use App\Models\Personel;
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
            'totalAdmin',
            'totalKatalog',
            'activeEvents',
            'totalBerita',
            'latestAdmins',
            'recentActivities'
        ));
    }

    // FUNGSI UNTUK HALAMAN KELOLA ADMIN
    /**
     * Menampilkan daftar admin (dengan pencarian & paginasi)
     */
    public function kelolaAdmin(Request $request)
    {
        $query = User::where('peran', 'admin');
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }
        $admins = $query->latest()->paginate(10);
        $totalAdmin = User::where('peran', 'admin')->count();
        $activeAdmins = User::where('peran', 'admin')->where('status', 'aktif')->count();
        $inactiveAdmins = User::where('peran', 'admin')->where('status', 'nonaktif')->count();
        return view('superadmin.admin.index', compact('admins', 'totalAdmin', 'activeAdmins', 'inactiveAdmins'));
    }

    public function tambahAdmin()
    {
        return view('superadmin.admin.create');
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
        return view('superadmin.admin.update', compact('admin'));
    }

    public function updateAdmin(Request $request, $id)
    {
        $admin = User::where('peran', 'admin')->findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'no_handphone' => 'required|string|max:20',
            'status' => 'required|in:aktif,nonaktif',
            'password' => 'nullable|min:6|confirmed',
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


    public function tambahKatalog()
    {
        return view('superadmin.tambah-katalog');
    }
    public function storeKatalog(Request $request)
    { /* validasi & simpan */
    }
    public function editKatalog($id)
    { /* return view edit */
    }
    public function updateKatalog(Request $request, $id)
    { /* update */
    }
    public function deleteKatalog($id)
    {
        Katalog::findOrFail($id)->delete();
        return redirect()->back();
    }

    // Kelola Event
    public function kelolaEvent()
    {
        return view('superadmin.kelola-event');
    }
    public function tambahEvent()
    {
        return view('superadmin.tambah-event');
    }

    // Kelola Berita
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

    public function tambahBerita()
    {
        return view('superadmin.berita.create');
    }

    public function storeBerita(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi_berita' => 'required|string',
            'jenis_berita' => 'required|in:pengumuman,prestasi,kolaborasi,event,lainnya',
            'foto_header.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $berita = Berita::create([
            'judul' => $request->judul,
            'konten' => $request->isi_berita,
            'status' => $request->jenis_berita,
            'user_id' => auth()->id(),
        ]);

        if ($request->hasFile('foto_header')) {
            foreach ($request->file('foto_header') as $file) {
                $path = $file->store('public/berita');
                Galeri::create([
                    'berita_id' => $berita->id,
                    'path' => $path,
                ]);
            }
        }

        return redirect()->route('superadmin.kelola-berita')->with('success', 'Berita berhasil ditambahkan.');
    }

    // Kelola Profil Sanggar
    public function kelolaProfil()
    {
        // Ambil data profil sanggar (relasi logo & foto pembina)
        $profil = ProfilSanggar::with('logo', 'fotoPembina')->first();

        // Jika belum ada data profil, buat objek kosong agar tidak error
        if (!$profil) {
            $profil = new ProfilSanggar();
        }
        $pengurus = Personel::where('peran', 'pengurus')->paginate(10);
        $pelatih = Personel::where('peran', 'pelatih')->paginate(10);

        // Kirim semua variabel ke view
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

        return redirect()->route('superadmin.pengaturan')->with('success', 'Profil berhasil diperbarui.');
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

        return redirect()->route('superadmin.pengaturan')->with('success', 'Password berhasil diubah.');

    }


}