@extends('layouts.admin')

@section('title', 'Kelola Profil')

@section('header', 'Kelola Profil')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
    .profile-container {
        font-family: 'Poppins', sans-serif;
    }

    /* --- HEADER SECTION --- */
    .profile-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        margin-bottom: 25px;
    }
    .profile-title-area h2 {
        font-size: 1.25rem;
        font-weight: 700;
        margin-bottom: 4px;
        color: #1a0000;
    }
    .profile-title-area p {
        color: #8a7070;
        font-size: 0.85rem;
        margin: 0;
    }
    .btn-simpan {
        background: var(--merah-gelap);
        color: white;
        padding: 10px 22px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 0.85rem;
        font-weight: 600;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    /* --- IDENTITY CARD --- */
    .identity-card {
        background: var(--merah-gelap);
        border-radius: 20px;
        padding: 35px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        color: white;
        margin-bottom: 30px;
        position: relative;
        overflow: hidden;
    }
    .identity-info {
        display: flex;
        align-items: center;
        gap: 25px;
        z-index: 2;
    }
    .profile-logo-circle {
        width: 100px;
        height: 100px;
        background: white;
        border-radius: 50%;
        padding: 5px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .profile-logo-circle img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        border-radius: 50%;
    }
    .identity-text h2 {
        font-size: 1.5rem;
        margin-bottom: 5px;
    }
    .identity-text p {
        font-size: 0.9rem;
        opacity: 0.8;
    }

    .identity-stats {
        display: flex;
        gap: 40px;
        z-index: 2;
    }
    .stat-item { text-align: center; }
    .stat-item h3 { font-size: 1.4rem; margin-bottom: 2px; }
    .stat-item p { font-size: 0.7rem; text-transform: uppercase; letter-spacing: 1px; opacity: 0.7; }

    /* --- FORM SECTION --- */
    .form-card {
        background: white;
        border-radius: 18px;
        border: 1px solid var(--abu-border);
        padding: 30px;
    }
    .form-card h3 {
        font-size: 1.1rem;
        margin-bottom: 25px;
        color: #1a0000;
        font-weight: 700;
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }
    .form-group {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }
    .form-group.full-width {
        grid-column: span 2;
    }
    .form-group label {
        font-size: 0.85rem;
        font-weight: 600;
        color: #333;
    }
    .form-group input, .form-group textarea {
        padding: 12px 16px;
        border-radius: 10px;
        border: 1px solid #e0e0e0;
        font-family: inherit;
        font-size: 0.9rem;
        background: #fafafa;
        outline: none;
        transition: 0.2s;
    }
    .form-group input:focus, .form-group textarea:focus {
        border-color: var(--merah);
        background: white;
    }
</style>

<div class="profile-container">
    <div class="profile-header">
        <div class="profile-title-area">
            <h2>Kelola Profil Sanggar</h2>
            <p>Informasi publik Sanggar JEB</p>
        </div>
        <button class="btn-simpan">
            <i class="fas fa-save"></i> Simpan Perubahan
        </button>
    </div>

    <div class="identity-card">
        <div class="identity-info">
            <div class="profile-logo-circle">
                <img src="{{ asset('img/logo-jeb.jpg') }}" alt="Logo Sanggar">
            </div>
            <div class="identity-text">
                <h2>Sanggar Tari Jiwa Etnik Blambangan</h2>
                <p>Pusat pelestarian seni dan budaya tari tradisional Banyuwangi</p>
            </div>
        </div>
        <div class="identity-stats">
            <div class="stat-item">
                <h3>10 +</h3>
                <p>Tahun</p>
            </div>
            <div class="stat-item">
                <h3>24</h3>
                <p>Katalog</p>
            </div>
            <div class="stat-item">
                <h3>200 +</h3>
                <p>Alumni</p>
            </div>
        </div>
    </div>

    <div class="form-card">
        <h3>Informasi Umum</h3>
        <form action="#" class="form-grid">
            <div class="form-group">
                <label>Nama Sanggar</label>
                <input type="text" value="Sanggar Tari Jiwa Etnik Blambangan">
            </div>
            <div class="form-group">
                <label>Singkatan</label>
                <input type="text" value="Sanggar Tari Jiwa Etnik Blambangan">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" value="Sanggar Tari Jiwa Etnik Blambangan">
            </div>
            <div class="form-group">
                <label>No. Telepon</label>
                <input type="text" value="Sanggar Tari Jiwa Etnik Blambangan">
            </div>
            <div class="form-group full-width">
                <label>Alamat</label>
                <input type="text" value="VS">
            </div>
            <div class="form-group full-width">
                <label>Deskripsi Sanggar</label>
                <textarea rows="4">GGWUS</textarea>
            </div>
            <div class="form-group">
                <label>Tahun Berdiri</label>
                <input type="text" value="Sanggar Tari Jiwa Etnik Blambangan">
            </div>
            <div class="form-group">
                <label>Instagram</label>
                <input type="text" value="Sanggar Tari Jiwa Etnik Blambangan">
            </div>
        </form>
    </div>
</div>
@endsection