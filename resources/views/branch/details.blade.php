@extends('layouts.app')

@section('title', 'Branch Details')

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
                        Branches
                        <a href="{{ route('branch.index') }}">
                            Branches
                        </a>
                    </li>
                    <li class="breadcrumb-item active">
                        Branch Details
                    </li>
                </ol>
            </nav>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ $branch->name }}</h5>
                    </div>

                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <strong>Branch Code :</strong>
                                {{ $branch->code }}
                            </div>

                            <div class="col-md-4">
                                <strong>Total Products :</strong>
                                {{ $branch->total_products }}
                            </div>

                            <div class="col-md-4">
                                <strong>Total Stock :</strong>
                                {{ $branch->total_stock ?? 0 }}
                            </div>

                        </div>

                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product</th>
                                    <th>SKU</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($branch->inventories as $inventory)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ optional($inventory->product)->name }}</td>
                                        <td>{{ optional($inventory->product)->sku }}</td>
                                        <td>{{ number_format($inventory->product->price, 2) }}</td>
                                        <td>
                                            <span class="badge bg-success">
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
