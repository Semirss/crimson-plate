<?php
session_start();
// Database connection
$servername = "localhost";
$username = "root"; // Change this if needed
$password = ""; // Change this if needed
$dbname = "crimsonplate";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$username = $_POST['username'];
$password = $_POST['password'];

// SQL query
 // Query to get user ID
 $stmt = $conn->prepare("SELECT id FROM users WHERE username = ? AND pass = ?");
 $stmt->bind_param("ss", $username, $password);
 $stmt->execute();
 $stmt->store_result();
 $stmt->bind_result($user_id);

 if ($stmt->num_rows > 0) {
    // If user found
    $stmt->fetch();
    $_SESSION['user_id'] = $user_id;
    $_SESSION['username'] = $username; 
    header("Location: menu.php");
    exit();
} else {
    echo "Invalid credentials.";
}
$conn->close();
?>
