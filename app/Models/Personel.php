<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personel extends Model
{
    protected $table = 'personel';

    protected $fillable = ['nama', 'jabatan', 'no_handphone', 'instagram', 'peran', 'status', 'galeri_id'];

    public function galeri()
    {
        return $this->belongsTo(Galeri::class, 'galeri_id');
    }
}