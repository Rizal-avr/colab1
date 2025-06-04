<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';

    protected $fillable = [
        'user_id',
        'id_mitra',
        'tanggal_transaksi',
        'jenis_transaksi',
        'id_sayur',
        'kuantitas',
        'harga_satuan',
        'total_transaksi',
        'jenis_pembayaran',
    ];

    public function sayur()
    {
        return $this->belongsTo(Sayur::class, 'id_sayur');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mitra()
    {
        return $this->belongsTo(Mitra::class, 'id_mitra');
    }
}
