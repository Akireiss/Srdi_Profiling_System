<?php
session_start();
include '../db_con.php';
$db = new db();
if(!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
}

?>
<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>
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
      <div class="row hidden-md-up">


        <div class="col-md-4 ">
          <div class="card px-4 pt-2 pb-5">
            <div class="card-block">
              <h4 class="card-title">Location</h4>
              
              <li class="card-text my-1">Province</li>
              <li class="card-text my-1">Municipality</li>
              <li class="card-text my-1">Barangay</li>
             
            </div>
          </div>
        </div>


        <div class="col-md-4">
          <div class="card px-4 pt-2 pb-5">
            <div class="card-block">
              <h4 class="card-title">Producers</h4>
              
              <p class="card-text p-y-1">Some quick example text to build on the card title .</p>
             
            </div>
          </div>
        </div>


        <div class="col-md-4">
          <div class="card px-4 pt-2 pb-5">
            <div class="card-block">
              <h4 class="card-title">Production</h4>
              
              <p class="card-text p-y-1">Some quick example text to build on the card title .</p>
             
            </div>
          </div>
        </div>


      </div><br>
      <div class="row">


        <div class="col-md-4">
          <div class="card px-4 pt-2 pb-5">
            <div class="card-block">
              <h4 class="card-title">News</h4>
              
              <p class="card-text p-y-1">Some quick example text to build on the card title .</p>
             
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card px-4 pt-2 pb-5">
            <div class="card-block">
              <h4 class="card-title">User</h4>
              
              <li class="card-text my-1">User</li>
              <li class="card-text my-1">Profile</li>
             
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card px-4 pt-2 pb-5">
            <div class="card-block">
              <h4 class="card-title">System</h4>
              
              <li class="card-text my-1">Back Up Database</li>
              <li class="card-text my-1">Upload Database</li>

             
            </div>
          </div>
        </div>


      </div>
    </div>
  </div>

  </main>
  <?php include 'footer.php' ?>
</body>

</html>