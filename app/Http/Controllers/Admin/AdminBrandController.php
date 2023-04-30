<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminBrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return Inertia::render('Admin/CreateBrand', [ 'brands' => $brands ]);
    }

    public function createNewBrand(Request $request)
    {//dd($request);
        $brands= Brand::all();

        if($request->method()=='POST')
        {
            $validator = $request->validate([
                'brandName'      => 'required',
                'brandColor'      => 'required',
                'brandSize' => 'required'
            ]);

            foreach( $brands as $brand){
                if($brand->name == $request->brandName) {
                    return redirect()->back()->with('error', 'This brand name already exists.');
                }
            }
            Brand::create([
                'brand_name' => $request->brandName,
                'color' => $request->brandColor,
                'size' => $request->brandSize
            ]);

            return redirect()->back()->with('success', 'Brand has been created successfully.');
        }
    }

}
