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

       $source_incomes = isset($_POST['source_incomes']) ? $_POST['source_incomes'] : [];

       $source_income = json_encode($source_incomes);

       $selectedFarmTools = isset($_POST['farm_tools']) ? $_POST['farm_tools'] : [];
       // Convert the array into JSON
       $selectedFarmToolsJSON = json_encode($selectedFarmTools);
       //end
        $result = $db->addProducer($user_id, $name, $birthdate,
         $age, $type, $sex, $region, $province, $municipality, 
         $barangay, $address, $education, $religion, $civil_status, 
         $name_spouse, $farm_participate, $cannot_participate, $male,
          $female, $source_income, $years_in_farming, $available_workers,
          $selectedFarmToolsJSON, $intent, $signature, $id_pic, $bypic, $date_validation);
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
    <div class="pagetitle">
        <h1>Add Cocoon Producer</h1>
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
            </div>
            
      <section class="section dashboard mt-8">
  <div class="mt-3 container">
  <div class="col-lg-12">
    <div class="card md:w-full">
    <form action="#" method="post" enctype="multipart/foFrm-data">

      <div class="card-body w-100">
  
        <h5 class="card-title">A. Personal Information</h5>

        <div class="col-md-2">
            <label for="validationCustom02" class="form-label">Date of Validation<font color = "red">*</font></label>
            <input type="date" class="form-control" id="validationCustom02" name="date_validation" required>
            <div class="valid-feedback">
              Looks good!
            </div>
          </div> 

        <div class="row mt-3 needs-validation md:w-full" novalidate>
          <div class="col-md-12">
            <label for="validationCustom01" class="form-label">Name<font color = "red">*</font></label>
            <input type="text" class="form-control" id="validationCustom01" name="name" required>
            <div class="valid-feedback">
              Looks good!
            </div>
          </div>

        </div>
          
        <div class="row mt-3  needs-validation md:w-full" novalidate>
          <div class="col-md-3">
            <label for="validationCustom02" class="form-label">Age<font color = "red">*</font></label>
            <input type="text" class="form-control" id="validationCustom02" name="age" >
            <div class="valid-feedback">
              Looks good!
            </div>
          </div>
          <div class="col-md-3">
            <label for="validationCustom02" class="form-label">Birthdate<font color = "red">*</font></label>
            <input type="date" class="form-control" id="validationCustom02" name="birthdate" >
            <div class="valid-feedback">
              Looks good!
            </div>
          </div>
          <div class="col-md-3 ">
                  <label class="form-label">Type of Producer<font color="red">*</font></label>
                 
                    <select class="form-select" aria-label="Default select example" id="validationTooltip03" name="type" >
                      <option value="" selected disabled>Select Status</option>
                      <option value="Seed Cocoon">Seed Cocoon</option>
                      <option value="Commercial">Commercial</option>
                    </select>
                    
                    <div class="invalid-tooltip">
                      The Status field is required.
                    </div>
                  </div>
               
          
          <div class="col-md-3 ">
            <label for="validationCustom04" class="form-label">Gender<font color = "red">*</font></label>
            <select class="form-select" name="sex"  aria-label="Default select example" >
              <option selected>Select Sex</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          </div>
          </div>
          
          <div class="row mt-4 needs-validation md:w-full" novalidate>
          <div class="col-md-3 position-relative">
                  <label class="form-label">Region<font color = "red">*</font></label>
                  <div class="col-sm-12">
                    <select class="form-select" aria-label="Default select example" name = "region" id="region" >
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
                    <select class="form-select" aria-label="Default select example" name = "province" id="province" >
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
                
          </div>
         
          <div class="row mt-3  needs-validation md:w-full" novalidate>
          <div class="col-md-4">
            <label for="validationCustom03" class="form-label">House no./House Street<font color = "red">*</font></label>
            
            <input type="text" name="address" class="form-control" id="validationCustom03" >
            <div class="invalid-feedback">
              Please provide a valid city.
            </div>
          </div>

        
          <div class="col-md-4">
            <label for="validationCustom04" class="form-label">Educational Attainment<font color = "red">*</font></label>
            <select name="education" class="form-select" id="validationCustom04" >
                <option  selected>Select Educational Attainment</option>
                <?php
                      $resultType=$db->getEducationActive();
                      while($row=mysqli_fetch_array($resultType)){
                        echo '<option value="'.$row['education_id'].'">' . $row['education_name'] . '</option>';
                      }
                     
                      ?>
              </select>
            
            <div class="invalid-feedback">
              Please select a valid state.
            </div>
            </div>
            
          <div class="col-md-4">
            <label for="validationCustom05" class="form-label">Religion<font color = "red">*</font></label>
            <select class="form-select" id="validationCustom04" name="religion" >
            <option  selected>Select Religion</option>
                <?php
                      $resultType=$db->getReligionActive();
                      while($row=mysqli_fetch_array($resultType)){
                        echo '<option value="'.$row['religion_id'].'">' . $row['religion_name'] . '</option>';
                      }
                      ?>
              </select>
            <div class="invalid-feedback">
              Please provide a valid zip.
            </div>
          </div>
          
          
          <div class="col-md-6 mt-3">
  <label for="validationCustom05" class="form-label">Civil Status<font color="red">*</font></label>
  <select class="form-select" id="civil_status" name="civil_status" >
    <option selected>Select Civil Status</option>
    <?php
    $resultType = $db->getCivilActive();
    while ($row = mysqli_fetch_array($resultType)) {
      echo '<option value="' . $row['civil_id'] . '" data-civil-status="' . $row['civil_name'] . '">' . $row['civil_name'] . '</option>';
    }
    ?>
  </select>
  <div class="invalid-feedback">
    Please provide a civil status.
  </div>
