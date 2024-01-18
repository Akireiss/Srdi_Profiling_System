<?php
session_start();
include "../db_con.php";
$db = new db;
if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
  }
if ($_SESSION['type_id'] == 2) {
    header("Location:  ../auth/login.php");
    exit(); 
}

if ($_SESSION['type_id'] == 3) {
  header("Location:  ../auth/login.php");
  exit(); 
}
?>

<!DOCTYPE html>
<html lang="en">

<body>
    <?php include '../includes/header.php' ?>
    <?php include '../includes/sidebar.php' ?>

    <main id="main" class="main">
        <div class="pagetitle">
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
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
<form action="download_backup.php" method="POST">
                            <!-- <h5 class="card-title">Association Information</h5> -->
                            <h5 class="card-title">Backup Database</h5>

                            <!-- Trigger the download link -->
                            <div class="d-flex align-items-center justify-content-center">
                          <button type="submit"
                           class="btn btn-success">Back Up Data</button>

                           </form>
                            </div>

                        </div>
                    </div>

                </div>

        </section>

    </main><!--END MAIN-->

    <?php include '../includes/footer.php' ?>
</body>

</html>
