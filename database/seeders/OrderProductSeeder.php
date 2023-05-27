<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<30; $i++) {
            OrderProduct::create([
                'order_id' => Order::all()->random()->id,
                'product_id' => Product::all()->random()->id,
                'quantity' => fake()->numberBetween(1, 5)
            ]);
        }
    }
}
