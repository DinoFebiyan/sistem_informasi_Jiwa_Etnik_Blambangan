<?php

namespace App\Http\Controllers;

use App\Models\Katalog;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $katalogs = Katalog::with(['galeri', 'user'])->latest()->paginate(10);
        $totalKatalog = Katalog::count();
        $tersedia = Katalog::where('status', 'tersedia')->count();
        $tidakTersedia = Katalog::where('status', 'tidak tersedia')->count();

        return view('superadmin.katalog.index', compact('katalogs', 'totalKatalog', 'tersedia', 'tidakTersedia'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('superadmin.katalog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_tari' => 'required|string|max:255',
            'kategori' => 'required|string',
            'stok' => 'required|integer|min:0',
            'deskripsi' => 'required|string',
            'status' => 'required|in:tersedia,tidak tersedia',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Upload foto ke galeri
        $galeriId = null;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileBlob = file_get_contents($file->getRealPath());
            $galeri = Galeri::create([
                'file_blob' => $fileBlob,
                'nama_file' => $file->getClientOriginalName(),
                'kategori_modul' => 'katalog',
                'is_watermark' => false,
            ]);
            $galeriId = $galeri->id;
        }

        Katalog::create([
            'nama_tari' => $request->nama_tari,
            'kategori' => $request->kategori,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status,
            'galeri_id' => $galeriId,
            'user_id' => Auth::id(),
        ]);

        // DIPERBAIKI: Disamakan menggunakan rute .katalog.index
        return redirect()->route('superadmin.katalog.index')->with('success', 'Katalog berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // DIPERBAIKI: Dialihkan karena file superadmin.detail-katalog tidak ada di views
        return redirect()->route('superadmin.katalog.index')->with('error', 'Halaman detail tidak tersedia.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $katalog = Katalog::with('galeri')->findOrFail($id);
        return view('superadmin.katalog.update', compact('katalog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $katalog = Katalog::findOrFail($id);

        $request->validate([
            'nama_tari' => 'required|string|max:255',
            'kategori' => 'required|string',
            'stok' => 'required|integer|min:0',
            'deskripsi' => 'required|string',
            'status' => 'required|in:tersedia,tidak tersedia',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Update foto jika ada
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileBlob = file_get_contents($file->getRealPath());

            if ($katalog->galeri_id) {
                $galeri = Galeri::find($katalog->galeri_id);
                $galeri->update([
                    'file_blob' => $fileBlob,
                    'nama_file' => $file->getClientOriginalName(),
                ]);
            } else {
                $galeri = Galeri::create([
                    'file_blob' => $fileBlob,
                    'nama_file' => $file->getClientOriginalName(),
                    'kategori_modul' => 'katalog',
                    'is_watermark' => false,
                ]);
                $katalog->galeri_id = $galeri->id;
            }
        }

        $katalog->update([
            'nama_tari' => $request->nama_tari,
            'kategori' => $request->kategori,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status,
        ]);

        return redirect()->route('superadmin.katalog.index')->with('success', 'Katalog berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $katalog = Katalog::findOrFail($id);
        // Hapus juga galeri terkait jika tidak dipakai modul lain
        if ($katalog->galeri_id) {
            Galeri::find($katalog->galeri_id)?->delete();
        }
        $katalog->delete();

        return redirect()->route('superadmin.katalog.index')->with('success', 'Katalog berhasil dihapus.');
    }
}