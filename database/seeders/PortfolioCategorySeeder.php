<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PortfolioCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('portfolio_categories')->insert([
            ['name' => 'Rupa-Rupa Usaha', 'slug' => 'rupa-rupa-usaha'],
            ['name' => 'Jasa Tenaga Kerja', 'slug' => 'jasa-tenaga-kerja'],
            ['name' => 'Anak Perusahaan', 'slug' => 'anak-perusahaan'],
        ]);
    }
}
