@extends('layouts.app')

@section('title', 'Branches')

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
                        Branches

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
                                    <th scope="col">code</th>
                                    <th scope="col">Total Products</th>
                                    <th scope="col">Total Stocks</th>
                                    <th scope="col">status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($branches as $key => $branch)
                                    <tr>
                                        <th scope="row">{{ ++$key }}</th>
                                        <td>{{ $branch->name }}</td>
                                        <td>{{ $branch->code }}</td>
                                        <td>{{ $branch->total_products }}</td>
                                        <td>{{ $branch->total_stock ?? 0 }}</td>
                                        <td> {!! getStatusBadge($branch->status) !!}</td>
                                        <td>
                                            <a href="{{ route('branch.details', $branch->id) }}" title="details"><i class="bi bi-eye" style="font-size:20px"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    {!! showEmptyState('No branches found') !!}
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
