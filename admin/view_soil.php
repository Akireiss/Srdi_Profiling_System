<?php
session_start();
include "../db_con.php";
$db = new db;
if(!isset($_SESSION['user_id'])) {
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
$result=$db->getSoilID($_GET['soil_id']);
while($row=mysqli_fetch_object($result)){
    $soilID     	= $row->soil_id;
    $soil_name   	= $row->soil_name;
    $soil_status 	= $row->soil_status;
}
?>

<!DOCTYPE html>
<?php include '../includes/header.php' ?>
<?php include '../includes/sidebar.php' ?>
<main id="main" class="main">


    <section class="section"> 
    <div class="pagetitle">
            <h1>View Soil Type Information</h1>
        </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"> Soil Type Information</h5>
                                <form class="row g-3 needs-validation" novalidate action="" enctype="multipart/form-data" method="POST">
                                    <div class="col-md-6 position-relative">
                                        <label class="form-label">Soil Type<font color="red">*</font></label>
                                        
                                         <input type="hidden" class="form-control" id="validationTooltip01" name="soil_id"
                                         value = "<?php echo $soilID;?>" disabled>
                                         <input type="text" class="form-control" id="validationTooltip01" name="soil_name"
                                        value = "<?php echo $soil_name;?>" disabled>
                                       
                                    </div>

                                    <div class="col-md-6 position-relative">
                                        <label class="form-label">Status<font color="red">*</font></label>
                                        <div class="col-sm-12">
                                            <select class="form-select" aria-label="Default select example" id="validationTooltip03" name="soil_status" disabled>
                                            <?php
                                                if($soil_status == 'Active'){
                                                    echo '<option value="Active" selected>' . $soil_status . '</option>';
                                                    echo '<option value="Inactive">Inactive</option>';
                                                }else{
                                                    echo '<option value="Active">Active</option>';
                                                    echo '<option value="Inactive" selected>' . $soil_status . '</option>';
                                                }
                                            ?>
                                            </select>
                                           
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
</main>

    
<?php include '../includes/footer.php' ?></body>

</html>
