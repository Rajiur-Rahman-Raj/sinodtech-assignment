<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;

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
}
