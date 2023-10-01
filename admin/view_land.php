<?php
session_start();
include "../db_con.php";
$db = new db;
if(!isset($_SESSION['user_id'])) {
  header("Location: ../auth/login.php");
}  
 $result=$db->getLandID($_GET['land_id']);
while($row=mysqli_fetch_object($result)){
    $landID     	= $row->land_id;
    $land_name   	= $row->land_name;
    $land_status 	= $row->land_status;
}
?>

<!DOCTYPE html>
<?php include '../includes/header.php' ?>
<?php include '../includes/sidebar.php' ?>
<main id="main" class="main">


    <section class="section"> 
        <div class="pagetitle">
            <h1>View Land Type Information<h1>
        </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Land Type Information</h5>
                                <form class="row g-3 needs-validation" novalidate action="" enctype="multipart/form-data" method="POST">
                                    <div class="col-md-6 position-relative">
                                        <label class="form-label">Land Type<font color="red">*</font></label>
                                        
                                         <input type="hidden" class="form-control" id="validationTooltip01" name="land_id"
                                         value = "<?php echo $landID;?>" disabled>
                                         <input type="text" class="form-control" id="validationTooltip01" name="land_name"
                                        value = "<?php echo $land_name;?>" disabled>
                                    </div>

                                    <div class="col-md-6 position-relative">
                                        <label class="form-label">Status<font color="red">*</font></label>
                                        <div class="col-sm-12">
                                            <select class="form-select" aria-label="Default select example" id="validationTooltip03" name="land_status" disabled>
                                            <?php
                                                if($land_status == 'Active'){
                                                    echo '<option value="Active" selected>' . $land_status . '</option>';
                                                    echo '<option value="Inactive">Inactive</option>';
                                                }else{
                                                    echo '<option value="Active">Active</option>';
                                                    echo '<option value="Inactive" selected>' . $land_status . '</option>';
                                                }
                                            ?>
                                            </select>
                                           
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
</main>

    
<?php include '../includes/footer.php' ?>
</body>

</html>
