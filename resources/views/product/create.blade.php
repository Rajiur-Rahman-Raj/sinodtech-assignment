@extends('layouts.app')

@section('title', 'Create Product')

@section('content')

    <div class="container-fluid">
        <nav class="mb-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                </li>

                <li class="breadcrumb-item">
                    <a href="{{ route('product.index') }}">Products</a>
                </li>

                <li class="breadcrumb-item active">
                    Create Product
                </li>
            </ol>
        </nav>

        <form action="{{ route('product.store') }}" method="POST">
            @csrf

            @include('partials.validation-errors')

            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        Create Product
                    </h5>
                    <button type="submit" class="btn btn-primary">
                        Save Product
                    </button>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">
                                Branch
                            </label>

                            <select name="branch_id" id="branch_id"
                                class="form-select @error('branch_id') is-invalid @enderror">
                                <option value="">
                                    Select Branch
                                </option>
                                @foreach ($branches as $branch)
                                    <option value="{{ $branch->id }}"
                                        {{ old('branch_id') == $branch->id ? 'selected' : '' }}>
                                        {{ $branch->name }}
                                    </option>
                                @endforeach
                            </select>

                            @error('branch_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">
                                Name
                            </label>
                            <input type="text" name="name" value="{{ old('name') }}"
                                class="form-control @error('name') is-invalid @enderror">

                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">
                                SKU
                            </label>
                            <input type="text" name="sku" value="{{ old('sku') }}"
                                class="form-control @error('sku') is-invalid @enderror">

                            @error('sku')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">
                                Price
                            </label>
                            <input type="text" name="price" value="{{ old('price') }}"
                                class="form-control @error('price') is-invalid @enderror">

                            @error('price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">
                                Quantity
                            </label>
                            <input type="number" name="quantity" value="{{ old('quantity') }}"
                                class="form-control @error('quantity') is-invalid @enderror">

                            @error('quantity')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">
                                Status
                            </label>

                            <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
                                <option value="">
                                    Select Status
                                </option>
                                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>
                                    Active
                                </option>
                                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>
                                    Inactive
                                </option>
                            </select>

                            @error('status')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </form>
    </div>
@endsection


@push('scripts')
@endpush
