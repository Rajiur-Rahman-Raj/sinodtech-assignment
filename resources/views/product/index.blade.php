@extends('layouts.app')

@section('title', 'Products')

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
                        products
                    </li>
                </ol>
            </nav>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        All Branches
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">name</th>
                                    <th scope="col">sku</th>
                                    <th scope="col">price</th>
                                    <th scope="col">Total Stock</th>
                                    <th scope="col">status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $key => $product)
                                    <tr>
                                        <th scope="row">{{ ++$key }}</th>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->sku }}</td>
                                        <td>{{ $product->price }} TK</td>
                                        <td>{{ $product->total_stock ?? 0 }}</td>
                                        <td> {!! getStatusBadge($product->status) !!}</td>
                                        <td>
                                            <a href="{{ route('product.details', $product->id) }}" title="details"><i
                                                    class="bi bi-eye" style="font-size:20px"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    {!! showEmptyState('No products found') !!}
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
