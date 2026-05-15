@extends('layouts.superadmin')

@section('title', 'Pengaturan — JEB')
@section('header_title', 'Pengaturan')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<style>
    .settings-wrapper {
        width: 100%;
        font-family: 'Poppins', sans-serif;
        background: #FFFFFF;
    }
    .settings-card {
        background: #fff;
        border-radius: 20px;
        border: 1px solid #f0e0e0;
        overflow: hidden;
        margin-bottom: 30px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.02);
    }
    .card-header {
        padding: 20px 24px;
        border-bottom: 1px solid #f0e0e0;
        background: #fffbfb;
    }
    .card-header h3 {
        font-size: 1.2rem;
        font-weight: 700;
        color: #5B1A1A;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .card-body {
        padding: 28px 24px;
    }
    .form-group {
        margin-bottom: 24px;
    }
    .form-group label {
        display: block;
        font-size: 0.85rem;
        font-weight: 600;
        color: #5a3a3a;
        margin-bottom: 8px;
    }
    .form-group input {
        width: 100%;
        padding: 12px 16px;
        border: 1.5px solid #e8dede;
        border-radius: 12px;
        font-size: 0.9rem;
        font-family: 'Poppins', sans-serif;
        transition: 0.2s;
        background: #fff;
    }
    .form-group input:focus {
        border-color: #b91c1c;
        outline: none;
        box-shadow: 0 0 0 3px rgba(185,28,28,0.1);
    }
    .form-group .helper-text {
        font-size: 0.7rem;
        color: #999;
        margin-top: 4px;
    }
    .btn-save {
        background: #b91c1c;
        color: white;
        border: none;
        padding: 12px 28px;
        border-radius: 30px;
        font-weight: 600;
        font-size: 0.85rem;
        cursor: pointer;
        transition: 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    .btn-save:hover {
        background: #8b1515;
    }
    .two-columns {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }
    .info-box {
        background: #fef9f9;
        border-radius: 16px;
        padding: 16px;
        border: 1px solid #f5e8e8;
        margin-top: 20px;
    }
    .info-box p {
        font-size: 0.85rem;
        color: #6b4c4c;
        margin: 0 0 5px;
    }
    .info-box strong {
        color: #5B1A1A;
    }
    hr {
        margin: 24px 0;
        border: none;
        border-top: 1px solid #f0e0e0;
    }
    @media (max-width: 768px) {
        .two-columns {
            grid-template-columns: 1fr;
        }
        .card-body {
            padding: 20px;
        }
    }
</style>

<div class="settings-wrapper">
    {{-- Pengaturan Profil --}}
    <div class="settings-card">
        <div class="card-header">
            <h3><i class="fas fa-user-cog"></i> Profil Akun Super Admin</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('superadmin.pengaturan.update') }}">
                @csrf
                @method('PUT')
                <div class="two-columns">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="name" value="{{ auth()->user()->name }}" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" value="{{ auth()->user()->email }}" required>
                    </div>
                    <div class="form-group">
                        <label>No. Handphone</label>
                        <input type="text" name="no_handphone" value="{{ auth()->user()->no_handphone ?? '' }}">
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn-save"><i class="fas fa-save"></i> Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Ganti Password --}}
    <div class="settings-card">
        <div class="card-header">
            <h3><i class="fas fa-lock"></i> Ubah Password</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('superadmin.pengaturan.password') }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Password Saat Ini</label>
                    <input type="password" name="current_password" required>
                </div>
                <div class="two-columns">
                    <div class="form-group">
                        <label>Password Baru</label>
                        <input type="password" name="password" required minlength="6">
                        <div class="helper-text">Minimal 6 karakter</div>
                    </div>
                    <div class="form-group">
                        <label>Konfirmasi Password Baru</label>
                        <input type="password" name="password_confirmation" required>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn-save"><i class="fas fa-key"></i> Ganti Password</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Informasi Sistem --}}
    <div class="settings-card">
        <div class="card-header">
            <h3><i class="fas fa-info-circle"></i> Informasi Sistem</h3>
        </div>
        <div class="card-body">
            <div class="info-box">
                <p><strong>Versi Aplikasi:</strong> 1.0.0</p>
                <p><strong>Laravel Version:</strong> {{ app()->version() }}</p>
                <p><strong>PHP Version:</strong> {{ phpversion() }}</p>
                <p><strong>Server Time:</strong> {{ now()->format('d-m-Y H:i:s') }}</p>
                <p><strong>Database:</strong> SQLite</p>
            </div>
        </div>
    </div>
</div>
@endsection