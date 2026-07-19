@extends('layouts.app')

@section('title', 'Customers')

@section('content')
    <div class="container">
        <div class="row">
            <nav class="mb-4">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">
                            Dashboard
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        Customers
                    </li>
                </ol>
            </nav>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        All Customers
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">name</th>
                                    <th scope="col">phone</th>
                                    <th scope="col">address</th>
                                    <th scope="col">status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($customers as $key => $customer)
                                    <tr>
                                        <th scope="row">{{ ++$key }}</th>
                                        <td>{{ $customer->name }}</td>
                                        <td>{{ $customer->phone }}</td>
                                        <td>{{ $customer->address }}</td>
                                        <td> {!! getStatusBadge($customer->status) !!}</td>
                                    </tr>
                                @empty
                                    {!! showEmptyState('No customers found') !!}
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
