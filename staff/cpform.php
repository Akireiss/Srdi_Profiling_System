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
    <div class="mt-3 container">
        <div class="col-lg-12">
         <a href ="ct.html"></a>
      
          <div class="card md:w-full">
            <div class="card-body w-100">
        
              <h5 class="card-title">A. Personal Information</h5>
      
                 <div class="col-md-12 position-relative">
                  <label class="form-label">Project Site Location<font color = "red">*</font></label>
                  <input type="text" class="form-control" id="validationTooltip01" name = "project_site_location" required autofocus="autofocus">
                  <div class="invalid-tooltip">
                    The Project Site Location field is required.
                  </div>
                </div>
               
                <div class="col-md-4">
                  <label for="validationCustom02" class="form-label">Age</label>
                  <input type="text" class="form-control" id="validationCustom02"  required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>
                <div class="col-md-4 ">
                  <label for="validationCustom04" class="form-label">Sex</label>
                  <select class="form-select" aria-label="Default select example">
                    <option selected>Select Sex</option>
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                  </select>
              
                </div>
                <div class="col-md-12">
                  <label for="validationCustom03" class="form-label">Permanent Address</label>
                  <input type="text" class="form-control" id="validationCustom03" required>
                  <div class="invalid-feedback">
                    Please provide a valid city.
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="validationCustom04" class="form-label">Educational Attainment</label>
                  <select class="form-select" id="validationCustom04" required>
                
                  </select>
                  <div class="invalid-feedback">
                    Please select a valid state.
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="validationCustom05" class="form-label">Religion</label>
                  <input type="text" class="form-control" id="validationCustom05" required>
                  <div class="invalid-feedback">
                    Please provide a valid zip.
                  </div>
                </div>
      
                <div class="col-md-6">
                  <label for="validationCustom05" class="form-label">Civil Status</label>
                  <input type="text" class="form-control" id="validationCustom05" required>
                  <div class="invalid-feedback">
                    Please provide a civil status.
                  </div>
                  </div>
      
                  <div class="col-md-6">
                    <label for="validationCustom04" class="form-label">If married, name of spouse</label>
                    <input type="text" class="form-control" id="validationCustom05" required>
                    <div class="invalid-feedback">
                      Please provide a name of spouse.
                    </div>
                </div>
      
                
                <div class="col-md-12">
                  <label for="validationCustom04" class="form-label">Number of family members (except you)</label>
              </div>
              <div class="col-md-6 mt-1">
                <label for="validationCustom04" class="form-label">can participate in farm work</label>
                <input type="text" class="form-control" id="validationCustom05" required>
                <div class="invalid-feedback">
                  Please provide a name of spouse.
                </div>
            </div>
            <div class="col-md-6 mt-1">
              <label for="validationCustom04" class="form-label">cannot do farm work</label>
              <input type="text" class="form-control" id="validationCustom05" required>
              <div class="invalid-feedback">
                Please provide a name of spouse.
              </div>
          </div>
          <div class="col-md-6 mt-1">
            <label for="validationCustom04" class="form-label">male</label>
            <input type="text" class="form-control" id="validationCustom05" required>
            <div class="invalid-feedback">
              Please provide a name of spouse.
            </div>
        </div>
        <div class="col-md-6 mt-1">
          <label for="validationCustom04" class="form-label">female</label>
          <input type="text" class="form-control" id="validationCustom05" required>
          <div class="invalid-feedback">
            Please provide a name of spouse.
          </div>
      </div>
      
      <!--Source of Income-->
      <div class="row">
      <div class="col-md-12">
        <div class="form-group mt-3">
        <label for="education">Source of Income</label>
        
        <div class="form-row">
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="sale of agricultural products" value="Sale of agricultural products">
        <label class="form-check-label" for="sale of agricultiural products">Sale of agricultural products</label>
      </div>
      
      
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="employment" value="Employment">
        <label class="form-check-label" for="employment">Employment</label>
        </div>
      
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id=" business" value="Business">
        <label class="form-check-label" for="business">Business</label>
      </div>
      <!--End of Source of Income-->
      
      
      </div>
      </div>
      </div>
      
      <!-- Here -->
      
      <div class="col-md-6">
        <div class="form-group">
        <label for="education"></label>
        
        <div class="form-row">
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="contact labor" value="Contact labor">
        <label class="form-check-label" for="contact labor">Contact Labor</label>
      </div>
      
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="agricultural wage (por dia)" value="Agricultural wage (por dia)">
        <label class="form-check-label" for="gricultural wage (por dia)">Agricultural wage (por dia)</label>
        </div>
      
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="others (specify)" value="others (specify)">
        <label class="form-check-label" for="others (specify)">others (specify)</label>
      </div>
      </div>
      </div>
      </div>
      
      
      
      
      
      
      <div class="col-md-12 ">
        <label for="validationCustom04" class="form-label">Number of years in farming</label>
        <input type="text" class="form-control" id="validationCustom05" required>
        <div class="invalid-feedback">
          Please provide a number of years in farming.
        </div>
      </div>
      <div class="col-md-12 ">
      <label for="validationCustom04" class="form-label">Number of available workers</label>
      <input type="text" class="form-control" id="validationCustom05" required>
      <div class="invalid-feedback">
        Please provide a Number of available workers.
      </div>
      </div>
      
      
      
      
      </div>
      
      <div class="row">
        <div class="col-md-12">
          <div class="form-group mt-3">
          <label for="education">Available Farm Tools and Implements</label>
          
          <div class="form-row">
          <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="water pump" value="Water pump">
          <label class="form-check-label" for="water pump">Water pump</label>
        </div>
        
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="irrigation hose" value="Irrigation hose">
          <label class="form-check-label" for="irrigation hose">Irrigation hose</label>
          </div>
        
          <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="hand tractor" value="Hand tractor">
          <label class="form-check-label" for="Hand tractor">Hand tractor</label>
        </div>
      
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="draft animal" value="Draft animal">
          <label class="form-check-label" for="draft animal">Draft animal</label>
        </div>
        
        
        
        </div>
        </div>
        </div>
        
        <!-- Here -->
        
        <div class="col-md-6">
          <div class="form-group">
          <label for="education"></label>
          
          <div class="form-row">
          <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="knapsack sprayer" value="Knapsack sprayer">
          <label class="form-check-label" for="knapsack sprayer">Knapsack sprayer</label>
        </div>
        
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="thresher" value="Thresher">
          <label class="form-check-label" for="thresher">Thresher</label>
          </div>
        
          <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="farm tools (shovel, crowbar, etc.)" value="Farm tools (shovel, crowbar, etc.)">
          <label class="form-check-label" for="farm tools (shovel, crowbar, etc.)">Farm tools (shovel, crowbar, etc.)</label>
        </div>
      
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="plow" value="Plow">
          <label class="form-check-label" for="plow">Plow</label>
          </div>
      
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="others" value="Others">
            <label class="form-check-label" for="others">Others</label>
            </div>
      
        </div>
        </div>
        </div>
        
        
        
        
        
       
        </div>
        
        
        
        
        
        
        <h5 class="card-title px-2">B. Site Inspection</h5>
      
        <div class="row">
          <div class="col-md-12 mt-1 mb-3">
            <label for="validationCustom05" class="form-label">Farm Location/Address</label>
            <input type="text" class="form-control" id="validationCustom05" required>
            <div class="invalid-feedback">
              Please provide a Farm Location/Address.
            </div>
          </div>
        </div>
        
        <div class="row">
          
          <div class="col-md-3 mb-3">
            <div class="col-md-12">
              <label for="validationCustom04" class="form-label fw-bold">Land Types</label>
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
              <label for="validationCustom04" class="form-label fw-bold">Tenacy status</label>
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
          <div class="col-md-3">
            <label for="validationCustom04" class="form-label">Availability of reliable irrigation:</label>
        </div>
        <div class="col-md-3">
          <input class="form-check-input" type="checkbox" id="available" value="Available">
          <label class="form-check-label" for="available">Available</label>
        </div>
        
        <div class="col-md-5">
          <input class="form-check-input" type="checkbox" id="not available" value="Not Available">
          <label class="form-check-label" for="not available">Not Available</label>
        </div>
      <!--End of Irrigation-->
      
        <!--Water source-->
        <div class="col-md-3">
          <label for="validationCustom04" class="form-label">Water source:</label>
      </div>
      
      <div class="col-md-3">
        <input class="form-check-input" type="checkbox" id="irrigated" value="Irrigated">
        <label class="form-check-label" for="irrigated">Irrigated</label>
      </div>
      
      <div class="col-md-5">
        <input class="form-check-input" type="checkbox" id="rainfed" value="Rainfed">
        <label class="form-check-label" for="rainfed">Rainfed</label>
      </div>
      <!--End for Water Source-->
      
      <!--Irrigated-->
      <div class="col-md-3">
        <label for="validationCustom04" class="form-label">If irrigated, source of irrigation:</label>
      </div>
      
      <div class="col-md-3">
      <input class="form-check-input" type="checkbox" id="river" value="River">
      <label class="form-check-label" for="river">River</label>
      </div>
      
      <div class="col-md-3">
      <input class="form-check-input" type="checkbox" id="deep well" value="Deep well">
      <label class="form-check-label" for="deep well ">Deep well</label>
      </div>
      <div class="col-md-3">
        <input class="form-check-input" type="checkbox" id="NIA" value="NIA">
        <label class="form-check-label" for="NIA  ">NIA</label>
        </div>
      <!--End of Irrigated-->
      
      <!--Soil Type-->
      <div class="col-md-3">
        <label for="validationCustom04" class="form-label">Soil Type:</label>
      </div>
      
      <div class="col-md-3">
      <input class="form-check-input" type="checkbox" id="sandy" value="Sandy">
      <label class="form-check-label" for="sandy">Sandy</label>
      </div>
      
      <div class="col-md-3">
      <input class="form-check-input" type="checkbox" id="silty" value="silty">
      <label class="form-check-label" for="silty">Silty</label>
      </div>
      <div class="col-md-3">
        <input class="form-check-input" type="checkbox" id="Loam" value="loam">
        <label class="form-check-label" for="loam">Loam</label>
        </div>
        
      <!--End of Soil Type-->
      
      <!--Market road-->
      <div class="col-md-3">
        <label for="validationCustom04" class="form-label">Accessibility to farm to market road:</label>
      </div>
      
      <div class="col-md-3">
      <input class="form-check-input" type="checkbox" id="accessible" value="Accessible">
      <label class="form-check-label" for="accessible">Accessible</label>
      </div>
      
      <div class="col-md-5">
      <input class="form-check-input" type="checkbox" id="Not Accessible" value="Not Accessible">
      <label class="form-check-label" for="not accessible">Not Accessible</label>
      </div>
      <!--End of Market Road-->
      
      <!--Barangay road-->
      <div class="col-md-12 ">
        <label for="validationCustom04" class="form-label">Distance from the main road</label>
        <input type="text" class="form-control" id="validationCustom05" required>
        <div class="invalid-feedback">
         Error
        </div>
      </div>
      
      <div class="col-md-12 ">
        <label for="validationCustom04" class="form-label">Available land area for planting mulberry</label>
        <input type="text" class="form-control" id="validationCustom05" required>
        <div class="invalid-feedback">
         Error
        </div>
      </div>
      
      <div class="col-md-12 ">
        <label for="validationCustom04" class="form-label">DSignature of Farmer Cooperator</label>
        <input type="text" class="form-control" id="validationCustom05" required>
        <div class="invalid-feedback">
         Error
        </div>
      </div>
      
      
      <div class="col-md-12 ">
        <label for="validationCustom04" class="form-label">Remarks</label>
        <input type="text" class="form-control" id="validationCustom05" required>
        <div class="invalid-feedback">
         Error
        </div>
      </div>
      
      
      
      </div>
      </div>
            </div>
            </div>
        </div>
       
        
      
      <div class="card md:w-full">
        <div class="card-body w-100">
          <h5 class="card-title">Herewith the Monitoring and Evaluation Team, declares to have visited the proposed location for mulberry plantation field and found the site reasonably suited for mulberry leaf production and silkworm rearing/cocoon production.</h5>
      
      <div class="row">
        <div class="col-md-3 ">
          <label for="validationCustom04" class="form-label">Name</label>
          <select class="form-select" aria-label="Default select example">
            <option selected>Selec Name</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
        </div>
      
        <div class="col-md-3 ">
          <label for="validationCustom04" class="form-label">Position</label>
          <select class="form-select" aria-label="Default select example">
            <option selected>Select Position</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
      
        </div>
      
        <div class="col-md-3 ">
          <label for="validationCustom04" class="form-label">Signature</label>
          <input type="text" class="form-control" id="validationCustom05" required>
      
        </div>
      
        <div class="col-md-3 ">
          <label for="validationCustom04" class="form-label">Date</label>
          <input type="text" class="form-control" id="validationCustom05" required>
      
        </div>
      
      </div>
      
      </div>
      </div>
      
      
      
      
      
      
      
      
      
      
      
              
      
                <div class="col-12 d-flex justify-content-end p-3">
                  <button class="btn btn-primary" type="submit">Submit</button>
                </div>
                <div class="col-12 d-flex justify-content-end p-3">
                  <button class="btn btn-primary" type="submit">Cancel</button>
                </div>
            </div>
          </div>
      
          
      
        </div>
        </div>
          
      
        
      </body>
   





  </main><!-- End #main -->

  
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

</html>