<?php
  session_start();
  include '../db_con.php';
  $db = new db;
  if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
  }
  $cocoonCount = $db->countCocoon();
$usersCount = $db->countUsers();
$siteCount = $db->countSite();
$productionCount = $db->countProduction();
?>

<!DOCTYPE html>
<html lang="en">

<body>

<?php include '../includes/header.php' ?>
<?php include '../includes/sidebar.php' ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->




    <section class="section dashboard mt-5">


      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!--  Cocoon Producers Card -->
            <div class="col-xxl-3 col-md-4">
              <div class="card info-card Cocoon Producers-card">
                <div class="card-body">
                <h5 class="card-title">Cocoon Producers </h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="box-shadow: 0 0 9px rgba(0, 0, 255, 1);">
                      <i class="bi bi-people" style="color: blue;"></i>
                    </div>
                    
                    <div class="ps-3">
                    <h6 class="display-4" ><?php echo $cocoonCount; ?></h6>

                    </div>
                  </div>
                </div>
</a>
              </div>
            </div>


 <div class="col-xxl-2 col-xl-6">
 
  <div class="card info-card production-card">


    <div class="card-body">
      <h5 class="card-title">Project Site </h5>

      <div class="d-flex align-items-center">
        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"  style="box-shadow: 0 0 10px rgba(255, 0, 0, 1);">
          <i class="bi bi-house" style="color: red;"></i>
        </div>
        <div class="ps-3">
        <h6 class="display-4" ><?php echo $siteCount; ?></h6>
        </div>
      </div>
    </div>
  </div>
</a>
</div>

<div class="col-xxl-2 col-xl-6">

  <div class="card info-card systemuser-card">
    <div class="card-body">
      <h5 class="card-title">System User</h5>
      <div class="d-flex align-items-center">
        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="box-shadow: 0 0 10px rgba(0, 0, 0, 1);">
          <i class="bi bi-person-workspace" style="color: black;"></i>
        </div>
        <div class="ps-3">
        <h6 class="display-4" > <?php echo $usersCount; ?></h6>
        </div>
      </div>
    </div>
  </div>
</a>

</div>

            <div class="col-xxl-3 col-xl-4">
              <div class="card info-card production-card">
                <div class="card-body">
                  <h5 class="card-title">Production Income</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"  style="box-shadow: 0 0 10px rgba(70, 130,180,1);">
                      <i class="bi bi-tools" style="color: steelblue;"></i>
                    </div>
                    <div class="ps-3">
                    <h6 class="display-4" > <?php echo $productionCount; ?></h6>
                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Production Card -->

  <div class="col-xxl-2 col-md-6">
              <div class="card info-card numberofcocoonproducers-card">

                <div class="card-body">
                  <h5 class="card-title">Net Income </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"  style="box-shadow: 0 0 10px rgba(0, 128, 128, 1);">
                      <i class="bi bi-cash" style=" color: teal"></i>
                    </div>
                    <div class="ps-3">
                    <h6 class="display-4" > <?php echo $netCount; ?></h6>
                    </div>
                  </div>
                </div>

              </div>
            </div>
</div>
</div>
</div>
</section>


  </main><!-- End #main -->
  <?php include '../includes/footer.php' ?>
</body>

</html>