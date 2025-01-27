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

if ($_SESSION['type_id'] == 2) {
  header("Location:  ../auth/login.php");
  exit(); 
}
?>

<!DOCTYPE html>
<html lang="en">


<body>

<?php include '../includes/header.php' ?>
<?php include '../includes/sidebar.director.php' ?>

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Project Site</h1><br>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <table class="table table-striped datatable">
              <thead>
                <tr>
                  <th scope="col">Project Site Location</th>
                  <th scope="col">Producer</th>
                  <th scope="col">Area</th>
                  <th scope="col">Topography</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <?php
$result = $db->getSites();
while ($row = mysqli_fetch_array($result)) {
    echo '<tr>';
    echo '<td>'.  $row['location'] . '</td>';
    echo '<td>' . $row['name'] . '</td>';
    echo '<td>' . $row['area'] . '</td>';
    echo '<td>' . $row['topography_name'] . '</td>'; // Display topography_name
    echo '<td>';
    echo '<a href="view_site.php?site_id=' . $row['site_id'] . '"><i class="ri-eye-line bigger-icon"></i></a>';
    echo '<a target="_blank" href="../pdf/siteindex.php?site_id=' . $row['site_id'] . '" id=' . $row['site_id'] . '"><i class="bi bi-file-pdf-fill bigger-icon red"></i></a>';
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
</main>
<!-- End #main -->

<?php include '../includes/footer.php' ?>
</body>

</html>
<style>
    .bigger-icon {
        font-size: 24px; /* Adjust the font size as needed */
        margin-left: 2px;
        margin-right: 2px;
    }
    
    .red {
        color: red; /* Set the text color to red */
    }
</style>