</div>
   

<div class="col-md-6 mt-3">
  <label for="validationCustom04" class="form-label">If married, name of spouse<font color="red">*</font></label>
  <input type="text" class="form-control" name="name_spouse" id="spouse" disabled>
  <div class="invalid-feedback">
    Please provide a name of spouse.
  </div>
</div>



          
       
    <div class="col-md-12 mt-3">
        <label for="validationCustom04" class="form-label">Number of family members (except you)<font color="red">*</font></label>
    </div>
    <div class="col-md-3 mt-3">
        <label for="validationCustom04" class="form-label">Can participate in farm work<font color="red">*</font></label>
        <input type="text" class="form-control" name="farm_participate" id="farm_participate">
        <div class="invalid-feedback">
            Please provide the number of family members who can participate in farm work.
        </div>
    </div>
    <div class="col-md-3 mt-3">
        <label for="validationCustom04" class="form-label">Cannot do farm work<font color="red">*</font></label>
        <input type="text" class="form-control" name="cannot_participate" id="cannot_participate">
        <div class="invalid-feedback">
            Please provide the number of family members who cannot do farm work.
        </div>
    </div>
    <div class="col-md-3 mt-3">
        <label for="validationCustom04" class="form-label">Male<font color="red">*</font></label>
        <input type="text" class="form-control" name="male" id="male" >
        <div class="invalid-feedback">
            Please provide the number of male family members.
        </div>
    </div>
    <div class="col-md-3 mt-3">
        <label for="validationCustom04" class="form-label">Female<font color="red">*</font></label>
        <input type="text" class="form-control" name="female" id="female" >
        <div class="invalid-feedback">
            Please provide the number of female family members.
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
            echo '<div class="form-check form-check-inline col-md-3">';
            echo '<input class="form-check-input" name="source_incomes[]" type="checkbox" id="source_income' . $row['source_id'] . '" value="' . $row['source_id'] . '">';
            echo '<label class="form-check-label" for="source_income' . $row['source_id'] . '">' . $row['source_name'] . '</label>';
            echo '</div>';
        }
        ?>
    </div>
</div>


<div class="col-md-6 mt-3 ">
  <label for="validationCustom04" class="form-label">Number of years in farming<font color = "red">*</font></label>
  <input type="text" class="form-control" name="years_in_farming" id="validationCustom05">
  <div class="invalid-feedback">
    Please provide a number of years in farming.
  </div>
</div>
<div class="col-md-6 mt-3 ">
<label for="validationCustom04" class="form-label">Number of available workers<font color = "red">*</font></label>
<input type="text" class="form-control" name="available_workers" id="validationCustom05" >
<div class="invalid-feedback">
  Please provide a Number of available workers.
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
    while ($row = mysqli_fetch_array($resultType)) {
        echo '<div class="form-check form-check-inline col-md-3">';
        echo '<input class="form-check-input" name="farm_tools[]" type="checkbox" id="' . $row['tool_id'] . '" value="' . $row['tool_id'] . '">';
        echo '<label class="form-check-label" for="' . $row['tool_id'] . '">' . $row['tool_name'] . '</label>';
        echo '</div>';
    }
    ?>
</div>

  </div>
</div>

<!-- Add some spacing here -->
              <div class="my-4"></div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="file" class="form-control w-50" name="id_pic" id="validationCustom05">
                    <label for="validationCustom04" class="form-label">ID Picture</label>
                  </div>
                </div>

                <div class="col-md-6 d-flex justify-content-end">
                  <div class="form-group">
                    <input type="file" class="form-control w-100" name="intent" id="validationCustom05">
                    <label for="validationCustom04" class="form-label">Signature of Farmer Cooperator</label>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="file" class="form-control w-50" name="bypic" id="validationCustom05">
                    <label for="validationCustom04" class="form-label">2x2 Picture</label>
                  </div>
                </div>

                <div class="col-md-6 d-flex justify-content-end">
                  <div class="form-group">
                    <input type="file" class="form-control w-100" name="signature" id="validationCustom05">
                    <label for="validationCustom04" class="form-label">Signature of Farmer Cooperator</label>
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


    </body>
</html>
