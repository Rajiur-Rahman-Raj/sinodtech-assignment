@extends('layouts.app')

@section('title', 'Lost Customers')

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
                        Lost Customers
                    </li>
                </ol>
            </nav>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Lost Customers
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">name</th>
                                    <th scope="col">phone</th>
                                    <th scope="col">Last Purchase</th>
                                    <th scope="col">Inactive Days</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($customers as $key => $customer)
                                    <tr>
                                        <th scope="row">{{ ++$key }}</th>
                                        <td>{{ $customer->name }}</td>
                                        <td>{{ $customer->phone }}</td>
                                        <td>
                                            @if ($customer->latestSale)
                                                {{ \Carbon\Carbon::parse(optional($customer->latestSale)->sale_date)->format('d M, Y') ?? 'Never Purchased' }}
                                            @else
                                                Never Purchased
                                            @endif
                                        </td>
                                        <td>
                                            @if ($customer->latestSale)
                                                {{ floor(\Carbon\Carbon::parse($customer->latestSale->sale_date)->diffInDays(now())) }}
                                                days
                                            @else
                                                N/A
                                            @endif
                                        </td>
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
