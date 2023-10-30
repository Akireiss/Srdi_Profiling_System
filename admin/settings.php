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
      <div class="row hidden-md-up">


        <div class="col-md-4 ">
          <div class="card pb-5 ">
            <div class="card-block ">
              <div class="card-title bg-success px-2">
                Location
              </div>
              <div class="mx-2">

                <li class="card-text my-1">
                <a href="province.php">
                  Province
                </a>
                </li>
                <li class="card-text my-1">
                      <a href="municipality.php">
                Municipality
                      </a>
                </li>
                <li class="card-text my-1">
                <a href="barangay.php">Barangay</a></li>
              </div>
             
            </div>
          </div>
        </div>


        <div class="col-md-4">
          <div class="card pb-5">
            <div class="card-block">
            <div class="card-title bg-success px-2">
          Producers
          </div>
              <div class="mx-2">
              
              <p class="card-text p-y-1">Some quick example text to build on the card title .</p>
              </div>
            </div>
          </div>
        </div>


        <div class="col-md-4">
          <div class="card pb-5">
            <div class="card-block">
            <div class="card-title bg-success px-2">
          Production
          </div>
              <div class="mx-2">
              <p class="card-text p-y-1">Some quick example text to build on the card title .</p>
             
            </div>
          </div>
        </div>


      </div><br>
      <div class="row">


        <div class="col-md-4">
          <div class="card pb-5">
            <div class="card-block">
            <div class="card-title bg-success px-2">
          News
          </div>
          <div class="mx-2">
              
              <p class="card-text p-y-1">Some quick example text to build on the card title .</p>
          </div>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card pb-5">
            <div class="card-block">
            <div class="card-title bg-success px-2">
          User
          </div>
          <div class="mx-2">
              <li class="card-text my-1">User</li>
              <li class="card-text my-1">Profile</li>
          </div>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card pb-5">
            <div class="card-block">
            <div class="card-title bg-success px-2">
        System
          </div>
          <div class="mx-2">
              <li class="card-text my-1">Back Up Database</li>
              <li class="card-text my-1">Upload Database</li>

          </div>
            </div>
          </div>
        </div>


      </div>
    </div>
  </div>

  </main>
  <?php include '../includes/footer.php' ?>
</body>

</html>