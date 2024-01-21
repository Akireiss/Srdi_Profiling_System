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
$result=$db->getUserTypeID($_GET['user_type_id']);
while($row=mysqli_fetch_object($result)){
    $user_typeID     	= $row->user_type_id;
    $user_type_name   	= $row->user_type_name;
    $user_type_status 	= $row->user_type_status;
}
?>

<!DOCTYPE html>
<?php include '../includes/header.php' ?>
<?php include '../includes/staff.sidebar.php' ?>
<main id="main" class="main">



    <section class="section"> 

    <div class="pagetitle">
      <h1>View User Type Information</h1>
          </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">User Type Information</h5>
                                <form class="row g-3 needs-validation" novalidate action="" enctype="multipart/form-data" method="POST">
                                    <div class="col-md-6 position-relative">
                                        <label class="form-label">User Type<font color="red">*</font></label>
                                        
                                         <input type="hidden" class="form-control" id="validationTooltip01" name="user_type_id"
                                         value = "<?php echo $user_typeID;?>" disabled>
                                         <input type="text" class="form-control" id="validationTooltip01" name="user_type_name"
                                        value = "<?php echo $user_type_name;?>" disabled>
                                        <div class="invalid-tooltip">
                                            The User Type field is required.
                                        </div>
                                    </div>

                                    <div class="col-md-6 position-relative">
                                        <label class="form-label">Status<font color="red">*</font></label>
                                        <div class="col-sm-12">
                                            <select class="form-select" aria-label="Default select example" id="validationTooltip03" name="user_type_status" disabled>
                                            <?php
                                                if($user_type_status == 'Active'){
                                                    echo '<option value="Active" selected>' . $user_type_status . '</option>';
                                                    echo '<option value="Inactive">Inactive</option>';
                                                }else{
                                                    echo '<option value="Active">Active</option>';
                                                    echo '<option value="Inactive" selected>' . $user_type_status . '</option>';
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
