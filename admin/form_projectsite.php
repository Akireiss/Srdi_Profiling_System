<?php
session_start();
include "../db_con.php";
error_reporting(0);
ini_set('display_errors', 1);
$db = new db;
if(!isset($_SESSION['user_id'])) {
  header("Location: ../auth/login.php");
} else {
  if (isset($_POST['submit'])) {
    $user_id = $_SESSION['user_id'];
    $location = $_POST['location'];
    $producer_id   = $_POST['producer_id'];
    $topography  = $_POST['topography'];
    $address  = $_POST['address'];
    
    $area  = isset($_POST['area']) ? floatval($_POST['area']) : 0.0;
    $crops = isset($_POST['crops']) ? floatval($_POST['crops']) : 0.0;
    $share = $_POST['share'];
    $irrigation = isset($_POST['irrigation']) ? $_POST['irrigation'] : '';
    $water = isset($_POST['water_source']) ? $_POST['water_source'] : '';
    $market = isset($_POST['market']) ? $_POST['market'] : '';
    $distance= $_POST['distance'];
    $land_area= $_POST['land_area'];
    $charge= $_POST['charge'];
    $adopters= $_POST['adopters'];
    $remarks= $_POST['remarks'];
    $names= $_POST['names'];
    $position= $_POST['position'];
    $date = $_POST['date'];
    $name1= $_POST['name1'];
    $position1= $_POST['position1'];
    $date1 = $_POST['date1'];
    $name2= $_POST['name2'];
    $position2= $_POST['position2'];
    $date2 = $_POST['date2'];

    
    $land = isset($_POST['land']) ? $_POST['land'] : [];
    $tenancy = $_POST ['tenancy']  ? $_POST['tenancy'] : [];
    $agency = $_POST ['agency']  ? $_POST['agency'] : [];
    $soils = $_POST ['soils']  ? $_POST['soils'] : [];
    $source = $_POST ['source']  ? $_POST['source'] : [];
    
    $result = $db->addSite($user_id, $location, $producer_id, $topography, $address, $area, $crops, $share, $irrigation, 
    $water, $market, $distance, $land_area, $charge, $adopters, $remarks,
    $names, $position, $date,  $name1, $position1, $date1, $name2, $position2, $date2,
    $land, $tenancy, $agency, $soils, $source);
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
             <form class="row g-3 needs-validation" enctype="multipart/form-data" method="POST">
             <input type="hidden" name="user_id" value="<?php echo $user_id ?>">

            <div class="col-md-12 position-relative">
              <label class="form-label">Project Site Location<font color = "red">*</font></label>
                <input type="text" class="form-control" id="validationTooltip01" name = "location"  autofocus="autofocus" required>
              <div class="invalid-tooltip">
                    The Project Site Location field is required.
               </div>
            </div>

            <div class="col-md-12 position-relative">
                <label class="form-label">Producer Name<font color="red">*</font></label>
                <select name="producer_id" class="form-select" id="validationCustom04" required>
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
                <div class="invalid-tooltip">
                    The Producer Name field is required.
               </div>
            </div>

            <div class="col-md-12 position-relative">
               <label class="form-label">Topography<font color = "red">*</font></label>
                  <select  required  class="form-select" aria-label="Default select example" name = "topography" id="invalid-tooltip" required>
                    <option selected>Select Topography</option>
                        <?php
                            $resultType=$db->getTopographyActive();
                            while($row=mysqli_fetch_array($resultType)){
                                echo '<option value="'.$row['topography_id'].'">' . $row['topography_name'] . '</option>';
                            }
                        ?>
                 </select>
                  <div class="invalid-tooltip">
                    The Topography field is required.
                  </div>
            </div>

            <div class="col-md-12 position-relative">
              <label class="form-label">House no./House Street</label>
                <input type="text" class="form-control" id="validationTooltip01" name="address">
            </div>

            <div class="col-md-4 mt-6">
                  <label for="validationCustom01" class="form-label">Area (Hectares)<font color="red">*</font></label>
                  <input type="number" class="form-control" id="validationCustom01" step="0.01" name="area" required>
             <div class="valid-feedback">
                The Area field is required.
              </div>
            </div>

            <div class="col-md-4">
                <label for="validationCustom02" class="form-label">Crops Grown<font color="red">*</font></label>
                  <input type="number" class="form-control" id="validationCustom02" step="0.01" name="crops" required>
            <div class="valid-feedback">
                The crops field is required.
            </div>
            </div>

            <div class="col-md-4">
              <label for="validationCustom03" class="form-label">%Share<font color="red">*</font></label>
                <input type="number" name="share" class="form-control" id="validationCustom03" >
             </div>

            <div class="row mt-4">
                <div class="col-md-5 mt-6" style="margin-left: -25px;">    
                    <div class="form-check form-check-inline">
                        <label for="distanceInput" class="mr-2">Distance from road<font color="red">*</font></label>
                        <div class="d-inline-flex">
                            <input type="number" class="form-control mr-1 w-50 mx-1 my-1" id="distanceInput" name="distance">
                            <span class="form-text-inline mt-2" style="margin-left: 2px;">meters</span>
                        </div>
                    </div>
             </div>

            <div class="col-md-6 mt-6" style="margin-left: 20px;">    
            <div class="form-check form-check-inline">
                <label for="areaInput" class="mr-2">Available land area for planting mulberry<font color="red">*</font></label>
                <div class="d-inline-flex align-items-center">
                    <input type="number" class="form-control mr-0 w-25 mx-0 my-0" id="areaInput" name="land_area"> 
                    <span class="form-text-inline mt-1 my-1" style="display: inline-block; margin-left: 0px;">hectares</span>
                </div>
            </div>
        </div>
        </div>

        <div class="col-md-2 ">
          <div class="col-md-12">
             <label for="validationCustom04" name = "land" class="form-label fw-bold">Land Types<font color="red">*</font></label>
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
             
         <div class="col-md-2 ">
           <div class="col-md-12">
             <label for="validationCustom04" class="form-label fw-bold">Tenancy<font color="red">*</font></label>
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

             <div class="col-md-2 mt-3">
                <label for="validationCustom04" class="form-label fw-bold">
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

            <div class="col-md-2 mt-3">
              <label for="validationCustom04" class="form-label fw-bold">Water source:<font color="red">*</font></label>

              <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="irrigated" value="Irrigated" name="water_source">
                  <label class="form-check-label" for="irrigated">Irrigated</label>
              </div>

              <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="rainfed" value="Rainfed" name="water_source">
                  <label class="form-check-label" for="rainfed">Rainfed</label>
              </div>
          </div>

          <div class="col-md-4 mt-3">
              <label for="validationCustom04" name="source" class="form-label fw-bold">If irrigated, source of irrigation:<font color="red">*</font></label>
                <?php
                $resultType = $db->getIrrigationActive();
                while ($row = mysqli_fetch_array($resultType)) {
                    echo '<div class="form-check">';
                    echo '<input class="form-check-input source-checkbox"
                type="checkbox" disabled id="source_' . $row['irrigation_id'] . '" value="' . $row['irrigation_id'] . '"
                    name="source[]">';
                    echo '<label class="form-check-label" for="source_' . $row['irrigation_id'] . '">' . $row['irrigation_name'] . '</label>';
                    echo '</div>';
                }
                ?>
          </div>

         <div class="row">
              <div class="col-md-4 mt-3">
               <div class="col-md-6">
            <label for="validationCustom04" class="form-label fw-bold"></label>
                <b>Soil Type:</b><font color="red">*</font>
            </label>
                <?php
                    $resultType = $db->getSoilActive();
                    while ($row = mysqli_fetch_array($resultType)) {
                        echo '<div class="form-check col-md-12">';
                        echo '<input name="soils[]" class="form-check-input" type="checkbox" id="' . $row['soil_id'] . '" value="' . $row['soil_id'] . '">';
                        echo '<label class="form-check-label" for="' . $row['soil_id'] . '">' . $row['soil_name'] . '</label>';
                        echo '</div>';
                    }
                 ?>
            </div>
         </div>

        <div class="col-md-4 mt-3">
             <label for="validationCustom04" name="market" class="form-label fw-bold">Accessibility to farm to market road:<font color="red">*</font></label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="accessible" value="Accessible" name="market">
                <label class="form-check-label" for="accessible">Accessible</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="not_accessible" value="Not Accessible" name="market">
                <label class="form-check-label" for="not_accessible">Not Accessible</label>
            </div>
        </div> 
            <div class="col-md-3 mt-6">
              <div class="col-md-12">
                  <label for="validationCustom04" class="form-label fw-bold">Funding Agency<font color="red">*</font></label>
              </div>
                <?php
                    $resultType = $db->getAgency(); 
                    while ($row = mysqli_fetch_array($resultType)) {
                    
                        echo '<div class="form-check col-md-12">'; // Removed an extra double quote
                        echo '<input name="agency[]" class="form-check-input" type="checkbox" id="' . $row['agency_id'] . '" value="' . $row['agency_id'] . '">';
                        echo '<label class="form-check-label" for="' . $row['agency_id'] . '">' . $row['agency_name'] . '</label>';
                        echo '</div>';
                    }
                    ?>
          </div>
 
            <div class="row mt-4">
                <div class="col-md-6 position-relative">
                 <label class="form-label">Project in-charge<font color="red">*</font></label>
                    <input type="text" class="form-control" id="validationTooltip01" name="charge" required>
                <div class="invalid-tooltip">
                    The Project In-Charge field is required.
                </div>
            </div>

            <div class="col-md-6 position-relative">
                <label class="form-label">Number of site Adopters<font color="red">*</font></label>
                <input type="number" class="form-control" id="validationTooltip01" name="adopters">
                <div class="invalid-tooltip">
                    The Site Adopters field is required.
                </div>
            </div>
        </div>

            <div class="col-md-12">
              <label for="validationCustom04" name="remarks" class="form-label">Remarks<font color = "red">*</font></label>
              <textarea class="form-control" id="validationCustom05" name="remarks"></textarea>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                 <label for="validationCustom04" class="form-label">Herewith the Monitoring and Evaluation Team, declares to have visited the proposed location for mulberry plantation 
                    field and found the site reasonably suited for mulberry leaf production and silkworm rearing/cocoon production.</label>
            </div>

            
            <div class="col-md-4 position-relative">
              <label class="form-label">Name<font color="red">*</font></label>
              <input type="text" class="form-control" id="validationTooltip01" name="names">
           </div>

          <div class="col-md-4 position-relative">
              <label class="form-label">Position<font color="red">*</font></label>
              <input type="text" class="form-control" id="validationTooltip01" name="position">
          </div>

          <div class="col-md-4 position-relative">
              <label class="form-label">Date<font color="red">*</font></label>
              <input type="date" class="form-control" id="validationTooltip01" name="date">
          </div>

          <div class="col-md-4 position-relative">
              <label class="form-label">Name<font color="red">*</font></label>
              <input type="text" class="form-control" id="validationTooltip01" name="name1">
          </div>

          <div class="col-md-4 position-relative">
              <label class="form-label">Position<font color="red">*</font></label>
              <input type="text" class="form-control" id="validationTooltip01" name="position1">
          </div>

          <div class="col-md-4 position-relative">
              <label class="form-label">Date<font color="red">*</font></label>
              <input type="date" class="form-control" id="validationTooltip01" name="date1">
          </div>

          <div class="col-md-4 position-relative">
              <label class="form-label">Name<font color="red">*</font></label>
              <input type="text" class="form-control" id="validationTooltip01" name="name2">
          </div>

          <div class="col-md-4 position-relative">
              <label class="form-label">Position<font color="red">*</font></label>
              <input type="text" class="form-control" id="validationTooltip01" name="position2">
          </div>

          <div class="col-md-4 position-relative">
              <label class="form-label">Date<font color="red">*</font></label>
              <input type="date" class="form-control" id="validationTooltip01" name="date2">
          </div>
        </div>
        </div>

        <div class="col-md-12 mt-2 d-flex align-items-end justify-content-end gap-2">
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
                    $('#barangay').html('<option value="">Select Barangay</option>');
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

<script>
    $(document).ready(function () {
        // Clone the input-set and append it three times
        for (let i = 0; i < 3; i++) {
            $('.input-set').clone().appendTo('#inputs-container').removeAttr('style');
        }

        // Remove extra input-sets beyond the third one
        $('#inputs-container .input-set:gt(3)').remove();
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $('.form-check-input').change(function () {
            // Get the value and send it to the server (you need to adjust the AJAX URL and data accordingly)
            var value = $(this).val();

            $.ajax({
                type: 'POST',
                url: 'your_php_script.php', // Replace with your PHP script URL
                data: {
                    irrigation_status: value
                },
                success: function (response) {
                    // Handle success (optional)
                    console.log(response);
                },
                error: function (error) {
                    // Handle error (optional)
                    console.error(error);
                }
            });
        });
    });
</script>
  </body>
  </html>