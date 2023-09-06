<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;
use App\Http\Repository\ProductRepository;

class ProductController extends Controller
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $products = $this->productRepository->showProductWithCategory();

        return Inertia::render('Products/Product', [ 'products' => $products ]);
    }


    public function show($id)
    {
       // $productRepository = new ProductRepository;

        $product = $this->productRepository->showProductById($id);

        return Inertia::render('Products/Show', [ 'product' => $product ]);
    }

    public function searchProducts(Request $request)
    {
        $name = $request->get('searchInput');
        $products = $this->productRepository->showProductByName($name);

        return Inertia::render('Products/Product', [ 'products' => $products ]);
    }
}
