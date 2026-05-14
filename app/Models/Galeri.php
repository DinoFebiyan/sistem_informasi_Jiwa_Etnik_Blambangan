<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    // Mapping ke nama tabel bahasa Indonesia
    protected $table = 'galeri';

    protected $fillable = ['file_blob', 'nama_file', 'kategori_modul', 'is_watermark'];

    // Type Safety: Memastikan status watermark selalu terbaca sebagai true/false
    protected $casts = [
        'is_watermark' => 'boolean',
    ];
}