<?php
session_start();
include "../db_con.php";
$db = new db;
if(!isset($_SESSION['user_id'])) {
  header("Location: ../auth/login.php");
} else {
  if (isset($_POST['submit'])) {
    $irrigation_id = $_POST['irrigation_id'];
    $irrigation_name = $_POST['irrigation_name'];
    $irrigation_status   = $_POST['irrigation_status'];
    $result = $db->updateIrrigation($irrigation_id, $irrigation_name, $irrigation_status);
    $message = ($result != 0) ? "Irrigation Successfully Updated" : "Irrigation Already Exist!";
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
             $result=$db->getIrrigationID($_GET['irrigation_id']);
            while($row=mysqli_fetch_object($result)){
                $irrigationID     	= $row->irrigation_id;
                $irrigation_name   	= $row->irrigation_name;
                $irrigation_status 	= $row->irrigation_status;
            }
        ?>
        <div class="pagetitle">
      <h1>Edit Source of Irrigation</h1>
          </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Source of Irrigation Information</h5>
                                <form class="row g-3 needs-validation" novalidate action="" enctype="multipart/form-data" method="POST">
                                    <div class="col-md-6 position-relative">
                                        <label class="form-label">Source of Irrigation<font color="red">*</font></label>
                                        
                                         <input type="hidden" class="form-control" id="validationTooltip01" name="irrigation_id"
                                         value = "<?php echo $irrigationID;?>" required>
                                         <input type="text" class="form-control" id="validationTooltip01" name="irrigation_name"
                                        value = "<?php echo $irrigation_name;?>" required>
                                        <div class="invalid-tooltip">
                                            The Source of Irrigation field is required.
                                        </div>
                                    </div>

                                    <div class="col-md-6 position-relative">
                                        <label class="form-label">Status<font color="red">*</font></label>
                                        <div class="col-sm-12">
                                            <select class="form-select" aria-label="Default select example" id="validationTooltip03" name="irrigation_status" required>
                                            <?php
                                                if($irrigation_status == 'Active'){
                                                    echo '<option value="Active" selected>' . $irrigation_status . '</option>';
                                                    echo '<option value="Inactive">Inactive</option>';
                                                }else{
                                                    echo '<option value="Active">Active</option>';
                                                    echo '<option value="Inactive" selected>' . $irrigation_status . '</option>';
                                                }
                                            ?>
                                            </select>
                                            <div class="invalid-tooltip">
                                                The Status field is required.
                                            </div>
                                        </div>
                                    </div>

                    

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-warning" name="submit">Update Source of Irrigation</button>
                                        <button type="reset" class="btn btn-primary">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
</main>

    


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
