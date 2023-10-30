<?php
session_start();
include '../db_con.php';
$db = new db();
if(!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
}

?>
<?php include '../includes/header.php' ?>
<?php include '../includes/sidebar.php' ?>
<main id="main" class="main">

<div class="pagetitle">
  <h1>Settings</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </nav>
</div><!-- End Page Title -->


<div>
    <div>
    <div class="row">
  <div class="col-md-4">
    <div class="card">
      <div class="card-title bg-success text-white px-4">
        Location
      </div>
      <div class="card-body">
        <ul class="list-group list-group-flush">
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

  <div class="col-md-4">
    <div class="card">
      <div class="card-title bg-success text-white px-4">
        Producers
      </div>
      <div class="card-body">
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            <a href="" class="card-link">Some quick example text t</a>
          </li>
          <li class="list-group-item">
            <a href="" class="card-link">Some quick example text t</a>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card">
      <div class="card-title bg-success text-white px-4">
        Production
      </div>
      <div class="card-body">
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            <a href="" class="card-link">Some quick example text t</a>
          </li>
          <li class="list-group-item">
            <a href="" class="card-link">Some quick example text t</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-4">
    <div class="card">
      <div class="card-title bg-success text-white px-4">
        News
      </div>
      <div class="card-body">
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            <a href="" class="card-link">Some quick example text to bui.</a>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <div class="col-md-4">
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
            <a href="edit_systemuser.php" class="card-link">Profile</a>
          </li>
          <li class="list-group-item">
            <a href="user_type.php" class="card-link">User Type</a>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card">
      <div class="card-title bg-success text-white px-4">
        System
      </div>
      <div class="card-body">
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            <a href="backup_button.php" class="card-link">Back Up Database</a>
          </li>
          <li class="list-group-item">
            <a href="" class="card-link">Upload Database</a>
          </li>
          <li class="list-group-item">
            <a href="audit_trail.php" class="card-link">Audit Trail</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>

  </div>

  </main>
  <?php include '../includes/footer.php' ?>
</body>

</html>