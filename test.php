<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "srdi_profiling";
$con = mysqli_connect($dbhost, $dbuser, $dbpass , $db) or die($con);
?>
<?php

if (isset($_POST['submit'])) {
  $regionId = $_POST['beekeeper_region'];
  $provinceId = $_POST['beekeeper_province'];
  $cityId = $_POST['beekeeper_municipality'];
  $barangayId = $_POST['beekeeper_barangay'];

  // Perform any necessary data validation and sanitation here before inserting into the database

  $sql = "INSERT INTO address (region_id, province_id, municipality_id, barangay_id)
   VALUES ('$regionId', '$provinceId', '$cityId', '$barangayId')";

  if (mysqli_query($con, $sql)) {
      // Address data saved successfully
      echo "Address data saved successfully.";
  } else {
      // Error occurred while saving data
      echo "Error: " . mysqli_error($con);
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Address</title>
</head>

<body>

  <main id="main" class="main">

    

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
           
          <div class="card">
            <div class="card-body">
              
              <h5 class="card-title">Personal Information</h5>
              

         
              <form class="row g-3 needs-validation" novalidate action ="" enctype="multipart/form-data" method="POST">
              
              
              
              <div class="col-md-3 position-relative">
                  <label class="form-label">Region<font color = "red">*</font></label>
                  <div class="col-sm-12">
                    <select class="form-select" aria-label="Default select example" name = "beekeeper_region" id="region" required>
                      <option value="" selected disabled>Select Region</option>
                      <?php
                        $sql = "SELECT * FROM region";
                        $result=mysqli_query($con, $sql);
                        while($row=mysqli_fetch_array($result)){
                          echo ucwords('<option value="'.$row['regCode'].'">' . $row['regDesc'] . '</option>');
                        }
                      ?>
                    </select>
                  </div>
                </div>

                <div class="col-md-3 position-relative">
                  <label class="form-label">Province<font color = "red">*</font></label>
                  <div class="col-sm-12">
                    <select class="form-select" aria-label="Default select example" name = "beekeeper_province" id="province" required>
                      <option value="" selected disabled>Select Province</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-3 position-relative">
                  <label class="form-label">City/Municipality<font color = "red">*</font></label>
                  <div class="col-sm-12">
                    <select class="form-select" aria-label="Default select example" name = "beekeeper_municipality" id="city" required>
                      <option value="" selected disabled>Select City</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-3 position-relative">
                  <label class="form-label">Barangay<font color = "red">*</font></label>
                  <div class="col-sm-12">
                    <select class="form-select" aria-label="Default select example" name = "beekeeper_barangay" id="barangay" required>
                      <option value="" selected disabled>Select Barangay</option>
                    </select>
                  </div>
                </div>

                
                
                <div class="col-12">
                  <button type="submit" class="btn btn-warning" name="submit">Save</button>
                  <button type="reset" class="btn btn-primary">Cancel</button>
                </div>
              </form><!-- End Custom Styled Validation with Tooltips -->

            </div>
          </div>
        </div>

    </section>

  </main><!-- End #main -->
  
<script src="public/assets/js/jquery.min.js"></script>
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