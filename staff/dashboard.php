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
<?php include '../includes/staff.sidebar.php' ?>

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


<!-- staffffff -->
sssssss
    <section class="section dashboard mt-5">


      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!--  Cocoon Producers Card -->
            <div class="col-xxl-4 col-md-6 ">
              <div class="card info-card Cocoon Producers-card">

               

                <div class="card-body">
                  <h5 class="card-title">Cocoon Producers<span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="box-shadow: 0 0 10px rgba(0, 0, 255, 1);">
                      <i class="bi bi-people" style="color: blue;"></i>
                    </div>
                    
                    <div class="ps-3">
                     

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Number of Cocoon Producers Card -->

            <!-- Number of Rearing House Card -->
 <!-- End Number of Rearing House Card -->


 <div class="col-xxl-4 col-xl-">

  <div class="card info-card production-card">

<!--Project Site card-->
    <div class="card-body">
      <h5 class="card-title">Project Site </h5>

      <div class="d-flex align-items-center">
        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"  style="box-shadow: 0 0 10px rgba(255, 0, 0, 1);">
          <i class="bi bi-house" style="color: red;"></i>
        </div>
        <div class="ps-3">
 <!--End ofProject Site card-->

        </div>
      </div>

    </div>
  </div>

</div>

<div class="col-xxl-4 col-xl-6">

<div class="card info-card systemuser-card">

  

  <div class="card-body">
    <h5 class="card-title">System User </h5>

    <div class="d-flex align-items-center">
      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"  style="box-shadow: 0 0 10px rgba(0, 0, 0, 1 );">
      <i class="bi bi-person-workspace" style="color: black;"></i>
      </div>
      <div class="ps-3">

      </div>
    </div>

  </div>
</div>

</div>


            <!-- Production Card -->
            <div class="col-xxl-4 col-xl-6">

              <div class="card info-card production-card">

                

                <div class="card-body">
                  <h5 class="card-title">Production </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"  style="box-shadow: 0 0 10px rgba(70, 130,180,1);">
                      <i class="bi bi-tools" style="color: steelblue;"></i>
                    </div>
                    <div class="ps-3">
                      <!-- <h6>1244</h6>
                      <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span> -->

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Production Card -->

  <div class="col-xxl-4 col-md-6">
              <div class="card info-card numberofcocoonproducers-card">

                <div class="card-body">
                  <h5 class="card-title">Income </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"  style="box-shadow: 0 0 10px rgba(0, 128, 128, 1);">
                      <i class="bi bi-cash" style=" color: teal"></i>
                    </div>
                    <div class="ps-3">
                      <!-- <h6>145</h6>
                      <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

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

  ======= Footer =======
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>SRDI</span></strong>. All Rights Reserved 2023
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Developed by DMMMSU-SRDI</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../public/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../public/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../public/assets/vendor/echarts/echarts.min.js"></script>
  <script src="../public/assets/vendor/quill/quill.min.js"></script>
  <script src="../public/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../public/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../public/assets/vendor/php-email-form/validate.js"></script>


  <link href="../public/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main JS File -->
  <script src="../public/assets/js/main.js"></script>

</body>

</html>