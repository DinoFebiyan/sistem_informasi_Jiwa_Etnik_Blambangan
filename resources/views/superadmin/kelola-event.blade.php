@extends('layouts.superadmin')

@section('title', 'Kelola Event — JEB')
@section('header_title', 'Kelola Event')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px;">
    <div>
        <h2 style="font-family: 'Playfair Display'; font-size: 1.5rem; color: var(--teks);">Kelola Event</h2>
        <p style="color: var(--teks-abu); font-size: 0.85rem;">7 event aktif bulan ini</p>
    </div>
    <button style="background: var(--merah); color: #fff; border: none; padding: 10px 20px; border-radius: 10px; font-weight: 700; cursor: pointer;">
        + Tambah Event
    </button>
</div>

<div style="display: flex; gap: 15px; margin-bottom: 30px; overflow-x: auto; padding-bottom: 10px;">
    <div style="min-width: 200px; background: #fff; padding: 15px; border-radius: 12px; display: flex; align-items: center; gap: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.03); border: 1px solid #f0f0f0;">
        <div style="background: var(--merah); color: #fff; padding: 5px 10px; border-radius: 8px; text-align: center; min-width: 45px;">
            <div style="font-size: 1.1rem; font-weight: 800;">10</div>
            <div style="font-size: 0.6rem; text-transform: uppercase;">Mar</div>
        </div>
        <div>
            <div style="font-weight: 700; font-size: 0.85rem;">Pentas Gandrung</div>
            <div style="font-size: 0.7rem; color: var(--teks-abu);">Pendopo BWI</div>
        </div>
    </div>
    <div style="min-width: 200px; background: #fff; padding: 15px; border-radius: 12px; display: flex; align-items: center; gap: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.03); border: 1px solid #f0f0f0;">
        <div style="background: var(--merah); color: #fff; padding: 5px 10px; border-radius: 8px; text-align: center; min-width: 45px;">
            <div style="font-size: 1.1rem; font-weight: 800;">16</div>
            <div style="font-size: 0.6rem; text-transform: uppercase;">Mar</div>
        </div>
        <div>
            <div style="font-weight: 700; font-size: 0.85rem;">Workshop Pelajar</div>
            <div style="font-size: 0.7rem; color: var(--teks-abu);">Sanggar JEB</div>
        </div>
    </div>
    <div style="min-width: 200px; background: #fff; padding: 15px; border-radius: 12px; display: flex; align-items: center; gap: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.03); border: 1px solid #f0f0f0;">
        <div style="background: var(--merah); color: #fff; padding: 5px 10px; border-radius: 8px; text-align: center; min-width: 45px;">
            <div style="font-size: 1.1rem; font-weight: 800;">20</div>
            <div style="font-size: 0.6rem; text-transform: uppercase;">Mar</div>
        </div>
        <div>
            <div style="font-weight: 700; font-size: 0.85rem;">Festival Blambangan</div>
            <div style="font-size: 0.7rem; color: var(--teks-abu);">GOR Tawangalun</div>
        </div>
    </div>
    <div style="min-width: 200px; background: #fff; padding: 15px; border-radius: 12px; display: flex; align-items: center; gap: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.03); border: 1px solid #f0f0f0;">
        <div style="background: var(--merah); color: #fff; padding: 5px 10px; border-radius: 8px; text-align: center; min-width: 45px;">
            <div style="font-size: 1.1rem; font-weight: 800;">26</div>
            <div style="font-size: 0.6rem; text-transform: uppercase;">Mar</div>
        </div>
        <div>
            <div style="font-weight: 700; font-size: 0.85rem;">Latihan Perdana</div>
            <div style="font-size: 0.7rem; color: var(--teks-abu);">Sanggar JEB</div>
        </div>
    </div>
    <div style="min-width: 200px; background: #fff; padding: 15px; border-radius: 12px; display: flex; align-items: center; gap: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.03); border: 1px solid #f0f0f0;">
        <div style="background: #4a0000; color: #fff; padding: 5px 10px; border-radius: 8px; text-align: center; min-width: 45px;">
            <div style="font-size: 1.1rem; font-weight: 800;">05</div>
            <div style="font-size: 0.6rem; text-transform: uppercase;">Apr</div>
        </div>
        <div>
            <div style="font-weight: 700; font-size: 0.85rem;">Pentas Seblang</div>
            <div style="font-size: 0.7rem; color: var(--teks-abu);">Alun-alun BWI</div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header" style="border-bottom: none;">
        <h3>Semua Event</h3>
        <select style="padding: 8px 12px; border: 1px solid var(--abu-border); border-radius: 8px; font-size: 0.8rem; color: var(--teks-abu); min-width: 140px;">
            <option>Semua Status</option>
            <option>Upcoming</option>
            <option>Selesai</option>
        </select>
    </div>
    <div class="card-body">
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>NAMA EVENT</th>
                        <th>TANGGAL</th>
                        <th>LOKASI</th>
                        <th>JAM</th>
                        <th>STATUS</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Pentas Tari Gandrung</strong></td>
                        <td>10 Mar 2026</td>
                        <td>Pendopo Banyuwangi</td>
                        <td>19.00 WIB</td>
                        <td><span class="badge" style="background: #f5f3ff; color: #7c3aed;">Upcoming</span></td>
                        <td>
                            <button class="action-btn">Edit</button>
                            <button class="action-btn">Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Workshop Tari Pelajar</strong></td>
                        <td>16 Mar 2026</td>
                        <td>Sanggar JEB</td>
                        <td>08.00 WIB</td>
                        <td><span class="badge" style="background: #f5f3ff; color: #7c3aed;">Upcoming</span></td>
                        <td>
                            <button class="action-btn">Edit</button>
                            <button class="action-btn">Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Festival Seni Blambangan</strong></td>
                        <td>20 Mar 2026</td>
                        <td>GOR Tawangalun</td>
                        <td>16.00 WIB</td>
                        <td><span class="badge" style="background: #f5f3ff; color: #7c3aed;">Upcoming</span></td>
                        <td>
                            <button class="action-btn">Edit</button>
                            <button class="action-btn">Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Latihan Perdana Anggota</strong></td>
                        <td>26 Mar 2026</td>
                        <td>Sanggar JEB</td>
                        <td>07.30 WIB</td>
                        <td><span class="badge" style="background: #f5f3ff; color: #7c3aed;">Upcoming</span></td>
                        <td>
                            <button class="action-btn">Edit</button>
                            <button class="action-btn">Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Pentas Akhir Tahun 2025</strong></td>
                        <td>28 Des 2025</td>
                        <td>Pendopo Banyuwangi</td>
                        <td>19.00 WIB</td>
                        <td><span class="badge" style="background: #eff6ff; color: #2563eb;">Selesai</span></td>
                        <td>
                            <button class="action-btn">Lihat</button>
                            <button class="action-btn">Hapus</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection