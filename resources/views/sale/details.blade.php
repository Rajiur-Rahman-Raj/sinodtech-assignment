@extends('layouts.app')

@section('title', 'Sale Details')

@section('content')

<div class="container-fluid">

    <nav class="mb-3">
        <ol class="breadcrumb">

            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>

            <li class="breadcrumb-item">
                <a href="{{ route('sale.index') }}">Sales</a>
            </li>

            <li class="breadcrumb-item active">

                Sale Details

            </li>

        </ol>
    </nav>

    <div class="card shadow-sm">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
                Invoice :
                {{ $sale->invoice_no }}
            </h5>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="border rounded p-3 h-100">
                        <h6 class="fw-bold">
                            Customer
                        </h6>

                        <hr>

                        <p class="mb-1">
                            <strong>Name :</strong>
                            {{ optional($sale->customer)->name }}
                        </p>

                        <p class="mb-1">
                            <strong>Email :</strong>
                            {{ optional($sale->customer)->email }}
                        </p>

                        <p class="mb-0">
                            <strong>Phone :</strong>
                            {{ optional($sale->customer)->phone }}
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="border rounded p-3 h-100">
                        <h6 class="fw-bold">
                            Branch
                        </h6>

                        <hr>

                        <p class="mb-1">
                            <strong>Name :</strong>
                            {{ optional($sale->branch)->name }}
                        </p>

                        <p class="mb-1">
                            <strong>Code :</strong>
                            {{ optional($sale->branch)->code }}
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="border rounded p-3 h-100">
                        <h6 class="fw-bold">
                            Sale Information
                        </h6>

                        <hr>

                        <p class="mb-1">
                            <strong>Date :</strong>
                            {{ \Carbon\Carbon::parse($sale->sale_date)->format('d M, Y') }}
                        </p>

                        <p class="mb-0">
                            <strong>Total Items :</strong>
                            {{ $sale->total_items }}
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm mt-4">
        <div class="card-header">
            Products
        </div>

        <div class="card-body p-0">
            <table class="table table-bordered table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th width="5%">
                            #
                        </th>

                        <th>
                            Product
                        </th>

                        <th>
                            SKU
                        </th>

                        <th class="text-center">
                            Qty
                        </th>

                        <th class="text-end">
                            Price
                        </th>

                        <th class="text-end">
                            Subtotal
                        </th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($sale->items as $key => $item)

                    <tr>
                        <td>
                            {{ ++$key }}
                        </td>

                        <td>
                            {{ optional($item->product)->name }}
                        </td>

                        <td>
                            {{ optional($item->product)->sku }}
                        </td>

                        <td class="text-center">
                            {{ $item->quantity }}
                        </td>

                        <td class="text-end">
                            {{ number_format($item->unit_price,2) }}
                        </td>

                        <td class="text-end">
                            {{ number_format($item->subtotal,2) }}
                        </td>
                    </tr>
                    @endforeach

                </tbody>

                <tfoot>

                    <tr>
                        <th colspan="5" class="text-end">
                            Grand Total
                        </th>

                        <th class="text-end">
                            {{ number_format($sale->grand_total,2) }}
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

@endsection
