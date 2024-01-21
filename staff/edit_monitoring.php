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
}else {
  if (isset($_POST['submit'])) {
    $user_id  = $_POST['user_id'];
    $monitoring_id = $_POST['monitoring_id'];
    $monitoring_name = $_POST['monitoring_name'];
    $status   = $_POST['status'];
    $result = $db->updateMonitoring($user_id, $monitoring_id, $monitoring_name, $position, $status);
    $message = ($result != 0) ? "Monitoring Team Successfully Updated" : "Monitoring Team Already Exist!";
  }
}
?>

<!DOCTYPE html>
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

    <section class="section"> 
        <?php
             $result=$db->getMonitoringID($_GET['monitoring_id']);
            while($row=mysqli_fetch_object($result)){
                $monitoring_id     	= $row->monitoring_id;
                $monitoring_name   	= $row->monitoring_name;
                $position   	     = $row->position;
                $status 	        = $row->status;
            }
        ?>
         <div class="pagetitle">
            <h1>Edit Monitoring Team Information<h1>
        </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Monitoring Team Information</h5>
                                <form class="row g-3 needs-validation" novalidate action="" enctype="multipart/form-data" method="POST">
                                <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                                    <div class="col-md-4 position-relative">
                                        <label class="form-label">Monitoring Team<font color="red">*</font></label>
                                        
                                         <input type="hidden" class="form-control" id="validationTooltip01" name="monitoring_id"
                                         value = "<?php echo $monitoring_id;?>" required>
                                         <input type="text" class="form-control" id="validationTooltip01" name="monitoring_name"
                                        value = "<?php echo $monitoring_name;?>" required>
                                        <div class="invalid-tooltip">
                                            The Monitoring Team field is required.
                                        </div>
                                    </div>

                                    
                                    <div class="col-md-4 position-relative">
                                        <label class="form-label">Position<font color="red">*</font></label>
                                         <input type="text" class="form-control" id="validationTooltip01" name="position"
                                        value = "<?php echo $position;?>" required>
                                    </div>

                                    <div class="col-md-4 position-relative">
                                        <label class="form-label">Status<font color="red">*</font></label>
                                        <div class="col-sm-12">
                                            <select class="form-select" aria-label="Default select example" id="validationTooltip03" name="status" required>
                                            <?php
                                                if($land_status == 'Active'){
                                                    echo '<option value="Active" selected>' . $status . '</option>';
                                                    echo '<option value="Inactive">Inactive</option>';
                                                }else{
                                                    echo '<option value="Active">Active</option>';
                                                    echo '<option value="Inactive" selected>' . $status . '</option>';
                                                }
                                            ?>
                                            </select>
                                            <div class="invalid-tooltip">
                                                The Status field is required.
                                            </div>
                                        </div>
                                    </div>

                    

                                    
                <div class="col-12 d-flex align-items-end justify-content-end gap-2">
                                        <button type="submit" class="btn btn-warning" name="submit">Update</button>
                                        <button type="reset" class="btn btn-primary">Clear</button>
                                        <a href="land_type.php" class="btn btn-danger">Cancel</a>
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
