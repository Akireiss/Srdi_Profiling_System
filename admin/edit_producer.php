<?php
session_start();
include '../db_con.php';
$db = new db;
if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
} else {
    if (isset($_POST['submit'])) {
        $user_id = $_SESSION['user_id'];
        $date_validation = $_POST['date_validation'];
        $name = $_POST['name'];
      //  $status = $_POST['status'];
        //Birthdate
        $birthdate = $_POST['birthdate'];
        //
        $age = $_POST['age'];
        $type = $_POST['type'];
        $sex = $_POST['sex'];
        $region = $_POST['region'];
        $province = $_POST['province'];
        $municipality = $_POST['municipality'];
        $barangay = $_POST['barangay'];
        $address = $_POST['address'];
        $education = $_POST['education'];
        $religion = $_POST['religion'];
        $civil_status = $_POST['civil_status'];
       $name_spouse   = $_POST['name_spouse'];
       $farm_participate   = $_POST['farm_participate'];
       $cannot_participate =$_POST['cannot_participate'];
       $male =$_POST['male'];
       $female =$_POST['female'];

       $years_in_farming =$_POST ['years_in_farming'];
       $available_workers =$_POST ['available_workers'];
      //  $farm_tool =$_POST ['farm_tool'];
       $intent =$_POST ['intent'];
       $signature =$_POST ['signature'];
       $id_pic =$_POST ['id_pic'];
       $bypic =$_POST ['bypic'];

      //  $source_incomes = isset($_POST['source_incomes']) ? $_POST['source_incomes'] : [];

   
      $source_income = $_POST ['source_income'];
      $farm_tool = $_POST ['farm_tool'];


      //  $selectedFarmTools = isset($_POST['farm_tools']) ? $_POST['farm_tool'] : [];
       // Convert the array into JSON
       $selectedFarmToolsJSON = json_encode($selectedFarmTools);
       //end
        $result = $db->addProducer($user_id, $name, $birthdate,
         $age, $type, $sex, $region, $province, $municipality, 
         $barangay, $address, $education, $religion, $civil_status, 
         $name_spouse, $farm_participate, $cannot_participate, $male,
          $female, $source_income, $years_in_farming, $available_workers,
          $farm_tool, $intent, $signature, $id_pic, $bypic, $date_validation);
        if ($result != 0) {
            $message = "Cocoon Producer Successfully Added!";
        } else {
          $message = "Produer Already Exist";
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
    <?php
             $result=$db->getProducerID($_GET['cocoon_id']);
            while($row=mysqli_fetch_object($result)){
                $cocoonID             = $row->cocoon_id;
                $date_validation      = $row->date_validation ;
                $name                 = $row->name;
                $status               = $row->status;
                $age                  = $row->age;
                $birthdate            = $row->birthdate;
                $type                 = $row->type;
                $sex                  = $row->sex;
                $region 	            = $row->region;
                $regName              = $row->regDesc;
                $province             = $row->province;
                $provName             = $row->provDesc;
                $municipality         = $row->municipality;
                $citymunName          = $row->citymunDesc;
                $barangay             = $row->barangay;
                $barangayName         = $row->brgyDesc;
                $street              = $row->street;
                $education            = $row->education;
                $religion             = $row->religion;
                $civil_status         = $row->civil_status;
                $name_spouse          = $row->name_spouse;
                $farm_participate     = $row->farm_participate;
                $cannot_participate   = $row->cannot_participate;
                $male                 = $row->male;
                $female               = $row->female;
                $source_income        = $row->source_income;//decode this
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
          </div>
            
      <section class="section dashboard mt-8">
        <div class="mt-3 container">
        <div class="col-lg-12">
          <div class="card md:w-full">
          <form action="#" method="post" enctype="multipart/form-data">
      
          <div class="card-body w-100">
  
        <h5 class="card-title">A. Personal Information</h5>

        <div class="col-md-2">
            <label for="validationCustom02" class="form-label">Date of Validation<font color = "red">*</font></label>
            <input type="date" class="form-control" id="validationTooltip01" name="date_validation"
                                         value = "<?php echo $date_validation;?>" >
            <div class="valid-feedback">
            The Date Validation field is required!
            </div>
          </div> 

        <div class="row mt-3 needs-validation md:w-full" novalidate>
          <div class="col-md-6">
          <label for="validationCustom01" class="form-label">Name<font color = "red">*</font></label>
                       
                       <input type="hidden" class="form-control" id="validationTooltip01" name="cocoon_id"
                                        value = "<?php echo $cocoonID;?>" >
                                        <input type="text" class="form-control" id="validationTooltip01" name="name"
                                       value = "<?php echo $name;?>" >
            <div class="valid-feedback">
            The Name field is required!
            </div>
          </div>
          
          <div class="col-md-6 position-relative">
            <label class="form-label">Status<font color="red">*</font></label>
              <div class="col-sm-12">
                <select class="form-select" aria-label="Default select example" id="validationTooltip03" name="status" required>
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
          
        <div class="row mt-3  needs-validation md:w-full" novalidate>
              <div class="col-md-3">
              <label for="validationCustom02" class="form-label">Age<font color="red">*</font></label>
                      <input type="text" class="form-control" id="age" name="age"   
                                    value = "<?php echo $age;?>" >
          <div class="valid-feedback">
          The Age field is required!
          </div>
      </div>

      <div class="col-md-3">
          <label for="validationCustom02" class="form-label">Birthdate<font color = "red">*</font></label>
                  <input type="date" class="form-control" id="validationTooltip01" name="birthdate"
                       value = "<?php echo $birthdate;?>" >
          <div class="valid-feedback">
          The Birthdate field is required!
          </div>
      </div>

          <div class="col-md-3 ">
          <label class="form-label">Type of Producer<font color="red">*</font></label>
                  <select class="form-select" aria-label="Default select example" id="validationTooltip03" name="type" 
                  
                      <option value="" >Select Type</option>
                      <option value="Seed Cocoon" <?php if ($type === "Seed Cocoon") echo "selected"; ?>>Seed Cocoon</option>
                      <option value="Commercial" <?php if ($type === "Commercial") echo "selected"; ?>>Commercial</option>
                  </select>
              <div class="invalid-tooltip">
                The Type of Producer field is required.
               </div>
          </div>
               
          
          <div class="col-md-3">
                  <label class="form-label">Sex<font color="red">*</font></label>
                  <select class="form-select" aria-label="Default select example" id="validationTooltip03" name="type" >
                      <option value="" disabled>Select Sex</option>
                      <option value="Male" <?php if ($type === "Male") echo "selected"; ?>>Male</option>
                      <option value="Female" <?php if ($type === "Female") echo "selected"; ?>>Female</option>
                  </select>
              </div>
          </div>
          
          <div class="row mt-4 needs-validation md:w-full" novalidate>
          <div class="col-md-3 position-relative">
                  <label class="form-label">Region<font color = "red">*</font></label>
                  <div class="col-sm-12">
                  <input type="hidden" class="form-control" id="validationTooltip03" name = "region" value = "<?php echo $regCode;?>">
                          <select class="form-select" aria-label="Default select example" name = "region" id="region" value = "<?php echo $regCode;?>">
                            <option value="<?php echo $regCode;?>" selected disabled="disabled"><?php echo $regName;?></option>
                            <?php
                            $resultType=$db->getRegion();
                            while($row=mysqli_fetch_array($resultType)){
                              echo '<option value="'.$row['regCode'].'">' . $row['regDesc'] . '</option>';
                            }
                            ?>    
                          </select>
                  </div>
                  <div class="invalid-feedback">
                  The Region field is required
                  </div>
                </div>

                <div class="col-md-3 position-relative">
                  <label class="form-label">Province<font color = "red">*</font></label>
                  <div class="col-sm-12">
                  <select class="form-select" aria-label="Default select example" name = "province" id="province" value = "<?php echo $provCode;?>" >
                              <option value="<?php echo $provCode;?>" selected disabled><?php echo $provName;?></option>  
                  </select>
                  </div>
                  <div class="invalid-feedback">
                  The Province field is required
                  </div>
                </div>

                <div class="col-md-3 position-relative">
                  <label class="form-label">City/Municipality<font color = "red">*</font></label>
                  <div class="col-sm-12">
                  <select class="form-select" aria-label="Default select example" name = "municipality" id="city" value = "<?php echo $citymunCode;?>" >
                                 <option value="<?php echo $citymunCode;?>" selected disabled><?php echo $citymunName;?></option>
                  </select>
                  </div>
                  <div class="invalid-feedback">
                  The City/Municiality field is required
                  </div>
                </div>

                <div class="col-md-3 position-relative">
                  <label class="form-label">Barangay<font color = "red">*</font></label>
                  <div class="col-sm-12">
                  <select class="form-select" aria-label="Default select example" name = "barangay" 
                                  id="barangay" value = "<?php echo $brgyCode;?>">
                                  <option value="<?php echo $brgyCode;?>" selected disabled><?php echo $barangayName;?></option>
                    </select>
                  </div>
                </div>
                <div class="invalid-feedback">
                The Barangay field is required
                </div> 
          </div>
         
          <div class="row mt-3  needs-validation md:w-full" novalidate>
          <div class="col-md-4">
          <label for="validationCustom04" class="form-label">House No./Street<font color="red">*</font></label>
          <input type="text" class="form-control" id="validationTooltip01" name="street" 
                                    value = "<?php echo $street;?>" >
            <div class="invalid-feedback">
            The House no. field is required
            </div>
          </div>

        
          <div class="col-md-4">
            <label for="validationCustom04" class="form-label">Educational Attainment<font color = "red">*</font></label>
            <select name="education" class="form-select" id="validationCustom04" required>
                            <option selected>Select Educational Attainment</option>
                            <?php
                            $resultType = $db->getEducationActive();
                            while ($row = mysqli_fetch_array($resultType)) {
                              $education_id = $row['education_id'];
                              $education_name = $row['education_name'];
                              $selected = ($topography_id == $educationy) ? 'selected' : '';
                              echo '<option value="' . $education_id . '" ' . $selected . '>' . $education_name . '</option>';
                            }
                            ?>
            </select>
            <div class="invalid-feedback">
                The Educational Attainment field is required
                </div> 
            </div>
            
          <div class="col-md-4">
            <label for="validationCustom05" class="form-label">Religion<font color = "red">*</font></label>
            <select class="form-select" id="validationCustom04" name="religion" required>
                            <option selected>Select Religion</option>
                            <?php
                            $resultType = $db->getReligionActive();
                            while ($row = mysqli_fetch_array($resultType)) {
                              $religion_id = $row['religion_id'];
                              $religion_name = $row['religion_name'];
                              $selected = ($religion_id == $religion) ? 'selected' : '';
                              echo '<option value="' . $religion_id . '" ' . $selected . '>' . $religion_name . '</option>';
                            }
                            ?>
                          </select>
              <div class="invalid-feedback">
                The Religion field is required
                </div> 
          </div>
          
          
          <div class="col-md-6 mt-3">
            <label for="validationCustom05" class="form-label">Civil Status<font color="red">*</font></label>
            <select class="form-select" id="validationCustom04" name="civil" >
                              <option selected>Select Civil Status</option>
                                <?php
                                    $resultType = $db->getCivilActive();
                                    $civil_id = $row['civil_id'];
                                    $civil_name = $row['civil_name'];
                                    $selected = ($civil_id == $civil) ? 'selected' : '';
                                    echo '<option value="' . $civil_id . '" ' . $selected . '>' . $civil_name . '</option>';
                                    
                                  ?>
             </select>
            <div class="invalid-feedback">
            The Civil Status field is required
            </div> 
          </div>
   

<div class="col-md-6 mt-3">
  <label for="validationCustom04" class="form-label">If married, name of spouse<font color="red">*</font></label>
  <input type="text" class="form-control" name="name_spouse" id="spouse" disabled>
  <div class="invalid-feedback">
  The Name of spouse field is required
  </div> 
</div>      
       
    <div class="col-md-6 mt-3">
        <label for="validationCustom04" class="form-label">Number of family members (except you)<font color="red">*</font></label>
    </div>
    <div class="col-md-6 mt-3">
        <label for="validationCustom04" class="form-label">Number of family can participate in farm work<font color="red">*</font></label>
    </div>

    <div class="col-md-3 mt-3">
        <label for="validationCustom04" class="form-label">Can participate in farm work<font color="red">*</font></label>
        <input type="text" class="form-control" id="validationTooltip01" name="farm_participate"
                                    value = "<?php echo $farm_participate;?>" >
      <div class="invalid-feedback">
        The Number of Can participate in farm work field is required
      </div> 
    </div>
    <div class="col-md-3 mt-3">
        <label for="validationCustom04" class="form-label">Cannot do farm work<font color="red">*</font></label>
        <input type="text" class="form-control" id="validationTooltip01" name="cannot_participate"
                                              value = "<?php echo $cannot_participate;?>" >
        <div class="invalid-feedback">
        The Number of Cannot participate in farm work field is required
      </div>   
    </div>
    <div class="col-md-3 mt-3">
        <label for="validationCustom04" class="form-label">Male<font color="red">*</font></label>
        <input type="text" class="form-control" id="validationTooltip01" name="male"
                                              value = "<?php echo $male;?>" >
        <div class="invalid-feedback">
        The Number of male can participate in farm work field is required
      </div>
    </div>
    <div class="col-md-3 mt-3">
        <label for="validationCustom04" class="form-label">Female<font color="red">*</font></label>
        <input type="text" class="form-control" id="validationTooltip01" name="female"
                                              value = "<?php echo $female;?>" >
        <div class="invalid-feedback">
        The Number of female can participate in farm work field is required
      </div>
    </div>

<!--Source of Income-->
<!-- First Checkbox -->
<div class="row">
    <div class="col-md-12">
        <div class="form-group mt-3">
        <label for="validationCustom04" name="source_income" class="form-label">Source of Income<font color="red">*</font></label>
                            </div>
                          </div>
                          <div class="form-row mt-1">
                            <?php
                            $resultType = $db->getSource_IncomeActive();
                            $selectedSources = $db->getSelectedSources($cocoonID); // Replace $cocoon_id with the actual cocoon ID

                            while ($row = mysqli_fetch_array($resultType)) {
                              $checked = in_array($row['source_id'], $selectedSources) ? 'checked' : '';

                              echo '<div class="form-check form-check-inline col-md-4">';
                              echo '<input class="form-check-input" name="form_income" type="checkbox" id="source_income'
                                . $row['source_id'] . '" value="' . $row['source_id'] . '" ' . $checked . '>';
                              echo '<label class="form-check-label" for="source_income' . $row['source_id'] . '">' . $row['source_name'] . '</label> ';
                              echo '</div>';
                            }
                            ?>
            </div>
            <div class="invalid-feedback">
                The Source of Income field is required
            </div>
        </div>


        <div class="col-md-6 mt-3 ">
          <label for="validationCustom04" class="form-label">Number of years in farming<font color = "red">*</font></label>
          <input type="text" class="form-control" id="validationTooltip01" name="years_in_farming"
                                                      value = "<?php echo $years_in_farming;?>" >
          <div class="invalid-feedback">
                The Number of years in farming field is required
            </div>
        </div>

        <div class="col-md-6 mt-3 ">
        <label for="validationCustom04" class="form-label">Number of available workers<font color = "red">*</font></label>
        <input type="text" class="form-control" id="validationTooltip01" name="available_workers"
                                              value = "<?php echo $available_workers;?>" >
        <div class="invalid-feedback">
        The Number of available workers field is required
        </div>
        </div>

      <div class="row">
        <div class="col-md-12">
          <div class="form-group mt-3">
          <label for="validationCustom04" name="farm_tool">Available Farm Tools and Implements<font color="red">*</font></label>
                            </div>
                            <div class="form-row mt-1">
                              <?php
                              $resultType = $db->getFarmToolsActive();
                              $selectedFarmTools = $db->getSelectedFarmTools($cocoonID); // Replace $cocoonID with the actual cocoon ID

                              while ($row = mysqli_fetch_array($resultType)) {
                                $checked = in_array($row['tool_id'], $selectedFarmTools) ? 'checked' : '';

                                echo '<div class="form-check form-check-inline col-md-4">';
                                echo '<input class="form-check-input" name="farm_tools[]" type="checkbox" id="' . $row['farm_tool_id'] . '" value="' . $row['farm_tool_id'] . '" ' . $checked . '>';
                                echo '<label class="form-check-label" for="' . $row['tool_id'] . '">' . $row['tool_name'] . '</label>';
                                echo '</div>';
                              }
                              ?>
                </div>

            </div>
            <div class="invalid-feedback">
            The Available farm tools field is required
            </div>
          </div>

<!-- Add some spacing here -->
        <div class="my-4"></div>

        <div class="row">
          <div class="col-md-6 ">
            <div class="form-group">
              <input type="file" class="form-control w-50" name="id_pic" id="validationCustom05" accept=".jpeg, .jpg">
              <label for="validationCustom04" class="form-label">ID Picture (JPEG only)</label>
            </div>
          </div>

          <div class="col-md-6 d-flex justify-content-end">
            <div class="form-group">
              <input type="file" class="form-control w-100" name="intent" id="validationCustom05" accept=".pdf">
              <label for="validationCustom04" class="form-label">Letter of Intent (PDF only)</label>
            </div>
          </div>
        </div>
              
         <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="file" class="form-control w-50" name="bypic" id="validationCustom05" accept=".jpeg, .jpg">
              <label for="validationCustom04" class="form-label">2x2 Picture (JPEG only)</label>
            </div>
          </div>

          <div class="col-md-6 d-flex justify-content-end">
            <div class="form-group">
              <input type="file" class="form-control w-100" name="signature" id="validationCustom06" accept=".jpeg, .jpg">
              <label for="validationCustom05" class="form-label">Signature of Farmer Cooperator (JPEG only)</label>
            </div>
          </div>
        </div>

        <div class="col-12 d-flex align-items-end justify-content-end gap-2">
           <button type="submit" class="btn btn-warning" name="submit">Save</button>
           <button type="reset" class="btn btn-primary">Clear</button>
           <a href ="ct.php" class="btn btn-danger">Cancel</a>
        </div>
    </div>
  </div>
  </form>
</div>

</div>
</div>
     
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

<script>
  // Get a reference to the select element
  var selectElement = document.getElementById("civil_status");
  
  // Get a reference to the spouse input element
  var spouseInput = document.getElementById("spouse");
  
  // Add an event listener to the select element
  selectElement.addEventListener("change", function() {
    // Get the selected option's data attribute
    var selectedOption = selectElement.options[selectElement.selectedIndex];
    var civilStatus = selectedOption.getAttribute("data-civil-status");

    // Check if the selected civil status is "Married"
    if (civilStatus === "Married") {
      // If "Married" is selected, enable the spouse input
      spouseInput.removeAttribute("disabled");
    } else {
      // If any other civil status is selected, disable the spouse input
      spouseInput.setAttribute("disabled", "disabled");
    }
  });
</script>
<!-- 
<script>
  document.getElementById("birthdate").addEventListener("change", function () {
    var birthdate = new Date(this.value);
    var today = new Date();
    var age = today.getFullYear() - birthdate.getFullYear();
    // Check if the birthday has occurred this year already
    if (today.getMonth() < birthdate.getMonth() || (today.getMonth() === birthdate.getMonth() && today.getDate() < birthdate.getDate())) {
      age--;
    }
    document.getElementById("age").value = age;
  });
</script> -->



<script>
    document.addEventListener("DOMContentLoaded", function() {
        const birthdateInput = document.getElementById('birthdateInput');
        const ageInput = document.getElementById('age');

        // Add an event listener to the birthdate input
        birthdateInput.addEventListener('input', calculateAge);

        function calculateAge() {
            const birthdate = new Date(birthdateInput.value);
            const currentDate = new Date();

            const age = currentDate.getFullYear() - birthdate.getFullYear();

            // Update the age input field with the calculated age
            ageInput.value = age;
        }
    });
</script>
    </body>
</html>
