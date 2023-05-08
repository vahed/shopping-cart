<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductImageRequest;
use App\Models\Image;
use App\Models\ProductFeature;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminGetProductFeatureController extends Controller
{
    public function getRelatedFeatureProduct(Request $request)
    {
        $productName = intval($request->get("productName"));

        $productFeatures = ProductFeature::where('product_id', '=', $productName)->get();

        return Inertia::render('Admin/CreateProductImage', [
            'productFeatures' => $productFeatures
        ]);
    }

    public function storeImage(Request $request)
    {
        $validated = $request->validate([
            'productFeatureId' => 'required',
            'imageURL' => 'required',
        ]);

        Image::create(
            [
                'product_feature_id' => $request->productFeatureId,
                'image_url' => $request->imageURL
            ]
        );

        return Inertia::render('Admin/CreateProductImage', [
            'success' => 'تصویر به بانک دادها افزوده شد۰'
        ]);

    }

}
