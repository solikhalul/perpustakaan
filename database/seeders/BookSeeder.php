<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('books')->insert([
            [
                'judul' => 'Laskar Pelangi',
                'penulis' => 'Andrea Hirata',
                'tahun_terbit' => 2005,
                'stok' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Bumi',
                'penulis' => 'Tere Liye',
                'tahun_terbit' => 2014,
                'stok' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Negeri 5 Menara',
                'penulis' => 'Ahmad Fuadi',
                'tahun_terbit' => 2009,
                'stok' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Perahu Kertas',
                'penulis' => 'Dee Lestari',
                'tahun_terbit' => 2009,
                'stok' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Ayat-Ayat Cinta',
                'penulis' => 'Habiburrahman El Shirazy',
                'tahun_terbit' => 2004,
                'stok' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}