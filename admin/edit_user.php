<?php
  session_start();
  include "../db_con.php";
  $db = new db;
  if(!isset($_SESSION['id'])){
    header("Location: ../auth/login.php");
  }else{
    if(isset($_POST['submit'])){
      $fullname = $_POST['fullname'];
      $username = $_POST['username'];
      $password = md5($_POST['password']);
      $type_id = $_POST['user_type_id']; 
      $status   = $_POST['status'];
      $resultUser=$db->addUser($fullname, $username, $password, $type_id, $status);
      if($resultUser != 0){
        $message = "User Successfully Added!";
      }else{
        $message = "User Already Exist!";
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">

<body>
  <?php include '../includes/header.php' ?>
<?php include '../includes/sidebar.php' ?>


<main id="main" class="main">
    <?php
    $result=$db->getUser($_GET['user_id']);
    while($row=mysqli_fetch_object($result)){
        $type_id            =$row->id;
        $fullname           =$row->fullname;
        $username           =$row->username;
        $password           =$row->password;
        $type_id            =$row->type_id;
        $user_type_name     =$row->user_type_name;
        $user_status        =$row->user_status;
    }
    ?>
  <div class="pagetitle">
      <h1>Edit User Type</h1>
      <?php
          if(isset($message)){
            if($resultUser != 0){
              echo '<div class="alert alert-warning bg-warning border-0 alert-dismissible fade show" role="alert">';
              echo '<i class="fa-sharp fa-solid fa-circle-check"></i>';
            }else{
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
              <form class="row g-3 needs-validation" novalidate action = # enctype="multipart/form-data" method="POST">

                <div class="col-md-12 position-relative">
                  <label class="form-label">Fullname<font color = "red">*</font></label>
                  <input type="text" class="form-control" id="validationTooltip01" name = "fullname" value = "<?php echo $fullname;?>" required autofocus="autofocus">
                  <div class="invalid-tooltip">
                    The Fullname field is required.
                  </div>
                </div>
                
                <div class="col-md-6 position-relative">
                  <label class="form-label">Username<font color = "red">*</font></label>
                  <input type="text" class="form-control" id="validationTooltip01" name = "username" value="<?php echo $username;?>" required>
                  <div class="invalid-tooltip">
                    The Fullname field is required.
                  </div>
                </div>

                <div class="col-md-6 position-relative">
                  <label class="form-label">Password<font color = "red">*</font></label>
                  <input type="password" class="form-control" id="password" name = "password"value="<?php echo $password;?>"required>
                  <input type="checkbox" onclick="myFunction()">Show Password
                  <div class="invalid-tooltip">
                    The Password field is required.
                  </div>
                </div>

                

                                  <div class="col-md-6 position-relative">
                    <label class="form-label">User Type<font color="red">*</font></label>
                    <div class="col-sm-12">
                      <select class="form-select" aria-label="Default select example" name="type_id" id="validationTooltip03" required>
                        <option value="" selected disabled>Select User Type</option>
                        <option value="1" <?php echo $type_id == 1 ? 'selected' : ''; ?>>Administrator</option>
                        <option value="2" <?php echo $type_id == 2 ? 'selected' : ''; ?>>MIS Head</option>
                        <option value="3" <?php echo $type_id == 3 ? 'selected' : ''; ?>>Staff</option>
                      </select>
                      <div class="invalid-tooltip">
                        The User Type field is required.
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6 position-relative">
                    <label class="form-label">Active<font color="red">*</font></label>
                    <div class="col-sm-12">
                      <select class="form-select" aria-label="Default select example" name="status" id="validationTooltip03" required>
                        <option value="" selected disabled>Select Status</option>
                        <option value="Active" <?php echo    $user_status    == 'Active' ? 'selected' : ''; ?>>Active</option>
                        <option value="Inactive" <?php echo    $user_status    == 'Inactive' ? 'selected' : ''; ?>>Inactive</option>
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