<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ProductFeature;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $images = [
            "https://inaturalist-open-data.s3.amazonaws.com/photos/58049699/square.jpg",
            "https://inaturalist-open-data.s3.amazonaws.com/photos/100821385/square.jpg",
            "https://inaturalist-open-data.s3.amazonaws.com/photos/75873313/square.jpg",
            "https://inaturalist-open-data.s3.amazonaws.com/photos/65267550/square.jpg",
            "https://inaturalist-open-data.s3.amazonaws.com/photos/58914463/square.jpg"
        ];

        return [
            'image_url' => Arr::random($images)
        ];
    }
}
