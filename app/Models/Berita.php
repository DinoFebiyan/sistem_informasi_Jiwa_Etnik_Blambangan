<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'berita';

    protected $fillable = ['judul', 'isi_berita', 'tgl_terbit', 'status', 'user_id', 'media_id'];

    protected $casts = [
        'tgl_terbit' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function media()
    {
        return $this->belongsTo(Media::class);
    }
}