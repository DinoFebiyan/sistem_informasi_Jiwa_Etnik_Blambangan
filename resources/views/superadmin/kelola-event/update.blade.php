@extends('layouts.superadmin')

@section('title', 'Edit Event — JEB')
@section('header_title', 'Edit Event')

@section('content')
<style>
    /* Gunakan style yang sama dengan create */
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
    .current-foto {
        margin-top: 8px;
        font-size: 0.75rem;
        color: #16a34a;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .current-foto img {
        width: 40px;
        height: 40px;
        border-radius: 6px;
        object-fit: cover;
        border: 1px solid #e8dede;
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
            <h1>Edit Event</h1>
            <p>Kelola Event</p>
        </div>
        <div class="header-actions">
            <a href="{{ route('superadmin.kelola-event') }}" class="btn-batal"><i class="fas fa-times"></i> Batal</a>
            <button type="submit" form="formEditEvent" class="btn-simpan"><i class="fas fa-save"></i> Update</button>
        </div>
    </div>

    <div class="form-body">
        <form id="formEditEvent" action="{{ route('superadmin.event.update', $event->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-grid">
                <!-- Foto Event -->
                <div class="form-group full">
                    <label>Foto Event</label>
                    <div class="custom-file-wrapper">
                        <label for="foto" class="btn-pilih-file">Pilih File Baru</label>
                        <span class="file-name-display" id="fileNameDisplay">Kosongkan jika tidak ingin mengganti</span>
                        <input type="file" id="foto" name="foto" accept="image/jpeg,image/png" style="display:none" onchange="updateFileName(this)">
                    </div>
                    @if($event->galeri && $event->galeri->file_blob)
                    <div class="current-foto">
                        <img src="data:image/jpeg;base64,{{ base64_encode($event->galeri->file_blob) }}" alt="Foto saat ini">
                        <span>Foto saat ini</span>
                    </div>
                    @endif
                    <span class="form-helper">Format: JPG, PNG. Maks 2MB.</span>
                </div>

                <!-- Nama Event -->
                <div class="form-group full">
                    <label for="nama_event">Nama Event <span class="text-red">*</span></label>
                    <input type="text" id="nama_event" name="nama_event" value="{{ old('nama_event', $event->nama_event) }}" required>
                </div>

                <!-- Deskripsi -->
                <div class="form-group full">
                    <label for="deskripsi">Deskripsi Event</label>
                    <textarea id="deskripsi" name="deskripsi" placeholder="Tulis deskripsi singkat event...">{{ old('deskripsi', $event->deskripsi) }}</textarea>
                </div>

                <!-- Kategori -->
                <div class="form-group">
                    <label for="kategori">Kategori <span class="text-red">*</span></label>
                    <select id="kategori" name="kategori" required>
                        <option value="Pertunjukan" {{ $event->kategori == 'Pertunjukan' ? 'selected' : '' }}>Pertunjukan</option>
                        <option value="Workshop" {{ $event->kategori == 'Workshop' ? 'selected' : '' }}>Workshop</option>
                        <option value="Lomba" {{ $event->kategori == 'Lomba' ? 'selected' : '' }}>Lomba</option>
                        <option value="Latihan Bersama" {{ $event->kategori == 'Latihan Bersama' ? 'selected' : '' }}>Latihan Bersama</option>
                    </select>
                </div>

                <!-- Tanggal -->
                <div class="form-group">
                    <label for="tanggal">Tanggal <span class="text-red">*</span></label>
                    <input type="date" id="tanggal" name="tanggal" value="{{ old('tanggal', $event->tanggal->format('Y-m-d')) }}" required>
                </div>

                <!-- Jam -->
                <div class="form-group">
                    <label for="jam">Jam <span class="text-red">*</span></label>
                    <input type="time" id="jam" name="jam" value="{{ old('jam', \Carbon\Carbon::parse($event->jam)->format('H:i')) }}" required>
                </div>

                <!-- Lokasi -->
                <div class="form-group">
                    <label for="lokasi">Lokasi <span class="text-red">*</span></label>
                    <input type="text" id="lokasi" name="lokasi" value="{{ old('lokasi', $event->lokasi) }}" required>
                </div>

                <!-- Status -->
                <div class="form-group">
                    <label for="status">Status <span class="text-red">*</span></label>
                    <select id="status" name="status" required>
                        <option value="belum selesai" {{ $event->status == 'belum selesai' ? 'selected' : '' }}>Belum Selesai</option>
                        <option value="selesai" {{ $event->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
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
            display.textContent = "Kosongkan jika tidak ingin mengganti";
            display.style.color = "#999";
        }
    }
</script>
@endsection