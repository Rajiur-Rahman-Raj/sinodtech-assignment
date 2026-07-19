<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::query()
            ->withSum('inventories','quantity')
            ->whereStatus(true)
            ->get()
            ->map(function($product){

                $product->available_stock =
                    $product->inventories_sum_quantity ?? 0;

                return $product;

            });

        return ProductResource::collection($products);
    }
}
