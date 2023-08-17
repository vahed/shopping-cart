<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $city = $this->faker->city;

        return [
            'name' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'address' => $this->faker->address,
            'city' => $city,
            'county' => $city,
            'postcode' => $this->faker->postcode,
            'payment_gateway' => 'zarinpal',
            'user_id' => $this->faker->numberBetween(1, 10),
            'product_id' => $this->faker->numberBetween(1, 10),
            'product_feature_id' => $this->faker->numberBetween(1, 10),
            'image_url_id' => $this->faker->numberBetween(1, 10),
            'transaction_id' => Str::random(15),
            'quantity' => $this->faker->numberBetween(500, 1000),
            'total' => $this->faker->numberBetween(5000, 200000),
            'error' => null,
        ];

    }
}
