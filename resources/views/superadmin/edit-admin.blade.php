@extends('layouts.superadmin')

@section('title', 'Edit Data Admin')

@section('content')
<style>
    /* ══ CONTAINER UTAMA ══ */
    .page-container {
        width: 100%;
        max-width: 1000px;
        margin: 1rem auto;
        background-color: #E6E5E5; 
        font-family: 'Poppins', sans-serif;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    /* ══ HEADER MERAH (Sesuai image_38f03f.png) ══ */
    .header-merah {
        background-color: #5B1A1A; 
        padding: 1.5rem 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 4px solid #E4C15A; 
    }

    .header-title h1 {
        font-size: 1.5rem;
        color: #ffffff;
        font-weight: 700;
        margin: 0;
        font-family: 'Times New Roman', serif; 
    }

    .header-actions {
        display: flex;
        gap: 1rem;
    }

    /* ══ TOMBOL AKSI ══ */
    .btn-action {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1.2rem;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.9rem;
        cursor: pointer;
        background: #ffffff;
        text-decoration: none;
        transition: 0.2s;
    }

    .btn-batal { color: #FF4D4D; border: 1.5px solid #FF4D4D; }
    .btn-simpan { color: #007BFF; border: 1.5px solid #007BFF; }
    
    /* ══ FORM BODY ══ */
    .form-body {
        padding: 2.5rem 4rem;
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 0.4rem;
    }

    .form-group label {
        font-size: 1rem;
        font-weight: 600;
        color: #8A4B4B; 
    }

    .form-group input, .form-group select {
        padding: 0.8rem 1rem;
        border: 1.5px solid #8A4B4B; 
        border-radius: 8px;
        font-family: 'Poppins', sans-serif;
        font-size: 0.9rem;
        outline: none;
        background: #ffffff;
    }

    /* ══ CUSTOM FILE INPUT ══ */
    .custom-file-wrapper {
        display: flex;
        align-items: stretch;
        border: 1.5px solid #8A4B4B;
        border-radius: 8px;
        background: #ffffff;
        overflow: hidden;
    }

    .btn-pilih-file {
        background-color: #8A4B4B;
        color: #ffffff !important;
        padding: 0.8rem 1.5rem;
        font-size: 0.9rem;
        cursor: pointer;
        margin: 0;
        display: flex;
        align-items: center;
        border-right: 1.5px solid #8A4B4B;
    }

    .file-name-display {
        padding: 0 1rem;
        color: #333;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        flex-grow: 1;
    }
</style>

<div class="page-container">
    <!-- HEADER -->
    <div class="header-merah">
        <div class="header-title">
            <h1>Edit Data Admin</h1>
            <p style="color: white; font-size: 0.7rem; margin: 0;">Kelola Data Admin Sanggar</p>
        </div>
        <div class="header-actions">
            <a href="{{ url('/superadmin/kelola-admin') }}" class="btn-action btn-batal">✕ Batal</a>
            <button type="submit" form="formEditAdmin" class="btn-action btn-simpan">💾 Simpan</button>
        </div>
    </div>

    <!-- FORM BODY -->
    <div class="form-body">
        <form id="formEditAdmin" action="javascript:void(0)" onsubmit="alert('Data Admin Berhasil Diperbarui!')">
            
            <!-- FOTO ADMIN -->
            <div class="form-group">
                <label>Foto Profil</label>
                <div class="custom-file-wrapper">
                    <label for="foto" class="btn-pilih-file">Pilih File</label>
                    <span class="file-name-display" id="fileName">Rizky_Pratama_Profile.jpg</span>
                    <input type="file" id="foto" style="display:none" onchange="document.getElementById('fileName').innerText = this.files[0].name">
                </div>
                <p style="font-size: 0.7rem; color: #888; margin: 4px 0 0 0;">Format: JPG, PNG. Maks 2MB.</p>
            </div>

            <!-- NAMA LENGKAP -->
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" value="Rizky Pratama" placeholder="Masukkan nama lengkap admin...">
            </div>

            <!-- EMAIL -->
            <div class="form-group">
                <label>Email</label>
                <input type="email" value="rizky@jeb.id" placeholder="Masukkan alamat email...">
            </div>

            <!-- NO HANDPHONE -->
            <div class="form-group">
                <label>No. Handphone</label>
                <input type="text" value="081234567890" placeholder="Masukkan nomor handphone...">
            </div>

            <!-- PASSWORD (OPSIONAL) -->
            <div class="form-group">
                <label>Password Baru (Kosongkan jika tidak ingin ganti)</label>
                <input type="password" placeholder="********">
            </div>

            <!-- STATUS -->
            <div class="form-group">
                <label>Status</label>
                <select>
                    <option value="Aktif" selected>Aktif</option>
                    <option value="Nonaktif">Nonaktif</option>
                </select>
            </div>

        </form>
    </div>
</div>
@endsection