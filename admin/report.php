<?php
  session_start();
  include '../db_con.php';
  $db = new db;
  if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
  }
// test code
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $reportType = $_POST['submit'];
  
  switch ($reportType) {
      case 'REP01':
          $sql = "SELECT * FROM cocoon";
          break;
  
      case 'REP02':
          $sql = "SELECT * FROM site ";
          break;
  
      default:
          die("Invalid report type.");
  }
  
  // Execute the SQL query and fetch the data
  $result = mysqli_query($db->con, $sql);
  mysqli_close($db->con);

}
  ?>

<!DOCTYPE html>
<html lang="en">

<body>
  <?php include '../includes/header.php' ?>
<?php include '../includes/sidebar.php' ?>



<main id="main" class="main">



<div class="pagetitle">
  <h1>Report</h1><br>
</div><!-- End Page Title -->

<section class="section">

  <div class="row">
    <div class="col-lg-12">
       
      <div class="card">
        <div class="card-body">
        <form class="row g-3 needs-validation" action="" enctype="multipart/form-data" method="POST" id="reportForm">

        
            <div class="col-md-12 position-relative">
              
            </div>

            <div class="col-md-6 position-relative">
              <label class="form-label">Choose Report<font color = "red">*</font></label>
              <select class="form-select" aria-label="Default select example" name="submit" id="report" required>
    <option value="" selected>Select Report</option>
    <option value="REP01">REP01 - List of Cocoon Producers</option>
    <option value="REP02">REP02 - List of Project Site</option>
    <option value="REP03">REP03 - List of Project in-charge</option>
    <option value="REP04">REP04 - List of Production for Province/Region</option>
</select>

              <div class="invalid-tooltip">
                The Choose Report field is required.
              </div>
            </div>

            <div class="col-md-6 position-relative">
              
            </div>

            <div class="col-md-4 position-relative">
              <label class="form-label">Region</label>
              <div class="col-sm-12">
                <select class="form-select" aria-label="Default select example" name = "region" id="region" required>
                  <option value="" selected disabled>Select Region</option>
                  <option value="allRegion">ALL REGION</option>
                  <option Value="01">REGION I</option><option Value="02">REGION II</option><option Value="03">REGION III</option><option Value="04">REGION IV-A</option><option Value="17">REGION IV-B</option><option Value="05">REGION V</option><option Value="06">REGION VI</option><option Value="07">REGION VII</option><option Value="08">REGION VIII</option><option Value="09">REGION IX</option><option Value="10">REGION X</option><option Value="11">REGION XI</option><option Value="12">REGION XII</option><option Value="13">NATIONAL CAPITAL REGION</option><option Value="14">CORDILLERA ADMINISTRATIVE REGION</option><option Value="15">AUTONOMOUS REGION IN MUSLIM MINDANAO</option><option Value="16">REGION XIII</option>                    </select>
              </div>
            </div>
            
            <div class="col-md-4 position-relative">
              <label class="form-label">Province</label>
              <div class="col-sm-12">
                <select class="form-select" aria-label="Default select example" name = "province" id="province" required>
                  <option value="" selected disabled>Select Province</option>
                </select>
              </div>
            </div>

            <div class="col-md-4 position-relative">
              <label class="form-label">City/Municipality</label>
              <div class="col-sm-12">
                <select class="form-select" aria-label="Default select example" name = "city" id="city" required>
                  <option value="" selected disabled>Select City</option>
                </select>
              </div>
            </div>

            
            <div class="col-md-12 position-relative">
                  <label class="form-label">Year<font color = "red">*</font></label>
                  <select  required  class="form-select" aria-label="Default select example" name = "topography" id="invalid-tooltip" required>
                      <option selected>Select Year</option>
                <?php
                      $resultType=$db->getYearActive();
                      while($row=mysqli_fetch_array($resultType)){
                        echo '<option value="'.$row['year_name'].'">' . $row['year_name'] . '</option>';
                      }
                      ?>
                      </select>
                  <div class="invalid-tooltip">
                    The Year field is required.
                  </div>
                </div>



        
            <div class="col-md-2 position-relative">
              <label class="form-label">Date from</label>
              <div class="col-sm-12">
                <input type="date" class="form-control" aria-label="Default select example" name = "date_from" id = "date_from" required>
              </div>
            </div>


            <div class="col-md-2 position-relative">
              <label class="form-label">Date to</label>
              <div class="col-sm-12">
                <input type="date" class="form-control" aria-label="Default select example" name = "date_to" id = "date_to" required>
              </div>
            </div>
            
            <div class="col-12">
              <a href="../pdf/report.php" target="_blank" class="btn btn-warning" name="submit">Generate Report</a>
              <button type="reset" class="btn btn-primary">Cancel</button>
            </div>
          </form>
          
        </div>
      </div>

    </div>

</section>

</main>

<script>
 $(document).ready(function() {
    $('#report').change(function() {
        // Submit the form when the report selection changes
        $('#reportForm').submit();
    });
});

</script>
   
 <?php include '../includes/footer.php' ?>
 <script>
$(document).ready(function(){
  $("#region").on('change',function(){
    var regionId = $(this).val();
    if(regionId){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'regionId='+regionId,
                success:function(html){
                    $('#province').html(html);
                    $('#city').html('<option value="">Select City</option>'); 
                }
            }); 
        }
  });

  $('#province').on('change', function(){ 
        var provinceId = $(this).val();
        if(provinceId){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'provinceId='+provinceId,
                success:function(html){
                    $('#city').html(html);
                    $('#barangay').html('<option value="">Select Barangay</option>');
                }
            }); 
        }else{
            $('#barangay').html('<option value="">Select Barangay</option>'); 
        }
    });

  $('#city').on('change', function(){
        var cityId = $(this).val();
        if(cityId){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'cityId='+cityId,
                success:function(html){
                    $('#barangay').html(html);
                }
            }); 
        }
    });
});
</script>
  </body>
</html>
  