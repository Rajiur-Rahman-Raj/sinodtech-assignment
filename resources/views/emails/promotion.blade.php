<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
</head>

<body>

    <h2>Hello {{ $customer->name }},</h2>
    <p>
        We noticed that you haven't visited us for a while.
    </p>

    <p>
        We are offering exclusive discounts for our valued customers.
    </p>

    <p>
        We look forward to serving you again.
    </p>

    <br>

    <strong>
        Regards,
        <br>
        {{ config('app.name') }}
    </strong>
</body>

</html>
