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
  <?php include '../includes/staff.sidebar.php' ?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Barangay</h1><br>
      <div class="row">
        <div class="col-lg-8">
          <a href = "add_barangay.php">
            <button type="button" class="btn btn-warning">Add Barangay</button>
          </a>
        </div>
      </div>
    </div><!-- End Page Title -->

    <section class="section">

      <div class="row">
        <div class="col-lg-12">
           
        <div class="card">
    <div class="card-body">
        <table class="table table-striped datatable">
            <thead>
                <tr>
                    <th scope="col">Barangay</th>
                    <th scope="col">Municipality</th>
                    <th scope="col">Province</th>
                    <th scope="col">Region</th>
                    <th scope="col">Barangay Code</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
    <?php
    $result = $db->getBarangay();
    while ($row = mysqli_fetch_array($result)) {
        echo '<tr>';
        echo '<td><a href="edit_user.php?id=' . $row['barangay_id'] . '">' . $row['brgyCode'] . '</a></td>';
        echo '<td>' . $row['brgyDesc'] . '</td>';
        echo '<td>' . $row['regCode'] . '</td>';
        echo '<td>' . $row['provCode'] . '</td>';
        echo '<td>' . $row['citymunCode'] . '</td>';
        echo '<td>';
        echo '<a href="view_user.php?id=' . $row['barangay_id'] . '"><i class="ri-eye-line"></i></a>';
        echo '<a href="edit_user.php?id=' . $row['barangay_id'] . '"><i class="bi bi-pencil-square"></i></a>';
        echo '</td>';
        echo '</tr>';
    }
    ?>
</tbody>
        </table>
    </div>
</div>

          </div>

        </div>

    </section>

  </main><!--END MAIN-->
  <?php include '../includes/footer.php' ?>
 </body>
</html>
