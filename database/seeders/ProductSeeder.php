<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductFeature;
use App\Models\Image;
use Database\Factories\ProductFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory(100)
            ->has(
                ProductFeature::factory(4)
                ->has(Image::factory(3)))
            ->create();
    }
}
