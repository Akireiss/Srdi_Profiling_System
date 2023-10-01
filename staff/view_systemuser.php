<?php
session_start();
include "../db_con.php";
$db = new db;
if (!isset($_SESSION['user_id'])) {
  header("Location: ../auth/login.php");
} else {
  if (isset($_POST['submit'])) {
    $user_id = $_POST['user_id']; 
    $fullname = $_POST['fullname']; 
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $type_id = $_POST['user_type_id'];
    $user_status   = $_POST['user_status'];
    $resultUser = $db->updateUser($user_id, $fullname, $username, $password, $type_id, $user_status);
    $message = ($result != 0) ? "Education Successfully Updated" : "Education Already Exist!";
}
    }
  

?>
<!DOCTYPE html>
<html lang="en">

<body>
  <?php include '../includes/header.php' ?>
  <?php include '../includes/sidebar.php' ?>


  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Edit User Type</h1>
      <?php
      if (isset($message)) {
        if ($resultUser != 0) {
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
    <?php
             $result=$db->getUserID($_GET['user_id']);
            while($row=mysqli_fetch_object($result)){
                $userID =$row->user_id;
                $fullname =$row->fullname; 
                $username =$row->username;
                $password =$row->password;
                $type_id =$row->type_id;
                $user_status   = $row->user_status;
            }
        ?>
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">

              <!-- <h5 class="card-title">Association Information</h5> -->
              <h5 class="card-title"></h5>

              <!-- Custom Styled Validation with Tooltips -->
              <form class="row g-3 needs-validation" novalidate action=# enctype="multipart/form-data" method="POST">

                <div class="col-md-12 position-relative">
                  <label class="form-label">Fullname<font color="red">*</font></label>
                 
                  <input type="hidden" class="form-control" id="validationTooltip01" name="user_id"
                                         value = "<?php echo $userID;?>" required>
                                         <input type="text" class="form-control" id="validationTooltip01" name="fullname"
                                        value = "<?php echo $fullname;?>" required>
                  <div class="invalid-tooltip">
                    The Fullname field is required.
                  </div>
                </div>

                <div class="col-md-6 position-relative">
                  <label class="form-label">Username<font color="red">*</font></label>
                  <input type="text" class="form-control" id="validationTooltip01" name="username"
                                        value = "<?php echo $username;?>" required>
                  <div class="invalid-tooltip">
                    The Fullname field is required.
                  </div>
                </div>

                <div class="col-md-6 position-relative">
                  <label class="form-label">Password<font color="red">*</font></label>
                  <input type="password" class="form-control" id="password" name="password" required
                  value = "<?php echo $password;?>" required>
                  <input type="checkbox" onclick="myFunction()">Show Password
                  <div class="invalid-tooltip">
                    The Password field is required.
                  </div>
                </div>

             

                <div class="col-md-6 position-relative">
                  <label class="form-label">User Type<font color="red">*</font></label>
                  <div class="col-sm-12">
                  <select class="form-select" aria-label="Default select example" id="validationTooltip03" name="user_type_name" required
                  value = "<?php echo $use_type_name;?>" required>
                  <?php
                      if(!empty($user_type_name)){
                            echo '<option value="'.$user_type_id.'" selected>' . $user_type_name . '</option>';
                      }
                      $resultType=$db->getUserTypeActive();
                      while($row=mysqli_fetch_array($resultType)){
                        echo '<option value="'.$row['user_type_id'].'">' . $row['user_type_name'] . '</option>';
                      }
                      ?>
                    <div class="invalid-tooltip">
                      The User Type field is required.
                    </div>
                  </div>
                </div>


                <div class="col-md-6 position-relative">
                  <label class="form-label">Select Status<font color="red">*</font></label>
                  <div class="col-sm-12">
                  <select class="form-select" aria-label="Default select example" id="validationTooltip03"name="user_status" required
                  value = "<?php echo $use_type_name;?>" required>

              
                  </select>
                    <div class="invalid-tooltip">
                      The User Type field is required.
                    </div>
                  </div>
                </div>
            

                <div class="col-md-6 position-relative">
    <label class="form-label">Active<font color="red">*</font></label>
    <div class="col-sm-12">
        <select class="form-select" aria-label="Default select example" id="validationTooltip03" name="user_status" required>
            <option value="" selected disabled>Select Status</option>
            <?php
            if ($user_status == 'Active') {
                echo '<option value="Active" selected>' . $user_status . '</option>';
                echo '<option value="Inactive">Inactive</option>';
            } else {
                echo '<option value="Active">Active</option>';
                echo '<option value="Inactive" selected>' . $user_status . '</option>';
            }
            ?>
        </select>
        <div class="invalid-tooltip">
            The Active field is required.
        </div>
    </div>
</div>


                <div class="col-12">
                  <button type="submit" class="btn btn-warning" name="submit">Update System User</button>
                  <button type="reset" class="btn btn-primary">Cancel</button>
                </div>
              </form><!-- End Custom Styled Validation with Tooltips -->

            </div>
          </div>

        </div>

    </section>

  </main><!--END MAIN-->



  <script>
    function myFunction() {
      var x = document.getElementById("password");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
  </script>

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