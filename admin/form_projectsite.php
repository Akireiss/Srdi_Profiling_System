<?php
session_start();
include "../db_con.php";
$db = new db;
if(!isset($_SESSION['user_id'])) {
  header("Location: ../auth/login.php");
} else {
  if (isset($_POST['submit'])) {
    $location = $_POST['location'];
    $producer_id   = $_POST['producer_id'];
    $topography  = $_POST['topography'];
    $region  = $_POST['region'];
    $province  = $_POST['province'];
    $municipality  = $_POST['municipality'];
    $barangay  = $_POST['barangay'];
    $address  = $_POST['address'];

    $land = isset($_POST['land']) ? $_POST['land'] : []; // Initialize as an empty array
    $tenancy = isset($_POST['tenancy']) ? $_POST['tenancy'] : []; // Initialize as an empty array
    
    $agencys = isset($_POST['agencys']) ? $_POST['agencys'] : [];

    $soils = isset($_POST['soils']) ? $_POST['soils'] : []; 

    $soil = json_encode($soils);

    $agency = json_encode($agencys);
    $landJson = json_encode($land);
    $tenancyJson = json_encode($tenancy);
    

    $area  = isset($_POST['area']) ? floatval($_POST['area']) : 0.0;
    $crops = isset($_POST['crops']) ? floatval($_POST['crops']) : 0.0;
    $share = $_POST['share'];

    $irrigation = isset($_POST['irrigation']) ? $_POST['irrigation'] : '';
    $water = isset($_POST['water_source']) ? $_POST['water_source'] : '';

    $source = $_POST['source'];
    $market = isset($_POST['market']) ? $_POST['market'] : '';

    $distance= $_POST['distance'];
    $land_area= $_POST['land_area'];




    $charge= $_POST['charge'];
    $adopters= $_POST['adopters'];

    $remarks= $_POST['remarks'];
    $names= $_POST['names'];
    $position= $_POST['position'];
    $date = $_POST['date'];
    
    $result = $db->addSite($location, $producer_id, $topography, $region, $province, 
    $municipality, $barangay, $address, $landJson, $tenancyJson, $area, $crops, $share, $irrigation, 
    $water, $source,$soil, $market, $distance, $land_area, $agency, $charge, $adopters, $remarks,
    $names, $position, $date);
    if ($result) {
      $message = "Site Successfully Added!";
    } 
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<body>
<?php include '../includes/header.php' ?>
<?php include '../includes/sidebar.php' ?>
 

  <main id="main" class="main">
    <div class="pagetitle">
        <h1>Add Project Site</h1>
      </div>
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
      ?><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Project Site Information</h5>

             <!-- Custom Styled Validation with Tooltips -->
             <form class="row g-3 needs-validation" novalidate action = "#" enctype="multipart/form-data" method="POST">

                <div class="col-md-12 position-relative">
                  <label class="form-label">Project Site Location<font color = "red">*</font></label>
                  <input type="text" class="form-control" id="validationTooltip01" name = "location"  autofocus="autofocus">
                  <div class="invalid-tooltip">
                    The Project Site Location field is required.
                  </div>
                </div>

                <div class="col-md-12 position-relative">
    <label class="form-label">Producer Name<font color="red">*</font></label>
    <select name="producer_id" class="form-select" id="validationCustom04" >
        <option selected>Select Producer Name</option>
        <?php
            $resultType = $db->getProducersActive();
            while ($row = mysqli_fetch_array($resultType)) {
                $cocoon_id = $row['cocoon_id'];
                $name = $row['name'];
                $selected = ($cocoon_id == $cocoon) ? 'selected' : '';
                echo '<option value="' . $cocoon_id . '" ' . $selected . '>' . $name . '</option>';
            }
            ?>
    </select>
</div>



                
                <div class="col-md-12 position-relative">
                  <label class="form-label">Topography<font color = "red">*</font></label>
                  <select class="form-select" aria-label="Default select example" name = "topography" id="validationTooltip03" >
                      <option selected>Select Topography</option>
                <?php
                      $resultType=$db->getTopographyActive();
                      while($row=mysqli_fetch_array($resultType)){
                        echo '<option value="'.$row['topography_id'].'">' . $row['topography_name'] . '</option>';
                      }
                      ?>
                      </select>
                  <div class="invalid-tooltip">
                    The Beekeeper Name field is required.
                  </div>
                </div>

                  
                  <form class="row g-3 needs-validation" novalidate action = "#" enctype="multipart/form-data" method="POST">
                <div class="col-md-3 position-relative">
                  <label class="form-label">Region<font color = "red">*</font></label>
                  <div class="col-sm-12">
                    <select class="form-select" aria-label="Default select example" name = "region" id="region"  >
                      <option value="" selected disabled>Select Region</option>
                      <?php
                      $regionResult=$db->getRegion();
                      while($row=mysqli_fetch_array($regionResult)){
                        echo ucwords('<option value="'.$row['regCode'].'">' . $row['regDesc'] . '</option>');
                      }
                      ?>
                    </select>
                  </div>
                </div>

                <div class="col-md-3 position-relative">
                  <label class="form-label">Province<font color = "red">*</font></label>
                  <div class="col-sm-12">
                    <select class="form-select" aria-label="Default select example" name = "province" id="province"  >
                      <option value="" selected disabled>Select Province</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-3 position-relative">
                  <label class="form-label">City/Municipality<font color = "red">*</font></label>
                  <div class="col-sm-12">
                    <select class="form-select" aria-label="Default select example" name = "municipality" id="city" >
                      <option value="" selected disabled>Select City</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-3 position-relative">
                  <label class="form-label">Barangay<font color = "red">*</font></label>
                  <div class="col-sm-12">
                    <select class="form-select" aria-label="Default select example" name = "barangay" id="barangay" >
                      <option value="" selected disabled>Select Barangay</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-12 position-relative">
    <label class="form-label">House no./House Street</label>
    <input type="text" class="form-control" id="validationTooltip01"
        name="address" xa>
    <div class="invalid-tooltip">
        The Address field is required.
    </div>
</div>


  
                
                <div class="col-md-3 ">
                <div class="col-md-12">
                    <label for="validationCustom04" name = "land" class="form-label fw-bold">Land Types</label>
                </div>
                <?php
                $resultType = $db->getLandActive();
                while ($row = mysqli_fetch_array($resultType)) {
                    echo '<div class="form-check form-check-inline col-md-6 ">';
                    echo '<input name="land[]" class="form-check-input" type="checkbox" id="' . $row['land_id'] . '" value="' . $row['land_id'] . '">';
                    echo '<label class="form-check-label" for="' . $row['land_id'] . '">' . $row['land_name'] . '</label>';
                    echo '</div>';
                }
                ?>
            </div>
           


                            
            <div class="col-md-3 ">
                <div class="col-md-12">
                    <label for="validationCustom04" class="form-label fw-bold">Tenancy</label>
                </div>
                <?php
                $resultType = $db->getTenancyActive();
                while ($row = mysqli_fetch_array($resultType)) {
                    echo '<div class="form-check form-check-inline col-md-6 ">';
                    echo '<input name="tenancy[]" class="form-check-input" type="checkbox" id="' . $row['tenancy_id'] . '" value="' . $row['tenancy_id'] . '">';
                    echo '<label class="form-check-label" for="' . $row['tenancy_id'] . '">' . $row['tenancy_name'] . '</label>';
                    echo '</div>';
                }
                ?>
            </div>

            <div class="col-md-2 mb-3">
    <label for="validationCustom01" class="form-label fw-bold">Area (Ha)</label>
    <input type="number" class="form-control" id="validationCustom01" step="0.01" name="area">
    <div class="valid-feedback">
        Looks good!
    </div>
</div>

<div class="col-md-2 mb-3">
    <label for="validationCustom02" class="form-label fw-bold">Crops Grown</label>
    <input type="number" class="form-control" id="validationCustom02" step="0.01" name="crops">
    <div class="valid-feedback">
        Looks good!
    </div>
</div>


                <div class="col-md-2 mb-3">
                  <label for="validationCustom03" class="form-label fw-bold">%Share</label>
                  <input type="number" name="share" class="form-control" id="validationCustom03" >
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>
              

  
                <div class="col-md-4">
    <label for="validationCustom04" class="form-label">
        Availability of reliable irrigation:<font color="red">*</font>
    </label>
    
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="available" value="Available" name="irrigation">
        <label class="form-check-label" for="available">Available</label>
    </div>

    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="not_available" value="Not Available" name="irrigation">
        <label class="form-check-label" for="not_available">Not Available</label>
    </div>
</div>

<div class="col-md-4">
    <label for="validationCustom04" class="form-label">Water source:<font color="red">*</font></label>

    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="irrigated" value="Irrigated" name="water_source">
        <label class="form-check-label" for="irrigated">Irrigated</label>
    </div>

    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="rainfed" value="Rainfed" name="water_source">
        <label class="form-check-label" for="rainfed">Rainfed</label>
    </div>
</div>


<div class="col-md-4">
    <label for="validationCustom04" name="source" class="form-label">If irrigated, source of irrigation:<font color="red">*</font></label>
</div>
<div class="col-md-8">
    <div class="row">
        <?php
        $resultType = $db->getIrrigationActive();
        while ($row = mysqli_fetch_array($resultType)) {
            echo '<div class="form-check col-md-3">';
            echo '<input class="form-check-input source-checkbox" type="checkbox" disabled id="source" value="' . $row['irrigation_name'] . '"
            name="source">';
            echo '<label class="form-check-label" for="' . $row['irrigation_id'] . '">' . $row['irrigation_name'] . '</label>';
            echo '</div>';
        }
        ?>
    </div>
</div>




            <div class="col-md-4">
    <label for="validationCustom04" name="soil" class="form-label">Soil Type:<font color="red">*</font></label>
</div>
<div class="col-md-8">
    <div class="row">
        <?php
        $resultType = $db->getSoilActive();
        while ($row = mysqli_fetch_array($resultType)) {
            echo '<div class="form-check col-md-3">';
            echo '<input name="soils[]" class="form-check-input" type="checkbox" id="' . $row['soil_id'] . '" value="' . $row['soil_id'] . '">';
            echo '<label class="form-check-label" for="' . $row['soil_id'] . '">' . $row['soil_name'] . '</label>';
            echo '</div>';
        }
        ?>
    </div>
</div>


            <div class="col-md-6">
    <label for="validationCustom04" name="market" class="form-label">Accessibility to farm to market road:<font color = "red">*</font></label>
</div>

<div class="col-md-3">
    <input class="form-check-input" type="checkbox" id="accessible" value="Accessible" name="market">
    <label class="form-check-label" for="accessible">Accessible</label>
</div>

<div class="col-md-3">
    <input class="form-check-input" type="checkbox" id="not_accessible" value="Not Accessible" name="market">
    <label class="form-check-label" for="not_accessible">Not Accessible</label>
</div>



            <div class="col-md-12 mt-6" style="margin-left: -25px;">    
              <div class="form-check form-check-inline">
                <label for="nameInput" name="distance" class="mr-2">Distance from the main road<font color = "red">*</font></label>
                <div class="d-inline-flex">
                  <input type="number" class="form-control mr-2 w-75 mx-1 my-1" id="nameInput" name="distance" >
                  <span class="form-text-inline mt-2" style="margin-left: 5px;">meters</span>
                </div>
              </div>
            </div>

            <div class="col-md-12 mt-6" style="margin-left: -25px;">    
              <div class="form-check form- check-inline">
                <label for="nameInput" name="land_area" class="mr-2">Available land area for planting mulberry<font color = "red">*</font></label>
                <div class="d-inline-flex align-items-center">
                  <input type="number" class="form-control mr-2 w-75 mx-1 my-1" id="nameInput" name="land_area"> 
                  <span class="form-text-inline mt-2 my-3" style="vertical-align: middle;">ha</span>
                </div>
              </div>
            </div>



                  <div class="col-md-3 ">
                <div class="col-md-12">
                    <label for="validationCustom04" class="form-label fw-bold">Funding Agency</label>
                </div>
                <?php
                $resultType = $db->getAgencyActive();
                while ($row = mysqli_fetch_array($resultType)) {
                    echo '<div class="form-check form-check-inline col-md-12 ">';
                    echo '<input name="agencys[]" class="form-check-input" type="checkbox" id="' . $row['agency_id'] . '" value="' . $row['agemcy_id'] . '">';
                    echo '<label class="form-check-label" for="' . $row['agency_id'] . '">' . $row['agency_name'] . '</label>';
                    echo '</div>';
                }
                ?>
            </div>

                
            <div class="row mt-4">
    <div class="col-md-6 position-relative">
        <label class="form-label">Project in-charge<font color="red">*</font></label>
        <input type="text" class="form-control" id="validationTooltip01" name="charge">
        <div class="invalid-tooltip">
            The Project In-Charge field is required.
        </div>
    </div>

    <div class="col-md-6 position-relative">
        <label class="form-label">Site Adopters<font color="red">*</font></label>
        <input type="text" class="form-control" id="validationTooltip01" name="adopters">
        <div class="invalid-tooltip">
            The Site Adopters field is required.
        </div>
    </div>
</div>


                <!-- <div class="col-md-6 position-relative">
                  <label class="form-label">Site Status<font color = "red">*</font></label>
                  <div class="col-sm-12">
                    <select class="form-select" aria-label="Default select example" id="validationTooltip03" name = "status" >
                      <option value="" selected disabled>Select Status</option>
                      <option value="Active">Active</option>
                      <option value="Inactive">Inactive</option>
                    </select>
                    <div class="invalid-tooltip">
                      The Active field is required.
                    </div>
                  </div> 
            </div> -->

            <!-- remarks -->
            <div class="col-md-12">
              <label for="validationCustom04" name="remarks" class="form-label">Remarks<font color = "red">*</font></label>
              <textarea class="form-control" id="validationCustom05" name="remarks"></textarea>
              <div class="invalid-feedback">
                Error
              </div>
            </div>

            <div class="row mt-5">
            <div class="col-md-12">
              <label for="validationCustom04" class="form-label">Herewith the Monitoring and Evaluation Team, declares to have visited the proposed location for mulberry plantation 
                field and found the site reasonably suited for mulberry leaf production and silkworm rearing/cocoon production.</label>
            </div>
         
            <div class="col-md-4 position-relative">
                  <label class="form-label">Name<font color = "red">*</font></label>
                  <input type="text" class="form-control" id="validationTooltip01" name = "names" >
                 
                </div>

                
                <div class="col-md-4 position-relative">
                  <label class="form-label">Position<font color = "red">*</font></label>
                  <input type="text" class="form-control" id="validationTooltip01" name = "position" >
                  <div class="invalid-tooltip">
                    The Project In-Charge field is required.
                  </div>
                </div>

              <div class="col-md-4 ">
                <label for="validationCustom04" name="date" class="form-label">Date<font color = "red">*</font></label>
                <input type="date" class="form-control" id="validationCustom05" name="date">

              </div>

            </div>
            <!-- ends -->



                <div class="col-12 d-flex align-items-end justify-content-end gap-2">
                    <button type="submit" class="btn btn-warning" name="submit">Save</button>
                  <button type="reset" class="btn btn-primary">Clear</button>
                  <a href="projectsite.php" class="btn btn-danger">Cancel</a>
                </div>  
</div>
</section>
  </main>
  
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

<script>
function setupExclusiveSelection(groupName) {
    const elements = document.querySelectorAll(`input[name="${groupName}"]`);
    
    elements.forEach(function(element) {
        element.addEventListener("change", function() {
            // Deselect the other elements when one is selected
            elements.forEach(function(otherElement) {
                if (otherElement !== element) {
                    otherElement.checked = false;
                }
            });
        });
    });
}

document.addEventListener("DOMContentLoaded", function() {
    setupExclusiveSelection("water_source");
    setupExclusiveSelection("irrigation");
    setupExclusiveSelection("farm_to_market");
});



document.addEventListener("DOMContentLoaded", function() {
    const checkboxes = document.querySelectorAll('input[name="irrigation_source[]"]');
    
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener("change", function() {
            // Allow only one checkbox to be checked
            checkboxes.forEach(function(otherCheckbox) {
                if (otherCheckbox !== checkbox) {
                    otherCheckbox.checked = false;
                }
            });
        });
    });
});

</script>

<!-- NEed more adjustmetn -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    const checkboxes = document.querySelectorAll('input[name="soil"]');
    
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener("change", function() {
            // Uncheck all other checkboxes in the group
            checkboxes.forEach(function(otherCheckbox) {
                if (otherCheckbox !== checkbox) {
                    otherCheckbox.checked = false;
                }
            });
        });
    });
});
</script>

<script>
  // Get references to the checkboxes
  var irrigatedCheckbox = document.getElementById("irrigated");
  var sourceCheckboxes = document.querySelectorAll(".source-checkbox");

  // Add an event listener to the "Irrigated" checkbox
  irrigatedCheckbox.addEventListener("change", function() {
    // Enable or disable the source checkboxes based on the state of the "Irrigated" checkbox
    var isIrrigated = irrigatedCheckbox.checked;
    sourceCheckboxes.forEach(function(checkbox) {
      checkbox.disabled = !isIrrigated;
      // If "Irrigated" is unchecked, uncheck the source checkboxes
      if (!isIrrigated) {
        checkbox.checked = false;
      }
    });
  });
</script>


  </body>
  </html>