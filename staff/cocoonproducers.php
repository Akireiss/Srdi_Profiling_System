<?php
  session_start();
  include '../db_con.php';
  $db = new db;
  if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">

  <body>
  <?php include '../includes/header.php' ?>
  <?php include '../includes/staff.sidebar.php' ?>
  
    <main id="main" class="main">
    <div class="pagetitle">
        <h1>Add Cocoon Producer</h1>
            </div><!-- End Page Title -->
            
      <section class="section dashboard mt-8">
  <div class="mt-3 container">
  <div class="col-lg-12">
    <div class="card md:w-full">
      <div class="card-body w-100">
  
        <h5 class="card-title">A. Personal Information</h5>

        <div class="row g-3  needs-validation md:w-full" novalidate>
          <div class="col-md-4">
            <label for="validationCustom01" class="form-label">Name<font color = "red">*</font></label>
            <input type="text" class="form-control" id="validationCustom01"  required>
            <div class="valid-feedback">
              Looks good!
            </div>
          </div>
          <div class="col-md-4">
            <label for="validationCustom02" class="form-label">Age<font color = "red">*</font></label>
            <input type="text" class="form-control" id="validationCustom02"  required>
            <div class="valid-feedback">
              Looks good!
            </div>
          </div>
          <div class="col-md-4 ">
            <label for="validationCustom04" class="form-label">Sex<font color = "red">*</font></label>
            <select class="form-select" aria-label="Default select example">
              <option selected>Select Sex</option>
              <option value="1">Male</option>
              <option value="2">Female</option>
            </select>
        
          </div>
          <div class="col-md-12">
            <label for="validationCustom03" class="form-label">Permanent Address<font color = "red">*</font></label>
            <input type="text" class="form-control" id="validationCustom03" required>
            <div class="invalid-feedback">
              Please provide a valid city.
            </div>
          </div>
          <div class="col-md-6">
            <label for="validationCustom04" class="form-label">Educational Attainment<font color = "red">*</font></label>
            <select class="form-select" id="validationCustom04" required>
                <option selected>Select Educational Attainment</option>
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
          <div class="col-md-6">
            <label for="validationCustom05" class="form-label">Religion<font color = "red">*</font></label>
            <select class="form-select" id="validationCustom04" required>
                <option selected>Select Religion</option>
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

          <div class="col-md-6">
            <label for="validationCustom05" class="form-label">Civil Status<font color = "red">*</font></label>
            <input type="text" class="form-control" id="validationCustom05" required>
            <div class="invalid-feedback">
              Please provide a civil status.
            </div>
            </div>

            <div class="col-md-6">
              <label for="validationCustom04" class="form-label">If married, name of spouse<font color = "red">*</font></label>
              <input type="text" class="form-control" id="validationCustom05" required>
              <div class="invalid-feedback">
                Please provide a name of spouse.
              </div>
          </div>

          
          <div class="col-md-12">
            <label for="validationCustom04" class="form-label">Number of family members (except you)<font color = "red">*</font></label>
        </div>
        <div class="col-md-6 mt-1">
          <label for="validationCustom04" class="form-label">Can participate in farm work<font color = "red">*</font></label>
          <input type="text" class="form-control" id="validationCustom05" required>
          <div class="invalid-feedback">
            Please provide a name of spouse.
          </div>
      </div>
      <div class="col-md-6 mt-1">
        <label for="validationCustom04" class="form-label">Cannot do farm work<font color = "red">*</font></label>
        <input type="text" class="form-control" id="validationCustom05" required>
        <div class="invalid-feedback">
          Please provide a name of spouse.
        </div>
    </div>
    <div class="col-md-6 mt-1">
      <label for="validationCustom04" class="form-label">Male<font color = "red">*</font></label>
      <input type="text" class="form-control" id="validationCustom05" required>
      <div class="invalid-feedback">
        Please provide a name of spouse.
      </div>
  </div>
  <div class="col-md-6 mt-1">
    <label for="validationCustom04" class="form-label">Female<font color = "red">*</font></label>
    <input type="text" class="form-control" id="validationCustom05" required>
    <div class="invalid-feedback">
      Please provide a name of spouse.
    </div>
</div>

<!--Source of Income-->
<div class="row">
    <div class="col-md-12">
        <div class="form-group mt-3">
            <label for="validationCustom04" class="form-label">Source of Income<font color="red">*</font></label>
        </div>
    </div>
    <div class="form-row mt-1">
        <?php
        $resultType = $db->getSource_IncomeActive();
        while ($row = mysqli_fetch_array($resultType)) {
            echo '<div class="form-check form-check-inline col-md-4">';
            echo '<input class="form-check-input" type="checkbox" id="source_income' . $row['source_id'] . '" value="' . $row['source_name'] . '">';
            echo '<label class="form-check-label" for="source_income' . $row['source_id'] . '">' . $row['source_name'] . '</label>';
            echo '</div>';
        }
        ?>
    </div>
