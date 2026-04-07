@extends('layouts.superadmin')

@section('title', 'Kelola Katalog — JEB')
@section('header_title', 'Kelola Katalog')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px;">
    <div>
        <h2 style="font-family: 'Playfair Display'; font-size: 1.5rem; color: var(--teks);">Kelola Katalog</h2>
        <p style="color: var(--teks-abu); font-size: 0.85rem;">24 katalog tari tersedia</p>
    </div>
    <button style="background: var(--merah); color: #fff; border: none; padding: 10px 20px; border-radius: 10px; font-weight: 700; cursor: pointer;">
        + Tambah Katalog
    </button>
</div>

<div style="display: flex; gap: 15px; margin-bottom: 24px;">
    <input type="text" placeholder="Cari nama tari..." style="flex: 1; padding: 12px 16px; border: 1px solid var(--abu-border); border-radius: 10px; font-size: 0.9rem;">
    <select style="padding: 12px 16px; border: 1px solid var(--abu-border); border-radius: 10px; font-size: 0.9rem; color: var(--teks-abu); background: #fff; min-width: 150px;">
        <option>Semua Kategori</option>
    </select>
    <select style="padding: 12px 16px; border: 1px solid var(--abu-border); border-radius: 10px; font-size: 0.9rem; color: var(--teks-abu); background: #fff; min-width: 150px;">
        <option>Semua Status</option>
    </select>
</div>

<div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px;">
    
    <div style="background: #fff; border-radius: 15px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border: 1px solid #f0f0f0;">
        <div style="height: 180px; background: linear-gradient(to bottom right, #800000, #ff4d4d); position: relative; padding: 15px;">
            <span style="background: var(--emas); color: #000; font-size: 0.65rem; font-weight: 800; padding: 4px 10px; border-radius: 5px; text-transform: uppercase;">Tradisional</span>
        </div>
        <div style="padding: 20px;">
            <h4 style="font-family: 'Playfair Display'; font-size: 1.1rem; margin-bottom: 5px;">Tari Gandrung</h4>
            <p style="font-size: 0.8rem; color: var(--teks-abu); margin-bottom: 15px;">Tari penyambutan tamu agung ikon Banyuwangi.</p>
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <span class="badge badge-aktif" style="font-size: 0.7rem;">Tayang</span>
                <div style="display: flex; gap: 8px;">
                    <button class="action-btn">Edit</button>
                    <button class="action-btn">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <div style="background: #fff; border-radius: 15px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border: 1px solid #f0f0f0;">
        <div style="height: 180px; background: linear-gradient(to bottom right, #4a0000, #800000); position: relative; padding: 15px;">
            <span style="background: var(--emas); color: #000; font-size: 0.65rem; font-weight: 800; padding: 4px 10px; border-radius: 5px; text-transform: uppercase;">Ritual</span>
        </div>
        <div style="padding: 20px;">
            <h4 style="font-family: 'Playfair Display'; font-size: 1.1rem; margin-bottom: 5px;">Tari Seblang</h4>
            <p style="font-size: 0.8rem; color: var(--teks-abu); margin-bottom: 15px;">Tari sakral ritual tolak bala khas Using.</p>
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <span class="badge badge-aktif" style="font-size: 0.7rem;">Tayang</span>
                <div style="display: flex; gap: 8px;">
                    <button class="action-btn">Edit</button>
                    <button class="action-btn">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <div style="background: #fff; border-radius: 15px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border: 1px solid #f0f0f0;">
        <div style="height: 180px; background: linear-gradient(to bottom right, #b87333, #e0a96d); position: relative; padding: 15px;">
            <span style="background: var(--emas); color: #000; font-size: 0.65rem; font-weight: 800; padding: 4px 10px; border-radius: 5px; text-transform: uppercase;">Kreasi</span>
        </div>
        <div style="padding: 20px;">
            <h4 style="font-family: 'Playfair Display'; font-size: 1.1rem; margin-bottom: 5px;">Tari Barong</h4>
            <p style="font-size: 0.8rem; color: var(--teks-abu); margin-bottom: 15px;">Kreasi baru berbasis budaya Blambangan.</p>
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <span class="badge badge-pending" style="font-size: 0.7rem; background: #fffbeb; color: #b45309;">Draft</span>
                <div style="display: flex; gap: 8px;">
                    <button class="action-btn">Edit</button>
                    <button class="action-btn">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <div style="background: #fff; border-radius: 15px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border: 1px solid #f0f0f0;">
        <div style="height: 180px; background: linear-gradient(to bottom right, #6d0000, #a00000); position: relative; padding: 15px;">
            <span style="background: var(--emas); color: #000; font-size: 0.65rem; font-weight: 800; padding: 4px 10px; border-radius: 5px; text-transform: uppercase;">Tradisional</span>
        </div>
        <div style="padding: 20px;">
            <h4 style="font-family: 'Playfair Display'; font-size: 1.1rem; margin-bottom: 5px;">Tari Kuntulan</h4>
            <p style="font-size: 0.8rem; color: var(--teks-abu); margin-bottom: 15px;">Tari bernuansa Islami dengan gerakan silat.</p>
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <span class="badge badge-aktif" style="font-size: 0.7rem;">Tayang</span>
                <div style="display: flex; gap: 8px;">
                    <button class="action-btn">Edit</button>
                    <button class="action-btn">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <div style="background: #fff; border-radius: 15px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border: 1px solid #f0f0f0;">
        <div style="height: 180px; background: linear-gradient(to bottom right, #cc3300, #ff6600); position: relative; padding: 15px;">
            <span style="background: var(--emas); color: #000; font-size: 0.65rem; font-weight: 800; padding: 4px 10px; border-radius: 5px; text-transform: uppercase;">Kreasi</span>
        </div>
        <div style="padding: 20px;">
            <h4 style="font-family: 'Playfair Display'; font-size: 1.1rem; margin-bottom: 5px;">Tari Janger</h4>
            <p style="font-size: 0.8rem; color: var(--teks-abu); margin-bottom: 15px;">Tari pergaulan muda-mudi yang ceria.</p>
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <span class="badge badge-nonaktif" style="font-size: 0.7rem; background: #eff6ff; color: #1d4ed8;">Arsip</span>
                <div style="display: flex; gap: 8px;">
                    <button class="action-btn">Edit</button>
                    <button class="action-btn">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <div style="background: #fff; border-radius: 15px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border: 1px solid #f0f0f0;">
        <div style="height: 180px; background: linear-gradient(to bottom right, #500000, #300000); position: relative; padding: 15px;">
            <span style="background: var(--emas); color: #000; font-size: 0.65rem; font-weight: 800; padding: 4px 10px; border-radius: 5px; text-transform: uppercase;">Tradisional</span>
        </div>
        <div style="padding: 20px;">
            <h4 style="font-family: 'Playfair Display'; font-size: 1.1rem; margin-bottom: 5px;">Tari Patrol</h4>
            <p style="font-size: 0.8rem; color: var(--teks-abu); margin-bottom: 15px;">Terinspirasi tradisi ronda malam Banyuwangi.</p>
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <span class="badge badge-aktif" style="font-size: 0.7rem;">Tayang</span>
                <div style="display: flex; gap: 8px;">
                    <button class="action-btn">Edit</button>
                    <button class="action-btn">Hapus</button>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection