<?php
session_start();
include "../db_con.php";
$db = new db;
if (!isset($_SESSION['user_id'])) {
  header("Location: ../auth/login.php");
} 
$result=$db->getAuditID($_GET['id']);
while($row=mysqli_fetch_object($result)){
$user_id = $row->user_id;
$action = $row->action;
$data = $row->data;
$update = $row->update;
$date = $row->date;

}
?>
  
<!DOCTYPE html>
<html lang="en">

<body>
  <?php include '../includes/header.php' ?>
  <?php include '../includes/sidebar.php' ?>


  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Audit Trail Information</h1>

    </div>
    <section class="section">
    
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">

              <!-- <h5 class="card-title">Association Information</h5> -->
              <h5 class="card-title"></h5>

              <!-- Custom Styled Validation with Tooltips -->
              <form class="row g-3 needs-validation" novalidate action=# enctype="multipart/form-data" method="POST">
              <div class="col-md-12 position-relative">
                  <label class="form-label">Data<font color="red">*</font></label>
                  <textarea disabled class="form-control" name="data" rows="4"><?php echo $data; ?></textarea>
              </div>

              <div class="col-md-12 position-relative">
                  <label class="form-label">Update<font color="red">*</font></label>
                  <textarea disabled class="form-control" name="update" rows="4"><?php echo $update; ?></textarea>
              </div>

                <div class="col-md-6 position-relative">
                  <label class="form-label">Action<font color="red">*</font></label>
                  <input type="text" class="form-control" id="validationTooltip01" name="username"
                  value="<?php echo $action;?>" disabled>
                </div>

                <div class="col-md-6 position-relative">
                  <label class="form-label">Date<font color="red">*</font></label>
                  <input type="text" class="form-control" id="password" name="password" disabled
                  value="<?php echo $date;?>" aria-disabled="">
              </div>


        




          

            
      
    </div>
</div>
  
              </form>

            </div>
          </div>

        </div>

    </section>

  </main><!--END MAIN-->



 
  <?php include '../includes/footer.php' ?>
</body>

</html>