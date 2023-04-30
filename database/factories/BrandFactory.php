<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $randomColor = ['red', 'green', 'blue', 'white', 'black'];
        $brandName = ['Zara', 'Adidas', 'Pull and Bear', 'Nike', 'Reebok'];
        $size = ['extra small', 'small', 'medium', 'large', 'extra large'];

        return [
            'color' => Arr::random($randomColor),
            'brand_name' => Arr::random($brandName),
            'size' => Arr::random($size)
        ];
    }
}
