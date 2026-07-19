@extends('layouts.app')

@section('title', 'Employee Details')

@section('content')

    <div class="container">
        <div class="row">
            <nav class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </li>

                    <li class="breadcrumb-item">
                        <a href="{{ route('employee.index') }}">Employees</a>
                    </li>

                    <li class="breadcrumb-item active">
                        Employee Details
                    </li>
                </ol>
            </nav>

            <div class="col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <strong>Employee Information</strong>
                    </div>

                    <div class="card-body">

                        <table class="table table-sm">

                            <tr>
                                <th width="40%">Employee ID</th>
                                <td>{{ $employee->employee_id }}</td>
                            </tr>

                            <tr>
                                <th>Name</th>
                                <td>{{ $employee->name }}</td>
                            </tr>

                            <tr>
                                <th>Phone</th>
                                <td>{{ $employee->phone }}</td>
                            </tr>

                            <tr>
                                <th>KPI Score</th>
                                <td>
                                    <span class="badge bg-success">
                                        {{ $employee->kpi_score }}
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header d-flex justify-content-between">
                        <p><strong>Assigned Customers</strong></p>
                        <button class="btn btn-success btn-sm">Send Mail</button>
                    </div>

                    <div class="card-body p-0">
                        <table class="table table-bordered table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Customer</th>
                                    <th>Phone</th>
                                    <th>Assigned Date</th>
                                    <th>Last Purchase</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($employee->assignments as $key => $assignment)

                                    @php

                                        $customer = $assignment->customer;
                                        $latestSale = $customer->latestSale;
                                        $isLost = false;

                                        if ($latestSale) {
                                            $isLost = Carbon\Carbon::parse($latestSale->sale_date)->lte(
                                                now()->subDays($lostDays),
                                            );
                                        }
                                    @endphp


                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            {{ $customer->name }}
                                        </td>

                                        <td>
                                            {{ $customer->phone }}
                                        </td>

                                        <td>
                                            {{ \Carbon\Carbon::parse($assignment->assigned_at)->format('d M, Y') }}
                                        </td>

                                        <td>
                                            @if ($latestSale)
                                                {{ \Carbon\Carbon::parse($latestSale->sale_date)->format('d M, Y') }}
                                            @else
                                                Never Purchased
                                            @endif
                                        </td>

                                        <td>
                                            @if ($latestSale)
                                                @if ($isLost)
                                                    <span class="badge bg-danger">
                                                        Lost
                                                    </span>
                                                @else
                                                    <span class="badge bg-success">
                                                        Active
                                                    </span>
                                                @endif
                                            @else
                                                <span class="badge bg-secondary">
                                                    No Purchase
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty

                                    <tr>
                                        <td colspan="6" class="text-center">
                                            No assigned customers found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
