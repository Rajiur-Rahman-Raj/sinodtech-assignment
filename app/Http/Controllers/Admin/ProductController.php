<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = $products = Product::query()
            ->withSum('inventories as total_stock', 'quantity')
            ->whereStatus(1)
            ->get();
        return view('product.index', compact('products'));
    }
}
