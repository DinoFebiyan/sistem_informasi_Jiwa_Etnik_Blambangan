@extends('layouts.superadmin')

@section('title', 'Tambah Pelatih')

@section('content')
<style>
  /* ══ CONTAINER UTAMA ══ */
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
    text-decoration: none;
    font-family: 'Poppins', sans-serif;
    transition: all 0.2s;
  }

  .btn-batal { color: #FF4D4D; border: 1.5px solid #FF4D4D; }
  .btn-simpan { color: #007BFF; border: 1.5px solid #007BFF; }

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

  .form-group input, .form-group select {
    padding: 0.8rem 1rem;
    border: 1.5px solid #8A4B4B; 
    border-radius: 8px;
    font-family: 'Poppins', sans-serif;
    font-size: 0.9rem;
    outline: none;
    background: #ffffff;
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

  .btn-pilih-file {
    background-color: #8A4B4B;
    color: #ffffff !important;
    padding: 0.8rem 1.5rem;
    font-size: 0.9rem;
    cursor: pointer;
    margin: 0;
    display: flex;
    align-items: center;
    border-right: 1px solid #8A4B4B;
  }

  .file-name-display {
    padding: 0 1rem;
    color: #BDBDBD;
    font-size: 0.9rem;
    display: flex;
    align-items: center;
    flex-grow: 1;
  }
</style>

<div class="page-container">
  <!-- HEADER -->
  <div class="header-merah">
    <div class="header-title">
      <h1>Tambah Pelatih</h1>
      <p>Kelola Profil Sanggar</p>
    </div>
    <div class="header-actions">
      <a href="{{ url('/superadmin/kelola-profil') }}" class="btn-action btn-batal">✕ Batal</a>
      <button type="submit" form="formTambahPelatih" class="btn-action btn-simpan">💾 Simpan</button>
    </div>
  </div>

  <!-- FORM BODY -->
  <div class="form-body">
    <form id="formTambahPelatih" action="javascript:void(0)" onsubmit="alert('Data Pelatih berhasil ditambahkan!')">
      @csrf

      <!-- FOTO -->
      <div class="form-group">
        <label>Foto</label>
        <div class="custom-file-wrapper">
          <label for="foto_pelatih" class="btn-pilih-file">Pilih File</label>
          <span class="file-name-display" id="nameLabel">Masukkan foto pelatih...</span>
          <input type="file" id="foto_pelatih" name="foto" style="display:none" onchange="document.getElementById('nameLabel').innerText = this.files[0].name">
        </div>
        <span style="font-size: 0.75rem; color: #888;">Format: JPG, PNG. Maks 2MB.</span>
      </div>

      <!-- NAMA LENGKAP -->
      <div class="form-group">
        <label for="nama">Nama Lengkap</label>
        <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap pelatih..." required>
      </div>

      <!-- JABATAN -->
      <div class="form-group">
        <label for="jabatan">Jabatan</label>
        <select id="jabatan" name="jabatan" required>
          <option value="" disabled selected hidden>Pilih jabatan pelatih...</option>
          <option value="Pelatih Tari">Pelatih Tari</option>
          <option value="Pelatih Musik/Gamelan">Pelatih Musik/Gamelan</option>
          <option value="Pelatih Koreografi">Pelatih Koreografi</option>
          <option value="Asisten Pelatih">Asisten Pelatih</option>
        </select>
      </div>

      <!-- INSTAGRAM -->
      <div class="form-group">
        <label for="instagram">Instagram</label>
        <input type="text" id="instagram" name="instagram" placeholder="Masukkan link instagram pelatih...">
      </div>

      <!-- NO HANDPHONE -->
      <div class="form-group">
        <label for="hp">No Handphone</label>
        <input type="text" id="hp" name="no_hp" placeholder="Masukkan no handphone pelatih..." required>
      </div>

      <!-- STATUS -->
      <div class="form-group">
        <label for="status">Status</label>
        <select id="status" name="status" required>
          <option value="Aktif">Aktif</option>
          <option value="Nonaktif">Nonaktif</option>
        </select>
      </div>

    </form>
  </div>
</div>
@endsection