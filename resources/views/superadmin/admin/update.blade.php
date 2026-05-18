@extends('layouts.superadmin-clean')

@section('title', 'Edit Admin — JEB')

@section('styles')
    <style>
        .page-container {
            max-width: 1000px;
            margin: 2rem auto;
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
            font-size: 1.5rem;
            margin: 0;
        }

        .form-header p {
            color: rgba(255, 255, 255, 0.7);
            margin: 0;
        }

        .header-actions {
            display: flex;
            gap: 12px;
        }

        .btn-batal,
        .btn-simpan {
            padding: 8px 20px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            cursor: pointer;
            border: none;
            font-family: 'Poppins', sans-serif;
        }

        .btn-batal {
            background: white;
            color: #FF4D4D;
            border: 1px solid #FF4D4D;
        }

        .btn-simpan {
            background: white;
            color: #007BFF;
            border: 1px solid #007BFF;
        }

        .form-body {
            padding: 2rem 2.5rem;
        }

        .form-group {
            margin-bottom: 1.2rem;
        }

        .form-group label {
            font-weight: 700;
            color: #8A4B4B;
            display: block;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid #e8dede;
            border-radius: 10px;
            font-family: 'Poppins', sans-serif;
        }

        .custom-file-wrapper {
            display: flex;
            border: 1px solid #e8dede;
            border-radius: 10px;
            overflow: hidden;
        }

        .btn-pilih-file {
            background: #8A4B4B;
            color: white;
            padding: 10px 20px;
            cursor: pointer;
            border-right: 1px solid #e8dede;
        }

        .file-name-display {
            padding: 0 15px;
            display: flex;
            align-items: center;
            color: #999;
            flex-grow: 1;
        }

        .form-helper {
            font-size: 0.7rem;
            color: #888;
            margin-top: 4px;
        }

        .foto-preview {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #e8dede;
            margin-bottom: 8px;
            display: block;
        }
    </style>
@endsection

@section('content')
    <div class="page-container">
        <div class="form-header">
            <div>
                <h1>Edit Admin</h1>
                <p>Kelola Admin</p>
            </div>
            <div class="header-actions">
                <a href="{{ route('superadmin.kelola-admin') }}" class="btn-batal"><i class="fas fa-times"></i> Batal</a>
                <button type="submit" form="formEditAdmin" class="btn-simpan"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
        <div class="form-body">
            <form id="formEditAdmin" action="{{ route('superadmin.update-admin', $admin->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @if($errors->any())
                    <div
                        style="background:#fee2e2; padding:12px 16px; border-radius:8px; margin-bottom:15px; border-left:4px solid #dc2626;">
                        <ul style="margin:0; color:#dc2626; padding-left:16px;">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {{-- FOTO --}}
                <div class="form-group">
                    <label>Foto</label>
                    {{-- Tampilkan foto lama jika ada --}}
                    @if($admin->foto)
                        <img src="{{ asset('storage/' . $admin->foto) }}" alt="Foto Admin" class="foto-preview">
                    @endif
                    <div class="custom-file-wrapper">
                        <label for="foto" class="btn-pilih-file">Pilih File</label>
                        <span class="file-name-display" id="fileNameDisplay">
                            {{ $admin->foto ? basename($admin->foto) : 'Belum ada file' }}
                        </span>
                        <input type="file" id="foto" name="foto" accept="image/*" style="display:none"
                            onchange="updateFileName(this)">
                    </div>
                    <p class="form-helper">Kosongkan jika tidak ingin mengubah foto.</p>
                </div>

                {{-- NAMA --}}
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name', $admin->name) }}" required>
                </div>

                {{-- EMAIL --}}
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ old('email', $admin->email) }}" required>
                </div>

                {{-- PASSWORD --}}
                <div class="form-group">
                    <label>Password Baru</label>
                    <input type="password" name="password" placeholder="Kosongkan jika tidak ingin mengubah password">
                    <p class="form-helper">Kosongkan jika tidak ingin mengubah password.</p>
                </div>

                {{-- KONFIRMASI PASSWORD --}}
                <div class="form-group">
                    <label>Konfirmasi Password Baru</label>
                    <input type="password" name="password_confirmation" placeholder="Ulangi password baru">
                </div>

                {{-- NO HANDPHONE --}}
                <div class="form-group">
                    <label>No Handphone</label>
                    <input type="text" name="no_handphone" value="{{ old('no_handphone', $admin->no_handphone) }}" required>
                </div>

                {{-- STATUS --}}
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" required>
                        <option value="aktif" {{ old('status', $admin->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="nonaktif" {{ old('status', $admin->status) == 'nonaktif' ? 'selected' : '' }}>Nonaktif
                        </option>
                    </select>
                </div>

            </form>
        </div>
    </div>

    <script>
        function updateFileName(input) {
            const display = document.getElementById('fileNameDisplay');
            if (input.files.length) display.textContent = input.files[0].name;
            else display.textContent = "Belum ada file";
        }
    </script>
@endsection