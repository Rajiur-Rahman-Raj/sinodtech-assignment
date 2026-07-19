<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Customer;
use App\Models\Inventory;
use App\Models\Sale;
use App\Http\Requests\StoreSaleRequest;
use App\Services\SaleService;

use Illuminate\Validation\ValidationException;

class SaleController extends Controller
{

    public function __construct(
        private SaleService $saleService
    ) {
    }
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

        return view('sale.create', compact(
            'branches',
            'customers'
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

    public function store(StoreSaleRequest $request)
    {
        try {
            $this->saleService->store($request->validated());
            return back()->with('success', 'Sale created successfully.');
        } catch (ValidationException $e) {
            throw $e;
        } catch (\Throwable $e) {
            return back()
                ->withInput()
                ->with('error', 'Something went wrong while create a sale. Please try again.');
        }
    }

    public function details(Sale $sale)
    {
        $sale->load([
            'branch',
            'customer',
            'items.product',
        ]);

        $sale->loadCount('items as total_items');

        return view('sale.details', compact('sale'));
    }

}
