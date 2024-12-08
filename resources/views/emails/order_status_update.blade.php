<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Order Status Update</title>
</head>
<body>
    <h1>Your Order Status Has Been Updated!</h1>
    <p>Dear {{ $order->user->name }},</p>
    <p>Your order for the product <strong>{{ $order->product_name }}</strong> has been updated to <strong>To Ship</strong>.</p>
    <p>We are preparing your order for shipping. You will receive another update once it's on its way.</p>
    <p>Thank you for shopping with us!</p>
</body>
</html>
