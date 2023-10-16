<?php
session_start();
include "../db_con.php";
$db = new db;
if(!isset($_SESSION['user_id'])) {
  header("Location: ../auth/login.php");
}  
$result=$db->getSource_IncomeID($_GET['source_id']);
while($row=mysqli_fetch_object($result)){
   $sourceID     	= $row->source_id;
   $source_name   	= $row->source_name;
   $source_status 	= $row->source_status;
}
?>

<!DOCTYPE html>
<?php include '../includes/header.php' ?>
<?php include '../includes/staff.sidebar.php' ?>
<main id="main" class="main">



    <section class="section"> 
      <div class="pagetitle">
        <h1>View Source of Income Information</h1>
      </div>  
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Source of Income Information</h5>
                                <form class="row g-3 needs-validation" novalidate action="" enctype="multipart/form-data" method="POST">
                                    <div class="col-md-6 position-relative">
                                        <label class="form-label">Source of Income<font color="red">*</font></label>
                                        
                                         <input type="hidden" class="form-control" id="validationTooltip01" name="source_id"
                                         value = "<?php echo $sourceID;?>" disabled>
                                         <input type="text" class="form-control" id="validationTooltip01" name="source_name"
                                        value = "<?php echo $source_name;?>" disabled>
                        
                                    </div>

                                    <div class="col-md-6 position-relative">
                                        <label class="form-label">Status<font color="red">*</font></label>
                                        <div class="col-sm-12">
                                            <select class="form-select" aria-label="Default select example" id="validationTooltip03" name="source_status" disabled>
                                            <?php
                                                if($source_status == 'Active'){
                                                    echo '<option value="Active" selected>' . $source_status . '</option>';
                                                    echo '<option value="Inactive">Inactive</option>';
                                                }else{
                                                    echo '<option value="Active">Active</option>';
                                                    echo '<option value="Inactive" selected>' . $source_status . '</option>';
                                                }
                                            ?>
                                            </select>
                                            <div class="invalid-tooltip">
                                                The Status field is required.
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
</main>

<?php include '../includes/footer.php' ?>
</body>

</html>
