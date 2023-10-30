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

<!-- Page Title -->
<div class="pagetitle mt-5">
  <!-- <h1>Cocoon Producer</h1><br> -->
  <div class="row">
    <div class="col-lg-8">
      <a href="cocoonproducers.html">
        <button type="button" class="btn btn-warning">Add Cocoon Producer</button>
      </a>
    </div>
  </div>
</div>
<!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <table class="table table-striped datatable">
    
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
              fullname
              username
              usertype
              status
            </thead>
            <tbody>
              <tr>
                <td>Reychelle Oler</td>
                <td>Pa-o Balaoan La Union </td>
                <td>Active</td>
                
                <td>
                  <div class="d-flex align-items-center">
                    <a href="#" class="btn btn-sm btn-primary view-btn m-1" data-id="1">
                      <i class="ri-eye-line"></i>
                    </a>
                    <a href="#" class="btn btn-sm btn-info update-btn m-1" data-id="1">
                      <i class="bi bi-pencil-square"></i>
                    </a>
                  </div>
                </td>
              </tr>
              <tr>
                <td>Romeo Camat</td>
                <td>Pagleddegan Balaoan La Union</td>
                <td>Active</td>
                
                <td>
                  <div class="d-flex align-items-center">
                    <a href="#" class="btn btn-sm btn-primary view-btn m-1" data-id="1">
                      <i class="ri-eye-line"></i>
                    </a>
                    <a href="#" class="btn btn-sm btn-info update-btn m-1" data-id="1">
                      <i class="bi bi-pencil-square"></i>
                    </a>
                  </div>
                </td>
              </tr>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

</main>
<?php include '../includes/footer.php' ?>
</body>
</html>
