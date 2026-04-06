@extends('layouts.superadmin')

@section('title', 'Publikasi Berita — JEB')
@section('header_title', 'Publikasi Berita')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px;">
    <div>
        <h2 style="font-family: 'Playfair Display'; font-size: 1.5rem; color: var(--teks);">Publikasi Berita</h2>
        <p style="color: var(--teks-abu); font-size: 0.85rem;">12 berita tayang, 4 draft</p>
    </div>
    <button style="background: var(--merah); color: #fff; border: none; padding: 10px 20px; border-radius: 10px; font-weight: 700; cursor: pointer;">
        + Tulis Berita
    </button>
</div>

<div class="card">
    <div class="card-header" style="border-bottom: none;">
        <h3>Semua Berita</h3>
        <div style="display: flex; gap: 10px;">
            <input type="text" placeholder="Cari berita..." style="padding: 8px 12px; border: 1px solid var(--abu-border); border-radius: 8px; font-size: 0.8rem; width: 220px;">
            <select style="padding: 8px 12px; border: 1px solid var(--abu-border); border-radius: 8px; font-size: 0.8rem; color: var(--teks-abu);">
                <option>Semua</option>
                <option>Tayang</option>
                <option>Draft</option>
            </select>
        </div>
    </div>
    <div class="card-body">
        <div class="table-wrap">
            <table style="width: 100%;">
                <thead>
                    <tr>
                        <th style="width: 40%;">JUDUL BERITA</th>
                        <th>PENULIS</th>
                        <th>TANGGAL</th>
                        <th>STATUS</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Latihan Perdana Anggota Baru 2026</strong></td>
                        <td>Rizky Pratama</td>
                        <td>05 Mar 2026</td>
                        <td><span class="badge badge-aktif" style="font-size: 0.7rem;">Tayang</span></td>
                        <td>
                            <button class="action-btn">Edit</button>
                            <button class="action-btn">Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Sanggar JEB Raih Penghargaan Terbaik</strong></td>
                        <td>Dewi Lestari</td>
                        <td>20 Feb 2026</td>
                        <td><span class="badge badge-aktif" style="font-size: 0.7rem;">Tayang</span></td>
                        <td>
                            <button class="action-btn">Edit</button>
                            <button class="action-btn">Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Festival Gandrung 2026 Siap Digelar</strong></td>
                        <td>Rizky Pratama</td>
                        <td>15 Feb 2026</td>
                        <td><span class="badge badge-aktif" style="font-size: 0.7rem;">Tayang</span></td>
                        <td>
                            <button class="action-btn">Edit</button>
                            <button class="action-btn">Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Pendaftaran Anggota Baru Dibuka</strong></td>
                        <td>Andi Kurniawan</td>
                        <td>01 Mar 2026</td>
                        <td><span class="badge badge-pending" style="font-size: 0.7rem; background: #fffbeb; color: #b45309;">Draft</span></td>
                        <td>
                            <button class="action-btn">Terbitkan</button>
                            <button class="action-btn">Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Rekap Pentas Akhir Tahun 2025</strong></td>
                        <td>Dewi Lestari</td>
                        <td>02 Jan 2026</td>
                        <td><span class="badge badge-aktif" style="font-size: 0.7rem;">Tayang</span></td>
                        <td>
                            <button class="action-btn">Edit</button>
                            <button class="action-btn">Hapus</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection