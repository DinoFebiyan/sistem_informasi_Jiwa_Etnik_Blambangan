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

        $latestAdmins = User::where('peran', 'admin')->latest()->take(5)->get();

        $recentActivities = LogAktivitas::with('user')->latest()->take(5)->get();

        return view('superadmin.dashboard', compact(
            'totalAdmin', 'totalKatalog', 'activeEvents', 'totalBerita',
            'latestAdmins', 'recentActivities'
        ));
    }

    // ===================== KELOLA ADMIN =====================
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

        $request->validate([
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

    // ===================== KELOLA KATALOG =====================
    public function kelolaKatalog()
    {
        $katalogs = Katalog::with('galeri')->latest()->paginate(10);
        return view('superadmin.kelola-katalog', compact('katalogs'));
    }

    // ===================== KELOLA EVENT =====================
    public function kelolaEvent()
    {
        $events = Event::with('galeri')->latest()->paginate(10);
        return view('superadmin.kelola-event', compact('events'));
    }

    // ===================== KELOLA BERITA =====================
    public function kelolaBerita()
    {
        $beritas = Berita::with('user', 'galeri')->latest()->paginate(10);
        return view('superadmin.kelola-berita', compact('beritas'));
    }

    public function tambahBerita()
    {
        return view('superadmin.tambah-berita');
    }

    public function storeBerita(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi_berita' => 'required|string',
            'status' => 'required|in:tayang,tidak ditayangkan',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $galeriId = null;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileBlob = file_get_contents($file->getRealPath());
            $galeri = Galeri::create([
                'file_blob' => $fileBlob,
                'nama_file' => $file->getClientOriginalName(),
                'kategori_modul' => 'berita',
                'is_watermark' => false,
            ]);
            $galeriId = $galeri->id;
        }

        Berita::create([
            'judul' => $request->judul,
            'isi_berita' => $request->isi_berita,
            'tgl_terbit' => now(),
            'status' => $request->status,
            'user_id' => Auth::id(),
            'galeri_id' => $galeriId,
        ]);

        return redirect()->route('superadmin.kelola-berita')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function editBerita($id)
    {
        $berita = Berita::with('galeri')->findOrFail($id);
        return view('superadmin.edit-berita', compact('berita'));
    }

    public function updateBerita(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'isi_berita' => 'required|string',
            'status' => 'required|in:tayang,tidak ditayangkan',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileBlob = file_get_contents($file->getRealPath());

            if ($berita->galeri_id) {
                $galeri = Galeri::find($berita->galeri_id);
                $galeri->update([
                    'file_blob' => $fileBlob,
                    'nama_file' => $file->getClientOriginalName(),
                ]);
            } else {
                $galeri = Galeri::create([
                    'file_blob' => $fileBlob,
                    'nama_file' => $file->getClientOriginalName(),
                    'kategori_modul' => 'berita',
                    'is_watermark' => false,
                ]);
                $berita->galeri_id = $galeri->id;
            }
        }

        $berita->update([
            'judul' => $request->judul,
            'isi_berita' => $request->isi_berita,
            'status' => $request->status,
        ]);

        return redirect()->route('superadmin.kelola-berita')->with('success', 'Berita berhasil diperbarui.');
    }

    public function deleteBerita($id)
    {
        $berita = Berita::findOrFail($id);
        if ($berita->galeri_id) {
            Galeri::find($berita->galeri_id)?->delete();
        }
        $berita->delete();

        return redirect()->route('superadmin.kelola-berita')->with('success', 'Berita berhasil dihapus.');
    }

    // ===================== KELOLA PROFIL SANGAR =====================
    public function kelolaProfil()
    {
        $profil = ProfilSanggar::with('logo', 'fotoPembina')->first();
        return view('superadmin.kelola-profil', compact('profil'));
    }

    // ===================== PENGATURAN =====================
    public function pengaturan()
    {
        return view('superadmin.pengaturan');
    }

    // ===================== LOG AKTIVITAS =====================
    public function logAktivitas()
    {
        $logs = LogAktivitas::with('user')->latest()->paginate(15);
        return view('superadmin.log-aktivitas', compact('logs'));
    }
}