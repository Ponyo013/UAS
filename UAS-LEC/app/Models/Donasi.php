<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    use HasFactory;

    protected $table = 'donasi';  
    protected $fillable = [
        'user_id', 
        'jumlah_donasi', 
        'nama_donatur', 
        'deskripsi'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
