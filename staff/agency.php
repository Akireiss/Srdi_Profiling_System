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

    <div class="pagetitle">
      <h1>Funding Agency</h1><br>
      <div class="row">
        <div class="col-lg-8">
          <a href = "add_agency.php">
            <button type="button" class="btn btn-warning">Add Funding Agency</button>
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
                    <th scope="col">Funding Agency</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
$result = $db->getAgency();
while ($row = mysqli_fetch_array($result)) {
    echo '<tr>';
    echo '<td>' . $row['agency_name'] . '</a></td>';
    echo '<td>' . $row['status'] . '</td>';
    echo '<td>';
    echo '<a href="view_religion.php?agency_id=' . $row['agency_id'] . '"><i class="ri-eye-line"></i></a>';
    // Fix the edit link
    echo '<a href="edit_agency.php?agency_id=' . $row['agency_id'] . '"><i class="bi bi-pencil-square"></i></a>';
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