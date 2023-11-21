<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etiket extends Model
{
    use HasFactory;
    protected $table = "e-tiket";
    protected $primaryKey ="id";
    protected $fillable = ['id'];
}
