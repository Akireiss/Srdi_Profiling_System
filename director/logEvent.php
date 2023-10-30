<?php
// Replace this with your database connection logic
$con = new mysqli('localhost', 'root', '', 'profiling_system');

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$fullname = $_POST['fullname'];
$event_type = $_POST['event_type'];
$event_description = $_POST['event_description'];

// Prepare and execute the SQL statement
$sql = "INSERT INTO audit_logs (fullname, event_type, event_description) VALUES (?, ?, ?)";
$stmt = $con->prepare($sql);
$stmt->bind_param("sss", $fullname, $event_type, $event_description);
$stmt->execute();

// Close the statement
$stmt->close();

echo "Event logged successfully.";

$con->close();
?>
