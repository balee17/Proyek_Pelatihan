<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
        'id_user',
        'id_ruangan',
        'nama_ruangan',
        'kode_ruangan',
        'email_user',
        'durasi',
        'harga',
        'pembayaran',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'id_ruangan');
    }
    
}
