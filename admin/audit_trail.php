<?php
  session_start();
  include '../db_con.php';
  $db = new db;
  if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
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
            <th>ID</th>
            <th>Date and Time</th>
            <th>User ID</th>
            <th>Action</th>
            <th>Description</th>
        </tr>
        
    </table>
    </main>
    <?php include '../includes/footer.php' ?>
</body>
</html>
