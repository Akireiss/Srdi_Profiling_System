<?php

require '../includes/header.php';
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "srdi_profiling";
$con = mysqli_connect($dbhost, $dbuser, $dbpass, $db) or die($con);

?>


<main id="main" class="main">
    <div class="pagetitle">
        <h1>Add Project Site</h1>
            </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          
        <form class="row g-3 needs-validation" novalidate action ="" enctype="multipart/form-data" method="POST">
              
              
              
          <div class="card-body">
            <h5 class="card-title">Project Site Information</h5>

             
             <form class="row g-3 needs-validation" novalidate action = "#" enctype="multipart/form-data" method="POST">

                <div class="col-md-12 position-relative">
                  <label class="form-label">Project Site Location<font color = "red">*</font></label>
                  <input type="text" class="form-control" id="validationTooltip01" name = "project_site_location" required autofocus="autofocus">
                  <div class="invalid-tooltip">
                    The Project Site Location field is required.
                  </div>
                </div>

                <div class="col-md-12 position-relative">
                  <label class="form-label">Producer Name<font color = "red">*</font></label>
                  <input type="text" class="form-control" id="validationTooltip01" name = "producer_name" required autofocus="autofocus">
                  <div class="invalid-tooltip">
                    The Producer Name field is required.
                  </div>
                </div>

                <div class="col-md-12 position-relative">
                  <label class="form-label">Topography<font color = "red">*</font></label>
                  <select class="form-select" aria-label="Default select example" name = "topography" id="validationTooltip03" required>
                      <option selected>Select Topography</option>
          
                      </select>
                  <div class="invalid-tooltip">
                    The Beekeeper Name field is required.
                  </div>
                </div>

              
                
      






                <div class="row">
                          
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

                </div>

       

                <div class="col-md-12 position-relative">
                  <label class="form-label">Address<font color = "red">*</font></label>
                  <input type="text" class="form-control" id="validationTooltip01" name = "site_address" required autofocus="autofocus">
                  <div class="invalid-tooltip">
                    The Address field is required.
                  </div>
                </div>

  
                
                <div class="col-md-3 ">
    <div class="col-md-12">
        <label for="validationCustom04" class="form-label fw-bold">Land Types</label>
    </div>
 
</div>


                
<div class="col-md-3 ">
    <div class="col-md-12">
        <label for="validationCustom04" class="form-label fw-bold">Tenancy</label>
    </div>

</div>

    <div class="col-md-2 mb-3">
      <label for="validationCustom01" class="form-label fw-bold">Area (Ha)</label>
      <input type="text" class="form-control" id="validationCustom01" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
  
    <div class="col-md-2 mb-3">
      <label for="validationCustom02" class="form-label fw-bold">Crops Grown</label>
      <input type="text" class="form-control" id="validationCustom02" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>

    <div class="col-md-2 mb-3">
      <label for="validationCustom03" class="form-label fw-bold">%Share</label>
      <input type="text" class="form-control" id="validationCustom03" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <!--Irrigation-->
    <!-- Availability of reliable irrigation -->
<div class="col-md-4">
  <label for="validationCustom04" class="form-label">Availability of reliable irrigation:<font color="red">*</font></label>
</div>
<div class="col-md-4">
  <div class="form-check">
    <input class="form-check-input" type="checkbox" id="available" value="Available">
    <label class="form-check-label" for="available">Available</label>
  </div>
</div>

<div class="col-md-4">
  <div class="form-check">
    <input class="form-check-input" type="checkbox" id="not_available" value="Not Available">
    <label class="form-check-label" for="not_available">Not Available</label>
  </div>
</div>
<!-- End of Availability of reliable irrigation -->

<!-- Water source -->
<div class="col-md-4">
  <label for="validationCustom04" class="form-label">Water source:<font color="red">*</font></label>
</div>
<div class="col-md-4">
  <div class="form-check">
    <input class="form-check-input" type="checkbox" id="irrigated" value="Irrigated">
    <label class="form-check-label" for="irrigated">Irrigated</label>
  </div>
</div>

<div class="col-md-4">
  <div class="form-check">
    <input class="form-check-input" type="checkbox" id="rainfed" value="Rainfed">
    <label class="form-check-label" for="rainfed">Rainfed</label>
  </div>
</div>
<!-- End of Water source -->

<!--End for Water Source-->

<!-- Source of Irrigation -->
<div class="col-md-4">
  <label for="validationCustom04" class="form-label">If irrigated, source of irrigation:<font color="red">*</font></label>
</div>
<div class="col-md-8">
  <div class="row">

  </div>
</div>
<!-- End of Source of Irrigation -->

<!-- Soil Type -->
<div class="col-md-4">
  <label for="validationCustom04" class="form-label">Soil Type:<font color="red">*</font></label>
</div>
<div class="col-md-8">
  <div class="row">

  </div>
</div>
<!-- End of Soil Type -->

<!-- End of Soil Type -->


  
<!--End of Soil Type-->

