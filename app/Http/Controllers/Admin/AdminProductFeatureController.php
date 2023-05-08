<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFeatureRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Image;
use App\Models\Product;
use App\Models\ProductFeature;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AdminProductFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        return Inertia::render('Admin/CreateProductFeature', [
            'products' => Product::all(),
            'isLogged' => Auth::check()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProductFeatureRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFeatureRequest $request)
    {
        $validated = $request->validated();

        $productFeature = ProductFeature::create(
            [
                'product_id' => $request->productName,
                'price' => $validated["productPrice"],
                'quantity' => $validated["productQuantity"],
                'color'=> $validated["productColor"],
                'size' => $validated["productSize"],
                'description' => $validated["productDescription"],
                'discount' => $validated["productDiscount"],
                'in_stock' => $validated["productInstock"]
            ]
        );

        return redirect()->back()->with('success', 'محصول به بانک دادها افزوده شد۰');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
