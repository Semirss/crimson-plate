<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

if (!isset($_GET['order_item_id'])) {
    echo "Order Item ID not specified.";
    exit();
}

$order_item_id = $_GET['order_item_id'];

$conn = new mysqli("localhost", "root", "", "crimsonplate");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("DELETE FROM order_items WHERE order_item_id = ?");
$stmt->bind_param("i", $order_item_id);
if ($stmt->execute()) {
    header("Location: admin_dashboard.php");
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
