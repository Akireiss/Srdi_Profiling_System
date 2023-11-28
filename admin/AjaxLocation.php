<?php

// Assuming you have a function to get locations by producer ID
if (isset($_POST['producer_id'])) {
    $producerId = $_POST['producer_id'];

    $result = $db->getLocationsByProducer($producerId);

    // Return the options as HTML
    while ($row = mysqli_fetch_array($result)) {
        $site_id = $row['site_id'];
        $location = $row['location'];
        echo '<option value="' . $site_id . '">' . $location . '</option>';
    }

    die(); // Ensure nothing else interferes with the response
}
?>