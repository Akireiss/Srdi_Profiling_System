<?php
session_start();
include "../db_con.php";
$db = new db;
$user_id = $_SESSION['user_id'];

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
}else {
  if (isset($_POST['submit'])) {
    $user_id  = $_POST['user_id'];
    $tool_id = $_POST['tool_id'];
    $tool_name = $_POST['tool_name'];
    $tool_status   = $_POST['tool_status'];
    $result = $db->updateFarmTools($user_id, $tool_id, $tool_name, $tool_status);
    $message = ($result != 0) ? "Farm Tool Successfully Updated" : "Farm Tool Already Exist!";
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
             $result=$db->getFarmToolsID($_GET['tool_id']);
            while($row=mysqli_fetch_object($result)){
                $toolID     	= $row->tool_id;
                $tool_name   	= $row->tool_name;
                $tool_status 	= $row->tool_status;
            }
        ?>

        <div class="pagetitle">
            <h1>Edit Farm Tool Information</h1>
        </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Farm Tool Information</h5>
                                <form class="row g-3 needs-validation" novalidate action="" enctype="multipart/form-data" method="POST">
                                <input type="hidden" name="user_id" value="<?php echo $user_id ?>">

                                    <div class="col-md-6 position-relative">
                                        <label class="form-label">Farm Tool<font color="red">*</font></label>
                                        
                                         <input type="hidden" class="form-control" id="validationTooltip01" name="tool_id"
                                         value = "<?php echo $toolID;?>" required>
                                         <input type="text" class="form-control" id="validationTooltip01" name="tool_name"
                                        value = "<?php echo $tool_name;?>" required>
                                        <div class="invalid-tooltip">
                                            The Farm Tool field is required.
                                        </div>
                                    </div>

                                    <div class="col-md-6 position-relative">
                                        <label class="form-label">Status<font color="red">*</font></label>
                                        <div class="col-sm-12">
                                            <select class="form-select" aria-label="Default select example" id="validationTooltip03" name="tool_status" required>
                                            <?php
                                                if($tool_status == 'Active'){
                                                    echo '<option value="Active" selected>' . $tool_status . '</option>';
                                                    echo '<option value="Inactive">Inactive</option>';
                                                }else{
                                                    echo '<option value="Active">Active</option>';
                                                    echo '<option value="Inactive" selected>' . $tool_status . '</option>';
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
                                        <a href="farm_tools.php" class="btn btn-danger">Cancel</a>
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
