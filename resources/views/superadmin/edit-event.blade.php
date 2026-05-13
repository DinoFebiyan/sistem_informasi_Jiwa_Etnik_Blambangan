@extends('layouts.superadmin')

@section('content')
<style>
    .edit-box { width: 100%; max-width: 900px; margin: 1rem auto; background: #E6E5E5; border-radius: 8px; overflow: hidden; font-family: 'Poppins', sans-serif; }
    .edit-header { background: #5B1A1A; padding: 1.2rem 2rem; display: flex; justify-content: space-between; align-items: center; border-bottom: 4px solid #E4C15A; color: white; }
    .btn-head { padding: 8px 18px; border-radius: 6px; font-weight: 600; text-decoration: none; background: white; font-size: 0.85rem; border: 1px solid #ddd; }
    
    .edit-body { padding: 2.5rem 4rem; display: flex; flex-direction: column; gap: 1.5rem; }
    .form-group { display: flex; flex-direction: column; gap: 8px; }
    .form-group label { font-weight: 700; color: #8A4B4B; font-size: 0.95rem; }
    .form-control { padding: 12px 15px; border: 1.5px solid #8A4B4B; border-radius: 8px; outline: none; font-family: 'Poppins', sans-serif; font-size: 0.9rem; }

    /* DESAIN PILIH FILE KUSTOM */
    .custom-file-wrapper { display: flex; align-items: stretch; border: 1.5px solid #8A4B4B; border-radius: 8px; background: #ffffff; overflow: hidden; height: 45px; }
    .btn-pilih-file { background-color: #8A4B4B; color: #ffffff !important; padding: 0 20px; font-size: 0.9rem; font-weight: 600; cursor: pointer; display: flex; align-items: center; border: none; }
    .file-name-display { padding: 0 15px; color: #333; font-size: 0.85rem; display: flex; align-items: center; flex-grow: 1; background: #fff; }
</style>

<div class="edit-box">
    <div class="edit-header">
        <div><h1 style="margin:0; font-family:'Times New Roman',serif; font-size:1.4rem;">Edit Event</h1><p style="margin:0; font-size:0.7rem;">Kelola Sanggar Tari Jiwa Etnik Blambangan</p></div>
        <div style="display:flex; gap:10px;">
            <a href="{{ url('/superadmin/kelola-event') }}" class="btn-head" style="color:#FF4D4D;">✕ Batal</a>
            <a href="#" class="btn-head" style="color:#007BFF;">💾 Simpan Perubahan</a>
        </div>
    </div>

    <div class="edit-body">
        <div class="form-group">
            <label>Foto Event</label>
            <div class="custom-file-wrapper">
                <label for="foto_event" class="btn-pilih-file">Pilih File</label>
                <span class="file-name-display" id="file-name">Banyuwangi_Culture_Hub.jpg</span>
                <input type="file" id="foto_event" style="display:none" onchange="document.getElementById('file-name').innerText = this.files[0].name">
            </div>
        </div>

        <div class="form-group">
            <label>Nama Event</label>
            <input type="text" class="form-control" value="Banyuwangi Culture Hub">
        </div>

        <div class="form-group">
            <label>Tanggal Pelaksanaan</label>
            <input type="date" class="form-control" value="2026-01-12">
        </div>

        <div class="form-group">
            <label>Lokasi</label>
            <input type="text" class="form-control" value="Pendopo Sabha Swagata">
        </div>

        <div class="form-group">
            <label>Deskripsi Event</label>
            <textarea class="form-control" rows="4">Pada Event ini JEB menampilkan tari gandrung yang dipadukan dengan narasi sejarah lokal Banyuwangi.</textarea>
        </div>
    </div>
</div>
@endsection