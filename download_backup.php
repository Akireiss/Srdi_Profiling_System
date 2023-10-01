<?php
// Start a session (this should be the first line in each dashboard file)
session_start();

// Check if the user is logged in and their user type is valid (in this case, only admin)
if (isset($_SESSION['type_id']) && $_SESSION['type_id'] === 1) {
    // Replace these values with your actual database credentials
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'profiling_system';

    // Create a connection to the database
    $connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    // Check the connection
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Set the filename for the backup
    $filename = 'backup-' . date('Y-m-d_H-i-s') . '.sql';

    // Set the Content-Type and Content-Disposition headers for download
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . $filename . '"');

    // Get all table names from the database
    $tables = array();
    $query = mysqli_query($connection, 'SHOW TABLES');
    while ($row = mysqli_fetch_row($query)) {
        $tables[] = $row[0];
    }
    $output = '';
    foreach ($tables as $table) {
        $query = mysqli_query($connection, 'SELECT * FROM `' . $table . '`');
        $numColumns = mysqli_num_fields($query);

        $output .= 'DROP TABLE IF EXISTS `' . $table . '`;' . PHP_EOL;
        $row2 = mysqli_fetch_row(mysqli_query($connection, 'SHOW CREATE TABLE `' . $table . '`'));
        $output .= $row2[1] . ';' . PHP_EOL;

        while ($row = mysqli_fetch_row($query)) {
            $output .= 'INSERT INTO `' . $table . '` VALUES(';
            for ($j = 0; $j < $numColumns; $j++) {
                $row[$j] = addslashes($row[$j]);
                $row[$j] = preg_replace("#\n#", "\\n", $row[$j]);
                if (isset($row[$j])) {
                    $output .= '"' . $row[$j] . '"';
                } else {
                    $output .= '""';
                }
                if ($j < ($numColumns - 1)) {
                    $output .= ',';
                }
            }
            $output .= ');' . PHP_EOL;
        }

        $output .= PHP_EOL . PHP_EOL;
    }

    // Close the connection
    mysqli_close($connection);

}
?>
