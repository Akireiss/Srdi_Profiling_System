<?php
session_start();
include "../db_con.php";
$db = new db;
if(!isset($_SESSION['user_id'])) {
  header("Location: ../auth/login.php");
} 



// Assuming you have a similar database connection setup
// $servername = "localhost";
// $username = "root";
// $password = "";
// $db = "profiling_system";

// // Create connection
// $conn = mysqli_connect($servername, $username, $password, $db);

// // Check connection
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }

// Pagination constants
// $recordsPerPage = 10; // Number of records to display per page

// // Calculate total number of records
// $sqlCount = "SELECT COUNT(*) AS total FROM audit_logs";
// $resultCount = mysqli_query($conn, $sqlCount);
// $rowCount = mysqli_fetch_assoc($resultCount);
// $totalRecords = $rowCount['total'];

// // Calculate total number of pages
// $totalPages = ceil($totalRecords / $recordsPerPage);

// // Get the current page from the URL, default to 1 if not set
// $currentpage = isset($_GET['page']) ? $_GET['page'] : 1;

// // Calculate the offset
// $offset = ($currentpage - 1) * $recordsPerPage;

// Fetch logs from the database with pagination
$sql = "SELECT a.*, u.name AS name FROM audit_logs AS a
        LEFT JOIN users AS u ON a.user_id = u.id
        ORDER BY a.created_at DESC
        LIMIT $offset, $recordsPerPage";

// $result = mysqli_query($con, $sql);
// ?>

<!DOCTYPE html>
<html>
<head>
    <title>View Audit Logs</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            margin-bottom: 20px;
            text-align: center;
        }
        table {
            border-collapse: collapse;
            width: 95%;
            margin: 0 auto; /* Center the table */
            border: 1px solid #ddd; /* Add border to the table */
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px; /* Increase padding for better readability */
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .centered-heading {
            text-align: center;
        }

        /* Centered Pagination styles */
        .centered-pagination {
            text-align: center;
            margin-top: 20px;
        }

        .centered-pagination a {
            display: inline-block;
            padding: 8px 16px; /* Increase padding for better clickability */
            margin: 5px;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            text-decoration: none;
        }

        .centered-pagination a.active {
            background-color: #0056b3;
        }

        .centered-pagination a:hover {
            background-color: #0056b3; /* Highlight on hover */
        }
    </style>
</head>

<body>

<h1 class="centered-heading">Audit Trail</h1>

<table>
    <tr>
        <th>ID</th>
        <th>User Name</th>
        <th>Event Type</th>
        <th>Event Description</th>
        <th>Timestamp</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['user_id']; ?></td>
            <td><?php echo $row['fullname']; ?></td>
            <td><?php echo $row['event_type']; ?></td>
            <td><?php echo $row['event_description']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
        </tr>
    <?php } ?>

</table>

<!-- Centered Pagination links -->
<div class="centered-pagination">
    <?php if ($currentpage > 1) : ?>
        <a href="?page=1">First</a>
        <a href="?page=<?php echo $currentpage - 1; ?>">Previous</a>
    <?php endif; ?>

    <?php for ($page = 1; $page <= $totalPages; $page++) : ?>
        <a href="?page=<?php echo $page; ?>" class="<?php echo ($page == $currentpage) ? 'active' : ''; ?>"><?php echo $page; ?></a>
    <?php endfor; ?>

    <?php if ($currentpage < $totalPages) : ?>
        <a href="?page=<?php echo $currentpage + 1; ?>">Next</a>
        <a href="?page=<?php echo $totalPages; ?>">Last</a>
    <?php endif; ?>
</div>

</body>
</html>


<?php
// Close the database connection
mysqli_close($conn);
?>
