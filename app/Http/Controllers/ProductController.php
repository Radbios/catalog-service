<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        return ProductResource::collection(
            Product::when($request->search, function ($query) use ($request) {
                return $query->where('name', "LIKE", "%" . $request->search . "%");
            })->paginate()
        );
    }

    public function show(Request $request, Product $product)
    {
        return new ProductResource($product);
    }
}
