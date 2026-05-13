<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Mass Assignment Protection: Mencegah perubahan kolom sensitif secara ilegal
    protected $fillable = [
        'name',
        'email',
        'password',
        'peran',
        'no_handphone',
        'status',
    ];

    // Data Privacy: Menyembunyikan password saat data dikonversi ke Array/JSON
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Security Casting: Otomatis menghash password dan mengonversi tipe data waktu
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /** * Hubungan (Relationships):
     * Seorang User (Admin) bisa membuat banyak data konten.
     */
    public function katalogs()
    {
        return $this->hasMany(Katalog::class);
    }
    public function events()
    {
        return $this->hasMany(Event::class);
    }
    public function beritas()
    {
        return $this->hasMany(Berita::class);
    }
}