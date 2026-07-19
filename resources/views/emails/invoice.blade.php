<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Invoice</title>
</head>

<body style="font-family:Arial,sans-serif;background:#f8f9fa;padding:30px;">

    <div style="max-width:700px;margin:auto;background:#fff;padding:30px;border-radius:8px;">

        <h2 style="margin-bottom:5px;">
            Thank You For Your Purchase
        </h2>

        <p>
            Hi {{ $sale->customer->name }},
        </p>

        <p>
            Your order has been completed successfully.
        </p>

        <hr>

        <table width="100%" cellpadding="6">

            <tr>
                <td><strong>Invoice No</strong></td>
                <td>{{ $sale->invoice_no }}</td>
            </tr>

            <tr>
                <td><strong>Sale Date</strong></td>
                <td>{{ $sale->sale_date->format('d M, Y') }}</td>
            </tr>

            <tr>
                <td><strong>Branch</strong></td>
                <td>{{ $sale->branch->name }}</td>
            </tr>

        </table>

        <br>

        <table
            width="100%"
            cellspacing="0"
            cellpadding="8"
            border="1"
            style="border-collapse:collapse;">

            <thead>

                <tr style="background:#efefef;">
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                </tr>

            </thead>

            <tbody>

                @foreach($sale->items as $item)

                    <tr>

                        <td>
                            {{ $item->product->name }}
                        </td>

                        <td align="center">
                            {{ $item->quantity }}
                        </td>

                        <td align="right">
                            {{ number_format($item->unit_price,2) }}
                        </td>

                        <td align="right">
                            {{ number_format($item->subtotal,2) }}
                        </td>
                    </tr>
                @endforeach
            </tbody>

            <tfoot>
                <tr>
                    <th colspan="3" align="right">
                        Grand Total
                    </th>

                    <th align="right">
                        {{ number_format($sale->grand_total,2) }}
                    </th>
                </tr>
            </tfoot>
        </table>
        <br>

        <p>
            Thank you for shopping with us.
        </p>
        <p>
            Regards,<br>
            <strong>{{ config('app.name') }}</strong>
        </p>
    </div>
</body>

</html>
