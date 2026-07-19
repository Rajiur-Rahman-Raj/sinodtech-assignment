<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class LostCustomerController extends Controller
{
    public function index()
    {
        $days = config('crm.lost_customer_days');

        $customers = Customer::query()
            ->with('latestSale')
            ->where(function ($query) use ($days) {
                $query->whereDoesntHave('sales')
                    ->orWhereHas('latestSale', function ($sale) use ($days) {
                        $sale->whereDate(
                            'sale_date',
                            '<=',
                            now()->subDays($days)
                        );
                    });
            })
            ->get();

        return view('customer.lost.index', compact('customers', 'days'));
    }
}
