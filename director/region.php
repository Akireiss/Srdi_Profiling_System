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
      <h1>Region</h1><br>
      <div class="row">
        <div class="col-lg-8">
          <a href = "add_region.php"><button type="button" class="btn btn-warning">Add Region</button></a>
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
  
                      <th scope="col">Region</th>
                      <th scope="col">PSG Code</th>
                      <th scope="col">Region Code</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <?php
$result = $db->getRegion();
while ($row = mysqli_fetch_array($result)) {
    echo '<tr>';
    echo '<td><a href="edit_region.php?region_id=' . $row['region_id'] . '">'  . $row['regDesc']  .'</a></td>';
    echo '<td>' . $row['psgcCode'] . '</td>';
    echo '<td>' . $row['regCode'] . '</td>';
    echo '<td>';
    echo '<a href="view_region.php?region_id=' . $row['region_id'] . '"><i class="ri-eye-line"></i></a>';
    // Fix the edit link
    echo '<a href="edit_region.php?region_id=' . $row['region_id'] . '"><i class="bi bi-pencil-square"></i></a>';
    echo '</td>';
    echo '</tr>';
}
?>
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