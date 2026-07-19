<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = $products = Customer::whereStatus(1)->get();
        return view('customer.index', compact('customers'));
    }
}
