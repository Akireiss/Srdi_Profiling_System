<?php
$host = "localhost"; // Replace with your database host (e.g., localhost)
$dbname = "profiling_system"; // Replace with your database name
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Additional PDO configuration options if needed
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// SQL query to count production_id by month
$sql = "SELECT DATE_FORMAT(production_date, '%Y-%m') AS month, COUNT(production_id) AS count
        FROM production
        GROUP BY month
        ORDER BY month";

$result = $pdo->query($sql);

$data = array();

// Fetch the data and format it
while ($row = $result->fetch()) {
    $data[$row['month']] = $row['count'];
}

// Create an array for each month, initializing the count to 0 if no data was found
$xValues = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
$yValues = array_fill(0, 12, 0);

foreach ($data as $month => $count) {
    $monthIndex = (int)explode('-', $month)[1] - 1;
    $yValues[$monthIndex] = $count;
}

// Encode data to JSON
$xValues = json_encode($xValues);
$yValues = json_encode($yValues);
?>
