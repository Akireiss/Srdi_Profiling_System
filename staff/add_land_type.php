<?php
session_start();
include "../db_con.php";
$db = new db;
if(!isset($_SESSION['user_id'])) {
  header("Location: ../auth/login.php");
} else {
  if (isset($_POST['submit'])) {
    $land_type = $_POST['land_type'];
    $status   = $_POST['status'];
    $result = $db->addLand($land_type, $status);
    if ($result != 0) {
      $message = "Land Type Successfully Added!";
    } else {
      $message = "Land Type  Already Exist!";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<body>
  <?php include '../includes/header.php' ?>
  <?php include '../includes/staff.sidebar.php' ?>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Add Land Type</h1>
      <?php
      if (isset($message)) {
        if ($result!= 0) {
          echo '<div class="alert alert-warning bg-warning border-0 alert-dismissible fade show" role="alert">';
          echo '<i class="fa-sharp fa-solid fa-circle-check"></i>';
        } else {
          echo '<div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">';
          echo '<i class="fa-regular fa-circle-xmark"></i>';
        }
        echo $message;
        echo '</div>';
      }
      ?>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">

              <!-- <h5 class="card-title">Association Information</h5> -->
              <h5 class="card-title"></h5>

              <!-- Custom Styled Validation with Tooltips -->
              <form class="row g-3 needs-validation" novalidate action=# enctype="multipart/form-data" method="POST">

                <div class="col-md-6 position-relative">
                  <label class="form-label">Land Type<font color="red">*</font></label>
                  <input type="text" class="form-control" id="validationTooltip01" name="land_type" required>
                  <div class="invalid-tooltip">
                    The Land Type field is required.
                  </div>
                </div>

                <div class="col-md-6 position-relative">
                  <label class="form-label">Status<font color="red">*</font></label>
                  <div class="col-sm-12">
                    <select class="form-select" aria-label="Default select example" id="validationTooltip03" name="status" required>
                      <option value="" selected disabled>Select Status</option>
                      <option value="Active">Active</option>
                      <option value="Inactive">Inactive</option>
                    </select>
                    <div class="invalid-tooltip">
                      The Status field is required.
                    </div>
                  </div>
                </div>

                <div class="col-12">
                  <button type="submit" class="btn btn-warning" name="submit">Save Land Type</button>
                  <button type="reset" class="btn btn-primary">Cancel</button>
                </div>
              </form><!-- End Custom Styled Validation with Tooltips -->

            </div>
          </div>

        </div>

    </section>

  </main><!--END MAIN-->

 

  

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