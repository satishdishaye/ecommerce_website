<!DOCTYPE html>
<html>
<head>
    <title>Payment Confirmation</title>
</head>
<body>
    <h1>Thank You for Your Payment!</h1>
    <p>Dear {{ $order->first_name }},</p>
    <p>Your payment for Order #{{ $order->id }} has been successfully processed. The status of your order is now: <strong>{{ $order->status }}</strong>.</p>
    <p>Thank you for shopping with us!</p>
</body>
</html>
