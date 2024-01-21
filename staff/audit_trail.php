<?php
  session_start();
  include '../db_con.php';
  $db = new db;
  if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
  }
  if ($_SESSION['type_id'] == 1) {
    header("Location:  ../auth/login.php");
    exit(); 
}

if ($_SESSION['type_id'] == 3) {
  header("Location:  ../auth/login.php");
  exit(); 
}
?>

<!DOCTYPE html>
<html lang="en">

<body>
  <?php include '../includes/header.php' ?>
<?php include '../includes/sidebar.php' ?>

<main id="main" class="main">
    
<section class="section">
    <h1>Audit Trail</h1>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>


    <table>
        <tr>
           
            <th>Date and Time</th>
            <th>User ID</th>
            <th>Action</th>
            <th>View</th>
        </tr>
        <?php
$result = $db->getAuditTrail();
while ($row = mysqli_fetch_array($result)) {
    echo '<tr>';
    echo '<td>'  . $row['date'] . '</td>';
    echo '<td>' . $row['fullname'] . '</td>';
    echo '<td>' . $row['action'] . '</td>';
    echo '<td>';
    echo '<a href="view_audit.php?id=' . $row['id'] . '"><i class="ri-eye-line"></i></a>';
    echo '</td>';
    echo '</tr>';
}
?>
    </table>
    </main>
    <?php include '../includes/footer.php' ?>
</body>
</html>
