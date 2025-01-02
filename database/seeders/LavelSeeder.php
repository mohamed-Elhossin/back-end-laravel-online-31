<?php

namespace Database\Seeders;

use App\Models\Lavel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LavelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lavel::factory()->count(10)->create();
    }
}
