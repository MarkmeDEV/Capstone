<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Status Updated</title>
</head>
<body>
    <h1>Hello, {{ $order->user->name }}</h1>
    <p>Your order status has been updated to <strong>{{ $order->order_status }}</strong>.</p>
    <p>Thank you for shopping with us!</p>
</body>
</html>
