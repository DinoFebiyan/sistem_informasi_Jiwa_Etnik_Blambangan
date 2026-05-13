<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table = 'galeri';

    protected $fillable = ['judul', 'sumber', 'modul', 'media_id'];

    public function media()
    {
        return $this->belongsTo(Media::class);
    }
}