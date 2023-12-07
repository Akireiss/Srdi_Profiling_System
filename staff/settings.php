<?php
session_start();
include '../db_con.php';
$db = new db();
if(!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
}

?>
<?php include '../includes/header.php' ?>
<?php include '../includes/staff.sidebar.php' ?>
<main id="main" class="main">

<div class="pagetitle">
  <h1>Settings</h1>
  <nav>
   
  </nav>
</div><!-- End Page Title -->


<div>
    <div>
    <div class="row">
    <div class="col-md-4">
    <div class="card">
      <div class="card-title bg-success text-white px-4">
        Project Site
      </div>
      <div class="card-body">
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            <a href="topography.php" class="card-link">Topography</a>
          </li>
          <li class="list-group-item">
            <a href="land_type.php" class="card-link">Land Types</a>
          </li>
          <li class="list-group-item">
            <a href="tenancy.php" class="card-link">Tenancy</a>
          </li>
          <li class="list-group-item">
            <a href="irrigation.php" class="card-link">Souce of Irrigation</a>
          </li>
          <li class="list-group-item">
            <a href="soil_type.php" class="card-link">Soil Type</a>
          </li>
          <li class="list-group-item">
            <a href="agency.php" class="card-link">Funding Agency</a>
          </li>
          <li class="list-group-item">
            <a href="monitoring_team.php" class="card-link">Monitoring Team</a>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card">
      <div class="card-title bg-success text-white px-4">
        Producers
      </div>
      <div class="card-body">
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            <a href="education.php" class="card-link">Educational Attainment</a>
          </li>
          <li class="list-group-item">
            <a href="religion.php" class="card-link">Religion</a>
          </li>
          <li class="list-group-item">
            <a href="source_of_income.php" class="card-link">Source of Income</a>
          </li>
          <li class="list-group-item">
            <a href="farm_tools.php" class="card-link">Farm Tools</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  

  <div class="col-md-4">
    <div class="card">
      <div class="card-title bg-success text-white px-4">
        Address
      </div>
      <div class="card-body">
        <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <a href="region.php" class="card-link">Region</a>
          </li>
          <li class="list-group-item">
            <a href="province.php" class="card-link">Province</a>
          </li>
          <li class="list-group-item">
            <a href="municipality.php" class="card-link">Municipality</a>
          </li>
          <li class="list-group-item">
            <a href="barangay.php" class="card-link">Barangay</a>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="card">
      <div class="card-title bg-success text-white px-4">
        User
      </div>
      <div class="card-body">
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            <a href="system_user.php" class="card-link">User</a>
          </li>
          <li class="list-group-item">
            <a href="user_type.php" class="card-link">User Type</a>
          </li>
        </ul>
      </div>
    </div>
  </div>

  </div>

  </main>
  <?php include '../includes/footer.php' ?>
</body>

</html>

<script>
  $(document).ready(function() {
    // Get all rows with class "row"
    var rows = $('.row');

    // Loop through each row
    rows.each(function() {
      // Find all card-bodies within the row
      var cardBodies = $(this).find('.card-body');

      // Get the maximum height among card-bodies in the row
      var maxHeight = 0;
      cardBodies.each(function() {
        var height = $(this).outerHeight();
        if (height > maxHeight) {
          maxHeight = height;
        }
      });

      // Set the height of all card-bodies in the row to the maximum height
      cardBodies.css('min-height', maxHeight);
    });
  });
</script>

