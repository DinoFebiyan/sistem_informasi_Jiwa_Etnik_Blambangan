@extends('layouts.superadmin-clean')

@section('title', 'Edit Event — JEB')

@section('styles')
<style>
    * { box-sizing: border-box; }

    .eu-page {
        font-family: 'Poppins', sans-serif;
        background: #FFFFFF;
        min-height: 100vh;
        padding-bottom: 40px;
    }

    .eu-topbar {
        background: #5a1a1a;
        padding: 14px 28px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .eu-topbar-title h2 {
        margin: 0;
        font-size: 1.1rem;
        font-weight: 700;
        color: #fff;
    }
    .eu-topbar-title span {
        font-size: 0.75rem;
        color: #d4a5a5;
    }
    .eu-topbar-actions {
        display: flex;
        gap: 10px;
    }
    .eu-btn-batal {
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
    .eu-btn-batal:hover { background: rgba(255,255,255,0.1); color: #fff; }
    .eu-btn-simpan {
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
    .eu-btn-simpan:hover { background: #991b1b; }

    .eu-body {
        padding: 28px;
    }
    .eu-form-group {
        margin-bottom: 20px;
    }
    .eu-form-group label {
        display: block;
        font-size: 0.85rem;
        font-weight: 600;
        color: #3a1010;
        margin-bottom: 7px;
    }
    .eu-form-group input[type="text"],
    .eu-form-group input[type="date"],
    .eu-form-group input[type="time"],
    .eu-form-group select,
    .eu-form-group textarea {
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
    .eu-form-group input:focus,
    .eu-form-group select:focus,
    .eu-form-group textarea:focus {
        border-color: #b91c1c;
    }
    .eu-form-group textarea {
        resize: vertical;
        min-height: 110px;
    }
    .eu-form-group select {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23666' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 16px center;
        padding-right: 40px;
    }

    .eu-file-row {
        display: flex;
        align-items: center;
        gap: 0;
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
        background: #fff;
    }
    .eu-file-btn {
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
    .eu-file-btn:hover { background: #991b1b; }
    .eu-file-name {
        flex: 1;
        padding: 11px 16px;
        font-size: 0.85rem;
        color: #aaa;
        font-family: 'Poppins', sans-serif;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .eu-file-hint {
        font-size: 0.75rem;
        color: #888;
        margin-top: 5px;
    }
    #fotoInput { display: none; }
    #fotoPreview {
        max-width: 150px;
        height: auto;
        border-radius: 10px;
        margin-top: 15px;
        display: none;
        border: 2px solid #b91c1c;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    .current-photo {
        margin-top: 8px;
        font-size: 0.75rem;
        color: #16a34a;
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
<div class="eu-page">
    <form action="{{ route('superadmin.event.update', $event->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="eu-topbar">
            <div class="eu-topbar-title">
                <h2>Edit Event</h2>
                <span>Kelola Event</span>
            </div>
            <div class="eu-topbar-actions">
                <a href="{{ route('superadmin.event.index') }}" class="eu-btn-batal">
                    <i class="fas fa-times"></i> Batal
                </a>
                <button type="submit" class="eu-btn-simpan">
                    <i class="fas fa-save"></i> Simpan
                </button>
            </div>
        </div>

        <div class="eu-body">
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
            <div class="eu-form-group">
                <label>Foto Event</label>
                <div class="eu-file-row {{ $errors->has('foto') ? 'is-invalid' : '' }}">
                    <div class="eu-file-btn" onclick="document.getElementById('fotoInput').click()">
                        Pilih File
                    </div>
                    <span class="eu-file-name" id="fotoFileName">
                        @if($event->galeri && $event->galeri->nama_file)
                            {{ $event->galeri->nama_file }}
                        @else
                            Masukkan foto event...
                        @endif
                    </span>
                </div>
                <input type="file" id="fotoInput" name="foto" accept="image/jpeg,image/png" onchange="updateFileNameAndPreview(this)">
                <div class="eu-file-hint">Format: JPG, PNG. Maks 2MB. Kosongkan jika tidak ingin mengganti foto.</div>
                <img id="fotoPreview" src="" alt="Preview Foto">
                @if($event->galeri && $event->galeri->file_blob)
                    <div class="current-photo">
                        <i class="fas fa-image"></i> Foto saat ini: {{ $event->galeri->nama_file }}
                    </div>
                @endif
                @error('foto')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <!-- Nama Event -->
            <div class="eu-form-group">
                <label>Nama Event</label>
                <input type="text" name="nama_event" value="{{ old('nama_event', $event->nama_event) }}" placeholder="Masukkan nama event..." required>
                @error('nama_event')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <!-- Deskripsi Event -->
            <div class="eu-form-group">
                <label>Deskripsi Event</label>
                <textarea name="deskripsi" placeholder="Masukkan deskripsi event...">{{ old('deskripsi', $event->deskripsi) }}</textarea>
                @error('deskripsi')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div class="eu-form-group">
                    <label>Kategori</label>
                    <select name="kategori" required>
                        <option value="">Pilih kategori</option>
                        <option value="Pertunjukan" {{ old('kategori', $event->kategori) == 'Pertunjukan' ? 'selected' : '' }}>Pertunjukan</option>
                        <option value="Workshop" {{ old('kategori', $event->kategori) == 'Workshop' ? 'selected' : '' }}>Workshop</option>
                        <option value="Lomba" {{ old('kategori', $event->kategori) == 'Lomba' ? 'selected' : '' }}>Lomba</option>
                        <option value="Latihan Bersama" {{ old('kategori', $event->kategori) == 'Latihan Bersama' ? 'selected' : '' }}>Latihan Bersama</option>
                    </select>
                </div>

                <div class="eu-form-group">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" value="{{ old('tanggal', $event->tanggal ? \Carbon\Carbon::parse($event->tanggal)->format('Y-m-d') : '') }}" required>
                </div>

                <div class="eu-form-group">
                    <label>Jam</label>
                    <input type="time" name="jam" value="{{ old('jam', $event->jam ? \Carbon\Carbon::parse($event->jam)->format('H:i') : '') }}" required>
                </div>

                <div class="eu-form-group">
                    <label>Lokasi</label>
                    <input type="text" name="lokasi" value="{{ old('lokasi', $event->lokasi) }}" placeholder="Nama tempat / alamat" required>
                </div>

                <div class="eu-form-group">
                    <label>Status</label>
                    <select name="status" required>
                        <option value="belum selesai" {{ old('status', $event->status) == 'belum selesai' ? 'selected' : '' }}>Belum Selesai</option>
                        <option value="selesai" {{ old('status', $event->status) == 'selesai' ? 'selected' : '' }}>Selesai</option>
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
            fileNameSpan.textContent = file.name;
            fileNameSpan.style.color = '#333';
            var reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                previewImg.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            var oldFileName = "{{ $event->galeri ? $event->galeri->nama_file : 'Masukkan foto event...' }}";
            fileNameSpan.textContent = oldFileName;
            fileNameSpan.style.color = (oldFileName == 'Masukkan foto event...') ? '#aaa' : '#333';
            previewImg.style.display = 'none';
            previewImg.src = '';
        }
    }
</script>
@endpush