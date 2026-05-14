<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilSanggar extends Model
{
    protected $table = 'profil_sanggar';

    protected $fillable = [
        'deskripsi',
        'visi',
        'misi',
        'alamat',
        'kontak',
        'sejarah',
        'sambutan_pembina',
        'logo_id',
        'foto_pembina_id'
    ];

    // Relasi untuk Logo dan Foto Pembina (keduanya merujuk ke tabel media)
    public function logo()
    {
        return $this->belongsTo(Galeri::class, 'logo_id');
    }
    public function fotoPembina()
    {
        return $this->belongsTo(Galeri::class, 'foto_pembina_id');
    }
}