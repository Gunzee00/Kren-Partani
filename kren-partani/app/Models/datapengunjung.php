<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPengunjung extends Model
{
    use HasFactory;
    protected $table = 'data_pengunjung';
    protected $fillable = ['nama_pengunjung', 'nik', 'tempat_tinggal'];
    protected $primaryKey = 'id_data';
    public $timestamps = false;
}
