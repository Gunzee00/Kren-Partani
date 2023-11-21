<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class galeri extends Model
{
    use HasFactory;
    protected $table = 'galeri';
    protected $fillable = ['judul_galeri', 'gambar_galeri', 'deskripsi_galeri'];
    protected $primaryKey = 'id_galeri';
    public $timestamps = false;
}
