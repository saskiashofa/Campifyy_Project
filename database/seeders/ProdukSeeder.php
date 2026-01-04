<?php

namespace Database\Seeders;

use App\Http\Controllers\ProdukController;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
        [
            'nama' => 'tenda', 
            'harga_day'=> '100000',
            'stok'=> '50',
            'gambar'=> 'tenda.jpg',
            'deskripsi'=> 'tendanya bagus',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        ];
    Produk::insert($data);
    }
}
