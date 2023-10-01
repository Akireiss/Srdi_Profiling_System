
<?php 
    $conn = new mysqli('localhost', 'root', '', 'profiling_system');

    if ($conn->connect_error) {
        die("Could not connect to MySQL: " . $conn->connect_error);
    }
?>
<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
 integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">



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


<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="../auth/ResetController.php" method="post">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-success" type="submit">Send Reset Verification</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>
