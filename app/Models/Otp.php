<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Otp extends Model
{
    protected $table = 'otp';

    protected $fillable = ['user_id', 'otp_code', 'expires_at', 'status'];

    // Security: Memudahkan pengecekan apakah OTP sudah kadaluarsa (expired)
    protected $casts = [
        'expires_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}