<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = 'reviews';
    protected $fillable = [
        'review',
    ];

    public function pelanggan()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function barangs()
    {
        return $this->hasOne(Barang::class, 'id', 'tiket_id');
    }
}
