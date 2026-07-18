@extends('layouts.app')

@section('title', 'Product Details')

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

                    <li class="breadcrumb-item">
                        <a href="{{ route('product.index') }}">
                            Products
                        </a>
                    </li>
                    <li class="breadcrumb-item active">
                        Product Details
                    </li>
                </ol>
            </nav>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ $product->name }}</h5>
                    </div>

                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-4">

                                <strong>SKU :</strong>
                                {{ $product->sku }}

                            </div>

                            <div class="col-md-4">

                                <strong>Price :</strong>
                                {{ number_format($product->price, 2) }}

                            </div>

                            <div class="col-md-4">

                                <strong>Total Stock :</strong>
                                {{ $product->total_stock ?? 0 }}

                            </div>
                        </div>

                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>

                                    <th>Branch</th>

                                    <th>Available Stock</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($product->inventories as $inventory)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ optional($inventory->branch)->name }}</td>
                                        <td>
                                            <span class="badge bg-primary">
                                                {{ $inventory->quantity }}
                                            </span>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
