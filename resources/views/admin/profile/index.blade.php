@extends('layouts.admin')

@section('title', 'Kelola Profil — JEB')
@section('header_title', 'Kelola Profil')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px;">
    <div>
        <h2 style="font-family: 'Playfair Display'; font-size: 1.5rem; color: var(--teks);">Kelola Profil Sanggar</h2>
        <p style="color: var(--teks-abu); font-size: 0.85rem;">Informasi publik Sanggar JEB</p>
    </div>
    <button style="background: var(--merah); color: #fff; border: none; padding: 10px 20px; border-radius: 10px; font-weight: 700; cursor: pointer; display: flex; align-items: center; gap: 8px;">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
        Simpan Perubahan
    </button>
</div>

<div class="card">
    <div class="card-header">
        <h3 style="font-size: 1rem;">Informasi Umum</h3>
    </div>
    <div class="card-body" style="padding: 25px;">
        <form style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px;">
            <div style="grid-column: span 2;">
                <label style="display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 8px;">Deskripsi Sanggar</label>
                <input type="text" value="Sanggar Tari Jiwa Etnik Blambangan (JEB) adalah pusat seni tari tradisional yang berdedikasi untuk melestarikan kekayaan budaya Banyuwangi dan Nusantara. Kami membina generasi muda untuk mencintai dan menguasai seni tari tradisional, mulai dari tari Gandrung, hingga tari kreasi baru berbasis budaya lokal Blambangan." style="width: 100%; padding: 12px; border: 1px solid var(--abu-border); border-radius: 10px; background: #fafafa;">
            </div>

            <div style="grid-column: span 1;">
                <label style="display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 8px;">Visi</label>
                <input type="text" value="Menjadi sanggar seni yang unggul, berkarakter, (bisa) dan memiliki keunikan tersendiri (berbeda) serta mampu menghasilkan karya nyata dalam pelestarian dan pengembangan seni budaya Blambangan di Banyuwangi" style="width: 100%; padding: 12px; border: 1px solid var(--abu-border); border-radius: 10px; background: #fafafa;">
            </div>
            <div style="grid-column: span 1;">
                <label style="display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 8px;">Misi</label>
                <input type="text" value="Mengembangkan potensi anggota agar memilik kemampuan (bisa) yang terampil dan profesional di bidang seni budaya.


 Menciptakan karya seni yang inovatif, kreatif, dan memiliki ciri khas (beda) tanpa meninggalkan nilai-nilai budaya Blambangan.

 Menghasilkan karya nyata melalui pertunjukan, karya cipta, dan partisipasi aktif dalam berbagai kegiatan seni.

Menyelenggarakan pelatihan dan pembinaan seni secara berkelanjutan dan berkualitas

Menanamkan sikap disiplin, tanggung jawab, dan kecintaan terhadap seni budaya kepada seluruh anggota.

Membangun kerja sama dengan berbagai pihak untuk mendukung perkembangan dan eksistensi sanggar." style="width: 100%; padding: 12px; border: 1px solid var(--abu-border); border-radius: 10px; background: #fafafa;">
            </div>
        </form>
    </div>
</div>

<div style="display: flex; justify-content: flex-end; align-items: flex-start; margin-bottom: 15px; margin-top: 20px;">
    <button style="background: var(--merah); color: #fff; border: none; padding: 10px 20px; border-radius: 10px; font-weight: 700; cursor: pointer; display: flex; align-items: center; gap: 8px;">
        <span style="font-size: 1.2rem;">+</span> Tambah Pengurus
    </button>
</div>

<div class="card" style="margin-top: 25px;">
    <div class="card-header" style="border-bottom: none; padding-bottom: 0; ">
        <h3>Daftar Pengurus</h3>
        <div style="display: flex; gap: 10px;">
            <input type="text" placeholder="Cari pengurus..." style="padding: 8px 12px; border: 1px solid var(--abu-border); border-radius: 8px; font-size: 0.8rem; width: 200px;">
            <select style="padding: 8px 12px; border: 1px solid var(--abu-border); border-radius: 8px; font-size: 0.8rem; color: var(--teks-abu);">
                <option>Semua Status</option>
            </select>
        </div>
    </div>
    <div class="card-body">
        <div class="table-wrap">
            <table style="width: 100%;">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>No Telepon</th>
                        <th>STATUS</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div style="display: flex; align-items: center; gap: 12px;">
                                <div style="width: 32px; height: 32px; border-radius: 50%; background: #5a0000; color: #fff; display: flex; align-items: center; justify-content: center; font-size: 0.75rem; font-weight: 700;">RP</div>
                                <div>
                                    <div style="font-weight: 700;">Rizky Pratama</div>
                                </div>
                            </div>
                        </td>
                        <td>Ketua</td>
                        <td>081234567890</td>
                        <td><span class="badge badge-aktif">Aktif</span></td>
                        <td>
                            <button class="action-btn">Edit</button>
                            <button class="action-btn">Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style="display: flex; align-items: center; gap: 12px;">
                                <div style="width: 32px; height: 32px; border-radius: 50%; background: #2563eb; color: #fff; display: flex; align-items: center; justify-content: center; font-size: 0.75rem; font-weight: 700;">DL</div>
                                <div>
                                    <div style="font-weight: 700;">Dewi Lestari</div>  
                                </div>
                            </div>
                        </td>
                        <td>Wakil Ketua</td>
                        <td>081234567891</td>
                        <td><span class="badge badge-aktif">Aktif</span></td>
                        <td>
                            <button class="action-btn">Edit</button>
                            <button class="action-btn">Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style="display: flex; align-items: center; gap: 12px;">
                                <div style="width: 32px; height: 32px; border-radius: 50%; background: #16a34a; color: #fff; display: flex; align-items: center; justify-content: center; font-size: 0.75rem; font-weight: 700;">BN</div>
                                <div>
                                    <div style="font-weight: 700;">Bagas Nugroho</div>
                                </div>
                            </div>
                        </td>
                        <td>Sekretaris</td>
                        <td>081234567892</td>
                        <td><span class="badge badge-aktif">Aktif</span></td>
                        <td>
                            <button class="action-btn">Edit</button>
                            <button class="action-btn">Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style="display: flex; align-items: center; gap: 12px;">
                                <div style="width: 32px; height: 32px; border-radius: 50%; background: var(--emas); color: #fff; display: flex; align-items: center; justify-content: center; font-size: 0.75rem; font-weight: 700;">SW</div>
                                <div>
                                    <div style="font-weight: 700;">Sari Wulandari</div>
                                </div>
                            </div>
                        </td>
                        <td>Bendahara</td>
                        <td>081234567893</td>
                        <td><span class="badge badge-nonaktif">Nonaktif</span></td>
                        <td>
                            <button class="action-btn">Edit</button>
                            <button class="action-btn">Hapus</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px; padding-top: 15px; border-top: 1px solid #f5eeee;">
            <div style="display: flex; gap: 5px;">
                <button style="padding: 5px 10px; border: 1px solid var(--abu-border); background: #fff; border-radius: 6px; cursor: pointer;">&lsaquo;</button>
                <button style="padding: 5px 10px; border: none; background: var(--merah); color: #fff; border-radius: 6px; cursor: pointer; font-weight: 700;">1</button>
                <button style="padding: 5px 10px; border: 1px solid var(--abu-border); background: #fff; border-radius: 6px; cursor: pointer;">&rsaquo;</button>
            </div>
        </div>
    </div>
</div>
@endsection