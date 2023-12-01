<?php
session_start();
include "../db_con.php";
$db = new db;

$users_id = $_SESSION['user_id'];

if (!isset($_SESSION['user_id'])) {
  header("Location: ../auth/login.php");
} else {
  if (isset($_POST['submit'])) {
    $user_id = $_POST['user_id']; 
    $userTargetID = $_POST['userTargetID']; 
    $fullname = $_POST['fullname']; 
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $type_id = $_POST['user_type_id'];
    $user_status   = $_POST['user_status'];
    $resultUser = $db->updateUser($user_id, $fullname, $username, $password, $type_id, $user_status, $userTargetID);
    $message = ($resultUser != 0) ? "User Successfully Updated" : "User Already Exist!";
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
      $result = $db->getUserDetails($_SESSION['user_id']); // Assuming $_SESSION['user_id'] contains the logged-in user's ID

      while ($row = mysqli_fetch_object($result)) {
          $userTargetID = $row->user_id;
          $fullname = $row->fullname;
          $username = $row->username;
          $password = $row->password; // Note: It's not recommended to fetch passwords in this way for security reasons
          $type_id = $row->type_id;
          $user_status = $row->user_status;
      }
      ?>

      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">

              <!-- <h5 class="card-title">Association Information</h5> -->
              <h5 class="card-title"></h5>

              <!-- Custom Styled Validation with Tooltips -->
              <form class="row g-3 needs-validation" novalidate action="#" enctype="multipart/form-data" method="POST">
              <input type="hidden" name="user_id" value="<?php echo $users_id ?>">

                <div class="col-md-12 position-relative">
                  <label class="form-label">Fullname<font color="red">*</font></label>
                 
                  <input type="hidden" class="form-control" id="validationTooltip01" name="userTargetID"
                                         value = "<?php echo $userTargetID;?>" required>
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
                  <input type="password" minlength="8" class="form-control" id="password" name="password" 
                  value ="" >
                  <input type="checkbox" onclick="myFunction()">Show Password
                  <div class="invalid-tooltip">
                    The Password must be minimum of 8 characters.
                  </div>
                </div>

             
                <div class="col-md-6 position-relative">
                <label class="form-label">User Type<font color="red">*</font></label>
                  <div class="col-sm-12">
                    <select class="form-select" aria-label="Default select example" id="validationTooltip03" name="user_type_id" required>
                      <?php
                      $resultType = $db->getUserTypeActive();
                      while ($row = mysqli_fetch_array($resultType)) {
                        $selected = ($type_id == $row['user_type_id']) ? 'selected' : '';
                        echo '<option value="' . $row['user_type_id'] . '" ' . $selected . '>' . $row['user_type_name'] . '</option>';
                      }
                      ?>
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


               
            <div class="col-12 d-flex align-items-end justify-content-end gap-2">
                  <button type="submit" class="btn btn-warning" name="submit">Update</button>
                  <button type="reset" class="btn btn-primary">Clear</button>
                  <a href="system_user.php" class="btn btn-danger">Cancel</a>
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
  <?php include '../includes/footer.php' ?>
</body>

</html>