<!--Market road-->
<div class="col-md-6">
  <label for="validationCustom04" class="form-label">Accessibility to farm to market road:<font color = "red">*</font></label>
</div>

<div class="col-md-3">
<input class="form-check-input" type="checkbox" id="accessible" value="Accessible">
<label class="form-check-label" for="accessible">Accessible</label>
</div>

<div class="col-md-3">
<input class="form-check-input" type="checkbox" id="Not Accessible" value="Not Accessible">
<label class="form-check-label" for="not accessible">Not Accessible</label>
</div>
<!--End of Market Road-->

<!--Barangay road-->

<div class="col-md-12 mt-6" style="margin-left: -25px;">    
  <div class="form-check form-check-inline">
    <label for="nameInput" class="mr-2">Distance from the main road<font color = "red">*</font></label>
    <div class="d-inline-flex">
      <input type="text" class="form-control mr-2 w-75 mx-1 my-1" id="nameInput" >
      <span class="form-text-inline mt-2" style="margin-left: 5px;">meters</span>
    </div>
  </div>
</div>

<div class="col-md-12 mt-6" style="margin-left: -25px;">    
  <div class="form-check form- check-inline">
    <label for="nameInput" class="mr-2">Available land area for planting mulberry<font color = "red">*</font></label>
    <div class="d-inline-flex align-items-center">
      <input type="text" class="form-control mr-2 w-75 mx-1 my-1" id="nameInput" 
      <span class="form-text-inline mt-2 my-3" style="vertical-align: middle;">ha</span>
    </div>
  </div>
</div>




<div class="row mt-3">


    <div class="col-md-12 position-relative">
      <label class="form-label">Funding Agency<font color = "red">*</font></label>
      <input type="text" class="form-control" id="validationTooltip01" name = "funding_agency" required autofocus="autofocus">
      <div class="invalid-tooltip">
        The Funding Agency field is required.
      </div>
    </div>

    
    <div class="col-md-12 position-relative">
      <label class="form-label">Project in-charge<font color = "red">*</font></label>
      <input type="text" class="form-control" id="validationTooltip01" name = "project_in_charge" required autofocus="autofocus">
      <div class="invalid-tooltip">
        The Project In-Charge field is required.
      </div>
    </div>

    <div class="col-md-6 position-relative">
      <label class="form-label">Site Adopters<font color = "red">*</font></label>
      <input type="text" class="form-control" id="validationTooltip01" name = "site_adopters" required autofocus="autofocus">
      <div class="invalid-tooltip">
        The Project In-Charge field is required.
      </div>
    </div>

    <div class="col-md-6 position-relative">
      <label class="form-label">Site Status<font color = "red">*</font></label>
      <div class="col-sm-12">
        <select class="form-select" aria-label="Default select example" id="validationTooltip03" name = "status" required>
          <option value="" selected disabled>Select Status</option>
          <option value="Active">Active</option>
          <option value="Inactive">Inactive</option>
        </select>
        <div class="invalid-tooltip">
          The Active field is required.
        </div>
      </div>
    </div>

    <div class="row mt-4">
    <div class="w-full">
  <label for="validationCustom04" class="form-label">Remarks<font color = "red">*</font></label>
  <textarea class="form-control" id="validationCustom05" required></textarea>
  <div class="invalid-feedback">
    Error
  </div>
</div>
</div>




<div class="col-md-12">
  <label for="validationCustom04" class="form-label">Herewith the Monitoring and Evaluation Team, declares to have visited the proposed location for mulberry plantation field and found the site reasonably suited for mulberry leaf production and silkworm rearing/cocoon production.</label>
</div>
<div class="row mt-3">
  <div class="col-md-3 ">
    <label for="validationCustom04" class="form-label">Name<font color = "red">*</font></label>
    <select class="form-select" aria-label="Default select example">
      <option selected>Select Name</option>
      <option value="1">One</option>
      <option value="2">Two</option>
      <option value="3">Three</option>
    </select>
  </div>

  <div class="col-md-3 ">
    <label for="validationCustom04" class="form-label">Position<font color = "red">*</font></label>
    <select class="form-select" aria-label="Default select example">
      <option selected>Select Position</option>
      <option value="1">One</option>
      <option value="2">Two</option>
      <option value="3">Three</option>
    </select>

  </div>


  <div class="col-md-3 ">
    <label for="validationCustom04" class="form-label">Date<font color = "red">*</font></label>
    <input type="text" class="form-control" id="validationCustom05" required>

  </div>

</div>
    
      <div class="container">
  <div class="row mt-3">
    <div class="col-12">
                  <button type="submit" class="btn btn-warning" name="submit">Save Producer</button>
                  <button type="reset" class="btn btn-primary">Cancel</button>
                </div>
    </div>
  </div>


      
</div>

             </form>
</div>

</section>
  </main>




  <script src="public/assets/js/jquery.min.js"></script>
  <script src="../public/assets/js/jquery.min.js"></script>
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


<?php include '../includes/footer.php' ?>