</div>


<!-- 
<div class="col-md-6">
  <div class="form-group">
  <label for="education"></label>
</div>
</div> -->

<div class="col-md-12 ">
  <label for="validationCustom04" class="form-label">Number of years in farming<font color = "red">*</font></label>
  <input type="text" class="form-control" id="validationCustom05" required>
  <div class="invalid-feedback">
    Please provide a number of years in farming.
  </div>
</div>
<div class="col-md-12 ">
<label for="validationCustom04" class="form-label">Number of available workers<font color = "red">*</font></label>
<input type="text" class="form-control" id="validationCustom05" required>
<div class="invalid-feedback">
  Please provide a Number of available workers.
</div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="form-group mt-3">
    <label for="validationCustom04">Available Farm Tools and Implements<font color = "red">*</font></label>    
    </div>
    <div class="form-row mt-1">
        <?php
        $resultType = $db->getFarmToolsActive();
        while ($row = mysqli_fetch_array($resultType)) {
            echo '<div class="form-check form-check-inline col-md-4">';
            echo '<input class="form-check-input" type="checkbox" id="' . $row['tool_id'] . '" value="' . $row['tool_name'] . '">';
            echo '<label class="form-check-label" for="' . $row['tooll_id'] . '">' . $row['tool_name'] . '</label>';
            echo '</div>';
        }
        ?>
    </div>
</div>
  </div>

 
  
  <!-- Here -->
  
 
  </div>

  <!-- <h5 class="card-title px-2">B. Site Inspection</h5>

  <div class="row mt-2">
    <div class="col-md-12">
      <label for="validationCustom05" class="form-label">Farm Location/Address<font color ="red">*</font></label>
      <input type="text" class="form-control" id="validationCustom05" required>
      <div class="invalid-feedback">
        Please provide a Farm Location/Address.
      </div>
    </div>
  </div>
  
  <div class="row mt-3">
    
    <div class="col-md-3 mb-3">
      <div class="col-md-12">
        <label for="validationCustom04" class="form-label fw-bold">Land Types<font color = "red">*</font></label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" id="uplands" value="Uplands">
      <label class="form-check-label" for="uplands">Uplands</label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="lowlands" value="Lowlands">
      <label class="form-check-label" for="lowlands">Lowlands</label>
    </div>
    
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="hilly" value="Hilly">
      <label class="form-check-label" for="hilly">Hilly</label>
    </div>
    
    </div>
  
    <div class="col-md-3 mb-3">
      <div class="col-md-12">
        <label for="validationCustom04" class="form-label fw-bold">Tenacy status<font color = "red">*</font></label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="owned" value="Owned">
      <label class="form-check-label" for="owned">Owned</label>
    </div>
    
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="leased" value="Leased">
      <label class="form-check-label" for="leased">Leased</label>
    </div>
    
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="tenancy" value="Tenancy">
      <label class="form-check-label" for="tenancy">Tenancy</label>
    </div>

    </div>
  
    <div class="col-md-2 mb-3">
      <label for="validationCustom01" class="form-label fw-bold">Area (Ha)<font color = "red">*</font></label>
      <input type="text" class="form-control" id="validationCustom01" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
  
    <div class="col-md-2 mb-3">
      <label for="validationCustom02" class="form-label fw-bold">Crops Grown<font color = "red">*</font></label>
      <input type="text" class="form-control" id="validationCustom02" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
  
    <div class="col-md-2 mb-3">
      <label for="validationCustom03" class="form-label fw-bold">%Share<font color = "red">*</font></label>
      <input type="text" class="form-control" id="validationCustom03" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
<!-- 
    <!--Irrigation-->
    <!-- <div class="col-md-4">
      <label for="validationCustom04" class="form-label">Availability of reliable irrigation:<font color = "red">*</font></label>
  </div>
  <div class="col-md-3">
    <input class="form-check-input" type="checkbox" id="available" value="Available">
    <label class="form-check-label" for="available">Available</label>
  </div>
  
  <div class="col-md-3">
    <input class="form-check-input" type="checkbox" id="not available" value="Not Available">
    <label class="form-check-label" for="not available">Not Available</label>
  </div>
<!--End of Irrigation-->

  <!--Water source-->
  <!-- <div class="col-md-4">
    <label for="validationCustom04" class="form-label" style="margin-left: 30px;">Water source:<font color = "red">*</font></label>
  </div> --> 
  
  
<!-- 
<div class="col-md-3">
  <input class="form-check-input" type="checkbox" id="irrigated" value="Irrigated">
  <label class="form-check-label" for="irrigated">Irrigated</label>
</div>

