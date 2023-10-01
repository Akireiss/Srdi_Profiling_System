<?php
session_start();
include "../db_con.php";
$db = new db;
if(!isset($_SESSION['user_id'])) {
  header("Location: ../auth/login.php");
} $result=$db->getReligionID($_GET['religion_id']);
while($row=mysqli_fetch_object($result)){
    $religionID     	= $row->religion_id;
    $religion_name   	= $row->religion_name;
    $religion_status 	= $row->religion_status;
}
?>

<!DOCTYPE html>
<?php include '../includes/header.php' ?>
<?php include '../includes/staff.sidebar.php' ?>
<main id="main" class="main">



    <section class="section">

    <div class="pagetitle">
      <h1>View Religion Information</h1>
          </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Religion Information</h5>
                                <form class="row g-3 needs-validation" novalidate action="" enctype="multipart/form-data" method="POST">
                                    <div class="col-md-6 position-relative">
                                        <label class="form-label">Religion<font color="red">*</font></label>
                                        
                                         <input type="hidden" class="form-control" id="validationTooltip01" name="religion_id"
                                         value = "<?php echo $religionID;?>" required>
                                         <input type="text" class="form-control" id="validationTooltip01" name="religion_name"
                                        value = "<?php echo $religion_name;?>" disabled>
                                        <div class="invalid-tooltip">
                                            The Religion field is required.
                                        </div>
                                    </div>

                                    <div class="col-md-6 position-relative">
                                        <label class="form-label">Status<font color="red">*</font></label>
                                        <div class="col-sm-12">
                                            <select class="form-select" aria-label="Default select example" id="validationTooltip03" name="religion_status" disabled>
                                            <?php
                                                if($religion_status == 'Active'){
                                                    echo '<option value="Active" selected>' . $religion_status . '</option>';
                                                    echo '<option value="Inactive">Inactive</option>';
                                                }else{
                                                    echo '<option value="Active">Active</option>';
                                                    echo '<option value="Inactive" selected>' . $religion_status . '</option>';
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
