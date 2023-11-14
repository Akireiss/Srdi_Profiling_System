<?php
session_start();
include '../db_con.php';
$db = new db();
if (!isset($_SESSION['user_id'])) {
  header("Location: ../auth/login.php");
}
$cocoonCount = $db->countCocoon();
$cocoonCountInactive = $db->countCocoonInactive();
$siteCount = $db->countSite();
$productionCount = $db->countProduction();
$seedCount = $db->countSeed();
$commercialCount = $db->countCommercial();
$barCount = $db->barChart();
?>

<!DOCTYPE html>
<html lang="en">

<body>

  <?php include '../includes/header.php' ?>
  <?php include '../includes/staff.sidebar.php' ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->




    <section class="section dashboard mt-5">


      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!--  Cocoon Producers Card -->
            <div class="col-xxl-3 col-md-4">
              <div class="card info-card Cocoon Producers-card">
                <div class="card-body">
                  <h5 class="card-title">Cocoon Producers Active</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background-color: #F6F6FE;">
                      <i class="bi bi-people" style="color: blue; font-size: 32px;"></i>
                    </div>
                    <div class="ps-3">
                      <h6 class="display-4"><?php echo $cocoonCount; ?></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xxl-3 col-md-4">
              <div class="card info-card Cocoon Producers-card">
                <div class="card-body">
                  <h5 class="card-title">Cocoon Producers Inactive</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background-color: #F6F6FE;">
                      <i class="bi bi-person-fill-x" style="color: blue; font-size: 32px;"></i>
                    </div>
                    <div class="ps-3">
                      <h6 class="display-4"><?php echo $cocoonCountInactive; ?></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xxl-3 col-xl-4">
              <div class="card info-card production-card">
                <div class="card-body">
                  <h5 class="card-title">Project Site</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background-color: #F6F6FE;">
                      <i class="bi bi-house" style="color: black; font-size: 28px;"></i>
                    </div>
                    <div class="ps-3">
                      <h6 class="display-4"><?php echo $siteCount; ?></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-xxl-3 col-xl-4">

              <div class="card info-card seed-card">
                <div class="card-body">
                  <h5 class="card-title">Seed Cocoon</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background-color: #F6F6FE;">
                      <i class="bi bi-person-workspace" style="color: black;"></i>
                    </div>
                    <div class="ps-3">
                      <h6 class="display-4"> <?php echo $seedCount; ?></h6>
                    </div>
                  </div>
                </div>
              </div>
              </a>

            </div>

            <div class="col-xxl-3 col-xl-4">

              <div class="card info-card commercial-card">
                <div class="card-body">
                  <h5 class="card-title">Commercial</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background-color: #F6F6FE;">
                      <i class="bi bi-person-workspace" style="color: black;"></i>
                    </div>
                    <div class="ps-3">
                      <h6 class="display-4"> <?php echo $commercialCount; ?></h6>
                    </div>
                  </div>
                </div>
              </div>
              </a>

            </div>

            <div class="col-xxl-3 col-xl-4">
              <div class="card info-card production-card">
                <div class="card-body">
                  <h5 class="card-title">Total Production(kg)</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="box-shadow: 0 0 10px rgba(70, 130, 180, 1);">
                      <i class="bi bi-tools" style="color: steelblue;"></i>
                    </div>

                    <?php
                    // Your PHP code to fetch and display the total production here
                    $db_host = "localhost";
                    $db_user = "root";
                    $db_password = "";
                    $db_name = "profiling_system";

                    $con = new mysqli($db_host, $db_user, $db_password, $db_name);

                    if ($con->connect_error) {
                      die("Connection failed: " . $con->connect_error);
                    }


                    $query = "SELECT SUM(total_production) AS total_production_sum FROM production";
                    $result = $con->query($query);

                    if (!$result) {
                      die("Query failed: " . $con->error);
                    }

                    $row = $result->fetch_assoc();
                    $totalProductionSum = $row['total_production_sum'];

                    echo '
        <div class="ps-3">
        <h6 class="display-5">' . $totalProductionSum . '</h6>
        </div>';

                    ?>
                  </div>

                </div>
              </div>
            </div>





            <div class="col-xxl-3 col-xl-4">
              <div class="card info-card production-card">
                <div class="card-body">
                  <h5 class="card-title">Gross Income</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background-color:#F6F6FE;">
                      <i class="bi bi-cash-coin" style="color:green; font-size:28px;"></i>
                    </div>
                    <div class="ps-3">
                      <h6 class="display-4">

                        <?php
                        $query = "SELECT SUM(p_income) AS total_income_sum FROM production";
                        $result = $con->query($query);

                        if (!$result) {
                          die("Query failed: " . $con->error);
                        }

                        $row = $result->fetch_assoc();
                        $totalncome = $row['total_income_sum'];

                        echo '
      <div class="ps-3">
      <h6 class="display-6">' . $totalncome . '</h6>
      </div>';

                        ?>



                      </h6>
                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Production Card -->

            <div class="col-xxl-3 col-md-4">
              <div class="card info-card numberofcocoonproducers-card">

                <div class="card-body">
                  <h5 class="card-title">Net Income </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background-color:aliceblue;">
                      <i class="bi bi-cash" style=" color: green; font-size: 27px; "></i>
                    </div>
                    <div class="ps-3">
                      <h6 class="display-4">


                        <?php
                        $query = "SELECT SUM(n_income) AS total_n_income FROM production";
                        $result = $con->query($query);

                        if (!$result) {
                          die("Query failed: " . $con->error);
                        }

                        $row = $result->fetch_assoc();
                        $totaln_Income = $row['total_n_income'];

                        echo '
                <div class="ps-3">
                <h6 class="display-6">' . $totaln_Income . '</h6>
                </div>';

                        ?>




                      </h6>
                    </div>
                  </div>
                </div>

              </div>
            </div>




          </div>

          <div class="row">
            <div class="col-lg-12 ">
              <div class="card">
                <canvas id="myChart" class="px-4" style="max-height: 600px;"></canvas>
              </div>
            </div>
            <div class="col-lg-6">
            </div>
          </div>



        </div>
      </div>
    </section>


  </main>

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

  <?php include '../includes/footer.php' ?>



</body>

</html>