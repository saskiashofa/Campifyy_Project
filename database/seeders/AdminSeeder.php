<?php

namespace Database\Seeders;

use App\Models\AdminCamp;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
        [
            'email' => 'admin@email.com', 
            'password' => Hash::make('admin123'),
            'created_at' => now(),
            'updated_at' => now(),
        ],
        ];
    AdminCamp::insert($data);
    }
}
