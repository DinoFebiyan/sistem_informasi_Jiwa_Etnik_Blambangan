<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Katalog extends Model
{
    protected $table = 'katalog';

    protected $fillable = ['nama_tari', 'kategori', 'stok', 'deskripsi', 'status', 'media_id', 'user_id'];

    // Input Integrity: Stok harus diperlakukan sebagai angka murni
    protected $casts = [
        'stok' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function media()
    {
        return $this->belongsTo(Media::class, 'me');
    }
}