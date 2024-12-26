<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_pesanan extends Model
{
    use HasFactory;

    protected $fillable = ['pesanan_id', 'menu_id', 'jumlah', 'harga', 'subtotal'];

    public function menu(){
        return $this->belongsTo(Menu::class);
    }

    public function pesanan(){
        return $this->belongsTo(Pesanan::class);
    }
}
