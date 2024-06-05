<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organik extends Model
{
    use HasFactory;
    protected $table = 'organiks'; // Set the table name

    protected $fillable = [
        'nama_pengemudi',
        'jenis_kelamin',
        'email_pengemudi',
        'nomor_telepon',
        'tanggal_lahir',
        'alamat',
        'jenis_kendaraan',
    ];
}
