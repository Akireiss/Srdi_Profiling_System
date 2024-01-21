<?php
session_start();
include '../db_con.php';
$db = new db;
if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
} 
if ($_SESSION['type_id'] == 2) {
  header("Location:  ../auth/login.php");
  exit(); 
}

if ($_SESSION['type_id'] == 3) {
header("Location:  ../auth/login.php");
exit(); 
}else {
    if(isset($_POST['update'])){
        $site_id = $_POST['site_id'];
        $producer_name = $_POST['producer_name'];
        $region = $_POST['region'];
        echo $region;
        echo die();
    }
}
?>


<!DOCTYPE html>
<html lang="en">

  <body>
  <?php include '../includes/header.php' ?>
<?php include '../includes/sidebar.php' ?>
  
<main id="main" class="main">
       <!-- End Page Title -->

    <section class="section">
    <?php
             $result=$db->getSiteID($_GET['site_id']);
            while($row=mysqli_fetch_object($result)){
                $siteID     	  = $row->site_id;
                $location   	  = $row->location;
                $producer_name 	= $row->name;
                $producerName 	= $row->name;
                $topography 	  = $row->topography;
                $address	      = $row->address;
                $land	          = $row->land;
                $tenancy	      = $row->tenancy;
                $area           = $row->area;
                $crops 	        = $row->crops;
                $share          = $row->share;
                $crops 	        = $row->crops;
                $irrigation 	  = $row->irrigation;
                $water 	        = $row->water;
                $source 	      = $row->source;
                $soil 	        = $row->soil;
                $market 	      = $row->market;
                $distance       = $row->distance;
                $land_area      = $row->land_area;
                $agency	        = $row->agency;
                $charge 	      = $row->charge;
                $adopters       = $row->adopters;
                $remarks 	      = $row->remarks;
                $status 	      = $row->status;
                $names	        = $row->names;
                $position 	    = $row->position;
                $date 	        = $row->date;
                $name1	        = $row->name1;
                $position1	    = $row->position1;
                $date1 	        = $row->date1;
                $name2	        = $row->name2;
                $position2	    = $row->position2;
                $date2 	        = $row->date2;
            }
        ?>
         <div class="pagetitle">
        <h1>Edit Project Site | <?php echo $location?></h1>
          </div>
      <div class="row">
        <div class="col-lg-12">
           
          <div class="card">
            <div class="card-body">
              
              <!-- <h5 class="card-title">Personal Information</h5> -->
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered" id="borderedTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-home" type="button" role="tab" aria-controls="home" aria-selected="true">Project Site Information</button>
                </li>
               
              </ul>
              <div class="tab-content pt-2" id="borderedTabContent">
                <div class="tab-pane fade show active" id="bordered-home" role="tabpanel" aria-labelledby="home-tab">
                  <!-- Custom Styled Validation with Tooltips -->
                    <form class="row g-3 needs-validation" novalidate action = "<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="POST">
                      <!-- Date Validation -->
                      <div class="col-md-6 position-relative">
                  <label class="form-label">Project Site Location<font color = "red">*</font></label>
                  <input type="hidden" class="form-control" id="validationTooltip01" name="site_id"
                                         value = "<?php echo $siteID;?>" required>
                                         <input type="text" class="form-control" id="validationTooltip01" name="location"
                                        value = "<?php echo $location;?>" required>
                  <div class="invalid-tooltip">
                    The Project Site Location field is required.
                  </div>
                </div>
                <div class="col-md-6 position-relative">
                  <label class="form-label">Status<font color="red">*</font></label>
                  <div class="col-sm-12">
                      <select class="form-select" aria-label="Default select example" id="validationTooltip03" name="status" required>
                          <?php
                              // Check if the $status variable is not empty
                              if (!empty($status)) {
                                  // Use a ternary operator for cleaner code
                                  echo '<option value="Active" ' . ($status == 'Active' ? 'selected' : '') . '>Active</option>';
                                  echo '<option value="Inactive" ' . ($status == 'Inactive' ? 'selected' : '') . '>Inactive</option>';
                              } else {
                                  // If $status is empty, provide default options
                                  echo '<option value="Active">Active</option>';
                                  echo '<option value="Inactive">Inactive</option>';
                              }
                          ?>
                      </select>
                      <div class="invalid-tooltip">
                          The Status field is required.
                      </div>
                  </div>
              </div>

                      <!-- Producer Name -->
                      <div class="col-md-12 position-relative">
                  <label class="form-label">Producer Name<font color = "red">*</font></label>
                  <input type="text" class="form-control" id="validationTooltip01" name="producer_name"
                                        value = "<?php echo $producer_name;?>" required>
                  <div class="invalid-tooltip">
                    The Producer Name field is required.
                  </div>
                </div>

                <div class="col-md-12 position-relative">
                    <label class="form-label">Topography<font color="red">*</font></label>
                    <select class="form-select" id="validationTooltip01" name="topography" required>
                        <?php
                        $resultType = $db->getTopographyActive();
                        while ($row = mysqli_fetch_array($resultType)) {
                            $topography_id = $row['topography_id'];
                            $topography_name = $row['topography_name'];
                            // Check if the current option's value matches the stored value, and set 'selected' if it does
                            $selected = ($topography_id == $topography) ? 'selected' : '';
                            echo '<option value="' . $topography_id . '" ' . $selected . '>' . $topography_name . '</option>';
                        }
                        ?>
                    </select>
                </div>



                <!-- <div class="col-md-3 position-relative">
                        <label class="form-label">Region<font color = "red">*</font></label>
                        <div class="col-sm-12">
                          <input type="hidden" class="form-control" id="validationTooltip03" name = "region" value = "<?php echo $region;?>" required>
                          <select class="form-select" aria-label="Default select example" id="region" name="region" value = "<?php echo $regCode;?>" >
                            <option value="<?php echo $regCode;?>" selected disabled><?php echo $regName;?></option>
                            <?php
                            $resultType=$db->getRegion($regCode);
                            while($row=mysqli_fetch_array($resultType)){
                              echo '<option value="'.$row['regCode'].'">' . $row['regDesc'] . '</option>';
                            }
                            ?>
                          </select>
                          <div class="invalid-tooltip">
                            The Region field is required.
                          </div>
                        </div>
                      </div>

                      <div class="col-md-3 position-relative">
                  <label class="form-label">Province<font color = "red">*</font></label>
                  <div class="col-sm-12">
                  <select class="form-select" aria-label="Default select example" name = "province" id="province" value = "<?php echo $provCode;?>">
                            <option value="<?php echo $provCode;?>" selected disabled><?php echo $provName;?></option>
                            
                          </select>
                  </div>
                </div>

                                <div class="col-md-3 position-relative">
                                  <label class="form-label">City/Municipality<font color = "red">*</font></label>
                                  <div class="col-sm-12">
                                  <select class="form-select" aria-label="Default select example" name = "municipality" id="city" value = "<?php echo $citymunCode;?>" >
                            <option value="<?php echo $citymunCode;?>" selected disabled><?php echo $citymunName;?></option>
                            
                          </select>
                                  </div>
                                </div>

                                <div class="col-md-3 position-relative">
                                  <label class="form-label">Barangay<font color = "red">*</font></label>
                                  <div class="col-sm-12">
                                  <select class="form-select" aria-label="Default select example" name = "barangay" id="barangay" value = "<?php echo $brgyCode;?>" >
                            <option value="<?php echo $brgyCode;?>" selected disabled><?php echo $barangayName;?></option>
                            
                          </select>
                                </div>
                          </div> -->

                          <div class="col-md-12 position-relative">
                            <label class="form-label">House no./House Street</label>
                            <input type="text" class="form-control" id="validationTooltip01" name="address"
                            value = "<?php echo $address;?>">
                        </div>
                 <div class="col-md-4 mt-6">
                  <label for="validationCustom01" class="form-label">Area (Hectares)<font color="red">*</font></label>
                  <input type="number" class="form-control" id="validationCustom01" step="0.01" name="area" value="<?php echo $area; ?>">
                  <div class="valid-feedback">
                      Looks good!
                  </div>
              </div>

              <div class="col-md-4">
                  <label for="validationCustom02" class="form-label">Crops Grown<font color="red">*</font></label>
                  <input type="number" class="form-control" id="validationCustom02" step="0.01" name="crops" value="<?php echo $crops; ?>">
                  <div class="valid-feedback">
                      Looks good!
                  </div>
              </div>
              <div class="col-md-4">
                <label for="validationCustom03" class="form-label">%Share<font color="red">*</font></label>
                <input type="number" name="share" class="form-control" id="validationCustom03" value="<?php echo $share; ?>">
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>

            <div class="row">
              <div class="col-md-6 mt-6" style="margin-left: -25px;">
                  <div class="form-check form-check-inline">
                      <label for="nameInput" name="distance" class="mr-2">Distance from the main road<font color="red">*</font></label>
                      <div class="d-inline-flex">
                          <input type="number" class="form-control mr-2 w-75 mx-1 my-1" id="nameInput" name="distance" value="<?php echo $distance; ?>">
                          <span class="form-text-inline mt-2" style="margin-left: 2px;">meters</span>
                      </div>
                  </div>
              </div>

              <div class="col-md-6 mt-6" style="margin-left: -25px;">
                  <div class="form-check form-check-inline">
                      <label for="nameInput" name="land_area" class="mr-2">Available land area for planting mulberry<font color="red">*</font></label>
                      <div class="d-inline-flex align-items-center">
                          <input type="number" class="form-control mr-2 w-75 mx-1 my-1" id="nameInput" name="land_area" value="<?php echo $land_area; ?>">
                          <span class="form-text-inline mt-2 my-3" style="vertical-align: middle;">hectares</span>
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
                  echo '<input class="form-check-input source-checkbox" type="checkbox" disabled id="source_' . $row['irrigation_id'] . '" value="' . $row['irrigation_name'] . '"
                  name="source[]">';
                  echo '<label class="form-check-label" for="source_' . $row['irrigation_id'] . '">' . $row['irrigation_name'] . '</label>';
                  echo '</div>';
              }
              ?>
          </div>

            
                <div class="row">
    
  
              <div class="col-md-4 mt-3">
              <div class="col-md-6"
              <label for="validationCustom04" name="soil" class="form-label fw-bold">
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
              $resultType = $db->getAgencyActive();
              while ($row = mysqli_fetch_array($resultType)) {
                  echo '<div class="form-check col-md-12"">'; // Adjust the width here (e.g., col-md-6)
                  echo '<input name="agencys[]" class="form-check-input" type="checkbox" id="' . $row['agency_id'] . '" value="' . $row['agency_id'] . '">';
                  echo '<label class="form-check-label" for="' . $row['agency_id'] . '">' . $row['agency_name'] . '</label>';
                  echo '</div>';
              }
              ?>
          </div>



          <div class="row mt-4">
            <div class="col-md-6 position-relative">
                <label class="form-label">Project in-charge<font color="red">*</font></label>
                <input type="text" class="form-control" id="validationTooltip01" name="charge"
                value = "<?php echo $charge;?>" required>
                <div class="invalid-tooltip">
                    The Project In-Charge field is required.
                </div>
            </div>

            <div class="col-md-6 position-relative">
                <label class="form-label">Number of site Adopters<font color="red">*</font></label>
                <input type="number" class="form-control" id="validationTooltip01" name="adopters"
                value = "<?php echo $adopters;?>" required>
                <div class="invalid-tooltip">
                    The Site Adopters field is required.
                </div>
            </div>
        </div>

        <div class="col-md-12">
          <label for="validationCustom04" class="form-label">Remarks<font color="red">*</font></label>
          <textarea class="form-control" id="validationCustom05" name="remarks" required><?php echo $remarks; ?></textarea>
          <div class="invalid-feedback">
              Error
          </div>
      </div>


            <div class="row mt-4">
            <div class="col-md-12">
              <label for="validationCustom04" class="form-label">Herewith the Monitoring and Evaluation Team, declares to have visited the proposed location for mulberry plantation 
                field and found the site reasonably suited for mulberry leaf production and silkworm rearing/cocoon production.</label>
            </div>

        
        <div class="col-md-4 position-relative">
              <label class="form-label">Name<font color="red">*</font></label>
              <input type="text" class="form-control" id="validationTooltip01" name="names"
              value = "<?php echo $names;?>" required>
              <div class="invalid-tooltip">
                  The Name field is required.
              </div>
          </div>
          <div class="col-md-4 position-relative">
              <label class="form-label">Position<font color="red">*</font></label>
              <input type="text" class="form-control" id="validationTooltip01" name="position"
              value = "<?php echo $position;?>" required>
              <div class="invalid-tooltip">
                  The Position field is required.
              </div>
          </div>
          <div class="col-md-4 position-relative">
              <label class="form-label">Date<font color="red">*</font></label>
              <input type="date" class="form-control" id="validationTooltip01" name="date"
              value = "<?php echo $date;?>" required>
              <div class="invalid-tooltip">
                  The Date field is required.
              </div>
          </div>
          <div class="col-md-4 position-relative">
              <label class="form-label">Name<font color="red">*</font></label>
              <input type="text" class="form-control" id="validationTooltip01" name="name1"
              value = "<?php echo $name1;?>" required>
              <div class="invalid-tooltip">
                  The Name field is required.
              </div>
          </div>
          <div class="col-md-4 position-relative">
              <label class="form-label">Position<font color="red">*</font></label>
              <input type="text" class="form-control" id="validationTooltip01" name="position1"
              value = "<?php echo $position1;?>" required>
              <div class="invalid-tooltip">
                  The Position field is required.
              </div>
          </div>
          <div class="col-md-4 position-relative">
              <label class="form-label">Date<font color="red">*</font></label>
              <input type="date" class="form-control" id="validationTooltip01" name="date1"
              value = "<?php echo $date1;?>" required>
              <div class="invalid-tooltip">
                  The Date field is required.
              </div>
          </div>
          <div class="col-md-4 position-relative">
              <label class="form-label">Name<font color="red">*</font></label>
              <input type="text" class="form-control" id="validationTooltip01" name="name2"
              value = "<?php echo $name2;?>" required>
              <div class="invalid-tooltip">
                  The Name field is required.
              </div>
          </div>
          <div class="col-md-4 position-relative">
              <label class="form-label">Position<font color="red">*</font></label>
              <input type="text" class="form-control" id="validationTooltip01" name="position2"
              value = "<?php echo $position2;?>" required>
              <div class="invalid-tooltip">
                  The Position field is required.
              </div>
          </div>
          <div class="col-md-4 position-relative">
              <label class="form-label">Date<font color="red">*</font></label>
              <input type="date" class="form-control" id="validationTooltip01" name="date2"
              value = "<?php echo $date2;?>" required>
              <div class="invalid-tooltip">
                  The Date field is required.
              </div>
          </div>
            <div class="col-12 d-flex align-items-end justify-content-end gap-2">

                 <button type="submit" class="btn btn-warning" name="update">Update </button>
                 <button type="reset" class="btn btn-primary">Clear</button>
                 <a href="projectsite.php" class="btn btn-danger">Cancel</a>
           </div>
        </form><!-- End Custom Styled Validation with Tooltips -->
        </div>
        <div class="tab-pane fade" id="bordered-profile" role="tabpanel" aria-labelledby="profile-tab">
                  <!--  -->
             <div class="pagetitle">
        <!--       <h1>Beekeepers</h1><br> -->
                    <div class="row">
                      
                    </div>
                  </div><!-- End Page Title -->

                </div>
              </div>
            </div>
          </div>

        </div>

    </section>
    </main> <!--END MAIN-->
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
    </body>
</html>
