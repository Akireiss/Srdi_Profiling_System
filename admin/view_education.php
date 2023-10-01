<?php
session_start();
include "../db_con.php";
$db = new db;
if(!isset($_SESSION['user_id'])) {
  header("Location: ../auth/login.php");
} 
$result=$db->getEducationID($_GET['education_id']);
while($row=mysqli_fetch_object($result)){
    $educationID     	= $row->education_id;
    $education_name   	= $row->education_name;
    $education_status 	= $row->education_status;
}
?>

<!DOCTYPE html>
<?php include '../includes/header.php' ?>
<?php include '../includes/sidebar.php' ?>

<main id="main" class="main">

<section class="section">
    <div class="pagetitle">
        <h1>View Education Information</h1>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Education Information</h5>
                    
                    <form class="row g-3 needs-validation" novalidate action="" method="POST">
                        <div class="col-md-6 position-relative">
                        <label class="form-label">Education<font color="red">*</font></label>
                       
                        <input type="hidden" class="form-control" id="validationTooltip01" name="education_id"
                                         value = "<?php echo $educationID;?>" disabled>
                                         <input type="text" class="form-control" id="validationTooltip01" name="education_name"
                                        value = "<?php echo $education_name;?>" disabled>
                                        <div class="invalid-tooltip">
                         The Education field is required.
                        </div>
                        </div>
                        
                        <div class="col-md-6 position-relative">
                                        <label class="form-label">Status<font color="red">*</font></label>
                                        <div class="col-sm-12">
                                            <select class="form-select" aria-label="Default select example" id="validationTooltip03" name="education_status" disabled>
                                            <?php
                                                if($education_status == 'Active'){
                                                    echo '<option value="Active" selected>' . $education_status . '</option>';
                                                    echo '<option value="Inactive">Inactive</option>';
                                                }else{
                                                    echo '<option value="Active">Active</option>';
                                                    echo '<option value="Inactive" selected>' . $education_status . '</option>';
                                                }
                                            ?>
                                            </select>
                                            <div class="invalid-tooltip">
                                                The Status field is required.
                                            </div>
                                        </div>
                                    </div>
                    </form>
                    <!-- ... (rest of your form) ... -->
                </div>
            </div>
        </div>


    </div>


 
</section>



    </main><!--END MAIN-->

    
    <?php include '../includes/footer.php' ?>
</body>

</html>
