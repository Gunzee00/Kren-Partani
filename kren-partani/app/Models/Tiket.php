<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tiket extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'tiket';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'jenis_tiket',
        'harga',
        'tanggal_tiket',
        'stok',
        'keterangan',
        'gambar_tiket',
    ];

    public function pesanan_detail()
    {
        return $this->belongTo('App\PesananDetail', 'tiket_id', 'id');
    }

    public function pesanan()
    {
        return $this->belongTo(Pesanan::class);
    }
}
