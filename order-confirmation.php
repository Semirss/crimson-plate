<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: sign in.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Order placed successfully</h1>
    <p>Thank you for your order!</p>
    <p><a href="menu.php"><button>Continue Shopping</button></a></p>
</body>
</html>
