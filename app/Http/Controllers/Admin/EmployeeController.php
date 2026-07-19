<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::withCount('assignments as total_assign')->whereStatus(1)->get();
        return view('employee.index', compact('employees'));
    }

    public function details(Employee $employee)
    {
        $employee->load([
            'assignments.customer.latestSale',
        ]);

        $lostDays = config('crm.lost_customer_days');

        return view(
            'employee.details',
            compact(
                'employee',
                'lostDays'
            )
        );
    }
}
