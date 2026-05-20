@extends('layouts.superadmin-clean')

@section('title', 'Tambah Katalog — JEB')

@section('styles')
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        .page-container {
            max-width: 1000px;
            margin: 2rem auto;
            background: #EAEAEA; /* Background abu-abu sesuai desain */
            border-radius: 14px;
            border: 1px solid #dcdcdc;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }

        .form-header {
            background: #5B1A1A;
            padding: 1.2rem 2.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 4px solid #E4C15A;
        }

        .form-header h1 {
            color: white;
            font-size: 1.8rem;
            margin: 0;
            font-family: 'Playfair Display', serif;
        }

        .form-header p {
            color: rgba(255, 255, 255, 0.8);
            margin: 0;
            font-family: 'Poppins', sans-serif;
            font-size: 0.85rem;
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
            font-size: 0.9rem;
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
            padding: 2.5rem;
            font-family: 'Poppins', sans-serif;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            font-weight: 500;
            color: #8A4B4B;
            display: block;
            margin-bottom: 8px;
            font-size: 1.05rem;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px 20px;
            border: 1px solid #A87C7C; /* Warna garis merah kecoklatan */
            border-radius: 30px; /* Bentuk kapsul */
            font-family: 'Poppins', sans-serif;
            font-size: 0.9rem;
            background: #fff;
            box-sizing: border-box;
            outline: none;
        }

        /* Khusus textarea agar radiusnya tidak terlalu lonjong tapi tetap serasi */
        .form-group textarea {
            border-radius: 20px;
            resize: vertical;
            min-height: 100px;
        }

        .form-group input::placeholder,
        .form-group textarea::placeholder {
            color: #b0b0b0;
        }

        .custom-file-wrapper {
            display: flex;
            border: 1px solid #A87C7C;
            border-radius: 30px;
            overflow: hidden;
            background: #fff;
            align-items: center;
        }

        .btn-pilih-file {
            background: #8A4B4B;
            color: white !important;
            padding: 12px 25px;
            cursor: pointer;
            border-right: 1px solid #A87C7C;
            margin-bottom: 0 !important;
            font-weight: 500;
            font-size: 0.9rem;
        }

        .file-name-display {
            padding: 0 15px;
            display: flex;
            align-items: center;
            color: #b0b0b0;
            flex-grow: 1;
            font-size: 0.9rem;
        }

        .form-helper {
            font-size: 0.8rem;
            color: #888;
            margin-top: 6px;
            margin-left: 10px;
        }

        select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%238A4B4B' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: calc(100% - 20px) center;
        }
    </style>
@endsection

@section('content')
    <div class="page-container">
        <div class="form-header">
            <div>
                <h1>Tambah Katalog</h1>
                <p>Kelola Katalog</p>
            </div>
            <div class="header-actions">
                <a href="{{ route('superadmin.katalog.index') }}" class="btn-batal"><i class="fas fa-times"></i> Batal</a>
                <button type="submit" form="formTambahKatalog" class="btn-simpan"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
        <div class="form-body">
            <form id="formTambahKatalog" action="{{ route('superadmin.katalog.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                
                @if($errors->any())
                    <div style="background:#fee2e2; padding:12px 16px; border-radius:8px; margin-bottom:15px; border-left:4px solid #dc2626;">
                        <ul style="margin:0; color:#dc2626; padding-left:16px;">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-group">
                    <label>Foto Katalog</label>
                    <div class="custom-file-wrapper">
                        <label for="foto" class="btn-pilih-file">Pilih File</label>
                        <span class="file-name-display" id="fileNameDisplay">Masukkan foto produk...</span>
                        <input type="file" id="foto" name="foto" accept="image/*" style="display:none"
                            onchange="updateFileName(this)">
                    </div>
                    <div class="form-helper">Format: JPG, PNG. Maks 2MB.</div>
                </div>
                
                <div class="form-group">
                    <label>Nama Katalog (Tari)</label>
                    <input type="text" name="nama_tari" value="{{ old('nama_tari') }}" placeholder="Masukkan nama tari/kostum..." required>
                </div>
                
                <div class="form-group">
                    <label>Kategori</label>
                    <select name="kategori" required>
                        <option value="" disabled selected hidden>Masukkan kategori katalog...</option>
                        <option value="Kostum" {{ old('kategori') == 'Kostum' ? 'selected' : '' }}>Kostum</option>
                        <option value="Properti" {{ old('kategori') == 'Properti' ? 'selected' : '' }}>Properti</option>
                        <option value="Alat Musik" {{ old('kategori') == 'Alat Musik' ? 'selected' : '' }}>Alat Musik</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" placeholder="Masukkan deskripsi lengkap mengenai katalog ini..." required>{{ old('deskripsi') }}</textarea>
                </div>
                
                <div class="form-group">
                    <label>Stok</label>
                    <input type="number" name="stok" value="{{ old('stok') }}" placeholder="Masukkan jumlah stok tersedia..." required>
                </div>
                
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" required>
                        <option value="" disabled selected hidden>Masukkan status ketersediaan...</option>
                        <option value="tersedia" {{ old('status') == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                        <option value="tidak tersedia" {{ old('status') == 'tidak tersedia' ? 'selected' : '' }}>Tidak Tersedia</option>
                    </select>
                </div>
            </form>
        </div>
    </div>
    
    <script>
        function updateFileName(input) {
            const display = document.getElementById('fileNameDisplay');
            if (input.files.length) {
                display.textContent = input.files[0].name;
                display.style.color = "#333";
            } else {
                display.textContent = "Masukkan foto produk...";
                display.style.color = "#b0b0b0";
            }
        }
    </script>
@endsection