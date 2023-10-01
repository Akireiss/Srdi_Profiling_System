<?php
session_start();
include "../db_con.php";
$db = new db;
if(!isset($_SESSION['user_id'])) {
  header("Location: ../auth/login.php");
} else {
  if (isset($_POST['submit'])) {
    $education_id = $_POST['education_id'];
    $education_name = $_POST['education_name'];
    $education_status   = $_POST['education_status'];
    $result = $db->updateEducation($education_id, $education_name, $education_status);
    $message = ($result != 0) ? "Education Successfully Updated" : "Education Already Exist!";
  }
}
?>

<!DOCTYPE html>
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
<section class="section">
<?php
             $result=$db->getEducationID($_GET['education_id']);
            while($row=mysqli_fetch_object($result)){
                $educationID     	= $row->education_id;
                $education_name   	= $row->education_name;
                $education_status 	= $row->education_status;
            }
        ?>

<div class="pagetitle">
    <h1>Edit Education Information</h1>
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
                                         value = "<?php echo $educationID;?>" required>
                                         <input type="text" class="form-control" id="validationTooltip01" name="education_name"
                                        value = "<?php echo $education_name;?>" required>
                                        <div class="invalid-tooltip">
                         The Education field is required.
                        </div>
                        </div>
                        
                        <div class="col-md-6 position-relative">
                                        <label class="form-label">Status<font color="red">*</font></label>
                                        <div class="col-sm-12">
                                            <select class="form-select" aria-label="Default select example" id="validationTooltip03" name="education_status" required>
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


                       

                        <div class="col-12">
                            <button type="submit" class="btn btn-warning" name="submit">Update Education</button>
                            <button type="reset" class="btn btn-primary">Cancel</button>
                        </div>
                    </form>
                    <!-- ... (rest of your form) ... -->
                </div>
            </div>
        </div>


    </div>


 
</section>



    </main><!--END MAIN-->

    


    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>SRDI</span></strong>. All Rights Reserved 2023
        </div>
        <div class="credits">
            Developed by DMMMSU-SRDI</a>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="../public/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="../public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../public/assets/vendor/chart.js/chart.umd.js"></script>
    <script src="../public/assets/vendor/echarts/echarts.min.js"></script>
    <script src="../public/assets/vendor/quill/quill.min.js"></script>
    <script src="../public/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../public/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../public/assets/vendor/php-email-form/validate.js"></script>

    <link href="../public/assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <script src="../public/assets/js/main.js"></script>
</body>

</html>