<div class="col-md-4">
  <input class="form-check-input" type="checkbox" id="rainfed" value="Rainfed">
  <label class="form-check-label" for="rainfed">Rainfed</label>
</div> -->
<!--End for Water Source-->

<!--Irrigated-->
<!-- <div class="col-md-4">
  <label for="validationCustom04" class="form-label" style="margin-left: 30px">If irrigated, source of irrigation:<font color = "red">*</font></label>
</div>

<div class="col-md-3">
<input class="form-check-input" type="checkbox" id="river" value="River">
<label class="form-check-label" for="river">River</label>
</div>

<div class="col-md-3">
<input class="form-check-input" type="checkbox" id="deep well" value="Deep well">
<label class="form-check-label" for="deep well ">Deep well</label>
</div>
<div class="col-md-1">
  <input class="form-check-input" type="checkbox" id="NIA" value="NIA">
  <label class="form-check-label" for="NIA  ">NIA</label>
  </div> -->
<!--End of Irrigated-->

<!--Soil Type-->
<!-- <div class="col-md-4">
  <label for="validationCustom04" class="form-label">Soil Type:<font color = "red">*</font></label>
</div>

<div class="col-md-3">
<input class="form-check-input" type="checkbox" id="sandy" value="Sandy">
<label class="form-check-label" for="sandy">Sandy</label>
</div>

<div class="col-md-3">
<input class="form-check-input" type="checkbox" id="silty" value="silty">
<label class="form-check-label" for="silty">Silty</label>
</div>
<div class="col-md-1">
  <input class="form-check-input" type="checkbox" id="Loam" value="loam">
  <label class="form-check-label" for="loam">Loam</label>
  </div> -->
  
<!--End of Soil Type-->

<!--Market road-->
<!-- <div class="col-md-4">
  <label for="validationCustom04" class="form-label">Accessibility to farm to market road:<font color = "red">*</font></label>
</div>

<div class="col-md-3">
<input class="form-check-input" type="checkbox" id="accessible" value="Accessible">
<label class="form-check-label" for="accessible">Accessible</label>
</div>

<div class="col-md-5">
<input class="form-check-input" type="checkbox" id="Not Accessible" value="Not Accessible">
<label class="form-check-label" for="not accessible">Not Accessible</label>
</div> -->
<!--End of Market Road-->

<!--Barangay road-->

<!-- <div class="col-md-12 mt-6" style="margin-left: -25px;">    
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
  </div> -->
<!-- </div> -->



<div class="col-md-12 d-flex justify-content-end">
  <div class="form-group">
    <input type="text" class="form-control w-100" id="validationCustom05" required>
    <label for="validationCustom04" class="form-label">Signature of Farmer Cooperator</label>
  </div>
  
  <div class="invalid-feedback">
    Error
  </div>
</div>

<!-- 
<div class="col-md-12">
  <label for="validationCustom04" class="form-label">Remarks<font color = "red">*</font></label>
  <textarea class="form-control" id="validationCustom05" required></textarea>
  <div class="invalid-feedback">
    Error
  </div>
</div>

<div class="row mt-5">
<div class="col-md-12">
  <label for="validationCustom04" class="form-label">Herewith the Monitoring and Evaluation Team, declares to have visited the proposed location for mulberry plantation field and found the site reasonably suited for mulberry leaf production and silkworm rearing/cocoon production.</label>
</div>
<div class="row mt-3">
  <div class="col-md-3 ">
    <label for="validationCustom04" class="form-label">Name<font color = "red">*</font></label>
    <select class="form-select" aria-label="Default select example">
      <option selected>Selec Name</option>
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
    <label for="validationCustom04" class="form-label">Signature<font color = "red">*</font></label>
    <input type="text" class="form-control" id="validationCustom05" required>

  </div>

  <div class="col-md-3 ">
    <label for="validationCustom04" class="form-label">Date<font color = "red">*</font></label>
    <input type="text" class="form-control" id="validationCustom05" required>

  </div>

</div> -->

<div class="container">
  <div class="row mt-3">
    <div class="col-12">
                  <button type="submit" class="btn btn-warning" name="submit">Save Producer</button>
                  <button type="reset" class="btn btn-primary">Cancel</button>
                </div>
    </div>
  </div>
</div>

</div>
</div>
</div>
</div>
</div>
</div>
</div> --> -->
 
</section>
    </main> <!--END MAIN-->
   
  ======= Footer =======
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>SRDI</span></strong>. All Rights Reserved 2023
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Developed by DMMMSU-SRDI</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../public/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../public/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../public/assets/vendor/echarts/echarts.min.js"></script>
  <script src="../public/assets/vendor/quill/quill.min.js"></script>
  <script src="../public/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../public/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../public/assets/vendor/php-email-form/validate.js"></script>


  <link href="../public/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main JS File -->
  <script src="../public/assets/js/main.js"></script>
  </body>