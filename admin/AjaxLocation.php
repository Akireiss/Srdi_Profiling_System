<?php
include "../db_con.php";
$db = new db();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['producerId'])) {
    $producerId = $_POST['producerId'];

    // Assuming you have a method to retrieve site locations based on producer ID from your database
    // Adjust this query to match your database structure
    $query = "SELECT site_id, location FROM site WHERE producer_id = $producerId";
    $result = $db->$con->query($query);

    if ($result) {
        echo '<option selected>'.'Select Project Site Location'.'</option>';
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row['site_id'] . '">' . $row['location'] . '</option>';
        }
    } else {
        echo '<option value="">No locations found</option>';
    }
}
?>


