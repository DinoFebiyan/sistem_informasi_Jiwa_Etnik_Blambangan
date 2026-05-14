@extends('layouts.superadmin')

@section('title', 'Tambah Event — JEB')
@section('header_title', 'Tambah Event')

@section('content')
<style>
    .page-container {
        max-width: 1000px;
        margin: 0 auto;
        background: #fff;
        border-radius: 14px;
        border: 1px solid #e8dede;
        overflow: hidden;
    }
    .form-header {
        background: #5B1A1A;
        padding: 1.2rem 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 4px solid #E4C15A;
    }
    .form-header h1 {
        color: white;
        font-family: 'Playfair Display', serif;
        font-size: 1.5rem;
        margin: 0;
    }
    .form-header p {
        color: rgba(255,255,255,0.7);
        font-size: 0.8rem;
        margin: 0;
    }
    .header-actions {
        display: flex;
        gap: 12px;
    }
    .btn-batal, .btn-simpan {
        padding: 8px 20px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.85rem;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: all 0.2s;
    }
    .btn-batal {
        background: white;
        color: #FF4D4D;
        border: 1px solid #FF4D4D;
    }
    .btn-batal:hover { background: #fff0f0; }
    .btn-simpan {
        background: white;
        color: #007BFF;
        border: 1px solid #007BFF;
    }
    .btn-simpan:hover { background: #f0f8ff; }
    .form-body {
        padding: 2rem 2.5rem;
    }
    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.2rem;
    }
    .form-group {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }
    .form-group.full {
        grid-column: span 2;
    }
    .form-group label {
        font-weight: 700;
        color: #8A4B4B;
        font-size: 0.85rem;
    }
    .form-group input, .form-group select, .form-group textarea {
        padding: 10px 14px;
        border: 1.5px solid #e8dede;
        border-radius: 10px;
        font-family: 'Poppins', sans-serif;
        font-size: 0.9rem;
        outline: none;
        transition: border 0.2s;
    }
    .form-group input:focus, .form-group select:focus, .form-group textarea:focus {
        border-color: #8B0000;
    }
    .form-group textarea {
        resize: vertical;
        min-height: 100px;
    }
    .custom-file-wrapper {
        display: flex;
        align-items: stretch;
        border: 1.5px solid #e8dede;
        border-radius: 10px;
        background: white;
        overflow: hidden;
    }
    .btn-pilih-file {
        background: #8A4B4B;
        color: white !important;
        padding: 10px 20px;
        font-size: 0.85rem;
        cursor: pointer;
        margin: 0;
        display: flex;
        align-items: center;
        border-right: 1px solid #e8dede;
    }
    .file-name-display {
        padding: 0 15px;
        display: flex;
        align-items: center;
        color: #999;
        font-size: 0.85rem;
        flex-grow: 1;
    }
    .form-helper {
        font-size: 0.7rem;
        color: #888;
        margin-top: 2px;
    }
    @media (max-width: 700px) {
        .form-grid { grid-template-columns: 1fr; }
        .form-group.full { grid-column: span 1; }
        .form-header { flex-direction: column; gap: 12px; align-items: stretch; text-align: center; }
        .header-actions { justify-content: center; }
    }
</style>

<div class="page-container">
    <div class="form-header">
        <div>
            <h1>Tambah Event Baru</h1>
            <p>Kelola Event</p>
        </div>
        <div class="header-actions">
            <a href="{{ route('superadmin.kelola-event') }}" class="btn-batal"><i class="fas fa-times"></i> Batal</a>
            <button type="submit" form="formTambahEvent" class="btn-simpan"><i class="fas fa-save"></i> Simpan</button>
        </div>
    </div>

    <div class="form-body">
        <form id="formTambahEvent" action="{{ route('superadmin.event.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-grid">
                <!-- Foto Event -->
                <div class="form-group full">
                    <label>Foto Event</label>
                    <div class="custom-file-wrapper">
                        <label for="foto" class="btn-pilih-file">Pilih File</label>
                        <span class="file-name-display" id="fileNameDisplay">Belum ada file dipilih</span>
                        <input type="file" id="foto" name="foto" accept="image/jpeg,image/png" style="display:none" onchange="updateFileName(this)">
                    </div>
                    <span class="form-helper">Format: JPG, PNG. Maks 2MB.</span>
                </div>

                <!-- Nama Event -->
                <div class="form-group full">
                    <label for="nama_event">Nama Event <span class="text-red">*</span></label>
                    <input type="text" id="nama_event" name="nama_event" placeholder="Contoh: Pentas Tari Gandrung" required>
                </div>

                <!-- Deskripsi -->
                <div class="form-group full">
                    <label for="deskripsi">Deskripsi Event</label>
                    <textarea id="deskripsi" name="deskripsi" placeholder="Tulis deskripsi singkat event..."></textarea>
                </div>

                <!-- Kategori -->
                <div class="form-group">
                    <label for="kategori">Kategori <span class="text-red">*</span></label>
                    <select id="kategori" name="kategori" required>
                        <option value="" disabled selected>Pilih kategori</option>
                        <option value="Pertunjukan">Pertunjukan</option>
                        <option value="Workshop">Workshop</option>
                        <option value="Lomba">Lomba</option>
                        <option value="Latihan Bersama">Latihan Bersama</option>
                    </select>
                </div>

                <!-- Tanggal -->
                <div class="form-group">
                    <label for="tanggal">Tanggal <span class="text-red">*</span></label>
                    <input type="date" id="tanggal" name="tanggal" required>
                </div>

                <!-- Jam -->
                <div class="form-group">
                    <label for="jam">Jam <span class="text-red">*</span></label>
                    <input type="time" id="jam" name="jam" required>
                </div>

                <!-- Lokasi -->
                <div class="form-group">
                    <label for="lokasi">Lokasi <span class="text-red">*</span></label>
                    <input type="text" id="lokasi" name="lokasi" placeholder="Nama tempat / alamat" required>
                </div>

                <!-- Status -->
                <div class="form-group">
                    <label for="status">Status <span class="text-red">*</span></label>
                    <select id="status" name="status" required>
                        <option value="belum selesai" selected>Belum Selesai</option>
                        <option value="selesai">Selesai</option>
                    </select>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function updateFileName(input) {
        const display = document.getElementById('fileNameDisplay');
        if (input.files && input.files.length > 0) {
            display.textContent = input.files[0].name;
            display.style.color = "#333";
        } else {
            display.textContent = "Belum ada file dipilih";
            display.style.color = "#999";
        }
    }
</script>
@endsection