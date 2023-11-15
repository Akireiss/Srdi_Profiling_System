<?php
session_start(); // Start the session

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    // Get user information from the session
    $userId = $_SESSION['user_id'];
     // Replace with the actual session variable for the user's name
  // $action = "A user have log out";
    // Log the logout action to the audit trail table
    logAuditTrail($userId, 'User Logout');

    // Unset all of the session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();
}

// Redirect to the login page or any other page
header("location: login.php");
exit;

// Function to log audit trail
function logAuditTrail($userId,  $action) {
    // Perform database insertion (replace with your database connection code)
    $pdo = new PDO("mysql:host=localhost;dbname=profiling_system", "root", "");
    $stmt = $pdo->prepare("INSERT INTO audit_logs (user_id, action) VALUES (?, ?)");
    $stmt->execute([$userId, $action]);
}
?>
