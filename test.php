<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "srdi_profiling";
$con = mysqli_connect($dbhost, $dbuser, $dbpass , $db) or die($con);
?>
<?php

if (isset($_POST['submit'])) {
  $regionId = $_POST['beekeeper_region'];
  $provinceId = $_POST['beekeeper_province'];
  $cityId = $_POST['beekeeper_municipality'];
  $barangayId = $_POST['beekeeper_barangay'];

  // Perform any necessary data validation and sanitation here before inserting into the database

  $sql = "INSERT INTO address (region_id, province_id, municipality_id, barangay_id)
   VALUES ('$regionId', '$provinceId', '$cityId', '$barangayId')";

  if (mysqli_query($con, $sql)) {
      // Address data saved successfully
      echo "Address data saved successfully.";
  } else {
      // Error occurred while saving data
      echo "Error: " . mysqli_error($con);
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Address</title>
</head>

<body>

  <main id="main" class="main">

    

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
           
          <div class="card">
            <div class="card-body">
              
              <h5 class="card-title">Personal Information</h5>
              

         
              <form class="row g-3 needs-validation" novalidate action ="" enctype="multipart/form-data" method="POST">
              
              
              
              <div class="col-md-3 position-relative">
                  <label class="form-label">Region<font color = "red">*</font></label>
                  <div class="col-sm-12">
                    <select class="form-select" aria-label="Default select example" name = "beekeeper_region" id="region" required>
                      <option value="" selected disabled>Select Region</option>
                      <?php
                        $sql = "SELECT * FROM region";
                        $result=mysqli_query($con, $sql);
                        while($row=mysqli_fetch_array($result)){
                          echo ucwords('<option value="'.$row['regCode'].'">' . $row['regDesc'] . '</option>');
                        }
                      ?>
                    </select>
                  </div>
                </div>

                <div class="col-md-3 position-relative">
                  <label class="form-label">Province<font color = "red">*</font></label>
                  <div class="col-sm-12">
                    <select class="form-select" aria-label="Default select example" name = "beekeeper_province" id="province" required>
                      <option value="" selected disabled>Select Province</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-3 position-relative">
                  <label class="form-label">City/Municipality<font color = "red">*</font></label>
                  <div class="col-sm-12">
                    <select class="form-select" aria-label="Default select example" name = "beekeeper_municipality" id="city" required>
                      <option value="" selected disabled>Select City</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-3 position-relative">
                  <label class="form-label">Barangay<font color = "red">*</font></label>
                  <div class="col-sm-12">
                    <select class="form-select" aria-label="Default select example" name = "beekeeper_barangay" id="barangay" required>
                      <option value="" selected disabled>Select Barangay</option>
                    </select>
                  </div>
                </div>

                
                
                <div class="col-12">
                  <button type="submit" class="btn btn-warning" name="submit">Save</button>
                  <button type="reset" class="btn btn-primary">Cancel</button>
                </div>
              </form><!-- End Custom Styled Validation with Tooltips -->

            </div>
          </div>
        </div>

    </section>

  </main><!-- End #main -->
  
<script src="public/assets/js/jquery.min.js"></script>
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
                    $('#barangay').html('<option value="">Select Barangay</option>');
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

</body>



</html>


///


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<?php
$host = "localhost"; // Replace with your database host (e.g., localhost)
$dbname = "profiling_system"; // Replace with your database name
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Additional PDO configuration options if needed
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// SQL query to count production_id by month
$sql = "SELECT DATE_FORMAT(production_date, '%Y-%m') AS month, COUNT(production_id) AS count
        FROM production
        GROUP BY month
        ORDER BY month";

$result = $pdo->query($sql);

$data = array();

// Fetch the data and format it
while ($row = $result->fetch()) {
    $data[$row['month']] = $row['count'];
}

// Create an array for each month, initializing the count to 0 if no data was found
$xValues = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
$yValues = array_fill(0, 12, 0);

foreach ($data as $month => $count) {
    $monthIndex = (int)explode('-', $month)[1] - 1;
    $yValues[$monthIndex] = $count;
}

// Encode data to JSON
$xValues = json_encode($xValues);
$yValues = json_encode($yValues);
?>

<script>
    var xValues = <?php echo $xValues; ?>;
    var yValues = <?php echo $yValues; ?>;
    var barColors = ["red", "green", "blue", "orange", "brown"];

    new Chart("myChart", {
        type: "bar",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            legend: {
                display: false
            },
            title: {
                display: false,
                text: "Productions"
            }
        }
    });
</script>