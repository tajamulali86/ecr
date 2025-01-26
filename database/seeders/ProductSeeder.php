<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products=[ 'Dolo650',
        'Pan10',
        'Metolar TL 60',
        'Cough Syrup',
        'Zandu Balm',
        'Ortho Relief',
        'Zenta',
        'Quick relief',
        'tree1000',];

        foreach ($products as $product) {
            Product::create(['name' => $product]);
        }
    }
}
