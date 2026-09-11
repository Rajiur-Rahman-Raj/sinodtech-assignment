<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Branch;
use App\Models\Product;
use App\Services\ProductService;
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

    public function store(ProductRequest $request, ProductService $productService)
    {
        $validatedData = $request->validated();
        $product = $productService->createProduct($validatedData);
        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }

    public function create()
    {
        $branches = Branch::all();
        return view('product.create', compact('branches'));
    }

    public function details(Product $product)
    {
        $product->load([
            'inventories.branch'
        ]);

        $product->loadSum('inventories as total_stock', 'quantity');

        return view('product.details', compact('product'));
    }
}
