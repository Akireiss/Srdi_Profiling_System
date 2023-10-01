<?php
  session_start();
  include 'db_con.php';
  $db = new db;
  if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">

<body>
  <?php include 'includes/header.php' ?>
<?php include 'includes/sidebar.php' ?>

  <main id="main" class="main">
        <div class="pagetitle">
      <h1>Edit Beekeeper | Alfredo Bacagan</h1>
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
                  <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Apiary</button>
                </li>
              </ul>
              <div class="tab-content pt-2" id="borderedTabContent">
                <div class="tab-pane fade show active" id="bordered-home" role="tabpanel" aria-labelledby="home-tab">
                  <!-- Custom Styled Validation with Tooltips -->
                    <form class="row g-3 needs-validation" novalidate action = "#" enctype="multipart/form-data" method="POST">
                      <!-- Beekeeper ID -->
                      <div class="col-md-4 position-relative">
                        <label class="form-label">Beekeeper ID<font color = "red">*</font></label>
                        <input type="text" class="form-control" id="validationTooltip01" name = "beekeeper_id" value = "121" readonly required>
                        <div class="invalid-tooltip">
                          The Beekeeper ID field is required.
                        </div>
                      </div>
                      <!-- Beekeeper Name -->
                      <div class="col-md-8 position-relative">
                        <label class="form-label">Beekeeper Name<font color = "red">*</font></label>
                        <input type="text" class="form-control" id="validationTooltip02" name = "beekeeper_name" value = "Alfredo Bacagan" required autofocus="autofocus">
                        <div class="invalid-tooltip">
                          The Beekeeper Name field is required.
                        </div>
                      </div>
                      <!-- Beekeeper Gender -->
                      <div class="col-md-3 position-relative">
                        <label class="form-label">Gender<font color = "red">*</font></label>
                        <div class="col-sm-12">
                          <select class="form-select" aria-label="Default select example" name = "gender" value = "Male" id="validationTooltip03" required>
                            <option value="Male" selected>Male</option><option value="Female">Female</option>                          </select>
                          <div class="invalid-tooltip">
                            The Gender field is required.
                          </div>
                        </div>
                      </div>
                      <!-- Beekeeper Birthdate -->
                       <div class="col-md-3 position-relative">
                        <label class="form-label">Birthdate<font color = "red">*</font></label>
                        <div class="col-sm-12">
                          <input type="date" class="form-control" id="validationTooltip03" name = "beekeeper_bdate" value = "0000-00-00">
                          <div class="invalid-tooltip">
                            The Birth Date field is required.
                          </div>
                        </div>
                      </div>
                      <!-- Beekeeper Nationality -->
                      <div class="col-md-3 position-relative">
                        <label class="form-label">Nationality<font color = "red">*</font></label>
                        <div class="col-sm-12">
                          <input type="hidden" class="form-control" id="validationTooltip03" name = "beekeeper_nationality" value = "1" required>
                          <select class="form-select" aria-label="Default select example" name = "beekeeper_nationality" value = "1" id="validationTooltip03" required>
                            <option value="1" selected disabled>Filipino</option>
                            <option value="1">Filipino</option><option value="2">American</option><option value="3">Chinese</option><option value="4">Korean</option><option value="5">Japanese</option>                          </select>
                          <div class="invalid-tooltip">
                            The Nationality field is required.
                          </div>
                        </div>
                      </div>
                      <!-- Beekeeper Education -->
                      <div class="col-md-3 position-relative">
                        <label class="form-label">Educational Attainment<font color = "red">*</font></label>
                        <div class="col-sm-12">
                          <input type="hidden" class="form-control" id="validationTooltip03" name = "beekeeper_education" value = "3" required>
                          <select class="form-select" aria-label="Default select example" name = "beekeeper_education" value = "3" required id="validationTooltip03" >
                            <option value="3" selected disabled>College Graduate</option>
                            <option value="1">Elementary Graduate</option><option value="2">High School Graduate</option><option value="3">College Graduate</option><option value="4">Masters Graduate</option><option value="5">Doctorate Graduate</option>                          </select>
                          <div class="invalid-tooltip">
                            The Nationality field is required.
                          </div>
                        </div>
                      </div>

                      <!-- Beekeeper Street Address -->
                      <div class="col-md-3 position-relative">
                        <label class="form-label">Region<font color = "red">*</font></label>
                        <div class="col-sm-12">
                          <input type="hidden" class="form-control" id="validationTooltip03" name = "beekeeper_region" value = "14" required>
                          <select class="form-select" aria-label="Default select example" name = "beekeeper_region" id="region" value = "14" required>
                            <option value="14" selected disabled>CORDILLERA ADMINISTRATIVE REGION</option>
                            <option value="01">REGION I</option><option value="02">REGION II</option><option value="03">REGION III</option><option value="04">REGION IV-A</option><option value="17">REGION IV-B</option><option value="05">REGION V</option><option value="06">REGION VI</option><option value="07">REGION VII</option><option value="08">REGION VIII</option><option value="09">REGION IX</option><option value="10">REGION X</option><option value="11">REGION XI</option><option value="12">REGION XII</option><option value="13">NATIONAL CAPITAL REGION</option><option value="14">CORDILLERA ADMINISTRATIVE REGION</option><option value="15">AUTONOMOUS REGION IN MUSLIM MINDANAO</option><option value="16">REGION XIII</option>                          </select>
                          <div class="invalid-tooltip">
                            The Region field is required.
                          </div>
                        </div>
                      </div>

                      <div class="col-md-3 position-relative">
                        <label class="form-label">Province<font color = "red">*</font></label>
                        <div class="col-sm-12">
                          <input type="hidden" class="form-control" id="validationTooltip03" name = "beekeeper_province" value = "1444" required>
                          <select class="form-select" aria-label="Default select example" name = "beekeeper_province" id="province" value = "1444" required>
                            <option value="1444" selected disabled>MOUNTAIN PROVINCE</option>
                          </select>
                          <div class="invalid-tooltip">
                            The Province field is required.
                          </div>
                        </div>
                      </div>

                      <div class="col-md-3 position-relative">
                        <label class="form-label">City/Municipality<font color = "red">*</font></label>
                        <div class="col-sm-12">
                          <input type="hidden" class="form-control" id="validationTooltip03" name = "beekeeper_municipality" value = "144409" required>
                          <select class="form-select" aria-label="Default select example" name = "beekeeper_municipality" id="city" value = "144409" required>
                            <option value="144409" selected disabled>SAGADA</option>
                          </select>
                          <div class="invalid-tooltip">
                            The City/Municipality field is required.
                          </div>
                        </div>
                      </div>

                      <div class="col-md-3 position-relative">
                        <label class="form-label">Barangay<font color = "red">*</font></label>
                        <div class="col-sm-12">
                          <input type="hidden" class="form-control" id="validationTooltip03" name = "beekeeper_barangay" value = "144409014" required>
                          <select class="form-select" aria-label="Default select example" name = "beekeeper_barangay" id="barangay" value = "144409014" required>
                            <option value="144409014" selected disabled>Poblacion (Patay)</option>
                          </select>
                          <div class="invalid-tooltip">
                            The Barangay field is required.
                          </div>
                        </div>
                      </div>

                      <div class="col-md-3 position-relative">
                        <label class="form-label">Street</label>
                        <input type="text" class="form-control" id="validationTooltip03" name = "beekeeper_street" value = "">
                        <div class="invalid-tooltip">
                          The Street Address field is required.
                        </div>
                      </div>
                  
                      <!-- Beekeeper Association -->
                      <div class="col-md-3 position-relative">
                            <label class="form-label">Association<font color = "red">*</font></label>
                            <div class="col-sm-12">
                              <select class="form-select" aria-label="Default select example" name = "beekeeper_association" value = "" id="validationTooltip03">
                                 <option value="" disabled></option>
                                <option value="1">Bacnotan Beekeepers Association</option><option value="2">Sample Beekeepers Association</option>                              </select>
                              <div class="invalid-tooltip">
                                The Association field is required.
                              </div>
                            </div>
                      </div>
                      <!-- Beekeeper Barangay Address -->
                      <div class="col-md-3 position-relative">
                        <label class="form-label">Contact Number<font color = "red">*</font></label>
                        <input type="text" class="form-control" id="validationTooltip03" maxlength = "11" name = "beekeeper_number" value = "">
                        <div class="invalid-tooltip">
                          The Contact Number field is required.
                        </div>
                      </div>
                      <!-- Beekeeper Gender -->
                      <div class="col-md-3 position-relative">
                        <label class="form-label">Active<font color = "red">*</font></label>
                        <div class="col-sm-12">
                          <select class="form-select" aria-label="Default select example" name = "beekeeper_status" value = "Active" id="validationTooltip03" required>
                                <option value="Active" selected>Active</option><option value="Inactive">Inactive</option>                              </select>
                          <div class="invalid-tooltip">
                            The Active field is required.
                          </div>
                        </div>
                      </div>

                      <div class="col-12">
                        <button type="submit" class="btn btn-warning" name="update">Update Profile</button>
                        <button type="reset" class="btn btn-primary">Cancel</button>
                      </div>
                      </form><!-- End Custom Styled Validation with Tooltips -->
                </div>
                <div class="tab-pane fade" id="bordered-profile" role="tabpanel" aria-labelledby="profile-tab">
                  <!--  -->
                  <div class="pagetitle">
        <!--       <h1>Beekeepers</h1><br> -->
                    <div class="row">
                      <div class="col-lg-8">
                        <a href = "add_apiary.php?id=121">
                          <button type="button" class="btn btn-warning">Add Apiary</button>
                        </a>
                      </div>
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
                                    <th scope="col">Apiary Location</th>
                                                                        <th scope="col">Area Size</th>
                                    <th scope="col">Topography</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                                                  </tbody>
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

<script src="../assets/js/jquery.min.js"></script>
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

  </main><!-- End #main -->

  <?php include 'includes/footer.php' ?>
 </body>
</html>