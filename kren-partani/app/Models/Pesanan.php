<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    
    protected $table = 'pesanans';
    

    protected $fillable = [
        'review',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function pesanan_detail()
    {
        return $this->hasMany(PesananDetail::class, 'pesanan_id', 'id');
    }

    public function barangs()
    {
        return $this->hasOne(Tiket::class, 'id', 'tiket_id');
    }

    public function penjualan_tiket()
    {
        return $this->hasMany(PenjualanTiket::class, 'pesanan_id', 'id');
    }
}

