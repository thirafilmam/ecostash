<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Samper extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_pengguna',
        'id_produk',
        'jumlah',
        'total_harga',
        'alamat_samper',
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna');
    }
}
