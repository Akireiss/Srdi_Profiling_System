<?php
session_start();
include "../db_con.php";
$db = new db();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
} else {
    if (isset($_POST['submit'])) {
        $site_id = $_POST['site_id'];
        $producer_id = $_POST['producer_id'];
        $production_date = $_POST['production_date'];
        $total_production = $_POST['total_production'];
        $p_income = $_POST['p_income'];
        $p_cost = $_POST['p_cost'];
        
     

        $total = $p_income - $p_cost;
        $n_income = $total;

      
        $p_income_formatted = number_format($p_income, 2);
        $p_cost_formatted = number_format($p_cost, 2);

        $n_income = $p_income - $p_cost;



        $result = $db->addProduction($site_id, $producer_id, $production_date, $total_production, $p_income, $p_cost, $n_income);

        if ($result != 0) {
            $message = "Production Successfully Added!";
        } else {
            $message = "Production Already Exists!";
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
      <h1>Add Production</h1>
          </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
           
          <div class="card">
            <div class="card-body">
              
              <h5 class="card-title"></h5>

                            <!-- Custom Styled Validation with Tooltips -->
                            <form class="row g-3 needs-validation" novalidate action = "#" enctype="multipart/form-data" method="POST">

                            <div class="col-md-12 position-relative">
                  <label class="form-label">Project Site Location<font color = "red">*</font></label>
                 <select name="site_id" class="form-select" id="validationCustom04" required>
                    <option selected>Select Project Site Location</option>
                    <?php
                        $resultType = $db->getSiteLocationActive();
                        while ($row = mysqli_fetch_array($resultType)) {
                            $site_id = $row['site_id'];
                            $location = $row['location'];
                            $selected = ($site_id == $site) ? 'selected' : '';
                            echo '<option value="' . $site_id . '" ' . $selected . '>' . $location . '</option>';
            }
            ?>
    </select>
                  <div class="invalid-tooltip">
                    The Project Site Location field is required.
                  </div>
                </div>
                <!-- Species -->
                <div class="col-md-3 position-relative">

                                    <label class="form-label">Production Date<font color="red">*</font></label>
                                    <input type="date" class="form-control" id="validationTooltip03" name="production_date" required>
                                    <div class="invalid-tooltip">
                                        The Production Date field is required.
                                    </div>
                                </div>

                                

                                <div class="col-md-3 position-relative">
                                    <label class="form-label">Total Production (in kg)<font color="red">*</font></label>
                                    <input type="text" class="form-control" id="validationTooltip03" name="total_production" >

                                <div class="invalid-tooltip">
                                    The Total Production  field is required.
                                </div>
                                </div>

                                <div class="col-md-3 position-relative">
                                    <label class="form-label">Gross Income<font color="red">*</font></label>
                                    <input type="number" class="form-control" id="validationTooltip03" name="p_income" >
                                    <div class="invalid-tooltip">
                                    The Production Income field is required.
                                </div>
                   
                                </div>

                                <div class="col-md-3 position-relative">
                                    <label class="form-label">Production Cost<font color="red">*</font></label>
                                    <input type="number" class="form-control" id="validationTooltip03" name="p_cost" >
                                    <div class="invalid-tooltip">
                                        The Production Cost field is required.
                                    </div>
                                </div>



                                <div class="col-12 d-flex align-items-end justify-content-end gap-2">
                                    <button type="submit" class="btn btn-warning" name="submit">Save</button>
                                    <button type="reset" class="btn btn-primary">Clear</button>
                                    <a href ="productions.php" class="btn btn-danger">Cancel</a>

                                
                            </form><!-- End Custom Styled Validation with Tooltips -->

                        </div>
                    </div>

                </div>

        </section>
    </main><!-- END MAIN -->

    <?php include '../includes/footer.php' ?>
</body>

</html>



