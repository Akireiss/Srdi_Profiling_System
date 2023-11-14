<?php
session_start();
include "../db_con.php";
$db = new db;
if(!isset($_SESSION['user_id'])) {
  header("Location: ../auth/login.php");
} else {
  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $position = $_POST['position'];
    $status   = $_POST['status'];
    $result = $db->addMonitoring($name, $position, $status);
    if ($result != 0) {
      $message = "Funding Agency Successfully Added!";
    } else {
      $message = "Funding Agency  Already Exist!";
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
      <h1>Add Monitoring Team</h1>
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
                  <label class="form-label">Name<font color="red">*</font></label>
                  <input type="text" class="form-control" id="validationTooltip01" name="name" required>
                </div>

                <div class="col-md-6 position-relative">
                  <label class="form-label">Position<font color="red">*</font></label>
                  <input type="text" class="form-control" id="validationTooltip01" name="position" required>
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

               
                <div class="col-12 d-flex align-items-end justify-content-end gap-2">
                  <button type="submit" class="btn btn-warning" name="submit">Save</button>
                  <button type="reset" class="btn btn-primary">Clear</button>
                  <a href="monitoring_team.php" class="btn btn-danger">Cancel</a>
                </div>
              </form><!-- End Custom Styled Validation with Tooltips -->

            </div>
          </div>

        </div>

    </section>

  </main><!--END MAIN-->

 

  
  <?php include '../includes/footer.php' ?>
</body>

</html>