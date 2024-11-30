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
        'deskripsi',
        'image',
        'status',
    ];

    const STATUS_VALID = 'valid';
    const STATUS_BELUM_VALID = 'belum_valid';
    const STATUS_TIDAK_VALID = 'tidak_valid';

    protected $attributes = [
        'status' => self::STATUS_BELUM_VALID,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
