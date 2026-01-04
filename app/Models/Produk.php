<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;

class Produk extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id_prod'; 
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nama',
        'harga_day',
        'stok',
        'gambar',
        'deskripsi',
        'id_ktg',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_ktg', 'id_ktg');
    }
}
