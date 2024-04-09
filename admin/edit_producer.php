<?php
session_start();
include '../db_con.php';
$db = new db();

error_reporting(0);
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

if (isset($_POST['submit'])) {
    $user_id  = $_POST['user_id'];
    $name = $_POST['name'];
    $cocoon_id = $_POST['cocoon_id'];
    $date_validation = $_POST['date_validation'];
    $status = $_POST['status'];
    $birthdate = $_POST['birthdate'];
    $age = $_POST['age'];
    $type = $_POST['type'];
    $sex = $_POST['sex'];
    $region = $_POST['region'];
    $province = $_POST['province'];
    $municipality = $_POST['municipality'];
    $barangay = $_POST['barangay'];
    $address = $_POST['address'];
    $education = $_POST['education'];
    $religion = $_POST['religion'];
    $civil_status = $_POST['civil_status'];
    $name_spouse = $_POST['name_spouse'];
    $farm_participate = $_POST['farm_participate'];
    $cannot_participate = $_POST['cannot_participate'];
    $male = $_POST['male'];
    $female = $_POST['female'];
    $years_in_farming = $_POST['years_in_farming'];
    $available_workers = $_POST['available_workers'];
    // images files
    $intent = $_POST['intent'];
    $signature = $_POST['signature'];
    $id_pic = $_POST['id_pic'];
    $bypic = $_POST['bypic'];


    $result = $db->updateCocoonProducer(
        $user_id,
        $name,
        $status,
        $birthdate,
        $age,
        $type,
        $sex,
        $address,
        $barangay,
        $education,
        $religion,
        $civil_status,
        $name_spouse,
        $farm_participate,
        $cannot_participate,
        $male,
        $female,
        $years_in_farming,
        $available_workers,
        $intent,
        $signature,
        $id_pic,
        $bypic,
        $date_validation,
        $region,
        $province,
        $municipality,
        $cocoon_id,
    );

    $message = ($result !== false) ? "Cocoon Updated Successfully!" : "Error updating Cocoon!";
}
?>


<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['cocoon_id']) && isset($_POST['incomes'])) {
        $cocoon_id = $_POST['cocoon_id'];
        $incomes = $_POST['incomes'];

        // Update source of income
        $success = $db->updateSourceIncome($cocoon_id, $incomes);

        if ($success) {
        } else {
        }
    } else {
    }
}


