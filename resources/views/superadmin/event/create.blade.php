@extends('layouts.superadmin-clean')

@section('title', 'Tambah Event — JEB')

@section('styles')
<style>
    * { box-sizing: border-box; }

    .te-page {
        font-family: 'Poppins', sans-serif;
        background: #e5e5e5;
        min-height: 100vh;
        padding-bottom: 40px;
    }

    .te-topbar {
        background: #5a1a1a;
        padding: 14px 28px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .te-topbar-title h2 {
        margin: 0;
        font-size: 1.1rem;
        font-weight: 700;
        color: #fff;
    }
    .te-topbar-title span {
        font-size: 0.75rem;
        color: #d4a5a5;
    }
    .te-topbar-actions {
        display: flex;
        gap: 10px;
    }
    .te-btn-batal {
        padding: 7px 20px;
        border-radius: 8px;
        border: 1.5px solid #fff;
        background: transparent;
        color: #fff;
        font-size: 0.82rem;
        font-weight: 600;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        text-decoration: none;
        transition: background 0.2s;
    }
    .te-btn-batal:hover { background: rgba(255,255,255,0.1); color: #fff; }
    .te-btn-simpan {
        padding: 7px 20px;
        border-radius: 8px;
        border: none;
        background: #b91c1c;
        color: #fff;
        font-size: 0.82rem;
        font-weight: 600;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: background 0.2s;
    }
    .te-btn-simpan:hover { background: #991b1b; }

    .te-body {
        padding: 28px;
    }
    .te-form-group {
        margin-bottom: 20px;
    }
    .te-form-group label {
        display: block;
        font-size: 0.85rem;
        font-weight: 600;
        color: #3a1010;
        margin-bottom: 7px;
    }
    .te-form-group input[type="text"],
    .te-form-group input[type="date"],
    .te-form-group input[type="time"],
    .te-form-group select,
    .te-form-group textarea {
        width: 100%;
        padding: 11px 16px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 0.88rem;
        font-family: 'Poppins', sans-serif;
        background: #fff;
        outline: none;
        transition: border-color 0.2s;
    }
    .te-form-group input:focus,
    .te-form-group select:focus,
    .te-form-group textarea:focus {
        border-color: #b91c1c;
    }
    .te-form-group textarea {
        resize: vertical;
        min-height: 110px;
    }
    .te-form-group select {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23666' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 16px center;
        padding-right: 40px;
    }

    .te-file-row {
        display: flex;
        align-items: center;
        gap: 0;
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
        background: #fff;
    }
    .te-file-btn {
        padding: 11px 18px;
        background: #b91c1c;
        color: #fff;
        font-size: 0.82rem;
        font-weight: 600;
        cursor: pointer;
        white-space: nowrap;
        flex-shrink: 0;
        transition: background 0.2s;
    }
    .te-file-btn:hover { background: #991b1b; }
    .te-file-name {
        flex: 1;
        padding: 11px 16px;
        font-size: 0.85rem;
        color: #aaa;
        font-family: 'Poppins', sans-serif;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .te-file-hint {
        font-size: 0.75rem;
        color: #888;
        margin-top: 5px;
    }
    #fotoInput { display: none; }
    #fotoPreview {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 8px;
        margin-top: 10px;
        display: none;
        border: 1px solid #e8dede;
    }

    .is-invalid { border-color: #ef4444 !important; }
    .invalid-feedback {
        font-size: 0.78rem;
        color: #ef4444;
        margin-top: 4px;
        display: block;
    }
</style>
@endsection

@section('content')
<div class="te-page">
    <form action="{{ route('superadmin.event.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="te-topbar">
            <div class="te-topbar-title">
                <h2>Tambah Event</h2>
                <span>Kelola Event</span>
            </div>
            <div class="te-topbar-actions">
                <a href="{{ route('superadmin.event.index') }}" class="te-btn-batal">
                    <i class="fas fa-times"></i> Batal
                </a>
                <button type="submit" class="te-btn-simpan">
                    <i class="fas fa-save"></i> Simpan
                </button>
            </div>
        </div>

        <div class="te-body">
            @if(session('success'))
            <div style="background:#dcfce7;color:#16a34a;padding:12px 16px;border-radius:8px;margin-bottom:20px;">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
            @endif

            @if($errors->any())
            <div style="background:#fee2e2;color:#b91c1c;padding:12px 16px;border-radius:8px;margin-bottom:20px;">
                <i class="fas fa-exclamation-circle"></i> Harap perbaiki kesalahan pada form.
            </div>
            @endif

            <!-- Foto Event -->
            <div class="te-form-group">
                <label>Foto Event</label>
                <div class="te-file-row {{ $errors->has('foto') ? 'is-invalid' : '' }}">
                    <div class="te-file-btn" onclick="document.getElementById('fotoInput').click()">
                        Pilih File
                    </div>
                    <span class="te-file-name" id="fotoFileName">Masukkan foto event...</span>
                </div>
                <input type="file" id="fotoInput" name="foto" accept="image/jpeg,image/png" onchange="updateFileNameAndPreview(this)">
                <div class="te-file-hint">Format: JPG, PNG. Maks 2MB.</div>
                <img id="fotoPreview" src="" alt="Preview Foto">
                @error('foto')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <!-- Nama Event -->
            <div class="te-form-group">
                <label>Nama Event</label>
                <input type="text" name="nama_event" value="{{ old('nama_event') }}" placeholder="Masukkan nama event..." required>
            </div>

            <!-- Deskripsi Event -->
            <div class="te-form-group">
                <label>Deskripsi Event</label>
                <textarea name="deskripsi" placeholder="Masukkan deskripsi event...">{{ old('deskripsi') }}</textarea>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div class="te-form-group">
                    <label>Kategori</label>
                    <select name="kategori" required>
                        <option value="">Pilih kategori</option>
                        <option value="Pertunjukan">Pertunjukan</option>
                        <option value="Workshop">Workshop</option>
                        <option value="Lomba">Lomba</option>
                        <option value="Latihan Bersama">Latihan Bersama</option>
                    </select>
                </div>
                <div class="te-form-group">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" required>
                </div>
                <div class="te-form-group">
                    <label>Jam</label>
                    <input type="time" name="jam" required>
                </div>
                <div class="te-form-group">
                    <label>Lokasi</label>
                    <input type="text" name="lokasi" placeholder="Nama tempat / alamat" required>
                </div>
                <div class="te-form-group">
                    <label>Status</label>
                    <select name="status" required>
                        <option value="belum selesai">Belum Selesai</option>
                        <option value="selesai">Selesai</option>
                    </select>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    function updateFileNameAndPreview(input) {
        var fileNameSpan = document.getElementById('fotoFileName');
        var previewImg = document.getElementById('fotoPreview');
        
        if (input.files && input.files.length > 0) {
            var file = input.files[0];
            
            // 1. Update Teks Nama File
            fileNameSpan.textContent = file.name;
            fileNameSpan.style.color = '#333';
            
            // 2. Update Preview Foto
            var reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                previewImg.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            fileNameSpan.textContent = 'Masukkan foto event...';
            fileNameSpan.style.color = '#aaa';
            previewImg.style.display = 'none';
        }
    }
</script>
@endpush
