<?php
session_start();
include "../db_con.php";
$db = new db;
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
$result=$db->getProvinceID($_GET['province_id']);
while($row=mysqli_fetch_object($result)){
   $provinceID     	= $row->province_id;
   $psgcCode  	= $row->psgcCode ;
   $provDesc 	= $row->provDesc;
   $provCode 	= $row->provCode;
}

?>

?>
<!DOCTYPE html>
<html lang="en">

<body>
  <?php include '../includes/header.php' ?>
  <?php include '../includes/staff.sidebar.php' ?>


  <main id="main" class="main">
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
    <div class="pagetitle">
      <h1>Edit Province</h1>
    </div><!-- End Page Title -->

    <section class="section">
    
    
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
           
          <div class="card">
            <div class="card-body">
              
              <h5 class="card-title">Province Information</h5>

              <form class="row g-3 needs-validation" novalidate action = "#" enctype="multipart/form-data" method="POST">

              <div class="col-md-6 position-relative">
              <label class="form-label">Province Description<font color="red">*</font></label>
                      <input type="hidden" class="form-control" id="validationTooltip01" name="province_id"
                            value="<?php echo $provinceID; ?>" disabled>
                      <input type="text" class="form-control" id="validationTooltip02" name="provDesc"
                            value="<?php echo $provDesc; ?>" disabled> 
              </div>

              <div class="col-md-6 position-relative">
                                <label class="form-label">Province Code<font color = "red">*</font></label>
                                <input type="text" class="form-control" id="validationTooltip01" name="provCode"
                                value = "<?php echo $provCode;?>" disabled>    
              </div>

</form><!-- End Form -->
</div>
</div>
</div>
</section>
</main>
<!--END MAIN-->

<?php include '../includes/footer.php' ?>
</body>

</html>