<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\ProductFeature;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
           UserSeeder::class,
           ProductSeeder::class,
           //CategorySeeder::class,
           OrderSeeder::class,
           BrandSeeder::class
        ]);

//        $categories = Category::all();
//
//        Product::all()->each( function ($product) use ($categories) {
//           $product->categories()->attach(
//               $categories->random(2)->pluck('id')->toArray()
//           );
//        });

    }
}
