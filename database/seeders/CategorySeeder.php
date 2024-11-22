<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('categories')->insert([
            ['categories' => 'SIMPAN PINJAM', 'created_at' => now(), 'updated_at' => now()],
            ['categories' => 'JASA TENAGA KERJA', 'created_at' => now(), 'updated_at' => now()],
            ['categories' => 'RUPA - RUPA USAHA', 'created_at' => now(), 'updated_at' => now()],
            ['categories' => 'KENAPA KAMI', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
