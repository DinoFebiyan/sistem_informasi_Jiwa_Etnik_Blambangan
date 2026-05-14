@extends('layouts.superadmin')

@section('title', 'Edit Informasi Umum')

@section('content')
<style>
    .page-container { width: 100%; max-width: 1000px; margin: 1rem auto; background-color: #E6E5E5; font-family: 'Poppins', sans-serif; border-radius: 8px; overflow: hidden; }
    .header-merah { background-color: #5B1A1A; padding: 1.5rem 2rem; display: flex; justify-content: space-between; align-items: center; border-bottom: 4px solid #E4C15A; }
    .header-title h1 { font-size: 1.5rem; color: #ffffff; font-weight: 700; margin: 0; font-family: 'Times New Roman', serif; }
    .btn-action { display: flex; align-items: center; gap: 0.5rem; padding: 0.5rem 1.2rem; border-radius: 8px; font-weight: 600; font-size: 0.9rem; cursor: pointer; background: #ffffff; text-decoration: none; }
    .btn-batal { color: #FF4D4D; border: 1.5px solid #FF4D4D; }
    .btn-simpan { color: #007BFF; border: 1.5px solid #007BFF; }
    
    .form-body { padding: 2.5rem 4rem; display: flex; flex-direction: column; gap: 1.5rem; }
    .form-group { display: flex; flex-direction: column; gap: 0.4rem; }
    .form-group label { font-size: 1rem; font-weight: 600; color: #8A4B4B; }
    .form-group textarea { padding: 0.8rem 1rem; border: 1.5px solid #8A4B4B; border-radius: 8px; min-height: 100px; outline: none; }

    /* STYLE UNTUK INPUT FILE */
    .custom-file-wrapper { display: flex; align-items: stretch; border: 1.5px solid #8A4B4B; border-radius: 8px; background: #ffffff; overflow: hidden; }
    .btn-pilih-file { background-color: #8A4B4B; color: #ffffff !important; padding: 0.8rem 1.5rem; font-size: 0.9rem; font-weight: 600; cursor: pointer; margin: 0; display: flex; align-items: center; border-right: 1.5px solid #8A4B4B; }
    .file-name-display { padding: 0 1rem; color: #BDBDBD; font-size: 0.9rem; display: flex; align-items: center; flex-grow: 1; }
</style>

<div class="page-container">
    <div class="header-merah">
        <div class="header-title"><h1>Edit Informasi Umum</h1><p style="color:white; font-size:0.7rem;">Kelola Profil Sanggar</p></div>
        <div class="header-actions" style="display:flex; gap:10px;">
            <a href="{{ url('/superadmin/kelola-profil') }}" class="btn-action btn-batal">✕ Batal</a>
            <button type="submit" form="formEdit" class="btn-action btn-simpan">💾 Simpan Perubahan</button>
        </div>
    </div>

    <div class="form-body">
        <form id="formEdit" action="javascript:void(0)">
            <div class="form-group"><label>Deskripsi Sanggar</label><textarea>Sanggar Tari Jiwa Etnik Blambangan (JEB) adalah pusat seni tari tradisional...</textarea></div>
            <div class="form-group"><label>Visi</label><textarea>Menjadi sanggar seni yang unggul, berkarakter...</textarea></div>
            <div class="form-group"><label>Misi</label><textarea>Mengembangkan potensi anggota agar memiliki kemampuan...</textarea></div>
            
            <div class="form-group">
                <label>Logo Sanggar</label>
                <div class="custom-file-wrapper">
                    <label for="logo" class="btn-pilih-file">Pilih File</label> <!-- Teks ini yang tadi hilang -->
                    <span class="file-name-display">Logo_Sanggar_JEB.png</span>
                    <input type="file" id="logo" style="display:none">
                </div>
            </div>

            <div class="form-group">
                <label>Foto Pembina</label>
                <div class="custom-file-wrapper">
                    <label for="foto_p" class="btn-pilih-file">Pilih File</label> <!-- Teks ini yang tadi hilang -->
                    <span class="file-name-display">IMG-20240112-WA0035.jpg</span>
                    <input type="file" id="foto_p" style="display:none">
                </div>
            </div>
        </form>
    </div>
</div>
@endsection