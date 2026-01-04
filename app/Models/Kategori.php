<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Produk;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'id_ktg'; 
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['nama_ktg'];

    public function produk()
    {
        return $this->hasMany(Produk::class, 'id_ktg', 'id_ktg');
    }
}
