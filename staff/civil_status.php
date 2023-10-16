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
      <h1>Civil Status</h1><br>
      <div class="row">
        <div class="col-lg-8">
          <a href = "add_civil.php">
            <button type="button" class="btn btn-warning">Add Civil Status</button>
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
                    <th scope="col">Civil Status</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
$result = $db->getCivil();
while ($row = mysqli_fetch_array($result)) {
    echo '<tr>';
    echo '<td><a href="edit_civil.php?civil_id=' . $row['civil_id'] . '">' . $row['civil_name'] . '</a></td>';
    echo '<td>' . $row['status'] . '</td>';
    echo '<td>';
    echo '<a href="view_civil.php?civil_id=' . $row['civil_id'] . '"><i class="ri-eye-line"></i></a>';
    // Fix the edit link
    echo '<a href="edit_civil.php?civil_id=' . $row['civil_id'] . '"><i class="bi bi-pencil-square"></i></a>';
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