<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductFeature>
 */
class ProductFeatureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $productColors = ['red', 'green', 'blue', 'navy'];
        $color = Arr::random($productColors);

        $productSizes = ['sm', 'md', 'lg', 'xl'];
        $size = Arr::random($productSizes);

        return [
            'price' => fake()->numberBetween(10000, 100000),
            'quantity' => fake()->numberBetween(10, 1000),
            'color' => $color,
            'size' => $size,
            'description' => fake()->text(),
            'discount' => 0,
            'in_stock' => 1
            
        ];
    }
}
