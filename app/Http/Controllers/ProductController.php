<?php

namespace App\Http\Controllers;

use App\Models\Api\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::query()
             ->where('published', '=', 1)
             ->orderBy('created_at', 'desc')
             ->paginate(5);
        return view('product.index', [
             'products' => $products
        ]);
    }

    public function view(Product $product)
    {
        return view('product.view', ['product'=>$product]);
    }
}
