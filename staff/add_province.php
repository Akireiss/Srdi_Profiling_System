<?php
session_start();
include "../db_con.php";
$db = new db;
$user_id = $_SESSION['user_id'];

if(!isset($_SESSION['user_id'])) {
  header("Location: ../auth/login.php");
} 
if ($_SESSION['type_id'] == 1) {
  header("Location:  ../auth/login.php");
  exit(); 
}

if ($_SESSION['type_id'] == 3) {
header("Location:  ../auth/login.php");
exit(); 
}
else {
  if (isset($_POST['submit'])) {
    $user_id  = $_POST['user_id'];
    $provDesc = $_POST['province_description'];
    $provCode   = $_POST['province_code'];
    $result = $db->addProvince($user_id, $provDesc, $provCode);
    if ($result != 0) {
      $message = "Province Successfully Added!";
    } else {
      $message = "Province Already Exist!";
    }
  }
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
      <h1>Add Province</h1>
      <?php
      if (isset($message)) {
        if ($result != 0) {
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

      
              <form class="row g-3 needs-validation" novalidate action=# enctype="multipart/form-data" method="POST">
              <input type="hidden" name="user_id" value="<?php echo $user_id ?>">

              <div class="col-md-6 position-relative">
                  <label class="form-label">Province Description<font color = "red">*</font></label>
                  <input type="text" class="form-control" id="validationTooltip01" name = "province_description" required autofocus="autofocus">
                  <div class="invalid-tooltip">
                    The Province field is required.
                  </div>
                </div>

                <div class="col-md-6 position-relative">
                  <label class="form-label">Province Code<font color = "red">*</font></label>
                  <input type="text" class="form-control" id="validationTooltip01" name = "province_code" required autofocus="autofocus">
                  <div class="invalid-tooltip">
                    The Province Code field is required.
                  </div>
                </div>

            
                <div class="col-12 d-flex align-items-end justify-content-end gap-2">
                  <button type="submit" class="btn btn-warning" name="submit">Save</button>
                  <button type="reset" class="btn btn-primary">Clear</button>
                  <a href="province.php" class="btn btn-danger">Cancel</a>
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