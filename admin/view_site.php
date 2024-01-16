<?php
session_start();
include '../db_con.php';
$db = new db;
if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
} else {
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
                $land              = $row->land;

                $location         = $row->location;
                $producer_name     = $row->name;
                $producerName     = $row->name;
                $topography       = $row->topography;
                $region                 = $row->region;
                $regName              = $row->regDesc;
                $province             = $row->province;
                $provName             = $row->provDesc;
                $municipality         = $row->municipality;
                $citymunName          = $row->citymunDesc;
                $barangay             = $row->barangay;
                $barangayName         = $row->brgyDesc;
                $address          = $row->address;
                $tenancy          = $row->tenancy;
                $area             = $row->area;
                $crops             = $row->crops;
                $share             = $row->share;
                $crops             = $row->crops;
                $irrigation       = $row->irrigation;
                $water             = $row->water;
                $source           = $row->source;
                $soil             = $row->soil;
                $market           = $row->market;
                $distance         = $row->distance;
                $land_area         = $row->land_area;
                $agency            = $row->agency;
                $charge           = $row->charge;
                $status           = $row->status;
                $remarks           = $row->remarks;
                $name              = $row->name;
                $position         = $row->position;
                $date             = $row->date;
            }
            ?>
            <div class="pagetitle">
                <h1>View Project Site | <?php echo $location ?></h1>
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
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Production</button>
                                </li>
                            </ul>
                            <div class="tab-content pt-2" id="borderedTabContent">
                                <div class="tab-pane fade show active" id="bordered-home" role="tabpanel" aria-labelledby="home-tab">
                                    <!-- Custom Styled Validation with Tooltips -->
                                    <form class="row g-3 needs-validation" novalidate action="#" enctype="multipart/form-data" method="POST">
                                        <!-- Date Validation -->
                                        <div class="col-md-12 position-relative">
                                            <label class="form-label">Project Site Location<font color="red">*</font></label>
                                            <input type="hidden" class="form-control" id="validationTooltip01" name="site_id" value="<?php echo $siteID; ?>" disabled>
                                            <input type="text" class="form-control" id="validationTooltip01" name="location" value="<?php echo $location; ?>" disabled>
                                            <div class="invalid-tooltip">
                                                The Project Site Location field is required.
                                            </div>
                                        </div>

                                        <!-- Producer Name -->
                                        <div class="col-md-12 position-relative">
                                            <label class="form-label">Producer Name<font color="red">*</font></label>
                                            <input type="text" class="form-control" id="validationTooltip01" name="producer_name" value="<?php echo $producer_name; ?>" disabled>
                                            <div class="invalid-tooltip">
                                                The Producer Name field is required.
                                            </div>
                                        </div>

                                        <div class="col-md-12 position-relative">
                                            <label class="form-label">Topography<font color="red">*</font></label>
                                            <select class="form-select" id="validationTooltip01" name="topography" disabled>
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



                                        <div class="col-md-3 position-relative">
                                            <label class="form-label">Region<font color="red">*</font></label>
                                            <div class="col-sm-12">
                                                <input type="hidden" class="form-control" id="validationTooltip03" name="region" value="<?php echo $regCode; ?>" disabled>
                                                <select class="form-select" aria-label="Default select example" name="region" id="region" value="<?php echo $regCode; ?>" disabled>
                                                    <option value="<?php echo $regCode; ?>" selected disabled><?php echo $regName; ?></option>
                                                    <?php
                                                    $resultType = $db->getRegion($regCode);
                                                    while ($row = mysqli_fetch_array($resultType)) {
                                                        echo '<option value="' . $row['regCode'] . '">' . $row['regDesc'] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                                <div class="invalid-tooltip">
                                                    The Region field is required.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3 position-relative">
                                            <label class="form-label">Province<font color="red">*</font></label>
                                            <div class="col-sm-12">
                                                <select class="form-select" aria-label="Default select example" name="province" id="province" value="<?php echo $provCode; ?>" disabled>
                                                    <option value="<?php echo $provCode; ?>" selected disabled><?php echo $provName; ?></option>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3 position-relative">
                                            <label class="form-label">City/Municipality<font color="red">*</font></label>
                                            <div class="col-sm-12">
                                                <select class="form-select" aria-label="Default select example" name="municipality" id="municipality" value="<?php echo $citymunCode; ?>" disabled>
                                                    <option value="<?php echo $citymunCode; ?>" selected disabled><?php echo $citymunName; ?></option>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3 position-relative">
                                            <label class="form-label">Barangay<font color="red">*</font></label>
                                            <div class="col-sm-12">
                                                <select class="form-select" aria-label="Default select example" name="barangay" id="barangay" value="<?php echo $brgyCode; ?>" disabled>
                                                    <option value="<?php echo $brgyCode; ?>" selected disabled><?php echo $barangayName; ?></option>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12 position-relative">
                                            <label class="form-label">Address (Zip Code/Street no.)</label>
                                            <input type="text" class="form-control" id="validationTooltip01" name="address" value="<?php echo $address; ?>" required>
                                            <div class="invalid-tooltip">
                                                The Address field is required.
                                            </div>
                                        </div>

                                        <div class="col-md-3 ">
                                            <div class="col-md-12">
                                                <label for="validationCustom04" class="form-label fw-bold">Land Types</label>
                                            </div>
                                            <?php
                                            $resultType = $db->getLandActive();
                                            while ($row = mysqli_fetch_array($resultType)) {
                                                echo '<div class="form-check form-check-inline col-md-6 ">';
                                                echo '<input name="land[]" class="form-check-input" type="checkbox" id="' . $row['land_id'] . '" value="' . $row['land_id'] . '">';
                                                echo '<label class="form-check-label" for="' . $row['land_id'] . '">' . $row['land_name'] . '</label>';
                                                echo '</div>';
                                            }
                                            ?>
                                        </div>

                                        <div class="col-md-3 ">
                                            <div class="col-md-12">
                                                <label for="validationCustom04" class="form-label fw-bold">Tenancy</label>
                                            </div>
                                            <?php
                                            $resultType = $db->getTenancyActive();
                                            while ($row = mysqli_fetch_array($resultType)) {
                                                echo '<div class="form-check form-check-inline col-md-6 ">';
                                                echo '<input name="tenancy[]" class="form-check-input" type="checkbox" id="' . $row['tenancy_id'] . '" value="' . $row['tenancy_id'] . '">';
                                                echo '<label class="form-check-label" for="' . $row['tenancy_id'] . '">' . $row['tenancy_name'] . '</label>';
                                                echo '</div>';
                                            }
                                            ?>
                                        </div>

                                        <div class="col-md-2 mb-3">
                                            <label for="validationCustom01" class="form-label fw-bold">Area (Ha)</label>
                                            <input type="text" class="form-control" id="validationTooltip01" name="area" value="<?php echo $area; ?>" disabled>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>

                                        <div class="col-md-2 mb-3">
                                            <label for="validationCustom02" class="form-label fw-bold">Crops Grown</label>
                                            <input type="text" class="form-control" id="validationTooltip01" name="crops" value="<?php echo $crops; ?>" disabled>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>

                                        <div class="col-md-2 mb-3">
                                            <label for="validationCustom03" class="form-label fw-bold">%Share</label>
                                            <input type="text" class="form-control" id="validationTooltip01" name="share" value="<?php echo $share; ?>" disabled>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="validationCustom04" class="form-label">Availability of reliable irrigation:<font color="red">*</font></label>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="available" value="Available">
                                                    <label class="form-check-label" for="available">Available</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="not_available" value="Not Available">
                                                    <label class="form-check-label" for="not_available">Not Available</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="validationCustom04" class="form-label">Water source:<font color="red">*</font></label>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="irrigated" value="Irrigated">
                                                    <label class="form-check-label" for="irrigated">Irrigated</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="rainfed" value="Rainfed">
                                                    <label class="form-check-label" for="rainfed">Rainfed</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="validationCustom04" class="form-label">If irrigated, source of irrigation:<font color="red">*</font></label>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="row">
                                                    <?php
                                                    $resultType = $db->getIrrigationActive();
                                                    while ($row = mysqli_fetch_array($resultType)) {
                                                        echo '<div class="form-check col-md-3">';
                                                        echo '<input class="form-check-input" type="checkbox" id="' . $row['irrigation_id'] . '" value="' . $row['irrigation_name'] . '">';
                                                        echo '<label class="form-check-label" for="' . $row['irrigation_id'] . '">' . $row['irrigation_name'] . '</label>';
                                                        echo '</div>';
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="validationCustom04" class="form-label">Soil Type:<font color="red">*</font></label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <?php
                                                    $resultType = $db->getSoilActive();
                                                    while ($row = mysqli_fetch_array($resultType)) {
                                                        echo '<div class="form-check col-md-3">';
                                                        echo '<input class="form-check-input" type="checkbox" id="' . $row['soil_id'] . '" value="' . $row['soil_name'] . '">';
                                                        echo '<label class="form-check-label" for="' . $row['soil_id'] . '">' . $row['soil_name'] . '</label>';
                                                        echo '</div>';
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="validationCustom04" class="form-label">Accessibility to farm-to-market road:<font color="red">*</font></label>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="accessible" value="Accessible">
                                                    <label class="form-check-label" for="accessible">Accessible</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="not_accessible" value="Not Accessible">
                                                    <label class="form-check-label" for="not_accessible">Not Accessible</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mt-6" style="margin-left: -25px;">
                                            <div class="form-check form-check-inline">
                                                <label for="nameInput" class="mr-2">Distance from the main road<font color="red">*</font></label>
                                                <div class="d-inline-flex">
                                                    <input type="text" class="form-control" id="validationTooltip01" name="distance" value="<?php echo $distance; ?>" disabled>
                                                    <span class="form-text-inline mt-2" style="margin-left: 5px;">meters</span>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-12 mt-6" style="margin-left: -25px;">
                                            <div class="form-check form- check-inline">
                                                <label for="nameInput" class="mr-2">Available land area for planting mulberry<font color="red">*</font></label>
                                                <div class="d-inline-flex align-items-center">
                                                    <input type="text" class="form-control" id="validationTooltip01" name="land_area" value="<?php echo $land_area; ?>" disabled>
                                                    <span class="form-text-inline mt-2 my-3" style="vertical-align: middle;">ha</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3 ">
                                            <div class="col-md-12">
                                                <label for="validationCustom04" class="form-label fw-bold">Funding Agency</label>
                                            </div>
                                            <?php
                                            $resultType = $db->getAgencyActive();
                                            while ($row = mysqli_fetch_array($resultType)) {
                                                echo '<div class="form-check form-check-inline col-md-12 ">';
                                                echo '<input name="agency[]" class="form-check-input" type="checkbox" id="' . $row['agency_id'] . '" value="' . $row['agency_id'] . '">';
                                                echo '<label class="form-check-label" for="' . $row['agency_id'] . '">' . $row['agency_name'] . '</label>';
                                                echo '</div>';
                                            }
                                            ?>
                                        </div>

                                        <div class="col-md-12 position-relative">
                                            <label class="form-label">Project in-charge<font color="red">*</font></label>
                                            <input type="text" class="form-control" id="validationTooltip01" name="charge" value="<?php echo $charge; ?>" disabled>
                                            <div class="invalid-tooltip">
                                                The Project In-Charge field is required.
                                            </div>
                                        </div>

                                        <div class="col-md-6 position-relative">
                                            <label class="form-label">Site Adopters<font color="red">*</font></label>
                                            <input type="text" class="form-control" id="validationTooltip01" name="adopters" value="<?php echo $adopters; ?>" disabled>
                                            <div class="invalid-tooltip">
                                                The Project In-Charge field is required.
                                            </div>
                                        </div>

                                        <div class="col-md-6 position-relative">
                                            <label class="form-label">Site Status<font color="red">*</font></label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="validationTooltip01" name="status" value="<?php echo $status; ?>" disabled>
                                                <div class="invalid-tooltip">
                                                    The Active field is required.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="validationCustom04" class="form-label">Remarks<font color="red">*</font></label>
                                            <input type="text" class="form-control" id="validationTooltip01" name="remarks" value="<?php echo $remarks; ?>" disabled>

                                            <div class="invalid-feedback">
                                                Error
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="validationCustom04" class="form-label">Herewith the Monitoring and Evaluation Team, declares to have visited the proposed location for mulberry plantation field and found the site reasonably suited for mulberry leaf production and silkworm rearing/cocoon production.</label>
                                        </div>
                                        <div class="col-md-3 ">
                                            <label for="validationCustom04" class="form-label">Name<font color="red">*</font></label>
                                            <input type="text" class="form-control" id="validationTooltip01" name="name" value="<?php echo $name; ?>" disabled>
                                        </div>

                                        <div class="col-md-3 ">
                                            <label for="validationCustom04" class="form-label">Position<font color="red">*</font></label>
                                            <input type="text" class="form-control" id="validationTooltip01" name="position" value="<?php echo $position; ?>" disabled>
                                        </div>

                                        <div class="col-md-3 ">
                                            <label for="validationCustom04" class="form-label">Date<font color="red">*</font></label>
                                            <input type="text" class="form-control" id="validationTooltip01" name="date" value="<?php echo $date; ?>" disabled>

                                        </div>

                                        <div class="col-12 d-flex align-items-end justify-content-end gap-2">

                                            <button type="submit" class="btn btn-warning" name="update">Update </button>
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

                                    <section class="section">

                                        <div class="row">
                                            <div class="col-lg-12">

                                                <div class="card">
                                                    <div class="card-body">
                                                        <table class="table table-striped datatable">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Total Production (in kg)</th>
                                                                    <th scope="col">Production Income</th>
                                                                    <th scope="col">Production Cost</th>
                                                                    <th scope="col">Net Income</th>
                                                                    <th scope="col">Production Date</th>
                                                                    <th scope="col">Action</th>
                                                                </tr>
                                                            </thead>

                                                            <?php
                                                            $result = $db->getProduction($siteID);
                                                            while ($row = mysqli_fetch_array($result)) {
                                                                echo '<tr>';
                                                                echo '<td><a href="edit_production.php?production_id=' . $row['production_id'] . '">' . $row['total_production'] . '</a></td>';
                                                                echo '<td>' . 'PHP ' . number_format($row['p_income'], 2, '.', ',') . '</td>';
                                                                echo '<td>' . 'PHP ' . number_format($row['p_cost'], 2, '.', ',') . '</td>';
                                                                echo '<td>' . 'PHP ' . number_format($row['n_income'], 2, '.', ',') . '</td>';
                                                                echo '<td>' . $row['production_date'] . '</td>';
                                                                echo '<td>';
                                                                echo '<a href="view_land.php?production_id=' . $row['production_id'] . '"><i class="ri-eye-line"></i></a>';
                                                                echo '<a href="edit_production.php?production_id=' . $row['production_id'] . '"><i class="bi bi-pencil-square"></i></a>';
                                                                echo '</td>';
                                                                echo '</tr>';
                                                            }

                                                            $totalProductionIncome += $row['p_income'];
                                                            $totalNetIncome += $row['n_income']
                                                            ?>

                                                        </table>


                                                        <!-- Addtional Information -->
                                                        <div class="mx-2 fw-bold">
                                                            <?php
                                                            echo '<td class="text-uppercase">Total Production Income: </td>';
                                                            echo '<td colspan="2">PHP ' . number_format($totalProductionIncome, 2, '.', ',') . '</td>';
                                                            ?>
                                                        </div>


                                                        <!-- Net Income -->

                                                        <div class="mx-2 fw-bold">
                                                            <?php
                                                            echo '<td class="text-uppercase">Total Net Income: </td>';
                                                            echo '<td colspan="2">PHP ' . number_format($totalNetIncome, 2, '.', ',') . '</td>';
                                                            ?>
                                                        </div>


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
</body>

</html>