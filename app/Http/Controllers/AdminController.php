<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Menampilkan daftar admin (dengan pencarian & paginasi)
     */
    public function index(Request $request)
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

    /**
     * Menampilkan form untuk menambah admin baru
     */
    public function create()
    {
        return view('superadmin.admin.create');
    }

    /**
     * Menyimpan data admin baru ke database
     */
    public function store(Request $request)
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

        return redirect()->route('superadmin.admin.index')->with('success', 'Admin berhasil ditambahkan.');
    }

    /**
     * (Sengaja dikosongkan karena halaman detail admin biasanya tidak dibuat terpisah)
     */
    public function show(string $id)
    {
        return redirect()->route('superadmin.admin.index');
    }

    /**
     * Menampilkan form untuk mengedit data admin
     */
    public function edit(string $id)
    {
        $admin = User::where('peran', 'admin')->findOrFail($id);
        return view('superadmin.admin.update', compact('admin'));
    }

    /**
     * Menyimpan pembaruan data admin ke database
     */
    public function update(Request $request, string $id)
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
        
        // Hanya update password jika kolom diisi
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }
        
        $admin->update($data);

        return redirect()->route('superadmin.admin.index')->with('success', 'Admin berhasil diperbarui.');
    }

    /**
     * Menghapus data admin dari database
     */
    public function destroy(string $id)
    {
        $admin = User::where('peran', 'admin')->findOrFail($id);
        $admin->delete();

        return redirect()->route('superadmin.admin.index')->with('success', 'Admin berhasil dihapus.');
    }
}