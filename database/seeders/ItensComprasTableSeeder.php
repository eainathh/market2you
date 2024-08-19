<?php

namespace Database\Seeders;

use App\Models\ItensCompra;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItensComprasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\ItensCompra::factory(10)->create();
    }
}
