<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Customer;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::with('customer', 'branch')
            ->latest()
            ->get();

        return view('sale.index', compact('sales'));
    }

    public function create()
    {
        $branches = Branch::whereStatus(1)->get();
        $customers = Customer::whereStatus(1)->get();
        $products = Product::whereStatus(true)->orderBy('name')->get();

        return view('sale.create', compact(
            'branches',
            'customers',
            'products'
        ));
    }

    public function branchProducts($branchId)
    {
        $products = Inventory::query()
            ->with('product:id,name,sku,price')
            ->where('branch_id', $branchId)
            ->where('quantity', '>', 0)
            ->get();

        return response()->json($products);
    }

    public function store(Request $request)
    {
        dd($request->all());
    }

}
