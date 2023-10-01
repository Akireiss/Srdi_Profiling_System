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
    <h1>Cocoon Producers</h1><br>
        <div class="row">
          <div class="col-lg-8 mt-0">
            <a href="cocoonproducers.php">
              <button type="button" class="btn btn-warning">Add Cocoon Producer</button>
            </a>
          </div>
        </div>
      </div>
   



    <section class="section dashboard mt-2">

       
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