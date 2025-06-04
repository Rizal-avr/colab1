<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sayur extends Model
{
    use HasFactory;

    protected $table = 'sayur';
    protected $primaryKey = 'id_sayur';

    protected $fillable = [
        'nama_sayur',
    ];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_sayur');
    }
}
