<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personel extends Model
{
    protected $table = 'personel';

    protected $fillable = ['nama', 'jabatan', 'no_handphone', 'instagram', 'peran', 'status', 'media_id'];

    // Relasi ke foto personel di tabel media
    public function media()
    {
        return $this->belongsTo(Media::class, 'media_id');
    }
}