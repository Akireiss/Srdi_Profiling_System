<?php
session_start();
include "../db_con.php";
$db = new db();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
} 

?>
<!DOCTYPE html>
<html lang="en">

<body>
    <?php include '../includes/header.php' ?>
    <?php include '../includes/sidebar.director.php' ?>

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
       
    <div class="pagetitle">
      <h1>Edit Production</h1>
          </div><!-- End Page Title -->

    <section class="section">
    <?php
             $result=$db->getProductionID($_GET['production_id']);
            while($row=mysqli_fetch_object($result)){
                $productionID     	= $row->production_id;
                $producerID     	    = $row->producer_id;
                $producerName      	    = $row->name;
                $production_date   	= $row->production_date;
                $total_production 	= $row->total_production;
                $p_income 	        = $row->p_income;
                $p_cost 	        = $row->p_cost;
            }
        ?>
      <div class="row">
        <div class="col-lg-12">
           
          <div class="card">
            <div class="card-body">
              
              <h5 class="card-title"></h5>

                            <!-- Custom Styled Validation with Tooltips -->
                            <form class="row g-3 needs-validation" novalidate action = "#" enctype="multipart/form-data" method="POST">

                            <!-- <div class="col-md-12 position-relative">
                  <label class="form-label">Project Site Location<font color = "red">*</font></label>
                 <select name="site_id" class="form-select" id="validationCustom04" required>
                    <option selected>Select Project Site Location</option>
                    <?php
                        $resultType = $db->getSiteLocationActive();
                        while ($row = mysqli_fetch_array($resultType)) {
                            $site_id = $row['site_id'];
                            $location = $row['location'];
                            $selected = ($site_id == $site) ? 'selected' : '';
                            echo '<option value="' . $site_id . '" ' . $selected . '>' . $location . '</option>';
            }
            ?>
    </select>
                  <div class="invalid-tooltip">
                    The Project Site Location field is required.
                  </div>
                </div> -->
                <div class="col-md-12 position-relative">

<label class="form-label">Production Name<font color="red">*</font></label>
<input type="hidden" class="form-control" id="validationTooltip01" name="producer_id"
     value = "<?php echo $producerID;?>" disabled>
     <input type="text" class="form-control" id="validationTooltip01" name="producer_id"
    value = "<?php echo $producerName;?>" disabled>
<div class="invalid-tooltip">
    The Production Date field is required.
</div>
</div>
                <!-- Species -->
                <div class="col-md-3 position-relative">

<label class="form-label">Production Date<font color="red">*</font></label>
<input type="hidden" class="form-control" id="validationTooltip01" name="production_id"
     value = "<?php echo $productionID;?>" disabled>
     <input type="date" class="form-control" id="validationTooltip01" name="production_date"
    value = "<?php echo $production_date;?>" disabled>
<div class="invalid-tooltip">
    The Production Date field is required.
</div>
</div>



<div class="col-md-3 position-relative">
<label class="form-label">Total Production (in kg)<font color="red">*</font></label>
<input type="text" class="form-control" id="validationTooltip03" name="total_production" 
    value = "<?php echo $total_production;?>" disabled>
<div class="invalid-tooltip">
    Please enter a valid decimal number with up to two decimal places.
</div>
</div>

<div class="col-md-3 position-relative">
<label class="form-label">Gross Income<font color="red">*</font></label>
<input type="number" class="form-control" id="validationTooltip03" name="p_income" 
    value = "<?php echo $p_income;?>" disabled>

<div class="invalid-tooltip">
    Please enter a valid decimal number with up to two decimal places.
</div>
</div>

<div class="col-md-3 position-relative">
<label class="form-label">Production Cost<font color="red">*</font></label>
<input type="number" class="form-control" id="validationTooltip03" name="p_cost" 
    value = "<?php echo $p_cost;?>" disabled>

<div class="invalid-tooltip">
    Please enter a valid decimal number with up to two decimal places.
</div>
</div>






</form><!-- End Custom Styled Validation with Tooltips -->

</div>
</div>

</div>

</section>
</main><!-- END MAIN -->

<?php include '../includes/footer.php' ?>
</body>

</html>



