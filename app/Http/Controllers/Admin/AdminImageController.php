<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminImageController extends Controller
{
    public function index()
    {
        $images = Image::all();

        return Inertia::render('Admin/CreateImage', [ 'images' => $images ]);
    }

//    public function createNewBrand(Request $request)
//    {//dd($request);
//        $brands= Image::all();
//
//        if($request->method()=='POST')
//        {
//            $validator = $request->validate([
//                'brandName'      => 'required',
//                'brandColor'      => 'required',
//                'brandSize' => 'required'
//            ]);
//
//            foreach( $brands as $brand){
//                if($brand->name == $request->brandName) {
//                    return redirect()->back()->with('error', 'This brand name already exists.');
//                }
//            }
//            Image::create([
//                'brand_name' => $request->brandName,
//                'color' => $request->brandColor,
//                'size' => $request->brandSize
//            ]);
//
//            return redirect()->back()->with('success', 'Brand has been created successfully.');
//        }
//    }
}