if (isset($_POST['submit'])) {
    if (isset($_POST['cocoon_id']) && isset($_POST['farm_tools'])) {
        $cocoon_id = $_POST['cocoon_id'];
        $farm_tools = $_POST['farm_tools'];

        // Update source of income
        $success = $db->updateCocoonFarmTools($cocoon_id, $farm_tools);

        if ($success) {
        } else {
        }
    } else {
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
        $result = $db->getProducerID($_GET['cocoon_id']);
        while ($row = mysqli_fetch_object($result)) {
            $cocoonID             = $row->cocoon_id;
            $date_validation      = $row->date_validation;
            $name                 = $row->name;
            $status               = $row->status;
            $age                  = $row->age;
            $birthdate            = $row->birthdate;
            $type                 = $row->type;
            $sex                  = $row->sex;
            $education            = $row->education;
            $religion             = $row->religion;
            $civil_status         = $row->civil_status;
            $name_spouse          = $row->name_spouse;
            $farm_participate     = $row->farm_participate;
            $cannot_participate   = $row->cannot_participate;
            $male                 = $row->male;
            $female               = $row->female;
            $years_in_farming     = $row->years_in_farming;
            $available_workers    = $row->available_workers;
            $intent               = $row->intent;
            $signature            = $row->signature;
            $id_pic               = $row->id_pic;
            $intent               = $row->intent;
            $signature            = $row->signature;
            $bypic                = $row->bypic;
            $address         = $row->zip_code;
            // address
            $provDesc       = $row->provDesc;
            $provCode       = $row->provCode;
            $citymunDesc     = $row->citymunDesc;
            $citymunCode     = $row->citymunCode;
            $brgyDesc       = $row->brgyDesc;
            $brgyCode       = $row->brgyCode;
        }
        ?>

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
            <h1>Edit Producer | <?php echo $name ?>
        </div>

        <section class="section dashboard mt-8">
            <div class="mt-3 container">
                <div class="col-lg-12">
                    <div class="card md:w-full">
                        <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                            <div class="card-body w-100">

                                <h5 class="card-title">A. Personal Information


                                </h5>


                                <div class="col-md-2">
                                    <label for="validationCustom02" class="form-label">Date of Validation<font color="red">*</font></label>
                                    <input type="date" class="form-control" id="validationTooltip01" name="date_validation" value="<?php echo $date_validation; ?>">
                                    <div class="valid-feedback">
                                        The Date Validation field is required!
                                    </div>
                                </div>

                                <input type="hidden" class="form-control" id="val idationTooltip01" name="cocoon_id" value="<?php echo $cocoonID; ?>">

                                <div class="row mt-3 needs-validation md:w-full" novalidate>
                                    <div class="col-md-6">
                                        <label for="validationCustom01" class="form-label">Name<font color="red">*</font></label>


                                        <input type="text" class="form-control" id="validationTooltip01" name="name" value="<?php echo $name; ?>">
                                        <div class="valid-feedback">
                                            The Name field is required!
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

                                </div>

                                <div class="row mt-3  needs-validation md:w-full" novalidate>
                                    <div class="col-md-3">
                                        <label for="validationCustom02" class="form-label">Age<font color="red">*</font></label>
                                        <input type="number" class="form-control" id="age" name="age" value="<?php echo $age; ?>">
                                        <div class="valid-feedback">
                                            The Age field is required!
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="validationCustom02" class="form-label">Birthdate<font color="red">*</font></label>
                                        <input type="date" class="form-control" id="validationTooltip01" name="birthdate" value="<?php echo $birthdate; ?>">
                                        <div class="valid-feedback">
                                            The Birthdate field is required!
                                        </div>
                                    </div>

                                    <div class="col-md-3 ">
                                        <label class="form-label">Type of Producer<font color="red">*</font></label>
                                        <select class="form-select" aria-label="Default select example" id="validationTooltip03" name="type" <option value="">Select Type</option>
                                            <option value="Seed Cocoon" <?php if ($type === "Seed Cocoon") {
                                                                            echo "selected";
                                                                        } ?>>Seed Cocoon</option>
                                            <option value="Commercial" <?php if ($type === "Commercial") {
                                                                            echo "selected";
                                                                        } ?>>Commercial</option>
                                        </select>
                                        <div class="invalid-tooltip">
                                            The Type of Producer field is required.
                                        </div>
                                    </div>


                                    <div class="col-md-3">
                                        <label class="form-label">Sex<font color="red">*</font></label>
                                        <select class="form-select" aria-label="Default select example" id="validationTooltip03" name="sex">
                                            <option value="">Select Sex</option>
                                            <option value="Male" <?php if ($sex === "Male") {
                                                                        echo "selected";
                                                                    } ?>>Male</option>
                                            <option value="Female" <?php if ($sex === "Female") {
                                                                        echo "selected";
                                                                    } ?>>Female</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-4 needs-validation md:w-full" novalidate>

                                    <div class="col-md-3">
                                        <label class="form-label">Region<font color="red">*</font></label>
                                        <div class="col-sm-12">
                                            <select class="form-select" aria-label="Default select example" name="region" id="region">
                                                <option value="">Select Region</option>
                                                <option value="01" selected>Region 1</option>

                                            </select>
                                        </div>

                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-label">Province<font color="red">*</font></label>
                                        <div class="col-sm-12">
                                            <select class="form-select" aria-label="Default select example" name="province" id="province">
                                                <option value="" disabled>Select Province</option>
                                                <option value="<?php echo $provCode; ?>" selected><?php echo $provDesc; ?></option>

                                            </select>
                                        </div>
                                        <div class="invalid-feedback">
                                            The Province field is required
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-label">City/Municipality<font color="red">*</font></label>
                                        <div class="col-sm-12">
                                            <select class="form-select" aria-label="Default select example" name="municipality" id="city">
                                                <option value="" disabled>Select City</option>
                                                <option value="<?php echo $citymunCode; ?>" selected><?php echo $citymunDesc; ?></option>

                                            </select>
                                        </div>
                                        <div class="invalid-feedback">
                                            The City/Municiality field is required
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-label">Barangay<font color="red">*</font></label>
                                        <div class="col-sm-12">
                                            <select class="form-select" aria-label="Default select example" name="barangay" id="barangay">
                                                <option value="" disabled>Select Barangay</option>
                                                <option value="<?php echo $brgyCode; ?>" selected><?php echo $brgyDesc; ?></option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback">
                                        The Barangay field is required
                                    </div>















                                    <div class="row mt-3  needs-validation md:w-full" novalidate>
                                        <div class="col-md-4">
                                            <label for="validationCustom03" class="form-label">Address: House no./House Street<font color="red">*</font></label>
                                            <input name="address" class="form-control" type="text" value="<?php echo $address ?>" />


                                            <div class="invalid-feedback">
                                                The House no. field is required
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <label for="validationCustom04" class="form-label">Educational Attainment<font color="red">*</font></label>
                                            <select name="education" class="form-select" id="validationCustom04">
                                                <option selected>Select Educational Attainment</option>
                                                <?php
                                                $resultType = $db->getEducationActive();
                                                while ($row = mysqli_fetch_array($resultType)) {
                                                    $education_id = $row['education_id'];
                                                    $education_name = $row['education_name'];
                                                    // Check if the current option's value matches the stored value, and set 'selected' if it does
                                                    $selected = ($education_id == $education) ? 'selected' : '';
                                                    echo '<option value="' . $education_id . '" ' . $selected . '>' . $education_name . '</option>';
                                                }
                                                ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                The Educational Attainment field is required
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="validationCustom05" class="form-label">Religion<font color="red">*</font></label>
                                            <select class="form-select" id="validationCustom04" name="religion">
                                                <option selected>Select Religion</option>
                                                <?php
                                                $resultType = $db->getReligionActive();
                                                while ($row = mysqli_fetch_array($resultType)) {
                                                    $religion_id = $row['religion_id'];
                                                    $religion_name = $row['religion_name'];
                                                    // Check if the current option's value matches the stored value, and set 'selected' if it does
                                                    $selected = ($religion_id == $religion) ? 'selected' : '';
                                                    echo '<option value="' . $religion_id . '" ' . $selected . '>' . $religion_name . '</option>';
                                                }
                                                ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                The Religion field is required
                                            </div>
                                        </div>


                                        <div class="col-md-6 mt-3">
                                            <label for="validationCustom05" class="form-label">Civil Status<font color="red">*</font></label>
                                            <select class="form-select" id="validationCustom04" name="civil_status">

                                                <option selected value="">Select Civil Status</option>
                                                <?php
                                                $resultType = $db->getCivilActive();
                                                while ($row = mysqli_fetch_array($resultType)) {
                                                    $civil_id = $row['civil_id'];
                                                    $civil_name = $row['civil_name'];
                                                    // Check if the current option's value matches the stored value, and set 'selected' if it does
                                                    $selected = ($civil_id == $civil_status) ? 'selected' : '';
                                                    echo '<option value="' . $civil_id . '" ' . $selected . '>' . $civil_name . '</option>';
                                                }
                                                ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                The Civil Status field is required
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <label for="validationCustom04" class="form-label">If married, name of spouse<font color="red">*</font></label>
                                            <input type="text" class="form-control" name="name_spouse" id="spouse" value="<?php echo empty($name_spouse) ? 'N/A' : $name_spouse; ?>">
                                            <div class="invalid-feedback">
                                                The Name of spouse field is required
                                            </div>
                                        </div>





                                        <div class="col-md-6 mt-3">
                                            <label for="validationCustom04" class="form-label">Number of family members (except you)<font color="red">*</font></label>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <label for="validationCustom04" class="form-label">Number of family can participate in farm work<font color="red">*</font></label>
                                        </div>

                                        <div class="col-md-3 mt-3">
                                            <label for="validationCustom04" class="form-label">Can participate in farm work<font color="red">*</font></label>
                                            <input type="number" class="form-control" id="validationTooltip01" name="farm_participate" value="<?php echo $farm_participate; ?>">
                                            <div class="invalid-feedback">
                                                The Number of Can participate in farm work field is required
                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-3">
                                            <label for="validationCustom04" class="form-label">Cannot do farm work<font color="red">*</font></label>
                                            <input type="number" class="form-control" id="validationTooltip01" name="cannot_participate" value="<?php echo $cannot_participate; ?>">
                                            <div class="invalid-feedback">
                                                The Number of Cannot participate in farm work field is required
                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-3">
                                            <label for="validationCustom04" class="form-label">Male<font color="red">*</font></label>
                                            <input type="number" class="form-control" id="validationTooltip01" name="male" value="<?php echo $male; ?>">
                                            <div class="invalid-feedback">
                                                The Number of male can participate in farm work field is required
                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-3">
                                            <label for="validationCustom04" class="form-label">Female<font color="red">*</font></label>
                                            <input type="number" class="form-control" id="validationTooltip01" name="female" value="<?php echo $female; ?>">
                                            <div class="invalid-feedback">
                                                The Number of female can participate in farm work field is required
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group mt-3">
                                                    <label for="validationCustom04" class="form-label">Source of Income<font color="red">*</font></label>
                                                </div>
                                            </div>
                                            <div class="form-row mt-1">
                                                <?php
                                                $resultType = $db->getSource_IncomeActive();
                                                $selectedSources = $db->getSelectedSources($cocoonID); // Replace $cocoonID with the actual cocoon ID

                                                while ($row = mysqli_fetch_array($resultType)) {
                                                    $checked = in_array($row['source_id'], $selectedSources) ? 'checked' : '';

                                                    echo '<div class="form-check form-check-inline col-md-4">';
                                                    echo '<input class="form-check-input" name="incomes[' . $row['source_id'] . '][source_id]" type="checkbox" id="source_income'
                                                        . $row['source_id'] . '" value="' . $row['source_id'] . '" ' . $checked . '>';
                                                    echo '<label class="form-check-label" for="source_income' . $row['source_id'] . '">' . $row['source_name'] . '</label>';
                                                    echo '</div>';
                                                }
                                                ?>
                                            </div>
                                            <div class="invalid-feedback">
                                                The Source of Income field is required
                                            </div>
                                        </div>


                                        <div class="col-md-6 mt-3 ">
                                            <label for="validationCustom04" class="form-label">Number of years in farming<font color="red">*</font></label>
                                            <input type="number" class="form-control" id="validationTooltip01" name="years_in_farming" value="<?php echo $years_in_farming; ?>">
                                            <div class="invalid-feedback">
                                                The Number of years in farming field is required
                                            </div>
                                        </div>

                                        <div class="col-md-6 mt-3 ">
                                            <label for="validationCustom04" class="form-label">Number of available workers<font color="red">*</font></label>
                                            <input type="number" class="form-control" id="validationTooltip01" name="available_workers" value="<?php echo $available_workers; ?>">
                                            <div class="invalid-feedback">
                                                The Number of available workers field is required
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group mt-3">
                                                    <label for="validationCustom04" name="farm_tool">Available Farm Tools and Implements<font color="red">*</font></label>
                                                </div>
                                                <div class="form-row mt-1">
                                                    <?php
                                                    $resultType = $db->getFarmToolsActive();
                                                    $selectedFarmTools = $db->getSelectedFarmTools($cocoonID);

                                                    while ($row = mysqli_fetch_array($resultType)) {
                                                        $checked = in_array($row['tool_id'], $selectedFarmTools) ? 'checked' : '';

                                                        echo '<div class="form-check form-check-inline col-md-4">';
                                                        echo '<input class="form-check-input" name="farm_tools[' . $row['tool_id'] . '][tool_id]"  type="checkbox" id="' . $row['tool_id'] . '" value="' . $row['tool_id'] . '" ' . $checked . '>';
                                                        echo '<label class="form-check-label" for="' . $row['tool_id'] . '">' . $row['tool_name'] . '</label>';
                                                        echo '</div>';
                                                    }
                                                    ?>
                                                </div>





                                            </div>
                                            <div class="invalid-feedback">
                                                The Available farm tools field is required
                                            </div>
                                        </div>


                                        <div class="my-4"></div>

                                        <div class="row">


                                            <div class="col-md-6 mb-4">
                                                <div class="form-group mb-2">
                                                    <label for="validationCustom05" class="form-label">ID Picture</label>

                                                </div>

                                                <?php
                                                if (!empty($id_pic)) {
                                                    echo '<div class="file-container">';
                                                    echo '<a href="view_image.php?image=' . $id_pic . '" target="_blank" rel="noopener noreferrer">';
                                                    echo '<img src="' . $id_pic . '" alt="ID Picture" class="img-fluid w-25">';
                                                    echo '</a>';
                                                    echo '<i class="bi bi-x-lg text-danger mx-2 remove-file" data-type="id_pic" data-file-id="' . $id_pic . '"></i>';
                                                    echo '</div>';
                                                } else {
                                                    echo '<input type="file" class="form-control" name="id_pic">';
                                                    echo '<p>No image uploaded</p>';
                                                }
                                                ?>
                                            </div>

                                            <div class="col-md-6 mb-4">
                                                <div class="form-group">
                                                    <label for="validationCustom04" class="form-label">Letter of Intent</label>

                                                </div>
                                                <?php
                                                if (!empty($intent)) {
                                                    echo '<div class="file-container">';
                                                    echo '<a href="' . $intent . '" target="_blank" rel="noopener noreferrer">View PDF</a>';
                                                    echo '<i class="bi bi-x-lg text-danger mx-2 remove-file" data-type="intent" data-file-id="' . $intent . '"></i>';
                                                    echo '</div>';
                                                } else {
                                                    echo '<input type="file" class="form-control" name="intent"/>';
                                                    echo '<p>No file uploaded</p>';
                                                }
                                                ?>
                                            </div>



                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="validationCustom04" class="form-label">2x2 Picture</label>


                                            </div>
                                            <?php
                                            if (!empty($bypic)) {
                                                echo '<div class="file-container">';
                                                echo '<a href="view_image.php?image=' . $bypic . '" target="_blank" rel="noopener noreferrer">';
                                                echo '<img src="' . $bypic . '" alt="2x2 Picture" class="img-fluid w-25">';
                                                echo '</a>';
                                                echo '<i class="bi bi-x-lg text-danger mx-2 remove-file" data-type="bypic" data-file-id="' . $bypic . '"></i>';
                                                echo '</div>';
                                            } else {
                                                echo '<input type="file" class="form-control" name="bypic" >';
                                                echo '<p>No image uploaded</p>';
                                            }
                                            ?>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="validationCustom04" class="form-label">Signature of Farmer Cooperator</label>

                                            </div>
                                            <?php
                                            if (!empty($signature)) {
                                                echo '<div class="file-container">';
                                                echo '<a href="view_image.php?image=' . $signature . '" target="_blank" rel="noopener noreferrer">';
                                                echo '<img src="' . $signature . '" alt="Signature" class="img-fluid w-25">';
                                                echo '</a>';
                                                echo '<i class="bi bi-x-lg text-danger mx-2 remove-file"
         data-type="signature" data-file-id="' . $signature . '"></i>';
                                                echo '</div>';
                                            } else {
                                                echo '<input type="file" class="form-control" name="signature">';
                                                echo '<p>No image uploaded</p>';
                                            }
                                            ?>
                                        </div>


                                        <div class="col-12 d-flex align-items-end justify-content-end gap-2">
                                            <button type="submit" class="btn btn-warning" name="submit">Update</button>
                                            <button type="reset" class="btn btn-primary">Clear</button>
                                            <a href="ct.php" class="btn btn-danger">Cancel</a>
                                        </div>
                        </form><!-- End Custom Styled Validation with Tooltips -->
                    </div>

                </div>
            </div>
            </div>

            </div>

        </section>
    </main> <!--END MAIN-->
    <?php include '../includes/footer.php' ?>
    <script src="deleteImage.js"></script>

    <script>
        // Get a reference to the select element
        var selectElement = document.getElementById("validationCustom04");

        // Get a reference to the spouse input element
        var spouseInput = document.getElementById("spouse");

        // Add an event listener to the select element
        selectElement.addEventListener("change", function() {
            // Check if the selected option's value is "Married"
            if (this.value === "Married") {
                // If "Married" is selected, show the spouse input
                spouseInput.style.display = "block";
            } else {
                // If any other civil status is selected, hide the spouse input
                spouseInput.style.display = "none";
            }
        });
    </script>

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