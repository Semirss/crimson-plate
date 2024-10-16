<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    echo "User is not logged in.";
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crimsonplate";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_SESSION['user_id'];
$total_price = $_POST['total_price'];
$cart_items = json_decode($_POST['cart_items'], true);

// Start transaction
$conn->begin_transaction();

try {
    // Insert into orders table
    $stmt = $conn->prepare("INSERT INTO orders (user_id, total_price) VALUES (?, ?)");
    if (!$stmt) {
        throw new Exception("Prepare statement failed: " . $conn->error);
    }
    $stmt->bind_param("id", $user_id, $total_price);
    if (!$stmt->execute()) {
        throw new Exception("Execute failed: " . $stmt->error);
    }

    // Get the order_id of the newly created order
    $order_id = $stmt->insert_id;
    if (!$order_id) {
        throw new Exception("Failed to retrieve order_id: " . $stmt->error);
    }

    // Insert each cart item into order_items table
    $stmt = $conn->prepare("INSERT INTO order_items (order_id, food_id, quantity, price) VALUES (?, ?, ?, ?)");
    if (!$stmt) {
        throw new Exception("Prepare statement failed: " . $conn->error);
    }

    foreach ($cart_items as $item) {
        // Retrieve food_id
        $food_id = get_food_id_by_name($item['name']);
        if (!$food_id) {
            throw new Exception("Failed to retrieve food_id for " . $item['name']);
        }

        $quantity = $item['quantity'];
        $price = $item['price'];
        $stmt->bind_param("iiid", $order_id, $food_id, $quantity, $price);
        if (!$stmt->execute()) {
            throw new Exception("Execute failed: " . $stmt->error);
        }
    }

    // Commit transaction
    $conn->commit();
    echo "Order placed successfully";
    header("location: order-confirmation.php");
    unset($_SESSION['cart']);
} catch (Exception $e) {
    // Rollback transaction on error
    $conn->rollback();
    echo "Error: " . $e->getMessage();
}

// Close the statement and connection
if (isset($stmt)) {
    $stmt->close();
}
$conn->close();
?>

<?php
// Helper function to get food_id by name
function get_food_id_by_name($name) {
    global $conn;
    $stmt = $conn->prepare("SELECT id FROM foods WHERE name = ?");
    if (!$stmt) {
        throw new Exception("Prepare statement failed: " . $conn->error);
    }
    $stmt->bind_param("s", $name);
    if (!$stmt->execute()) {
        throw new Exception("Execute failed: " . $stmt->error);
    }
    $stmt->bind_result($food_id);
    $stmt->fetch();
    $stmt->close();
    return $food_id;
}
?>
