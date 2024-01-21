<?php
    include 'db_con.php';

// Function to log an event to the audit trail
function logEvent($user_id, $action, $description) {
    global $conn; // Your database connection variable
    date_default_timezone_set("Asia/Manila");
    $timestamp = date('Y-m-d H:i:s');
    $sql = "INSERT INTO audit_trail (timestamp, user_id, action, description) VALUES (?, ?, ?, ?)";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("siss", $timestamp, $user_id, $action, $description);
        $stmt->execute();
        $stmt->close();
    } else {
        // Handle error
    }
}

// Example usage:

?>	