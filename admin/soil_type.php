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

    <div class="pagetitle">
      <h1>Soil Type</h1><br>
      <div class="row">
        <div class="col-lg-8">
          <a href = "add_soiltype.php">
            <button type="button" class="btn btn-warning">Add Soil Type</button>
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
                    <th scope="col">Soil Type</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
    <?php
    $result = $db->getSoil();
    while ($row = mysqli_fetch_array($result)) {
        echo '<tr>';
        echo '<td><a href="edit_soil.php?soil_id=' . $row['soil_id'] . '">' . $row['soil_name'] . '</a></td>';
        echo '<td>' . $row['soil_status'] . '</td>';
        echo '<td>';
        echo '<a href="view_soil.php?soil_id=' . $row['soil_id'] . '"><i class="ri-eye-line"></i></a>';
        echo '<a href="edit_soil.php?soil_id=' . $row['soil_id'] . '"><i class="bi bi-pencil-square"></i></a>';
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