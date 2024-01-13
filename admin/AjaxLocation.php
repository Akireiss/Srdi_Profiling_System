<?php
include "../db_con.php";
$db = new db();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['producerId'])) {
    $producerId = $_POST['producerId'];

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


