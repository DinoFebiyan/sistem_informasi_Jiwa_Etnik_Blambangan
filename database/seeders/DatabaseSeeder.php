<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Berita;
use App\Models\Event;
use App\Models\Katalog;
use App\Models\Galeri;
use App\Models\Personel;
use App\Models\ProfilSanggar;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat user Super Admin
        $superAdmin = User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'superadmin@jeb.id',
            'password' => Hash::make('php artisan route:clear
php artisan route:cache   # opsional, jika production'),
            'peran' => 'super_admin',
            'no_handphone' => '081234567890',
            'status' => 'aktif',
        ]);

        // 2. Buat user Admin biasa
        $admin = User::factory()->create([
            'name' => 'Admin JEB',
            'email' => 'admin@jeb.id',
            'password' => Hash::make('password'),
            'peran' => 'admin',
            'no_handphone' => '081298765432',
            'status' => 'aktif',
        ]);

        // 3. Buat data Galeri (foto)
        $galeri1 = Galeri::create([
            'file_blob' => 'dummy_base64_1', // isi dengan file dummy
            'nama_file' => 'logo_sanggar.jpg',
            'kategori_modul' => 'logo',
            'is_watermark' => false,
        ]);

        $galeri2 = Galeri::create([
            'file_blob' => 'dummy_base64_2',
            'nama_file' => 'foto_pembina.jpg',
            'kategori_modul' => 'pembina',
            'is_watermark' => false,
        ]);

        // 4. Buat Profil Sanggar
        ProfilSanggar::create([
            'deskripsi' => 'Sanggar Tari Jiwa Etnik Blambangan (JEB) adalah pusat seni tari tradisional...',
            'visi' => 'Menjadi sanggar seni yang unggul, berkarakter, dan memiliki keunikan tersendiri...',
            'misi' => 'Mengembangkan potensi anggota...',
            'alamat' => 'Singojuruh, Banyuwangi',
            'kontak' => '082232505355',
            'sejarah' => 'Berdiri sejak 2010...',
            'sambutan_pembina' => 'Selamat datang di JEB...',
            'logo_id' => $galeri1->id,
            'foto_pembina_id' => $galeri2->id,
        ]);

        // 5. Buat Personel (Pengurus & Pelatih)
        Personel::create([
            'nama' => 'Rizky Pratama',
            'jabatan' => 'Ketua Sanggar',
            'no_handphone' => '081234567890',
            'instagram' => '@rizkypratama',
            'peran' => 'pengurus',
            'status' => 'aktif',
            'galeri_id' => null,
        ]);

        Personel::create([
            'nama' => 'Budi Santoso',
            'jabatan' => 'Pelatih Tari',
            'no_handphone' => '081298765432',
            'instagram' => '@buditaridance',
            'peran' => 'pelatih',
            'status' => 'aktif',
            'galeri_id' => null,
        ]);

        // 6. Buat Katalog (Kostum)
        Katalog::create([
            'nama_tari' => 'Baju Tari Gandrung',
            'kategori' => 'Tradisional',
            'stok' => 10,
            'deskripsi' => 'Baju tari gandrung khas Banyuwangi dengan bahan kain halus',
            'status' => 'tersedia',
            'galeri_id' => null,
            'user_id' => $superAdmin->id,
        ]);

        // 7. Buat Event
        Event::create([
            'nama_event' => 'Pentas Tari Gandrung',
            'tanggal' => '2026-12-10',
            'jam' => '19:00:00',
            'lokasi' => 'Pendopo Banyuwangi',
            'kategori' => 'Pertunjukan',
            'status' => 'belum selesai',
            'user_id' => $admin->id,
            'galeri_id' => null,
        ]);

        // 8. Buat Berita
        Berita::create([
            'judul' => 'Latihan Perdana Anggota Baru 2026',
            'isi_berita' => '<p>Sanggar JEB membuka latihan perdana untuk anggota baru...</p>',
            'tgl_terbit' => now(),
            'status' => 'tayang',
            'user_id' => $admin->id,
            'galeri_id' => null,
        ]);
    }
}