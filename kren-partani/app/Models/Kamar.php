<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;
    protected $table = 'kamar';
    protected $fillable = [ 'gambar_kamar', 'nama_kamar', 'deskripsi', 'status','nomor_telepon'];
    protected $primaryKey = 'id_kamar';
    public $timestamps = false;
}
