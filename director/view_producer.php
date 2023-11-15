<?php
session_start();
include "../db_con.php";
$db = new db;
if(!isset($_SESSION['user_id'])) {
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
             $result=$db->getProducerID($_GET['cocoon_id']);
            while($row=mysqli_fetch_object($result)){
                $cocoonID             = $row->cocoon_id;
                $date_validation      = $row->date_validation ;
                $name                 = $row->name;
                $status                = $row->status;
                $age                  = $row->age;
                $birthdate            = $row->birthdate;
                $type                 = $row->type;
                $sex                  = $row->sex;
                $region 	            = $row->region;
                $regName              =$row->regDesc;
                $province             = $row->province;
                $provName             = $row->provDesc;
                $municipality         = $row->municipality;
                $citymunName          = $row->citymunDesc;
                $barangay             = $row->barangay;
                $barangayName         = $row->brgyDesc;
                $address              = $row->address;
                $education            = $row->education;
                $religion             = $row->religion;
                $civil_status         = $row->civil_status;
                $name_spouse          = $row->name_spouse;
                $farm_participate     = $row->farm_participate;
                $cannot_participate   = $row->cannot_participate;
                $male                 = $row->male;
                $female               = $row->female;
                $source_income        = $row->source_income;
                $years_in_farming     = $row->years_in_farming;
                $available_workers    = $row->available_workers;
                $farm_tool            = $row->farm_tool;
                $intent               = $row->intent;
                $signature            = $row->signature;
                $id_pic               = $row->id_pic;
                $intent               = $row->intent;
                $signature            = $row->signature;
                $bypic                = $row->bypic;
            }
        ?>

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
      <h1>Edit Producer | <?php echo $name?></h1>
          </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
           
          <div class="card">
            <div class="card-body">
              
              <!-- <h5 class="card-title">Personal Information</h5> -->
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered" id="borderedTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-home" type="button" role="tab" aria-controls="home" aria-selected="true">Personal Information</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Site</button>
                </li>
              </ul>
              <div class="tab-content pt-2" id="borderedTabContent">
                <div class="tab-pane fade show active" id="bordered-home" role="tabpanel" aria-labelledby="home-tab">
                  <!-- Custom Styled Validation with Tooltips -->
                    <form class="row g-3 needs-validation" novalidate action = "#" enctype="multipart/form-data" method="POST">
                      <!-- Date Validation -->
                      <div class="col-md-4">
                      <label for="validationCustom02" class="form-label">Date of Validation<font color = "red">*</font></label>
                      <input type="date" class="form-control" id="validationTooltip01" name="date_validation"
                                         value = "<?php echo $date_validation;?>" disabled >
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                    </div> 

                      <!-- Producer Name -->
                      <div class="row g-3  needs-validation md:w-full" novalidate>
                      <div class="col-md-6">
                        <label for="validationCustom01" class="form-label">Name<font color = "red">*</font></label>
                       
                        <input type="hidden" class="form-control" id="validationTooltip01" name="cocoon_id"
                                         value = "<?php echo $cocoonID;?>" >
                                         <input type="text" class="form-control" id="validationTooltip01" name="name"
                                        value = "<?php echo $name;?>" disabled>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                      </div>

                      <div class="col-md-6 position-relative">
                                        <label class="form-label">Status<font color="red">*</font></label>
                                        <div class="col-sm-12">
                                            <select class="form-select" aria-label="Default select example" id="validationTooltip03" name="status" disabled>
                                            <?php
                                                if($status == 'Active'){
                                                    echo '<option value="Active" selected>' . $status . '</option>';
                                                    echo '<option value="Inactive">Inactive</option>';
                                                }else{
                                                    echo '<option value="Active">Active</option>';
                                                    echo '<option value="Inactive" selected>' . $status . '</option>';
                                                }
                                            ?>
                                            </select>
                                            <div class="invalid-tooltip">
                                                The Status field is required.
                                            </div>
                                        </div>
                                    </div>
                    </div>

                    
                      <!-- Beekeeper Gender -->
                      <div class="row g-3  needs-validation md:w-full" novalidate>
                <div class="col-md-3">
                  <label for="validationCustom02" class="form-label">Age<font color = "red">*</font></label>
                  <input type="text" class="form-control" id="validationTooltip01" name="age"
                                              value = "<?php echo $age;?>" disabled>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>

                <div class="col-md-3">
                  <label for="validationCustom02" class="form-label">Birthdate<font color = "red">*</font></label>
                  <input type="date" class="form-control" id="validationTooltip01" name="birthdate"
                                              value = "<?php echo $birthdate;?>"disabled >
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>

                <div class="col-md-3">
                  <label class="form-label">Type of Producer<font color="red">*</font></label>
                  <select class="form-select" aria-label="Default select example" id="validationTooltip03" name="type"  disabled
                  
                      <option value="" >Select Type</option>
                      <option value="Seed Cocoon" <?php if ($type === "Seed Cocoon") echo "selected"; ?>>Seed Cocoon</option>
                      <option value="Commercial" <?php if ($type === "Commercial") echo "selected"; ?>>Commercial</option>
                  </select>
              </div>
               
                                                

                    <div class="col-md-3">
                  <label class="form-label">Sex<font color="red">*</font></label>
                  <select class="form-select" aria-label="Default select example" id="validationTooltip03" name="type" disabled>
                      <option value="" disabled>Select Sex</option>
                      <option value="Male" <?php if ($type === "Male") echo "selected"; ?>>Male</option>
                      <option value="Female" <?php if ($type === "Female") echo "selected"; ?>>Female</option>
                  </select>
              </div>

              <div class="col-md-3 position-relative">
                        <label class="form-label">Region<font color = "red">*</font></label>
                        <div class="col-sm-12">
                          <input type="hidden" class="form-control" id="validationTooltip03" name = "region" value = "<?php echo $regCode;?>" disabled>
                          <select class="form-select" aria-label="Default select example" name = "region" id="region" value = "<?php echo $regCode;?>" disabled>
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
                  <select class="form-select" aria-label="Default select example" name = "province" id="province" value = "<?php echo $provCode;?>" disabled>
                            <option value="<?php echo $provCode;?>" selected disabled><?php echo $provName;?></option>
                            
                          </select>
                  </div>
                </div>

                                <div class="col-md-3 position-relative">
                                  <label class="form-label">City/Municipality<font color = "red">*</font></label>
                                  <div class="col-sm-12">
                                  <select class="form-select" aria-label="Default select example" name = "municipality" id="municipality" value = "<?php echo $citymunCode;?>" disabled>
                            <option value="<?php echo $citymunCode;?>" selected disabled><?php echo $citymunName;?></option>
                            
                          </select>
                                  </div>
                                </div>

                                <div class="col-md-3 position-relative">
                                  <label class="form-label">Barangay<font color = "red">*</font></label>
                                  <div class="col-sm-12">
                                  <select class="form-select" aria-label="Default select example" name = "barangay" id="barangay" value = "<?php echo $brgyCode;?>" disabled>
                            <option value="<?php echo $brgyCode;?>" selected disabled><?php echo $barangayName;?></option>
                            
                          </select>
                                </div>
                          </div>
                          <div class="col-md-12">
                            <label for="validationCustom03" class="form-label">Permanent Address<font color = "red">*</font></label>
                            <input type="text" class="form-control" id="validationTooltip01" name="address"
                                                              value = "<?php echo $address;?>" disabled>
                            <div class="invalid-feedback">
                              Please provide a valid city.
                            </div>
                          </div>

                           <div class="row g-3  needs-validation md:w-full" novalidate>
                            <div class="col-md-6">
                              <label for="validationCustom04" class="form-label">Educational Attainment<font color = "red">*</font></label>
                              <select name="education" class="form-select" id="validationCustom04" disabled>
                                  <option  selected>Select Educational Attainment</option>
                                  <?php
                                        $resultType=$db->getEducationActive();
                                        while($row=mysqli_fetch_array($resultType)){
                                          $education_id = $row['education_id'];
                                          $education_name = $row['education_name'];
                                          $selected = ($topography_id == $educationy) ? 'selected' : '';
                                          echo '<option value="' . $education_id . '" ' . $selected . '>' . $education_name . '</option>';
                                        }
                                      
                                        ?>
                                </select>
                            </div>

                            <div class="col-md-6">
                              <label for="validationCustom05" class="form-label">Religion<font color = "red">*</font></label>
                              <select class="form-select" id="validationCustom04" name="religion" disabled>
                              <option  selected>Select Religion</option>
                                  <?php
                                        $resultType=$db->getReligionActive();
                                        while($row=mysqli_fetch_array($resultType)){
                                          $religion_id = $row['religion_id'];
                                          $religion_name = $row['religion_name'];
                                          $selected = ($religion_id == $religion) ? 'selected' : '';
                                          echo '<option value="' . $religion_id . '" ' . $selected . '>' . $religion_name . '</option>';
                                        }
                                        ?>
                                </select>
                              <div class="invalid-feedback">
                                Please provide a valid zip.
                              </div>
                            </div>
                          

                          <div class="col-md-6">
                            <label for="validationCustom05" class="form-label">Civil Status<font color = "red">*</font></label>
                            <input type="text" class="form-control" id="validationTooltip01" name="civil_status"
                                                              value = "<?php echo $civil_status;?>" disabled>
                            <div class="invalid-feedback">
                              Please provide a civil status.
                            </div>
                            </div>

                            <div class="col-md-6">
                              <label for="validationCustom04" class="form-label">If married, name of spouse<font color = "red">*</font></label>
                              <input type="text" class="form-control" id="validationTooltip01" name="name_spouse"
                                                              value = "<?php echo $name_spouse;?>" disabled>
                              <div class="invalid-feedback">
                                Please provide a name of spouse.
                              </div>
                          </div>

                          
                              <div class="col-md-12">
                                <label for="validationCustom04" class="form-label">Number of family members (except you)<font color = "red">*</font></label>
                            </div>
                            <div class="col-md-3 mt-1">
                              <label for="validationCustom04" class="form-label">Can participate in farm work<font color = "red">*</font></label>
                              <input type="text" class="form-control" id="validationTooltip01" name="farm_participate"
                                                              value = "<?php echo $farm_participate;?>" disabled>
                              <div class="invalid-feedback">
                                Please provide a name of spouse.
                              </div>
                          </div>

                            <div class="col-md-3 mt-1">
                              <label for="validationCustom04" class="form-label">Cannot do farm work<font color = "red">*</font></label>
                              <input type="text" class="form-control" id="validationTooltip01" name="cannot_participate"
                                              value = "<?php echo $cannot_participate;?>" disabled>
                              <div class="invalid-feedback">
                                Please provide a name of spouse.
                              </div>
                          </div>
                          <div class="col-md-3 mt-1">
                            <label for="validationCustom04" class="form-label">Male<font color = "red">*</font></label>
                            <input type="text" class="form-control" id="validationTooltip01" name="male"
                                              value = "<?php echo $male;?>" disabled>
                            <div class="invalid-feedback">
                              Please provide a name of spouse.
                            </div>
                        </div>
                        <div class="col-md-3 mt-1">
                          <label for="validationCustom04" class="form-label">Female<font color = "red">*</font></label>
                          <input type="text" class="form-control" id="validationTooltip01" name="female"
                                              value = "<?php echo $female;?>" disabled>
                          <div class="invalid-feedback">
                            Please provide a name of spouse.
                          </div>
                      </div>

                      <!--Source of Income-->
                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group mt-3">
                                  <label for="validationCustom04" name="source_income" class="form-label">Source of Income<font color="red">*</font></label>
                              </div>
                          </div>
                          <div class="form-row mt-1">
                              <?php
                              $resultType = $db->getSource_IncomeActive();
                              while ($row = mysqli_fetch_array($resultType)) {
                                  echo '<div class="form-check form-check-inline col-md-4">';
                                  echo '<input class="form-check-input" name="form_income" type="checkbox" id="source_income' . $row['source_id'] . '" value="' . $row['source_name'] . '">';
                                  echo '<label class="form-check-label" for="source_income' . $row['source_id'] . '">' . $row['source_name'] . '</label> ';
                                  echo '</div>';
                              }
                              ?>
                          </div>
                      </div>

                      <div class="col-md-6 ">
                        <label for="validationCustom04" class="form-label">Number of years in farming<font color = "red">*</font></label>
                        <input type="text" class="form-control" id="validationTooltip01" name="years_in_farming"
                                              value = "<?php echo $years_in_farming;?>" disabled>
                        <div class="invalid-feedback">
                          Please provide a number of years in farming.
                        </div>
                      </div>
                      <div class="col-md-6 ">
                      <label for="validationCustom04" class="form-label">Number of available workers<font color = "red">*</font></label>
                      <input type="text" class="form-control" id="validationTooltip01" name="available_workers"
                                              value = "<?php echo $available_workers;?>" disabled>
                      <div class="invalid-feedback">
                        Please provide a Number of available workers.
                      </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group mt-3">
                          <label for="validationCustom04" name="farm_tool">Available Farm Tools and Implements<font color = "red">*</font></label>    
                          </div>
                          <div class="form-row mt-1">
                              <?php
                              $resultType = $db->getFarmToolsActive();
                              while ($row = mysqli_fetch_array($resultType)) {
                                  echo '<div class="form-check form-check-inline col-md-4">';
                                  echo '<input class="form-check-input" name"farm_tools" type="checkbox" id="' . $row['tool_id'] . '" value="' . $row['tool_name'] . '">';
                                echo '<label class="form-check-label" for="' . $row['tool_id'] . '">' . $row['tool_name'] . '</label>';
                                echo '</div>';
                              }
                              ?>
                          </div>
                      </div>
                        </div>
                      </div>
                                           

                      <div class="my-4"></div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <input type="file" class="form-control w-50" name="id_pic" id="validationCustom05" disabled
            <label for="validationCustom04" class="form-label">ID Picture</label>
        </div>
    </div>

    <div class="col-md-6 d-flex justify-content-end">
        <div class="form-group">
            <input type="file" class="form-control w-100" name="intent" id="validationCustom05"disabled>
            <label for="validationCustom04" class="form-label">Letter of Intent</label>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <input type="file" class="form-control w-50" name="bypic" id="validationCustom05" disabled>
            <label for="validationCustom04" class="form-label">2x2 Picture</label>
        </div>
    </div>

    <div class="col-md-6 d-flex justify-content-end">
        <div class="form-group">
            <input type="file" class="form-control w-100" name="signature" id="validationCustom05" disabled>
            <label for="validationCustom04" class="form-label">Signature of Farmer Cooperator</label>
        </div>
    </div>
</div>


                      <div class="col-12 d-flex align-items-end justify-content-end gap-2">
                        <button type="submit" class="btn btn-warning" name="update">Update</button>
                        <button type="reset" class="btn btn-primary">Clear</button>
                        <a href ="ct.php" class="btn btn-danger">Cancel</a>
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

                  <section class="section">

                    <div class="row">
                      <div class="col-lg-12">
                         
                        <div class="card">
                          <div class="card-body">
                              <table class="table table-striped datatable">
                              <thead>
                                <tr>
                                  <th scope="col">Project Site Location</th>
                                  <!-- <th scope="col">Producer</th> -->
                                  <th scope="col">Area</th>
                                  <th scope="col">Topography</th>
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>

                              <?php
$result = $db->getSite($cocoonID);
while ($row = mysqli_fetch_array($result)) {
    echo '<tr>';
    echo '<td><a href="edit_site.php?site_id=' . $row['site_id'] . '">' . $row['location'] . '</a></td>';
    // Assuming 'name' is a field from the 'cocoon' table
    echo '<td>' . $row['area'] . '</td>';
    echo '<td>' . $row['topography_name'] . '</td>'; // Display topography_name
    echo '<td>';
    // Fix the view link, replace href with the correct URL
    echo '<a href="view_site.php?site_id=' . $row['site_id'] . '"><i class="ri-eye-line"></i></a>';
    // Fix the edit link
    echo '<a href="edit_site.php?site_id=' . $row['site_id'] . '"><i class="bi bi-pencil-square"></i></a>';
    echo '</td>';
    echo '</tr>';
}
?>

                              </table>
                            
                          </div>
                        </div>

                      </div>

                  </section>
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


