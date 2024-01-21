<?php
session_start();
include "../db_con.php";
$db = new db;
if (!isset($_SESSION['user_id'])) {
  header("Location: ../auth/login.php");
}
if ($_SESSION['type_id'] == 2) {
  header("Location:  ../auth/login.php");
  exit(); 
}

if ($_SESSION['type_id'] == 3) {
header("Location:  ../auth/login.php");
exit(); 
} 
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
  

?>
<!DOCTYPE html>
<html lang="en">

<body>
  <?php include '../includes/header.php' ?>
  <?php include '../includes/sidebar.php' ?>


  <main id="main" class="main">
    <div class="pagetitle">
      <h1>View User Type</h1>
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
                                        value = "<?php echo $fullname;?>" disabled>
                 
                </div>

                <div class="col-md-6 position-relative">
                  <label class="form-label">Username<font color="red">*</font></label>
                  <input type="text" class="form-control" id="validationTooltip01" name="username"
                                        value = "<?php echo $username;?>" disabled>
                  
                </div>

                <div class="col-md-6 position-relative">
                  <label class="form-label">Password<font color="red">*</font></label>
                  <input type="password" class="form-control" id="password" name="password" disabled
                        value="<?php echo $password;?>" aria-disabled="">
                  <input type="checkbox" id="Checkbox" disabled>Show Password
              </div>


             
                <div class="col-md-6 position-relative">
  <label class="form-label">User Type<font color="red">*</font></label>
  <div class="col-sm-12">
    <select class="form-select" aria-label="Default select example" id="validationTooltip03" name="user_type_id" disabled>
      <?php
      $resultType = $db->getUserTypeActive();
      while ($row = mysqli_fetch_array($resultType)) {
        $selected = ($type_id == $row['user_type_id']) ? 'selected' : '';
        echo '<option value="' . $row['user_type_id'] . '" ' . $selected . '>' . $row['user_type_name'] . '</option>';
      }
      ?>
    </select>
    
  </div>
</div>



          

            

                <div class="col-md-6 position-relative">
    <label class="form-label">Active<font color="red">*</font></label>
    <div class="col-sm-12">
        <select class="form-select" aria-label="Default select example" id="validationTooltip03" name="user_status" disabled>
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
      
    </div>
</div>
  
              </form>

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