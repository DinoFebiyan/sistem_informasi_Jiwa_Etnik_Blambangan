@extends('layouts.superadmin')

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

<div style="background: var(--merah); border-radius: 20px; padding: 30px; color: #fff; display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; box-shadow: 0 10px 20px rgba(139, 0, 0, 0.15);">
    <div style="display: flex; align-items: center; gap: 25px;">
        <div style="width: 80px; height: 80px; border-radius: 50%; background: rgba(255,255,255,0.1); border: 2px solid var(--emas); display: flex; align-items: center; justify-content: center; font-family: 'Playfair Display'; font-size: 1.5rem; font-weight: 700; color: var(--emas);">
            JEB
        </div>
        <div>
            <h2 style="font-family: 'Playfair Display'; font-size: 1.8rem; margin-bottom: 5px;">Sanggar Tari Jiwa Etnik Blambangan</h2>
            <p style="font-size: 0.9rem; opacity: 0.8;">Pusat pelestarian seni dan budaya tari tradisional Banyuwangi</p>
        </div>
    </div>
    <div style="display: flex; gap: 30px; text-align: center;">
        <div>
            <h3 style="font-size: 1.5rem; color: var(--emas);">10+</h3>
            <p style="font-size: 0.65rem; text-transform: uppercase; letter-spacing: 1px;">Tahun</p>
        </div>
        <div>
            <h3 style="font-size: 1.5rem; color: var(--emas);">24</h3>
            <p style="font-size: 0.65rem; text-transform: uppercase; letter-spacing: 1px;">Katalog</p>
        </div>
        <div>
            <h3 style="font-size: 1.5rem; color: var(--emas);">200+</h3>
            <p style="font-size: 0.65rem; text-transform: uppercase; letter-spacing: 1px;">Alumni</p>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3 style="font-size: 1rem;">Informasi Umum</h3>
    </div>
    <div class="card-body" style="padding: 25px;">
        <form style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px;">
            <div style="grid-column: span 1;">
                <label style="display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 8px;">Nama Sanggar</label>
                <input type="text" value="Sanggar Tari Jiwa Etnik Blambangan" style="width: 100%; padding: 12px; border: 1px solid var(--abu-border); border-radius: 10px; background: #fafafa;">
            </div>
            <div style="grid-column: span 1;">
                <label style="display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 8px;">Singkatan</label>
                <input type="text" value="JEB" style="width: 100%; padding: 12px; border: 1px solid var(--abu-border); border-radius: 10px; background: #fafafa;">
            </div>

            <div style="grid-column: span 1;">
                <label style="display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 8px;">Email</label>
                <input type="email" value="info@jeb.id" style="width: 100%; padding: 12px; border: 1px solid var(--abu-border); border-radius: 10px; background: #fafafa;">
            </div>
            <div style="grid-column: span 1;">
                <label style="display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 8px;">No. Telepon</label>
                <input type="text" value="(0333) 123-456" style="width: 100%; padding: 12px; border: 1px solid var(--abu-border); border-radius: 10px; background: #fafafa;">
            </div>

            <div style="grid-column: span 2;">
                <label style="display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 8px;">Alamat</label>
                <input type="text" value="Jl. Kebudayaan No. 12, Banyuwangi, Jawa Timur" style="width: 100%; padding: 12px; border: 1px solid var(--abu-border); border-radius: 10px; background: #fafafa;">
            </div>

            <div style="grid-column: span 2;">
                <label style="display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 8px;">Deskripsi Sanggar</label>
                <textarea style="width: 100%; padding: 12px; border: 1px solid var(--abu-border); border-radius: 10px; background: #fafafa; min-height: 100px; resize: vertical;">Sanggar Tari Jiwa Etnik Blambangan (JEB) adalah pusat seni tari tradisional yang berdedikasi untuk melestarikan kekayaan budaya Banyuwangi dan Nusantara.</textarea>
            </div>

            <div style="grid-column: span 1;">
                <label style="display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 8px;">Tahun Berdiri</label>
                <input type="text" value="2014" style="width: 100%; padding: 12px; border: 1px solid var(--abu-border); border-radius: 10px; background: #fafafa;">
            </div>
            <div style="grid-column: span 1;">
                <label style="display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 8px;">Instagram</label>
                <input type="text" value="@sanggar.jeb" style="width: 100%; padding: 12px; border: 1px solid var(--abu-border); border-radius: 10px; background: #fafafa;">
            </div>
        </form>
    </div>
</div>
@endsection