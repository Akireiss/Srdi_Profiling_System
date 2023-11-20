<?php
$servername = "localhost"; // Change to your server name
$username = "root"; 
$password = ""; 
$dbname = "profiling_system"; 

$con = new mysqli($servername, $username, $password, $dbname);

if (isset($_GET['year'])) {
    $selectedYear = $_GET['year'];

    $sql = "SELECT DATE_FORMAT(production_date, '%Y-%m') AS month, COUNT(production_id) AS production_count 
            FROM production 
            WHERE YEAR(production_date) = $selectedYear
            GROUP BY DATE_FORMAT(production_date, '%Y-%m')";
} else {
    $sql = "SELECT DATE_FORMAT(production_date, '%Y-%m') AS month, COUNT(production_id) AS production_count 
            FROM production 
            GROUP BY DATE_FORMAT(production_date, '%Y-%m')";
}

$result = $con->query($sql);

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
?>
