<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanTiket extends Model
{
    use HasFactory;
    protected $table = 'penjualan_tiket';

    protected $fillable = [
        'gambar_penjualan',
        'pesanan_id',
    ];

    public function pesanan2()
    {
        return $this->belongsTo(Pesanan::class, 'pesanan_id', 'id');
    }
}
