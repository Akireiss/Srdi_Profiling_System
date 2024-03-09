<?php
session_start();
include '../db_con.php';
$db = new db();

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit(); // Add exit after redirect to prevent further execution
}
if ($_SESSION['type_id'] == 2) {
    header("Location:  ../auth/login.php");
    exit();
}

if ($_SESSION['type_id'] == 3) {
    header("Location:  ../auth/login.php");
    exit();
}
//checkboxes update
//tenancy
if (isset($_POST['submit'])) {
    if (isset($_POST['site_id']) && isset($_POST['lands'])) {
        $site_id = $_POST['site_id'];
        $lands = $_POST['lands'];

        // Update source of income
        $success = $db->updateSiteLands($site_id, $lands);

        if ($success) {
        } else {
        }
    } else {
    }
}


if (isset($_POST['submit'])) {
    if (isset($_POST['site_id']) && isset($_POST['tenancy'])) {
        $site_id = $_POST['site_id'];
        $tenancy = $_POST['tenancy'];

        // Update source of income
        $success = $db->updateSiteLands($site_id, $tenancy);

        if ($success) {
        } else {
        }
    } else {
    }
}


    if (isset($_POST['submit'])) {
        $site_id = $_POST['site_id'];
        $location = $_POST['location'];
        $producer_id = $_POST['producer_id'];
        $topography = $_POST['topography'];
        $address = $_POST['address'];
        $area = $_POST['area'];
        $crops = $_POST['crops'];
        $share = $_POST['share'];
        $irrigation = $_POST['irrigation'];
        $water = $_POST['water'];
        $source = $_POST['source'];
        $market = $_POST['market'];
        $distance = $_POST['distance'];
        $land_area = $_POST['land_area'];
        $charge = $_POST['charge'];
        $adopters = $_POST['adopters'];
        $status = $_POST['status'];
        $remarks = $_POST['remarks'];
        $names = $_POST['names'];
        $position = $_POST['position'];
        $date = $_POST['date'];
        $name1 = $_POST['name1'];
        $position1 = $_POST['position1'];
        $date1 = $_POST['date1'];
        $name2 = $_POST['name2'];
        $position2 = $_POST['position2'];
        $date2 = $_POST['date2'];


        $result = $db->editSite( 
        $site_id,
        $location,
        $producer_id,
        $topography,
        $address,
        $area,
        $crops,
        $share,
        $irrigation,
        $water,
        $source,
        $market,
        $distance,
        $land_area,
        $charge,
        $adopters,
        $status,
        $remarks,
        $names,
        $position,
        $date,
        $name1,
        $position1,
        $date1,
        $name2,
        $position2,
        $date2);

        $message = ($result !== false) ? "Cocoon Updated Successfully!" : "Error updating Cocoon!";
    }
?>


<!DOCTYPE html>
<html lang="en">

