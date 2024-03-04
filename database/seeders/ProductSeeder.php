<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Defina a quantidade de registros que você deseja criar (padrão: 10)
        $count = $this->command->ask('How much records? (default:10)', 10);

        // Use a factory para criar os registros
        Product::factory()->count($count)->create();
    }
}
