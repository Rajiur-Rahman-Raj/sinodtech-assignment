@extends('layouts.app')

@section('title','Customer Details')

@section('content')

<div class="container-fluid">

    <nav class="mb-3">
        <ol class="breadcrumb">

            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">
                    Dashboard
                </a>
            </li>

            <li class="breadcrumb-item">
                <a href="{{ route('customer.index') }}">
                    Customers
                </a>
            </li>

            <li class="breadcrumb-item active">
                Customer Details
            </li>
        </ol>
    </nav>

    <div class="card shadow-sm">
        <div class="card-header">
            <h5 class="mb-0">
                Customer Information
            </h5>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <strong>Name</strong>
                    <br>
                    {{ $customer->name }}
                </div>

                <div class="col-md-3">
                    <strong>Email</strong>
                    <br>
                    {{ $customer->email }}
                </div>

                <div class="col-md-3">
                    <strong>Phone</strong>
                    <br>
                    {{ $customer->phone }}
                </div>

                <div class="col-md-3">
                    <strong>Address</strong>
                    <br>
                    {{ $customer->address }}
                </div>
            </div>
        </div>
    </div>

    @php
        $lastPurchase = $customer->sales
            ->sortByDesc('sale_date')
            ->first();
        $grandTotal = $customer->sales->sum('grand_total');
    @endphp

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card border-start border-primary border-1 shadow-sm">
                <div class="card-body">
                    <h6>
                        Purchase Frequency
                    </h6>

                    <h3>
                        {{ $customer->purchase_count }}
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-start border-success border-1 shadow-sm">
                <div class="card-body">
                    <h6>
                        Last Purchase
                    </h6>

                    <h5>
                        {{ optional($lastPurchase?->sale_date)->format('d M, Y') ?? 'N/A' }}
                    </h5>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-start border-warning border-1 shadow-sm">
                <div class="card-body">
                    <h6>
                        Total Purchased
                    </h6>

                    <h4>
                        {{ number_format($customer->grand_total_sum,2) }} TK
                    </h4>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm mt-4">
        <div class="card-header">
            Purchase History
        </div>

        <div class="card-body p-0">
            <table class="table table-bordered table-hover mb-0">
                <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Invoice</th>
                    <th>Branch</th>
                    <th>Date</th>
                    <th>Total Items</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>

                @forelse($customer->sales as $sale)

                    <tr>
                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            {{ $sale->invoice_no }}
                        </td>

                        <td>
                            {{ $sale->branch->name }}
                        </td>

                        <td>
                            {{ \Carbon\Carbon::parse($sale->sale_date)->format('d M, Y') }}
                        </td>

                        <td>
                            {{ $sale->items->count() }}
                        </td>

                        <td>
                            {{ number_format($sale->grand_total,2) }}
                        </td>

                        <td>
                            <a
                                href="{{ route('sale.details', $sale) }}"
                                href="#"
                                class="btn btn-sm btn-info">
                                View
                            </a>
                        </td>
                    </tr>
                @empty

                    <tr>
                        <td colspan="7" class="text-center">
                            No purchase history found.
                        </td>
                    </tr>
                @endforelse

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
