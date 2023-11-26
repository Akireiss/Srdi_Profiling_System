<?php
$servername = "localhost"; // Change to your server name
$username = "root"; 
$password = ""; 
$dbname = "profiling_system"; 

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['year'])) {
    $selectedYear = $_GET['year'];

    // Establishing a database connection
    $con = new mysqli($servername, $username, $password, $dbname);

    // Check if the connection was successful
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $sql = "SELECT DATE_FORMAT(p.production_date, '%Y-%m') AS month, SUM(total_production) AS production_count 
            FROM production p
            WHERE YEAR(p.production_date) = ?
            GROUP BY DATE_FORMAT(p.production_date, '%Y-%m')";

    $stmt = $con->prepare($sql);

    // Check if the prepared statement was created successfully
    if ($stmt === false) {
        die("Error in prepared statement: " . $con->error);
    }

    $stmt->bind_param("s", $selectedYear);
    $stmt->execute();

    $result = $stmt->get_result();

    $data = [];

    $allMonths = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

    foreach ($allMonths as $month) {
        $data[] = [
            'month' => $month,
            'production_count' => 0,
        ];
    }

    while ($row = $result->fetch_assoc()) {
        $monthIndex = (int)date('n', strtotime($row['month'])); // Extract month index (1 to 12) from the date
        $data[$monthIndex - 1]['production_count'] = $row["production_count"];
    }

    $con->close();

    header('Content-Type: application/json');
    echo json_encode($data);
} else {
    header("HTTP/1.1 400 Bad Request");
    echo json_encode(array("error" => "Invalid request"));
}
?>
