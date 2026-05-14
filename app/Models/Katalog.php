<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Katalog extends Model
{
    protected $table = 'katalog';

    protected $fillable = ['nama_tari', 'kategori', 'stok', 'deskripsi', 'status', 'galeri_id', 'user_id'];

    protected $casts = [
        'stok' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function galeri()
    {
        return $this->belongsTo(Galeri::class, 'galeri_id'); 
    }
}