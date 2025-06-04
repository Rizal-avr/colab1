<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    use HasFactory;

    protected $table = 'alamat';
    protected $primaryKey = 'id_alamat';
    protected $fillable = ['id_kecamatan', 'detail_alamat'];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan');
    }

    public function mitra()
    {
        return $this->hasOne(Mitra::class, 'id_alamat');
    }
}
