@extends('layouts.app')

@section('title', 'Sales')

@section('content')
    <div class="container">
        <div class="row">
            <nav class="mb-4">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">
                            Home
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        Sales
                    </li>
                </ol>
            </nav>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <p>Sales List</p>
                        <a class="btn btn-sm btn-success" href="{{ route('sale.create') }}"> Create Sale</a>

                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Invoice</th>
                                    <th scope="col">Branch</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Sales Date</th>
                                    <th scope="col">Grand Total</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($sales as $key => $sale)
                                    <tr>
                                        <th scope="row">{{ ++$key }}</th>
                                        <td>{{ $sale->invoice_no }}</td>
                                        <td>{{ optional($sale->branch)->name }}</td>
                                        <td>{{ optional($sale->customer)->name }}</td>
                                        <td>{{ $sale->sale_date }}</td>
                                        <td>{{ number_format($sale->grand_total, 2) }}</td>
                                        <td>
                                            <a href="{{ route('sale.details', $sale) }}" title="details"><i class="bi bi-eye"
                                                    style="font-size:20px"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    {!! showEmptyState('No sales found') !!}
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
