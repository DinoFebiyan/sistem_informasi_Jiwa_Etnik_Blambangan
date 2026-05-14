@extends('layouts.Superadmin') {{-- Memanggil Sidebar & Layout Utama --}}

@section('title', 'Tambah Admin Baru')
@section('header_title', 'Kelola Admin')

@section('content')
<style>
  /* ══ RESET & CONTAINER UTAMA ══ */
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
  .btn-batal-head:hover { 
    background: #fff0f0; 
  }

  .btn-simpan-head {
    color: #007BFF; 
    border: 1.5px solid #007BFF;
  }
  .btn-simpan-head:hover { 
    background: #f0f8ff; 
  }

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

  /* Label umum berwarna merah maroon */
  .form-group label {
    font-size: 1rem;
    font-weight: 600;
    color: #8A4B4B; 
  }

  .form-group input:not([type="file"]), 
  .form-group select {
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

  .form-group input::placeholder,
  .form-group select:invalid {
    color: #BDBDBD;
  }

  .form-helper {
    font-size: 0.75rem;
    color: #888;
    margin-top: -0.2rem;
  }

  /* ══ CUSTOM FILE INPUT (DIPERBAIKI) ══ */
  .custom-file-wrapper {
    display: flex;
    align-items: stretch; /* Memastikan tinggi tombol dan kolom teks sama */
    border: 1.5px solid #8A4B4B;
    border-radius: 8px;
    background: #ffffff;
    overflow: hidden;
  }

  /* Penambahan selektor lebih spesifik dan warna di-force putih */
  .form-group label.btn-pilih-file {
    background-color: #8A4B4B;
    color: #ffffff !important; /* Paksa warna tulisan jadi putih */
    padding: 0.8rem 1.5rem;
    font-size: 0.9rem;
    font-weight: 500;
    cursor: pointer;
    margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-right: 1px solid #8A4B4B;
    white-space: nowrap; /* Mencegah tulisan terpotong ke bawah */
  }

  .file-name-display {
    padding: 0 1rem;
    color: #BDBDBD;
    font-size: 0.9rem;
    flex-grow: 1;
    display: flex;
    align-items: center; /* Memastikan teks "Masukkan foto profil" sejajar tengah */
  }

  input[type="file"] {
    display: none;
  }
</style>

<div class="page-container">
  
  <!-- ══ FORM HEADER ══ -->
  <div class="header-merah">
    <div class="header-title">
      <h1>Tambah Admin</h1>
      <p>Kelola Admin</p>
    </div>
    <div class="header-actions">
      <button type="button" class="btn-action btn-batal-head" onclick="batalAction()">
        &#10005; Batal
      </button>
      <button type="submit" form="formTambahAdmin" class="btn-action btn-simpan-head">
        &#128190; Simpan
      </button>
    </div>
  </div>

  <!-- ══ FORM BODY ══ -->
  <div class="form-body">
    <form id="formTambahAdmin" action="javascript:void(0)" onsubmit="simulasiSimpan()" method="POST" enctype="multipart/form-data">
      @csrf

      <!-- FOTO -->
      <div class="form-group">
        <label>Foto</label>
        <div class="custom-file-wrapper">
          <label for="foto" class="btn-pilih-file">Pilih File</label>
          <span class="file-name-display" id="fileNameDisplay">Masukkan foto profil...</span>
          <input type="file" id="foto" name="foto" accept=".jpg, .png" onchange="updateFileName(this)">
        </div>
        <span class="form-helper">Format: JPG, PNG. Maks 2MB.</span>
      </div>

      <!-- NAMA LENGKAP -->
      <div class="form-group">
        <label for="nama_lengkap">Nama Lengkap</label>
        <input type="text" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan nama lengkap admin..." required>
      </div>

      <!-- EMAIL -->
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Masukkan email admin..." required>
      </div>

      <!-- PASSWORD -->
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Masukkan password yang akan digunakan admin untuk masuk..." minlength="8" required>
        <span class="form-helper">Format password: Min 8 karakter tanpa simbol</span>
      </div>

      <!-- NO HANDPHONE -->
      <div class="form-group">
        <label for="no_hp">No Handphone</label>
        <input type="tel" id="no_hp" name="no_hp" placeholder="Masukkan no handphone admin..." required>
      </div>

      <!-- STATUS -->
      <div class="form-group">
        <label for="status">Status</label>
        <select id="status" name="status" required>
          <option value="" disabled selected hidden>Masukkan status admin...</option>
          <option value="aktif">Aktif</option>
          <option value="nonaktif">Non-Aktif</option>
        </select>
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
      display.textContent = "Masukkan foto profil...";
      display.style.color = "#BDBDBD";
    }
  }

  function batalAction() {
    if(confirm('Apakah Anda yakin ingin membatalkan? Data yang diisi akan hilang.')) {
      window.history.back(); // Kembali ke halaman Dashboard
    }
  }

  function simulasiSimpan() {
    alert('Simulasi Frontend: Data Admin berhasil disimpan!');
    window.location.href = "{{ url('/superadmin/dashboard') }}"; 
  }
</script>
@endsection