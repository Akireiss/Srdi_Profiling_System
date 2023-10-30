<?php
session_start();
include "../db_con.php";
$db = new db;

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $resultCheckLogin = $db->checkLogin($username, $password);

    if ($resultCheckLogin != 0) {
        if ($_SESSION['type_id'] == 1) {
          
            header("Location: ../admin/dashboard.php");
            exit(); 
        } elseif ($_SESSION['type_id'] == 2) {
            header("Location: ../staff/dashboard.php");
            exit(); 
        }
        
    } else {
        $message = "Invalid Credentials!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="../public/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../public/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <title>Document</title>
</head>

<body>
  <main>
  <section class="vh-100" style="background-color: f5f1fff2;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-8">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block my-auto">
              <img src="../public/assets/img/dmmmsu_srdi_logo.png"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6  col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

             

                <div class="pagetitle">

              <?php
                if(isset($message)){
              ?>
                  <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                      <?php
                        echo $message;
                      ?>
                  </div>
              <?php
                }
              ?>

              </div><!-- End Page Title -->
               <form class="row g-3 " action = "#" enctype="multipart/form-data" method="POST">
                  <div class="form-outline mb-4">  
                    <label class="form-label" for="form2Example17">Username</label>
                    <input type="text" id="validationTooltip03" name = "username" class="form-control" required autofocus="autofocus" >
             
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example27">Password</label>
                    <input type="password" id="form2Example27" class="form-control" name = "password" required>
                    <div class="mt-1">
                      <input type="checkbox" name="showpass" id="showpass" onclick="showPassword()">
                      <label for="showpass">Show password</label>
                    </div>
                    <div class="invalid-feedback">Please enter your password!</div>
                  </div>

              
                  <div class="col-12">
                      <button class="btn btn-warning w-100" type="submit" name="submit">Login</button>
                    </div>
                    
                    <div class="row mt-2">
                      <div class="col-12 text-left">
                        <a href="verification.php" id="forgot-password-link">Forgot Password?</a>
                      </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</main>

<script>
        function showPassword() {
            var passwordInput = document.getElementById("form2Example27");
            var showPassCheckbox = document.getElementById("showpass");

            if (showPassCheckbox.checked) {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }
    </script>

















