@extends('layouts.Superadmin') {{-- Sesuaikan dengan nama layout Anda --}}

@section('title', 'Tambah Katalog Baru')
@section('header_title', 'Kelola Katalog')

@section('content')
<style>
  
  .page-container {
    width: 100%;
    max-width: 1000px;
    margin: 2rem auto;
    background-color: #E6E5E5; 
    font-family: 'Poppins', sans-serif;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
  }

  /* ══ HEADER MERAH ══ */
  .header-merah {
    background-color: #5B1A1A; 
    padding: 1.5rem 2rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 4px solid #E4C15A; 
    box-shadow: 0 4px 10px rgba(228, 193, 90, 0.3);
  }

  .header-title h1 {
    font-size: 1.5rem;
    color: #ffffff;
    font-weight: 700;
    margin: 0 0 0.2rem 0;
    font-family: 'Times New Roman', serif; 
  }

  .header-title p {
    font-size: 0.85rem;
    color: #ffffff;
    margin: 0;
    font-weight: 300;
  }

  /* ══ TOMBOL HEADER ══ */
  .header-actions {
    display: flex;
    gap: 1rem;
  }

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
    font-family: 'Poppins', sans-serif;
    transition: all 0.2s;
  }

  .btn-batal-head {
    color: #FF4D4D;
    border: 1.5px solid #FF4D4D;
  }
  .btn-batal-head:hover { background: #fff0f0; }

  .btn-simpan-head {
    color: #007BFF; 
    border: 1.5px solid #007BFF;
  }
  .btn-simpan-head:hover { background: #f0f8ff; }

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

  /* Penambahan selektor textarea untuk form deskripsi */
  .form-group input:not([type="file"]), 
  .form-group select,
  .form-group textarea {
    padding: 0.8rem 1rem;
    border: 1.5px solid #8A4B4B; 
    border-radius: 8px;
    font-family: 'Poppins', sans-serif;
    font-size: 0.9rem;
    color: #333;
    outline: none;
    background: #ffffff;
    width: 100%;
    box-sizing: border-box;
  }

  .form-group textarea {
    resize: vertical;
    min-height: 120px; /* Membuat kotak deskripsi lebih tinggi */
  }

  .form-group input::placeholder,
  .form-group select:invalid,
  .form-group textarea::placeholder {
    color: #BDBDBD;
  }

  .form-helper {
    font-size: 0.75rem;
    color: #888;
    margin-top: -0.2rem;
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

  .form-group label.btn-pilih-file {
    background-color: #8A4B4B;
    color: #ffffff !important;
    padding: 0.8rem 1.5rem;
    font-size: 0.9rem;
    font-weight: 500;
    cursor: pointer;
    margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-right: 1px solid #8A4B4B;
    white-space: nowrap;
  }

  .file-name-display {
    padding: 0 1rem;
    color: #BDBDBD;
    font-size: 0.9rem;
    flex-grow: 1;
    display: flex;
    align-items: center;
  }

  input[type="file"] {
    display: none;
  }
</style>

<div class="page-container">
  
  <!-- ══ FORM HEADER ══ -->
  <div class="header-merah">
    <div class="header-title">
      <h1>Tambah Katalog</h1>
      <p>Kelola Katalog</p>
    </div>
    <div class="header-actions">
      <button type="button" class="btn-action btn-batal-head" onclick="batalAction()">
        &#10005; Batal
      </button>
      <button type="submit" form="formTambahKatalog" class="btn-action btn-simpan-head">
        &#128190; Simpan
      </button>
    </div>
  </div>

  <!-- ══ FORM BODY ══ -->
  <div class="form-body">
    <form id="formTambahKatalog" action="javascript:void(0)" onsubmit="simulasiSimpan()" method="POST" enctype="multipart/form-data">
      @csrf

      <!-- FOTO -->
      <div class="form-group">
        <label>Foto</label>
        <div class="custom-file-wrapper">
          <label for="foto" class="btn-pilih-file">Pilih File</label>
          <span class="file-name-display" id="fileNameDisplay">Masukkan foto alat/baju...</span>
          <input type="file" id="foto" name="foto" accept=".jpg, .png" onchange="updateFileName(this)">
        </div>
        <span class="form-helper">Format: JPG, PNG. Maks 2MB.</span>
      </div>

      <!-- NAMA KATALOG -->
      <div class="form-group">
        <label for="nama_katalog">Nama Katalog</label>
        <input type="text" id="nama_katalog" name="nama_katalog" placeholder="Masukkan katalog..." required>
      </div>

      <!-- KATEGORI -->
      <div class="form-group">
        <label for="kategori">Kategori</label>
        <select id="kategori" name="kategori" required>
          <option value="" disabled selected hidden>Pilih kategori katalog...</option>
          <option value="tradisional">Tradisional</option>
          <option value="kreasi">Kreasi</option>
          <option value="ritual">Ritual</option>
        </select>
      </div>

      <!-- DESKRIPSI -->
      <div class="form-group">
        <label for="deskripsi">Deskripsi katalog</label>
        <textarea id="deskripsi" name="deskripsi" placeholder="Masukkan deskripsi katalog..." required></textarea>
      </div>

      <!-- STOK BARANG -->
      <div class="form-group">
        <label for="stok">Masukkan Stok Barang</label>
        <input type="number" id="stok" name="stok" placeholder="Masukkan stok barang..." min="0" required>
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
      display.textContent = "Masukkan foto alat/baju...";
      display.style.color = "#BDBDBD";
    }
  }

  function batalAction() {
    if(confirm('Apakah Anda yakin ingin membatalkan? Data yang diisi akan hilang.')) {
      window.history.back(); 
    }
  }

  function simulasiSimpan() {
    alert('Simulasi Frontend: Data Katalog berhasil disimpan!');
    
  }
</script>
@endsection