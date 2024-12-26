<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $fillable = ['nama_pemesan', 'kode_pesanan'];

    public function details()
    {
        return $this->hasMany(Detail_Pesanan::class);
    }

    public function detailPesanans(){
        return $this->hasMany(Detail_Pesanan::class, 'pesanan_id');
    }
}
