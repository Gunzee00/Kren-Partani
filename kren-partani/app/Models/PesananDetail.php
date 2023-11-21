<?php

namespace App\Models;

use App\Models\Pesanan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PesananDetail extends Model
{
      use HasFactory;

      // public function barang()
      // {
      //     return $this->belongTo('App\Barang', 'barang_id', 'id');
      // }

      // public function pesanan()
      // {
      //     return $this->belongTo('App\Pesanan', 'pesanan_id', 'id');
      // }


      public function tiket()
      {
            return $this->belongsTo('App\Models\Tiket', 'tiket_id', 'id');
      }

      public function pesanan()
      {
            return $this->belongsTo(Pesanan::class, 'pesanan_id', 'id');
      }
}
