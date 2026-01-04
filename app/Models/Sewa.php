<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sewa extends Model
{
    protected $table = 'sewa';

    protected $fillable = [
        'user_id',
        'id_prod',
        'tgl_mulai',
        'tgl_selesai',
        'total_hari',
        'total_harga',
        'status',
        'payment_method',
        'bukti_pembayaran'
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_prod', 'id_prod');
    }

     public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

