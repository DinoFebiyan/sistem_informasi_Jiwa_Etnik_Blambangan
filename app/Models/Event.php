<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event';

    protected $fillable = ['nama_event', 'tanggal', 'jam', 'lokasi', 'kategori', 'status', 'user_id', 'media_id'];

    // Consistency: Mengonversi string database ke objek waktu Carbon
    protected $casts = [
        'tanggal' => 'date',
        'jam' => 'datetime:H:i',
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