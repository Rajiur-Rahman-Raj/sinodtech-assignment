<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::query()
            ->whereStatus(1)
            ->withCount('inventories as total_products')
            ->withSum('inventories as total_stock', 'quantity')
            ->get();

        return view('branch.index', compact('branches'));
    }
    public function details(Branch $branch)
    {
        $branch->load('inventories.product');

        $branch->loadCount('inventories as total_products');
        $branch->loadSum('inventories as total_stock', 'quantity');

        return view('branch.details', compact('branch'));
    }
}
