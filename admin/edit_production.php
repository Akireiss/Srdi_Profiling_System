<?php
session_start();
include "../Main.php";
$db = new main();
$user_id = $_SESSION['user_id'];

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
} 
if ($_SESSION['type_id'] == 2) {
    header("Location:  ../auth/login.php");
    exit(); 
}

if ($_SESSION['type_id'] == 3) {
  header("Location:  ../auth/login.php");
  exit(); 
}else {
    if (isset($_POST['submit'])) {
        $user_id = $_POST['user_id'];
        $productionId = $_POST['productionId'];
        $production_date = $_POST['production_date'];
        $total_production = $_POST['total_production'];
        $p_income = $_POST['p_income'];
        $p_cost = $_POST['p_cost'];
        $producer_id = $_POST['producer_id'];
        $site_id = $_POST['site_id'];
        

        // Calculate net income

        $total = $p_income - $p_cost;
        $n_income = $total;

        // Add the production record to the database
        $result = $db->updateProduction(
        $production_date,
        $total_production,
        $p_income,
        $p_cost,
        $n_income,
        $producer_id,
        $site_id,
        $productionId
        );

        if ($result != 0) {
            $message = "Production Successfully Updated!";
        } else {
            $message = "Production Already Exists!";
        }
    }
}
?>

<?php
// backend.php

if (isset($_POST['action']) && $_POST['action'] == 'removeSite') {
    $siteId = $_POST['siteId'];

    // Perform the database update
    $db->updateSiteStatus($siteId);

    // Return a response (you can customize this)
    echo 'Site with ID ' . $siteId . ' removed successfully.';
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
            <h1>Edit Production</h1>
        </div><!-- End Page Title -->

        <section class="section">
            <?php
            $result = $db->getProductionID($_GET['production_id']);
            while ($row = mysqli_fetch_object($result)) {
                $productionId = $row->production_id;
                $producerId = $row->producer_id;
                $siteID = $row->site_id;//here
                $producerName = $row->name;
                $location = $row->location;
                $production_date = $row->production_date;
                $total_production = $row->total_production;
                $p_income = $row->p_income;
                $n_income = $row->n_income;
                $p_cost = $row->p_cost;
            }
            ?>
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">

                            <!-- <h5 class="card-title"><?php echo $producerId?></h5> -->

                            <!-- Custom Styled Validation with Tooltips -->
                            <form class="row g-3 needs-validation" novalidate 
                            action="" enctype="multipart/form-data" method="POST">

                            
                            <input type="hidden" value="<?php echo $producerId?>"  name="producer_id">
                                <input type="hidden" value="<?php echo $siteID?>" name="site_id">



                            <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                              
                            <input type="hidden" name="productionId" value="<?php echo $productionId ?>">

                            <div class="col-md-12 pt-3 position-relative">
                                    <label class="form-label">Producer Name<font color="red">*</font></label>
                                    <input type="text" class="form-control" id="validationTooltip03" name="producerName"
                                        value="<?php echo $producerName; ?>" disabled>
                                </div>


                                <div class="col-md-12 position-relative">
                                    <label class="form-label">Project Site Location<font color="red">*</font></label>
                                    <input type="text" class="form-control" id="validationTooltip03" name="location"
                                        value="<?php echo $location; ?>" disabled>

                                    <div class="invalid-tooltip">
                                        Please enter a valid decimal number with up to two decimal places.
                                    </div>
                                </div>



                                <!-- Species -->
                                <div class="col-md-3 position-relative">

                                    <label class="form-label">Production Date<font color="red">*</font></label>
                                    <input type="hidden" class="form-control" id="validationTooltip01"
                                        name="production_id" value="<?php echo $productionID; ?>" required>
                                    <input type="date" class="form-control" id="validationTooltip01"
                                        name="production_date" value="<?php echo $production_date; ?>" required>
                                    <div class="invalid-tooltip">
                                        The Production Date field is required.
                                    </div>
                                </div>



                                <div class="col-md-3 position-relative">
                                    <label class="form-label">Total Production (in kg)<font color="red">*</font></label>
                                    <input type="text" class="form-control" id="validationTooltip03"
                                        name="total_production" value="<?php echo $total_production; ?>" required>
                                    <div class="invalid-tooltip">
                                        Please enter a valid decimal number with up to two decimal places.
                                    </div>
                                </div>

                                <div class="col-md-3 position-relative">
                                    <label class="form-label">Gross Income<font color="red">*</font></label>
                                    <input type="text" class="form-control" id="validationTooltip03" name="p_income"
                                        value="<?php echo $p_income; ?>" required>

                                    <div class="invalid-tooltip">
                                        Please enter a valid decimal number with up to two decimal places.
                                    </div>
                                </div>

<!-- 
                                <div class="col-md-3 position-relative">
                                    <label class="form-label">Net Income<font color="red">*</font></label>
                                    <input type="number" class="form-control" id="validationTooltip03" name="n_income"
                                        value="<?php echo $n_income; ?>" required>

                                    <div class="invalid-tooltip">
                                        Please enter a valid decimal number with up to two decimal places.
                                    </div>
                                </div> -->

                                <div class="col-md-3 position-relative">
                                    <label class="form-label">Production Cost<font color="red">*</font></label>
                                    <input type="number" class="form-control" id="validationTooltip03" name="p_cost"
                                        value="<?php echo $p_cost; ?>" required>

                                    <div class="invalid-tooltip">
                                        Please enter a valid decimal number with up to two decimal places.
                                    </div>
                                </div>



                                <div class="col-12 d-flex align-items-end justify-content-end gap-2">
                                    <button type="submit" class="btn btn-warning" name="submit">Update</button>
                                    <button type="reset" class="btn btn-primary">Clear</button>
                                    <a href="productions.php" class="btn btn-danger">Cancel</a>
                                </div>


                            </form><!-- End Custom Styled Validation with Tooltips -->

                        </div>
                    </div>

                </div>

        </section>
    </main><!-- END MAIN -->

    <?php include '../includes/footer.php' ?>
    <script src="../public/assets/js/jquery.min.js"></script>


    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
    function removeSite(siteId) {
        $.ajax({
            type: 'POST',
            url: '', // Replace with your backend script URL
            data: { action: 'removeSite', siteId: siteId },
            success: function(response) {
                // Handle the response as needed
                console.log(response);
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
    }
</script>



    <script>
 $(document).ready(function () {
    $('#producerDropdown').change(function () {
        var producerId = $(this).val();

        $.ajax({
            url: 'displayAjax.php',
            type: 'POST',
            data: { producerId: producerId },
            success: function (response) {
                // Check if the dropdown already has a selected value
                if ($('#siteDropdown').val()) {
                    // Do not overwrite the initial value
                    $('#siteDropdown').append(response);
                } else {
                    // Set the initial value and append the rest
                    $('#siteDropdown').html(response);
                }
            },
            error: function (xhr, status, error) {
                console.log(error);
            }
        });
    });
});


</script>

</body>

</html>