<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Employee;
use Illuminate\Http\Request;

class LostCustomerController extends Controller
{
    public function index()
    {
        $days = config('crm.lost_customer_days');

        $customers = Customer::query()
            ->with(['latestSale', 'assignment'])
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

        $employees = Employee::whereStatus(1)->get();


        return view('customer.lost.index', compact('customers', 'days', 'employees'));
    }

    public function customerAssignToEmployee(Customer $customer)
    {
        if ($customer->assignment) {
            return redirect()
                ->route('lost.customer.index')
                ->with('error', 'This customer is already assigned.');
        }

        $customer->load('latestSale');

        $employees = Employee::whereStatus(1)->get();

        return view('customer.lost.assign', compact(
            'customer',
            'employees'
        ));
    }

    public function customerAssignToEmployeeStore(Request $request, Customer $customer)
    {
        $request->validate([
            'employee_id' => ['required', 'exists:employees,id'],
        ]);

        if ($customer->assignment) {
            return back()->with('error', 'Customer already assigned.');
        }

        $customer->assignment()->create([
            'employee_id' => $request->employee_id,
            'assigned_at' => now(),
        ]);

        return redirect()
            ->route('lost.customer.index')
            ->with('success', 'Customer assigned successfully.');
    }
}
