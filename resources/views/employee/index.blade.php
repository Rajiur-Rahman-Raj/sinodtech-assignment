@extends('layouts.app')

@section('title', 'Employees')

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
                        Employees
                    </li>
                </ol>
            </nav>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        All Employees
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Employee Id</th>
                                    <th scope="col">name</th>
                                    <th scope="col">KPI Score</th>
                                    <th scope="col">Total Assign</th>
                                    <th scope="col">status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($employees as $key => $employee)
                                    <tr>
                                        <th scope="row">{{ ++$key }}</th>
                                        <td>{{ $employee->employee_id }}</td>
                                        <td>{{ $employee->name }}</td>
                                        <td>
                                            <span class="badge bg-success">
                                                {{ $employee->kpi_score }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge bg-info"> {{ $employee->total_assign }}</span>
                                        </td>
                                        <td> {!! getStatusBadge($employee->status) !!}</td>
                                        <td>
                                            <a href="{{ route('employee.details', $employee) }}" title="details"><i
                                                    class="bi bi-eye" style="font-size:20px"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    {!! showEmptyState('No employees found') !!}
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
