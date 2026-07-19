@extends('layouts.app')

@section('title', 'Create Sale')

@section('content')

    <div class="container-fluid">
        <nav class="mb-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                </li>

                <li class="breadcrumb-item">
                    <a href="{{ route('sale.index') }}">Sales</a>
                </li>

                <li class="breadcrumb-item active">
                    Create Sale
                </li>
            </ol>
        </nav>

        <form action="{{ route('sale.store') }}" method="POST">
            @csrf

            @include('partials.validation-errors')

            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        Create Sale
                    </h5>
                    <button type="submit" class="btn btn-primary">
                        Save Sale
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
                                Customer
                            </label>

                            <select name="customer_id" class="form-select @error('customer_id') is-invalid @enderror">
                                <option value="">
                                    Select Customer
                                </option>

                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}"
                                        {{ old('customer_id') == $customer->id ? 'selected' : '' }}>

                                        {{ $customer->name }}

                                    </option>
                                @endforeach
                            </select>
                            @error('customer_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">
                                Sale Date
                            </label>
                            <input type="date" name="sale_date" value="{{ old('sale_date', now()->format('Y-m-d')) }}"
                                class="form-control @error('sale_date') is-invalid @enderror"
                                value="{{ now()->format('Y-m-d') }}">

                            @error('sale_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm mt-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        Products
                    </h5>

                    <button type="button" class="btn btn-success btn-sm" id="addRow">
                        + Add Product
                    </button>
                </div>

                <div class="card-body p-0">
                    <table class="table table-bordered mb-0" id="productTable">
                        <thead class="table-light">
                            <tr>
                                <th width="50%">
                                    Product
                                </th>

                                <th width="20%">
                                    Quantity
                                </th>

                                <th width="20%">
                                    Price
                                </th>

                                <th width="15%">
                                    Sub Total
                                </th>

                                <th width="10%">
                                    Action
                                </th>

                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>
                                    <select name="products[0][product_id]" class="form-select product-select">

                                        <option value="">

                                            Select Branch First

                                        </option>

                                    </select>
                                </td>

                                <td>
                                    <input type="number" min="1" value="1" name="products[0][quantity]"
                                        class="form-control quantity">
                                </td>

                                <td>
                                    <input type="text" class="form-control price" readonly>
                                </td>

                                <td>
                                    <input type="text" class="form-control subtotal" readonly>
                                </td>

                                <td class="text-center">
                                    <button type="button" class="btn btn-danger removeRow">
                                        ×
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="card-footer">
                        <div class="text-end">
                            <h5>
                                Grand Total :
                                <span id="grandTotal">
                                    0.00
                                </span>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection


@push('scripts')
    <script>
        let row = 1;
        let branchProducts = [];
        document.addEventListener('DOMContentLoaded', function() {
            $('#addRow').click(function() {
                if ($('#branch_id').val() == '') {
                    alert('Please select a branch first.');
                    return;
                }

                let option = '<option value="">Select Product</option>';

                branchProducts.forEach(function(item) {

                    option += `
                        <option
                            value="${item.product.id}"
                            data-price="${item.product.price}">

                            ${item.product.name}
                            (${item.product.sku})
                            - Stock (${item.quantity})

                        </option>
                    `;
                });

                let html = `
                        <tr>

                            <td>

                                <select
                                    name="products[${row}][product_id]"
                                    class="form-select product-select"
                                    required>

                                    ${option}

                                </select>

                            </td>

                            <td>

                                <input
                                    type="number"
                                    min="1"
                                    value="1"
                                    name="products[${row}][quantity]"
                                    class="form-control quantity">

                            </td>

                            <td>

                                <input
                                    type="text"
                                    class="form-control price"
                                    readonly>

                            </td>

                            <td>

                                <input
                                    type="text"
                                    class="form-control subtotal"
                                    readonly>

                            </td>

                            <td class="text-center">

                                <button
                                    type="button"
                                    class="btn btn-danger removeRow">

                                    ×

                                </button>

                            </td>

                        </tr>
                        `;

                $('#productTable tbody').append(html);
                row++;
            });


            $(document).on('click', '.removeRow', function() {
                if ($('#productTable tbody tr').length > 1) {
                    $(this).closest('tr').remove();
                }
                calculateGrandTotal();
            });

            $(document).on('change', '.product-select', function() {
                let price = parseFloat(
                    $(this).find(':selected').data('price')
                ) || 0;

                let row = $(this).closest('tr');
                row.find('.price').val(price.toFixed(2));
                calculateRow(row);
            });

            $(document).on('keyup change', '.quantity', function() {

                let row = $(this).closest('tr');
                calculateRow(row);
            });

            $('#branch_id').change(function() {
                let branchId = $(this).val();
                $('.product-select').html(
                    '<option value="">Loading...</option>'
                );

                $.get('/branch-products/' + branchId, function(response) {

                    branchProducts = response;
                    let option = '<option value="">Select Product</option>';
                    response.forEach(function(item) {

                        option += `
                                <option
                                    value="${item.product.id}"
                                    data-price="${item.product.price}">
                                    ${item.product.name}
                                    (${item.product.sku})
                                    - Stock (${item.quantity})
                                </option>
                            `;
                    });

                    $('.product-select').html(option);
                });
            });

            function calculateRow(row) {
                let qty = parseFloat(
                    row.find('.quantity').val()
                ) || 0;

                let price = parseFloat(
                    row.find('.price').val()
                ) || 0;

                let subtotal = qty * price;

                row.find('.subtotal').val(
                    subtotal.toFixed(2)
                );

                calculateGrandTotal();
            }

            function calculateGrandTotal() {
                let grand = 0;

                $('.subtotal').each(function() {

                    grand += parseFloat($(this).val()) || 0;

                });

                $('#grandTotal').text(
                    grand.toFixed(2)
                );
            }
        });
    </script>
@endpush