<body>
    <?php include '../includes/header.php' ?>
    <?php include '../includes/sidebar.php' ?>

    <main id="main" class="main">
        <!-- End Page Title -->

        <section class="section">
            <?php
            $result = $db->getSiteID($_GET['site_id']);
            while ($row = mysqli_fetch_object($result)) {
                $siteID           = $row->site_id;
                $location         = $row->location;

                $producerId    = $row->producer_id;
                $producerName     = $row->name;

                $topography       = $row->topography;
                $address          = $row->address;
                $area           = $row->area;
                $crops             = $row->crops;
                $share          = $row->share;
                $crops             = $row->crops;
                $irrigation     = $row->irrigation;
                $water             = $row->water;
                $market           = $row->market;
                $distance       = $row->distance;
                $land_area      = $row->land_area;
                $charge           = $row->charge;
                $adopters       = $row->adopters;
                $remarks           = $row->remarks;
                $status           = $row->status;
                $names            = $row->names;
                $position         = $row->position;
                $date             = $row->date;
                $name1            = $row->name1;
                $position1        = $row->position1;
                $date1             = $row->date1;
                $name2            = $row->name2;
                $position2        = $row->position2;
                $date2             = $row->date2;
            }
            ?>
            <div class="pagetitle">
                <h1><?php echo $producerName ?>dasd
    
                | <?php echo $location ?></h1>
            </div>
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">

                            <!-- <h5 class="card-title">Personal Information</h5> -->
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered" id="borderedTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-home" type="button" role="tab" aria-controls="home" aria-selected="true">Project Site Information</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2" id="borderedTabContent">
                                <div class="tab-pane fade show active" id="bordered-home" role="tabpanel" aria-labelledby="home-tab">
                                    <!-- Custom Styled Validation with Tooltips -->
                                    <form class="row g-3 needs-validation" action="" method="POST">
                                        <!-- Date Validation -->
                                        <div class="col-md-6 position-relative">
                                            <label class="form-label">Project Site Location<font color="red">*</font></label>

                                            
                                            <input type="text" class="form-control" id="validationTooltip01" name="location" value="<?php echo $location; ?>" required>
                                            <input type="hidden" class="form-control" id="validationTooltip01" name="site_id" value="<?php echo $siteID; ?>" required>

                                            <div class="invalid-tooltip">
                                                The Project Site Location field is required.
                                            </div>
                                        </div>
                                        <div class="col-md-6 position-relative">
                                            <label class="form-label">Status<font color="red">*</font></label>
                                            <div class="col-sm-12">
                                                <select class="form-select" aria-label="Default select example" id="validationTooltip03" name="status" required>
                                                    <?php
                                                    // Check if the $status variable is not empty
                                                    if (!empty($status)) {
                                                        // Use a ternary operator for cleaner code
                                                        echo '<option value="Active" ' . ($status == 'Active' ? 'selected' : '') . '>Active</option>';
                                                        echo '<option value="Inactive" ' . ($status == 'Inactive' ? 'selected' : '') . '>Inactive</option>';
                                                    } else {
                                                        // If $status is empty, provide default options
                                                        echo '<option value="Active">Active</option>';
                                                        echo '<option value="Inactive">Inactive</option>';
                                                    }
                                                    ?>
                                                </select>
                                                <div class="invalid-tooltip">
                                                    The Status field is required.
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Producer Name -->
                                        <div class="col-md-12 position-relative">
                                            <label class="form-label">Producer Name<font color="red">*</font></label>
                                            <input type="hidden" class="form-control" id="validationTooltip01" name="producer_id" value="<?php echo $producerId; ?>" required>

                                            <input type="text" class="form-control" id="validationTooltip01" name="producerName" value="<?php echo $producerName; ?>" required>
                                            <div class="invalid-tooltip">
                                                The Producer Name field is required.
                                            </div>
                                        </div>

                                        <div class="col-md-12 position-relative">
                                            <label class="form-label">Topography<font color="red">*</font></label>
                                            <select class="form-select" id="validationTooltip01" name="topography" required>
                                                <?php
                                                $resultType = $db->getTopographyActive();
                                                while ($row = mysqli_fetch_array($resultType)) {
                                                    $topography_id = $row['topography_id'];
                                                    $topography_name = $row['topography_name'];
                                                    // Check if the current option's value matches the stored value, and set 'selected' if it does
                                                    $selected = ($topography_id == $topography) ? 'selected' : '';
                                                    echo '<option value="' . $topography_id . '" ' . $selected . '>' . $topography_name . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>





                                        <div class="col-md-12 position-relative">
                                            <label class="form-label">House no./House Street</label>
                                            <input type="text" class="form-control" id="validationTooltip01" name="address" value="<?php echo $address; ?>">
                                        </div>


                                        <div class="col-md-4 mt-6">
                                            <label for="validationCustom01" class="form-label">Area (Hectares)<font color="red">*</font></label>
                                            <input type="number" class="form-control" id="validationCustom01" step="0.01" name="area" value="<?php echo $area; ?>">
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="validationCustom02" class="form-label">Crops Grown<font color="red">*</font></label>
                                            <input type="number" class="form-control" id="validationCustom02" step="0.01" name="crops" value="<?php echo $crops; ?>">
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="validationCustom03" class="form-label">%Share<font color="red">*</font></label>
                                            <input type="number" name="share" class="form-control" id="validationCustom03" value="<?php echo $share; ?>">
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-md-6 mt-6" style="margin-left: -25px;">
                                                <div class="form-check form-check-inline">
                                                    <label for="nameInput" name="distance" class="mr-2">Distance from the main road<font color="red">*</font></label>
                                                    <div class="d-inline-flex">
                                                        <input type="number" class="form-control mr-2 w-75 mx-1 my-1" id="nameInput" name="distance" value="<?php echo $distance; ?>">
                                                        <span class="form-text-inline mt-2" style="margin-left: 2px;">meters</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 mt-6" style="margin-left: -25px;">
                                                <div class="form-check form-check-inline">
                                                    <label for="nameInput" name="land_area" class="mr-2">Available land area for planting mulberry<font color="red">*</font></label>
                                                    <div class="d-inline-flex align-items-center">
                                                        <input type="number" class="form-control mr-2 w-75 mx-1 my-1" id="nameInput" name="land_area" value="<?php echo $land_area; ?>">
                                                        <span class="form-text-inline mt-2 my-3" style="vertical-align: middle;">hectares</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-2 ">
                                            <div class="col-md-12">
                                                <label for="validationCustom04" name="land" class="form-label fw-bold">Land Types<font color="red">*</font></label>
                                            </div>

                                            <?php
                                            $resultType = $db->getLandActive();
                                            $selectedLandTypes = $db->getSelectedLandTypes($siteID);

                                            while ($row = mysqli_fetch_array($resultType)) {
                                                $checked = in_array($row['land_id'], $selectedLandTypes) ? 'checked' : '';

                                                echo '<div class="form-check form-check-inline col-md-6 ">';
                                                echo '<input name="lands[' . $row['land_id'] . '][land_id]"  class="form-check-input" type="checkbox" id="' . $row['land_id'] . '" value="' . $row['land_id'] . '" ' . $checked . '>';
                                                echo '<label class="form-check-label" for="' . $row['land_id'] . '">' . $row['land_name'] . '</label>';
                                                echo '</div>';
                                            }
                                            ?>
                                        </div>


                                        <div class="col-md-2 ">
                                            <div class="col-md-12">
                                                <label for="validationCustom04" class="form-label fw-bold">Tenancy<font color="red">*</font></label>
                                            </div>
                                            <?php
                                            $resultType = $db->getTenancyActive();

                                            $selectedTenancy = $db->selectedTenancy($siteID);

                                            while ($row = mysqli_fetch_array($resultType)) {
                                                $checked = in_array($row['tenancy_id'], $selectedTenancy) ? 'checked' : '';


                                                echo '<div class="form-check form-check-inline col-md-6 ">';
                                                echo '<input name="tenancy[]" class="form-check-input" type="checkbox" id="' . $row['tenancy_id'] . '" value="' . $row['tenancy_id'] . '" ' . $checked . '>';
                                                echo '<label class="form-check-label">' . $row['tenancy_name'] . '</label>';
                                                echo '</div>';
                                            }
                                            ?>
                                        </div>



                                        <?php
                                        $options = [
                                            'Available' => 'Available',
                                            'Not Available' => 'Not Available',

                                        ];
                                        ?>
                                        <div class="col-md-2 mt-3">
                                            <label for="validationCustom04" class="form-label fw-bold">
                                                Availability of reliable irrigation:<font color="red">*</font>
                                            </label>
                                            <?php foreach ($options as $value => $label) : ?>
                                                <div class="form-check">
                                                    <input type="radio" name="irrigation" value="<?= $value ?>" <?php echo ($irrigation === $value) ? 'checked' : ''; ?> />
                                                    <label class="inline-block"><?= $label ?></label>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>



                                        <?php
                                        $optionsWater = [
                                            'Irrigated' => 'Irrigated',
                                            'Rainfed' => 'Rainfed',

                                        ];
                                        ?>

                                        <div class="col-md-2 mt-3">
                                            <label for="validationCustom04" class="form-label fw-bold">Water source:<font color="red">*</font></label>
                                            <?php foreach ($optionsWater as $valueWater => $labelWater) : ?>
                                                <div class="form-check">
                                                    <input type="radio" id="water_source_<?= $valueWater ?>" name="water_source" value="<?= $valueWater ?>" <?php echo ($water === $valueWater) ? 'checked' : ''; ?> />
                                                    <label class="inline-block" for="water_source_<?= $valueWater ?>"><?= $labelWater ?></label>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>








                                        <div class="col-md-4 mt-3">
                                            <label for="validationCustom04" class="form-label fw-bold">If irrigated, source of irrigation:<font color="red">*</font></label>

                                            <?php
                                            $resultType = $db->getIrrigationActive();
                                            $getSelectedIrrigation = $db->getSelectedIrrigation($siteID);


                                            while ($row = mysqli_fetch_array($resultType)) {
                                                $checked = in_array($row['irrigation_id'], $getSelectedIrrigation) ? 'checked' : '';

                                                echo '<div class="form-check">';
                                                echo '<input name="source"
                   class="form-check-input source-checkbox" type="checkbox" disabled id="source_' . $row['irrigation_id'] . '" value="' . $row['irrigation_id'] . '" ' . $checked . '
                   name="irrigation[' . $row['irrigation_id'] . '][irrigation_id]">';
                                                echo '<label class="form-check-label" for="source_' . $row['irrigation_id'] . '">' . $row['irrigation_name'] . '</label>';
                                                echo '</div>';
                                            }
                                            ?>



                                        </div>




                                        <div class="row">


                                            <div class="col-md-4 mt-3">
                                                <div class="col-md-6" <label for="validationCustom04" name="soil" class="form-label fw-bold">
                                                    <b>Soil Type:</b>
                                                    <font color="red">*</font>
                                                    </label>

                                                    <?php
                                                    $resultType = $db->getSoilActive();
                                                    $getSelectedSoilTypes = $db->getSelectedSoilTypes($siteID);

                                                    while ($row = mysqli_fetch_array($resultType)) {
                                                        $checked = in_array($row['soil_id'], $getSelectedSoilTypes) ? 'checked' : '';

                                                        echo '<div class="form-check col-md-12">';
                                                        echo '<input name="soils[' . $row['soil_id'] . '][soil_id]" class="form-check-input" type="checkbox" id="' . $row['soil_id'] . '" value="' . $row['soil_id'] . '" ' . $checked . '>';
                                                        echo '<label class="form-check-label" for="' . $row['soil_id'] . '">' . $row['soil_name'] . '</label>';
                                                        echo '</div>';
                                                    }
                                                    ?>




                                                </div>
                                            </div>




                                            <div class="col-md-4 mt-3">
                                                <label for="validationCustom04" name="market" class="form-label fw-bold">Accessibility to farm to market road:<font color="red">*</font></label>

                                                <?php
                                                $options = [
                                                    'Accessible' => 'Accessible',
                                                    'Not Accessible' => 'Not Accessible',

                                                ];
                                                ?>

                                                <?php foreach ($options as $value => $label) : ?>
                                                    <div class="form-check">
                                                        <input type="radio" id="market" name="market" value="<?= $value ?>" <?php echo ($market === $value) ? 'checked' : ''; ?> />
                                                        <label class="inline-block"><?= $label ?></label>
                                                    </div>
                                                <?php endforeach; ?>




                                            </div>
                                            <div class="col-md-3 mt-6">
                                                <div class="col-md-12">
                                                    <label for="validationCustom04" class="form-label fw-bold">Funding Agency<font color="red">*</font></label>
                                                </div>
                                                <?php
                                                $resultType = $db->getAgencyActive();
                                                $getSelectedAgency = $db->getSelectedAgency($siteID);


                                                while ($row = mysqli_fetch_array($resultType)) {
                                                    $checked = in_array($row['agency_id'], $getSelectedAgency) ? 'checked' : '';


                                                    echo '<div class="form-check col-md-12"">'; // Adjust the width here (e.g., col-md-6)
                                                    echo '<input name="agencys[' . $row['agency_id'] . '][agency_id]" class="form-check-input" type="checkbox" id="' . $row['agency_id'] . '"  value="' . $row['agency_id'] . '" ' . $checked . '>';
                                                    echo '<label class="form-check-label" for="' . $row['agency_id'] . '">' . $row['agency_name'] . '</label>';
                                                    echo '</div>';
                                                }
                                                ?>



                                            </div>



                                            <div class="row mt-4">
                                                <div class="col-md-6 position-relative">
                                                    <label class="form-label">Project in-charge<font color="red">*</font></label>
                                                    <input type="text" class="form-control" id="validationTooltip01" name="charge" value="<?php echo $charge; ?>" required>
                                                    <div class="invalid-tooltip">
                                                        The Project In-Charge field is required.
                                                    </div>
                                                </div>

                                                <div class="col-md-6 position-relative">
                                                    <label class="form-label">Number of site Adopters<font color="red">*</font></label>
                                                    <input type="number" class="form-control" id="validationTooltip01" name="adopters" value="<?php echo $adopters; ?>" >
                                                    <div class="invalid-tooltip">
                                                        The Site Adopters field is required.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <label for="validationCustom04" class="form-label">Remarks<font color="red">*</font></label>
                                                <textarea class="form-control" id="validationCustom05" name="remarks" required><?php echo $remarks; ?></textarea>
                                                <div class="invalid-feedback">
                                                    Error
                                                </div>
                                            </div>


                                            <div class="row mt-4">
                                                <div class="col-md-12">
                                                    <label for="validationCustom04" class="form-label">Herewith the Monitoring and Evaluation Team, declares to have visited the proposed location for mulberry plantation
                                                        field and found the site reasonably suited for mulberry leaf production and silkworm rearing/cocoon production.</label>
                                                </div>


                                                <div class="col-md-4 position-relative">
                                                    <label class="form-label">Name<font color="red">*</font></label>
                                                    <input type="text" class="form-control" id="validationTooltip01" name="names" value="<?php echo $names; ?>" >
                                                    <div class="invalid-tooltip">
                                                        The Name field is required.
                                                    </div>
                                                </div>
                                                <div class="col-md-4 position-relative">
                                                    <label class="form-label">Position<font color="red">*</font></label>
                                                    <input type="text" class="form-control" id="validationTooltip01" name="position" value="<?php echo $position; ?>" >
                                                    <div class="invalid-tooltip">
                                                        The Position field is required.
                                                    </div>
                                                </div>
                                                <div class="col-md-4 position-relative">
                                                    <label class="form-label">Date<font color="red">*</font></label>
                                                    <input type="date" class="form-control" id="validationTooltip01" name="date" value="<?php echo $date; ?>" >
                                                    <div class="invalid-tooltip">
                                                        The Date field is required.
                                                    </div>
                                                </div>
                                                <div class="col-md-4 position-relative">
                                                    <label class="form-label">Name<font color="red">*</font></label>
                                                    <input type="text" class="form-control" id="validationTooltip01" name="name1" value="<?php echo $name1; ?>" >
                                                    <div class="invalid-tooltip">
                                                        The Name field is required.
                                                    </div>
                                                </div>
                                                <div class="col-md-4 position-relative">
                                                    <label class="form-label">Position<font color="red">*</font></label>
                                                    <input type="text" class="form-control" id="validationTooltip01" name="position1" value="<?php echo $position1; ?>" >
                                                    <div class="invalid-tooltip">
                                                        The Position field is required.
                                                    </div>
                                                </div>
                                                <div class="col-md-4 position-relative">
                                                    <label class="form-label">Date<font color="red">*</font></label>
                                                    <input type="date" class="form-control" id="validationTooltip01" name="date1" value="<?php echo $date1; ?>" >
                                                    <div class="invalid-tooltip">
                                                        The Date field is required.
                                                    </div>
                                                </div>
                                                <div class="col-md-4 position-relative">
                                                    <label class="form-label">Name<font color="red">*</font></label>
                                                    <input type="text" class="form-control" id="validationTooltip01" name="name2" value="<?php echo $name2; ?>" >
                                                    <div class="invalid-tooltip">
                                                        The Name field is required.
                                                    </div>
                                                </div>
                                                <div class="col-md-4 position-relative">
                                                    <label class="form-label">Position<font color="red">*</font></label>
                                                    <input type="text" class="form-control" id="validationTooltip01" name="position2" value="<?php echo $position2; ?>" >
                                                    <div class="invalid-tooltip">
                                                        The Position field is required.
                                                    </div>
                                                </div>
                                                <div class="col-md-4 position-relative">
                                                    <label class="form-label">Date<font color="red">*</font></label>
                                                    <input type="date" class="form-control" id="validationTooltip01" name="date2" value="<?php echo $date2; ?>" >
                                                    <div class="invalid-tooltip">
                                                        The Date field is required.
                                                    </div>
                                                </div>

                                                <div class="col-12 d-flex align-items-end justify-content-end gap-2 mt-4">
                                                    <input type="submit" class="btn btn-warning" name="submit" value="Submit"/>
                                                    <button type="reset" class="btn btn-primary">Clear</button>
                                                    <a href="projectsite.php" class="btn btn-danger">Cancel</a>
                                                </div>
                                    </form><!-- End Custom Styled Validation with Tooltips -->
                                </div>
                                <div class="tab-pane fade" id="bordered-profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <!--  -->
                                    <div class="pagetitle">
                                        <!--       <h1>Beekeepers</h1><br> -->
                                        <div class="row">

                                        </div>
                                    </div><!-- End Page Title -->

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

        </section>
    </main> <!--END MAIN-->
    <?php include '../includes/footer.php' ?>

    <script>
        $(document).ready(function() {
            $("#region").on('change', function() {
                var regionId = $(this).val();
                if (regionId) {
                    $.ajax({
                        type: 'POST',
                        url: 'ajaxData.php',
                        data: 'regionId=' + regionId,
                        success: function(html) {
                            $('#province').html(html);
                            $('#city').html('<option value="">Select City</option>');
                            $('#barangay').html('<option value="">Select Barangay</option>');
                        }
                    });
                }
            });

            $('#province').on('change', function() {
                var provinceId = $(this).val();
                if (provinceId) {
                    $.ajax({
                        type: 'POST',
                        url: 'ajaxData.php',
                        data: 'provinceId=' + provinceId,
                        success: function(html) {
                            $('#city').html(html);
                            $('#barangay').html('<option value="">Select Barangay</option>');
                        }
                    });
                } else {
                    $('#barangay').html('<option value="">Select Barangay</option>');
                }
            });

            $('#city').on('change', function() {
                var cityId = $(this).val();
                if (cityId) {
                    $.ajax({
                        type: 'POST',
                        url: 'ajaxData.php',
                        data: 'cityId=' + cityId,
                        success: function(html) {
                            $('#barangay').html(html);
                        }
                    });
                }
            });
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const waterSourceRadio = document.querySelectorAll('input[name="water_source"]');
            const irrigationSources = document.querySelectorAll('.source-checkbox');

            waterSourceRadio.forEach(function(radio) {
                radio.addEventListener('change', function() {
                    if (radio.value === 'Irrigated') {
                        irrigationSources.forEach(function(checkbox) {
                            checkbox.disabled = false;
                        });
                    } else {
                        irrigationSources.forEach(function(checkbox) {
                            checkbox.disabled = true;
                        });
                    }
                });
            });
        });
    </script>



</body>

</html>