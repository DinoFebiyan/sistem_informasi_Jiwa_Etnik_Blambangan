@extends('layouts.superadmin')

@section('content')
<style>
    /* ══ CONTAINER UTAMA ══ */
    .edit-box { 
        width: 100%; 
        max-width: 900px; 
        margin: 1rem auto; 
        background: #E6E5E5; 
        border-radius: 8px; 
        overflow: hidden; 
        font-family: 'Poppins', sans-serif;
    }

    /* ══ HEADER MERAH MAROON ══ */
    .edit-header { 
        background: #5B1A1A; 
        padding: 1.2rem 2rem; 
        display: flex; 
        justify-content: space-between; 
        align-items: center; 
        border-bottom: 4px solid #E4C15A; 
        color: white; 
    }
    .edit-header h1 { 
        margin: 0; 
        font-family: 'Times New Roman', serif; 
        font-size: 1.4rem; 
    }
    .edit-header p { 
        margin: 0; 
        font-size: 0.7rem; 
        opacity: 0.9;
    }

    /* ══ TOMBOL HEADER ══ */
    .btn-head { 
        padding: 8px 18px; 
        border-radius: 6px; 
        font-weight: 600; 
        text-decoration: none; 
        background: white; 
        font-size: 0.85rem; 
        display: flex;
        align-items: center;
        gap: 8px;
        border: 1px solid #ddd;
    }

    /* ══ FORM BODY ══ */
    .edit-body { 
        padding: 2.5rem 4rem; 
        display: flex; 
        flex-direction: column; 
        gap: 1.5rem; 
    }
    .form-group { 
        display: flex; 
        flex-direction: column; 
        gap: 8px; 
    }
    .form-group label { 
        font-weight: 700; 
        color: #8A4B4B; 
        font-size: 0.95rem;
    }

    /* ══ KUNCI DESAIN PILIH FILE (SAMA SEPERTI image_2e8036.png) ══ */
    .custom-file-wrapper {
        display: flex;
        align-items: stretch;
        border: 1.5px solid #8A4B4B;
        border-radius: 8px;
        background: #ffffff;
        overflow: hidden;
        height: 45px;
    }

    .btn-pilih-file {
        background-color: #8A4B4B; /* Warna coklat kemerahan */
        color: #ffffff !important;
        padding: 0 20px;
        font-size: 0.9rem;
        font-weight: 600;
        cursor: pointer;
        display: flex;
        align-items: center;
        border: none;
        margin: 0;
    }

    .file-name-display {
        padding: 0 15px;
        color: #333;
        font-size: 0.85rem;
        display: flex;
        align-items: center;
        flex-grow: 1;
        background: #fff;
    }

    /* Input Teks & Textarea */
    .form-control {
        padding: 12px 15px;
        border: 1.5px solid #8A4B4B;
        border-radius: 8px;
        outline: none;
        font-family: 'Poppins', sans-serif;
        font-size: 0.9rem;
    }
</style>

<div class="edit-box">
    <!-- HEADER -->
    <div class="edit-header">
        <div>
            <h1>Edit Katalog</h1>
            <p>Kelola Sanggar Tari Jiwa Etnik Blambangan</p>
        </div>
        <div style="display:flex; gap:10px;">
            <a href="{{ url('/superadmin/kelola-katalog') }}" class="btn-head" style="color:#FF4D4D;">✕ Batal</a>
            <a href="#" class="btn-head" style="color:#007BFF;">💾 Simpan Perubahan</a>
        </div>
    </div>

    <!-- BODY -->
    <div class="edit-body">
        <!-- FOTO PRODUK (DESAIN KUSTOM) -->
        <div class="form-group">
            <label>Foto Produk</label>
            <div class="custom-file-wrapper">
                <label for="foto_katalog" class="btn-pilih-file">Pilih File</label>
                <span class="file-name-display" id="file-name">Baju_Gandrung_01.png</span>
                <input type="file" id="foto_katalog" style="display:none" onchange="document.getElementById('file-name').innerText = this.files[0].name">
            </div>
        </div>

        <div class="form-group">
            <label>Nama Barang</label>
            <input type="text" class="form-control" value="Baju Tari Gandrung">
        </div>

        <div class="form-group">
            <label>Kategori</label>
            <select class="form-control">
                <option selected>Baju Tari</option>
                <option>Alat Musik</option>
                <option>Aksesoris</option>
            </select>
        </div>

        <div class="form-group">
            <label>Stok</label>
            <input type="number" class="form-control" value="5">
        </div>

        <div class="form-group">
            <label>Deskripsi</label>
            <textarea class="form-control" rows="4">Baju tari gandrung khas banyuwangi, dengan bahan kain halus dan nyaman dipakai</textarea>
        </div>
    </div>
</div>
@endsection