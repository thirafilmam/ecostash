<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Pengguna extends Authenticatable
{
    protected $table = 'penggunas';
    protected $email = 'email';
    protected $fillable = [
        'nama_nasabah',
        'nomor_telepon',
        'jenis_kelamin',
        'alamat',
        'email',
        'password',
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($pengguna) {
            $pengguna->level = 'nasabah';
        });
    }
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
