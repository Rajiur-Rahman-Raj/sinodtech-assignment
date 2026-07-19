<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Sale;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::query()
            ->withCount('sales')
            ->whereStatus(1)
            ->latest()
            ->get();

        return view('customer.index', compact('customers'));
    }

    public function details(Customer $customer)
    {
        $customer->load([
            'sales.branch',
            'sales.items.product'
        ]);

        $customer->loadCount('sales as purchase_count');
        $customer->loadSum('sales as grand_total_sum', 'grand_total');

        $lastPurchase = $customer->sales()
            ->select('id', 'sale_date')
            ->latest('sale_date')
            ->first();

        return view('customer.details', compact('customer', 'lastPurchase'));
    }

}
