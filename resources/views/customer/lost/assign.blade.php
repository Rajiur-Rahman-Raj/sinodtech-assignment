@extends('layouts.app')

@section('title', 'Assign Employee')

@section('content')

    <div class="container">

        <div class="row">

            <nav class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </li>

                    <li class="breadcrumb-item">
                        <a href="{{ route('lost.customer.index') }}">
                            Lost Customers
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        Assign Employee
                    </li>
                </ol>
            </nav>

            <div class="col-lg-8 mx-auto">

                <div class="card shadow-sm">

                    <div class="card-header">

                        <h5 class="mb-0">
                            Assign Customer to Employee
                        </h5>

                    </div>

                    <form action="{{ route('customer.assign.store', $customer) }}" method="POST">

                        @csrf

                        <div class="card-body">

                            <div class="mb-3">

                                <label class="form-label">
                                    Customer
                                </label>

                                <input type="text" class="form-control" value="{{ $customer->name }}" readonly>

                            </div>

                            <div class="mb-3">

                                <label class="form-label">
                                    Phone
                                </label>

                                <input type="text" class="form-control" value="{{ $customer->phone }}" readonly>

                            </div>

                            <div class="mb-3">

                                <label class="form-label">
                                    Last Purchase
                                </label>

                                <input type="text" class="form-control"
                                    value="{{ optional($customer->latestSale)->sale_date
                                        ? \Carbon\Carbon::parse($customer->latestSale->sale_date)->format('d M, Y')
                                        : 'Never Purchased' }}"
                                    readonly>

                            </div>

                            <div class="mb-3">

                                <label class="form-label">
                                    Select Employee
                                </label>

                                <select name="employee_id" class="form-select @error('employee_id') is-invalid @enderror">

                                    <option value="">
                                        Select Employee
                                    </option>

                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}" @selected(old('employee_id') == $employee->id)>

                                            {{ $employee->name }}
                                            (KPI :
                                            {{ $employee->kpi_score }})
                                        </option>
                                    @endforeach

                                </select>

                                @error('employee_id')
                                    <div class="invalid-feedback">

                                        {{ $message }}

                                    </div>
                                @enderror

                            </div>

                        </div>

                        <div class="card-footer text-end">

                            <a href="{{ route('lost.customer.index') }}" class="btn btn-secondary">

                                Cancel

                            </a>

                            <button class="btn btn-primary">

                                Assign Employee

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection
