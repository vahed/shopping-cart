<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
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
        // \App\Models\User::factory(10)->create();

        $this->call([
           UserSeeder::class,
           ProductSeeder::class,
           OrderSeeder::class,
           CategorySeeder::class,
           BrandSeeder::class,

        ]);

        $categories = Category::all();

        Product::all()->each( function ($product) use ( $categories) {
           $product->categories()->attach(
               $categories->random(2)->pluck('id')->toArray()
           );
        });
        
    }
}
