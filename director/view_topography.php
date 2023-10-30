<?php
session_start();
include "../db_con.php";
$db = new db;
if(!isset($_SESSION['user_id'])) {
  header("Location: ../auth/login.php");
}  
$result=$db->getTopographyID($_GET['topography_id']);
while($row=mysqli_fetch_object($result)){
    $topographyID     	= $row->topography_id;
    $topography_name   	= $row->topography_name;
    $topography_status 	= $row->topography_status;
}
?>

<!DOCTYPE html>
<?php include '../includes/header.php' ?>
<?php include '../includes/sidebar.php' ?>
<main id="main" class="main">

<div class="pagetitle">
      <h1>View Topography</h1>
          </div>
          
    <section class="section"> 
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Topography Information</h5>
                                <form class="row g-3 needs-validation" novalidate action="" enctype="multipart/form-data" method="POST">
                                    <div class="col-md-6 position-relative">
                                        <label class="form-label">Topography<font color="red">*</font></label>
                                        
                                         <input type="hidden" class="form-control" id="validationTooltip01" name="topography_id"
                                         value = "<?php echo $topographyID;?>" disabled>
                                         <input type="text" class="form-control" id="validationTooltip01" name="topography_name"
                                        value = "<?php echo $topography_name;?>" disabled>
                                        <div class="invalid-tooltip">
                                            The Topography field is required.
                                        </div>
                                    </div>

                                    <div class="col-md-6 position-relative">
                                        <label class="form-label">Status<font color="red">*</font></label>
                                        <div class="col-sm-12">
                                            <select class="form-select" aria-label="Default select example" id="validationTooltip03" name="topography_status" disabled>
                                            <?php
                                                if($topography_status == 'Active'){
                                                    echo '<option value="Active" selected>' . $topography_status . '</option>';
                                                    echo '<option value="Inactive">Inactive</option>';
                                                }else{
                                                    echo '<option value="Active">Active</option>';
                                                    echo '<option value="Inactive" selected>' . $topography_status . '</option>';
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
