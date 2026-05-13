<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    // Mapping ke nama tabel bahasa Indonesia
    protected $table = 'media';

    protected $fillable = [
        'judul', 
        'file_blob', 
        'nama_file', 
        'kategori_modul', 
        'sumber', 
        'is_watermark'
    ];

    // Type Safety: Memastikan status watermark selalu terbaca sebagai true/false
    protected $casts = [
        'is_watermark' => 'boolean',
    ];
}