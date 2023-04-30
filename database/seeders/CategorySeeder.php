<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        Category::factory()
            ->times(4)
            ->create();

        for($i=0; $i<8; $i++) {
            $subCategory = ['Shoes', 'Pant', 'Jackets', 'Boots', 'hats', 'gloves', 'socks', 'underwear'];
            $subCategoryName = fake()->unique()->randomElement($subCategory);

            Category::create([
                'name' => $subCategoryName,
                'slug' => fake()->unique()->name,
                'category_code' => fake()->countryCode(),
                'parent_id' => fake()->numberBetween(1, 4)
            ]);
        }

        for($j=0; $j<8; $j++) {
            $subCategoryList = ['xx small','extra-small', 'small', 'medium', 'large', 'x-large', 'xx large', 'baggy'];
            $subCategoryListName = fake()->randomElement($subCategoryList);

            Category::create([
                'name' => $subCategoryListName,
                'slug' => fake()->unique()->name,
                'category_code' => fake()->countryCode(),
                'parent_id' => fake()->numberBetween(5, 8)
            ]);
        }

    }
}
