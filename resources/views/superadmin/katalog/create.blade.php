@extends('layouts.superadmin-clean')

@section('title', 'Tambah Katalog — JEB')

@section('styles')
<style>
    * { box-sizing: border-box; }
    .tk-page {
        font-family: 'Poppins', sans-serif;
        background: #e5e5e5;
        min-height: 100vh;
        padding-bottom: 40px;
    }
    /* ── Header bar ── */
    .tk-topbar {
        background: #5a1a1a;
        padding: 14px 28px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .tk-topbar-title h2 {
        margin: 0;
        font-size: 1.1rem;
        font-weight: 700;
        color: #fff;
    }
    .tk-topbar-title span {
        font-size: 0.75rem;
        color: #d4a5a5;
    }
    .tk-topbar-actions {
        display: flex;
        gap: 10px;
    }
    .tk-btn-batal {
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
    .tk-btn-batal:hover { background: rgba(255,255,255,0.1); color: #fff; }
    .tk-btn-simpan {
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
    .tk-btn-simpan:hover { background: #991b1b; }
    /* ── Form body ── */
    .tk-body {
        padding: 28px;
    }
    .tk-form-group {
        margin-bottom: 20px;
    }
    .tk-form-group label {
        display: block;
        font-size: 0.85rem;
        font-weight: 600;
        color: #3a1010;
        margin-bottom: 7px;
    }
    .tk-form-group input[type="text"],
    .tk-form-group input[type="number"],
    .tk-form-group select,
    .tk-form-group textarea {
        width: 100%;
        padding: 11px 16px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 0.88rem;
        font-family: 'Poppins', sans-serif;
        background: #fff;
        color: #333;
        outline: none;
        transition: border-color 0.2s;
    }
    .tk-form-group input:focus,
    .tk-form-group select:focus,
    .tk-form-group textarea:focus {
        border-color: #b91c1c;
    }
    .tk-form-group textarea {
        resize: vertical;
        min-height: 110px;
    }
    .tk-form-group select {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23666' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 16px center;
        padding-right: 40px;
    }
    /* ── File input row ── */
    .tk-file-row {
        display: flex;
        align-items: center;
        gap: 0;
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
        background: #fff;
    }
    .tk-file-btn {
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
    .tk-file-btn:hover { background: #991b1b; }
    .tk-file-name {
        flex: 1;
        padding: 11px 16px;
        font-size: 0.85rem;
        color: #aaa;
        font-family: 'Poppins', sans-serif;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .tk-file-hint {
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
    /* ── Error ── */
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
<div class="tk-page">

    <form action="{{ route('superadmin.katalog.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Header --}}
        <div class="tk-topbar">
            <div class="tk-topbar-title">
                <h2>Tambah Katalog</h2>
                <span>Kelola Katalog</span>
            </div>
            <div class="tk-topbar-actions">
                <a href="{{ route('superadmin.katalog.index') }}" class="tk-btn-batal">
                    <i class="fas fa-times"></i> Batal
                </a>
                <button type="submit" class="tk-btn-simpan">
                    <i class="fas fa-save"></i> Simpan
                </button>
            </div>
        </div>

        {{-- Body --}}
        <div class="tk-body">

            @if(session('success'))
            <div style="background:#dcfce7;color:#16a34a;padding:12px 16px;border-radius:8px;margin-bottom:20px;font-size:0.85rem;">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
            @endif

            @if($errors->any())
            <div style="background:#fee2e2;color:#b91c1c;padding:12px 16px;border-radius:8px;margin-bottom:20px;font-size:0.85rem;">
                <i class="fas fa-exclamation-circle"></i> Harap perbaiki kesalahan pada form.
            </div>
            @endif

            {{-- Foto --}}
            <div class="tk-form-group">
                <label>Foto</label>
                <div class="tk-file-row {{ $errors->has('foto') ? 'is-invalid' : '' }}">
                    <div class="tk-file-btn" onclick="document.getElementById('fotoInput').click()">
                        Pilih File
                    </div>
                    <span class="tk-file-name" id="fotoFileName">Masukkan foto atau baru...</span>
                </div>
                <input type="file" id="fotoInput" name="foto" accept="image/jpeg,image/png,image/jpg"
                       onchange="updateFileNameAndPreview(this)">
                <div class="tk-file-hint">Format: JPG, PNG. Maks 2MB.</div>
                <img id="fotoPreview" src="" alt="Preview Foto">
                @error('foto')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            {{-- Nama Katalog --}}
            <div class="tk-form-group">
                <label>Nama Katalog</label>
                <input type="text" name="nama_tari" value="{{ old('nama_tari') }}"
                       placeholder="Masukkan katalog..."
                       class="{{ $errors->has('nama_tari') ? 'is-invalid' : '' }}">
                @error('nama_tari')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            {{-- Kategori --}}
            <div class="tk-form-group">
                <label>Kategori</label>
                <select name="kategori" class="{{ $errors->has('kategori') ? 'is-invalid' : '' }}">
                    <option value="">Pilih kategori katalog...</option>
                    <option value="Kostum"   {{ old('kategori') == 'Kostum'   ? 'selected' : '' }}>Kostum</option>
                    <option value="Properti" {{ old('kategori') == 'Properti' ? 'selected' : '' }}>Properti</option>
                    <option value="Aksesori" {{ old('kategori') == 'Aksesori' ? 'selected' : '' }}>Aksesori</option>
                </select>
                @error('kategori')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            {{-- Deskripsi --}}
            <div class="tk-form-group">
                <label>Deskripsi Katalog</label>
                <textarea name="deskripsi" placeholder="Masukkan deskripsi katalog..."
                          class="{{ $errors->has('deskripsi') ? 'is-invalid' : '' }}">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            {{-- Stok --}}
            <div class="tk-form-group">
                <label>Masukkan Stok Barang</label>
                <input type="number" name="stok" value="{{ old('stok', 0) }}" min="0"
                       placeholder="Masukkan stok barang..."
                       class="{{ $errors->has('stok') ? 'is-invalid' : '' }}">
                @error('stok')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            {{-- Status hidden default tersedia --}}
            <input type="hidden" name="status" value="tersedia">

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

            // Update nama file
            fileNameSpan.textContent = file.name;
            fileNameSpan.style.color = '#333';

            // Update preview foto
            var reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                previewImg.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            fileNameSpan.textContent = 'Masukkan foto atau baru...';
            fileNameSpan.style.color = '#aaa';
            previewImg.style.display = 'none';
        }
    }
</script>
@endpush