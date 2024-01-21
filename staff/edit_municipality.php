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
}else {
    if (isset($_POST['submit'])) {
      $municipality_id = $_POST['municipality_id'];
      $psgcCode = $_POST['psgcCode'];
      $citymunDesc   = $_POST['citymunDesc '];
      $regCode   = $_POST['regCode '];
      $provCode   = $_POST['provCode '];
      $citymunCode   = $_POST['citymunCode '];
      $result = $db->updateMunicipality($municipality_id, $psgcCode, $citymunDesc, $regCode, $provCode, $citymunCode);
      $message = ($result != 0) ? "Municipality  Successfully Updated" : "Municipality Already Exist!";
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
    <?php
             $result=$db->getMunicipalityID($_GET['municipality_id']);
            while($row=mysqli_fetch_object($result)){
                $municipalityID     	= $row->municipality_id;
                $psgcCode  	= $row->psgcCode ;
                $citymunDesc 	= $row->citymunDesc;
                $regCode 	= $row->regCode;
                $provCode 	= $row->provCode;
                $citymunCode 	= $row->citymunCode;
            }
        ?>
    
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
           
          <div class="card">
            <div class="card-body">
              
              <h5 class="card-title">Municipality Information</h5>

              <form class="row g-3 needs-validation" novalidate action = "#" enctype="multipart/form-data" method="POST">

              <div class="col-md-6 position-relative">
              <label class="form-label">Municipality Description<font color="red">*</font></label>
                      <input type="hidden" class="form-control" id="validationTooltip01" name="municipality_id"
                            value="<?php echo $municipalityID; ?>" required>
                      <input type="text" class="form-control" id="validationTooltip02" name="citymunDesc"
                            value="<?php echo $citymunDesc; ?>" required> 
              </div>

              <div class="col-md-6 position-relative">
                                <label class="form-label">Municipality Code<font color = "red">*</font></label>
                                <input type="text" class="form-control" id="validationTooltip01" name="citymunCode"
                                value = "<?php echo $citymunCode;?>" required>    
              </div>


              <div class="col-12 d-flex align-items-end justify-content-end gap-2">
                <button type="submit" class="btn btn-warning" name="submit">Update/button>
                <button type="reset" class="btn btn-primary">Clear</button>
                <a href="municipality.php" class="btn btn-danger">Cancel</a>
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