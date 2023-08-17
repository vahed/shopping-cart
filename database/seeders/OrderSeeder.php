<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductFeature;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<30; $i++) {
            $user = User::all()->random();
            $product = Product::all()->random();
            $productFeature = ProductFeature::all()->where('product_id', $product->id)->random();
            $imageUrl = Image::all()->where('product_feature_id', $productFeature->id)->random();

            Order::factory()->create([
                'user_id' => $user->id,
                'product_id' => $product->id ,
                'product_feature_id' => $productFeature->id,
                'image_url_id' => $imageUrl->id,
                'name' => $user->name,
                'email' => $user->email,
                'address' => $user->address,
                'city' => $user->city,
                'county' => $user->county,
                'postcode' => $user->postcode
            ]);
        }
    }
}
