<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogAktivitas extends Model
{
    protected $table = 'log_aktivitas';

    /**
     * Audit Trail: Mencatat jejak user untuk keamanan sistem.
     * Merekam siapa, melakukan apa, dan dari mana (IP).
     */
    protected $fillable = ['user_id', 'aktivitas', 'deskripsi', 'ip_address'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}