<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
</head>
<body>
    <h2>Customer Name : {{ $order->full_name }}</h2>
    <h2>Customer Phone : {{ $order->phone }}</h2>
    <h2>Customer Country : {{ $order->country }}</h2>
    <h2>Customer City : {{ $order->city }}</h2>
    <h2>Customer Street Address : {{ $order->street_address }}</h2>
    <h2>Customer Post Code : {{ $order->post_code }}</h2>
    <h2>Product Total Price : {{ $order->total_price }}</h2>
    <h2>Product Total Qty : {{ $order->total_qty }}</h2>

</body>
</html>
