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
      <h1>Barangay</h1><br>
      <div class="row">
        <div class="col-lg-8">
          <a href = "add_barangay.php">
            <button type="button" class="btn btn-warning">Add Barangay</button>
          </a>
        </div>
      </div>
    </div><!-- End Page Title -->

    <section class="section">

      <div class="row">
        <div class="col-lg-12">
           
        <div class="card">
    <div class="card-body">
        <table class="table table-striped datatable">
            <thead>
                <tr>
                    <th scope="col">Barangay</th>
                    <th scope="col">Municipality</th>
                    <th scope="col">Province</th>
                    <th scope="col">Region</th>
                    <th scope="col">Barangay Code/th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
    <?php
    $result = $db->getBarangay();
    while ($row = mysqli_fetch_array($result)) {
        echo '<tr>';
        echo '<td><a href="edit_user.php?id=' . $row['barangay_id'] . '">' . $row['citymunDesc'] . '</a></td>';
        echo '<td>' . $row['provDesc'] . '</td>';
        echo '<td>' . $row['regDesc'] . '</td>';
        echo '<td>' . $row['brgyCode'] . '</td>';
        echo '<td>';
        echo '<a href="view_user.php?id=' . $row['barangay_id'] . '"><i class="ri-eye-line"></i></a>';
        echo '<a href="edit_user.php?id=' . $row['barangay_id'] . '"><i class="bi bi-pencil-square"></i></a>';
        echo '</td>';
        echo '</tr>';
    }
    ?>
</tbody>
        </table>
    </div>
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