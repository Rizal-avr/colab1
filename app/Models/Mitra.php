<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    use HasFactory;

    protected $table = 'mitra';
    protected $primaryKey = 'id_mitra';
    protected $fillable = [
        'nama_mitra',
        'id_alamat',
        'no_hp',
        'jenis_mitra',
        'status_mitra'
    ];

    public function alamat()
    {
        return $this->belongsTo(Alamat::class, 'id_alamat');
    }

    public function getAlamatLengkapAttribute()
    {
        return $this->alamat->detail_alamat . ', ' . 
            $this->alamat->kecamatan->nama_kecamatan . ', ' . 
            $this->alamat->kecamatan->kabupaten->nama_kabupaten;
    }
}