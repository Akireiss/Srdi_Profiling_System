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

       
          <div class="col-md-3">
    <label for="categoryYear" class="form-label">Year Filter</label>
    <select id="categoryYear" class="form-select mb-3">
        <option value="2023">2023</option>
        <option value="2024">2024</option>
        <option value="2025">2025</option>
        <option value="2026">2026</option>
        <option value="2027">2027</option>
        <option value="2028">2028</option>
    </select>
</div>


            <!-- ?php
                    // Fetch categories from the database
                    $categorySql = "SELECT year_id, year_name FROM year";
                    $categoryResult = $con->query($categorySql);

                    // Display category options
                    while ($categoryRow = $categoryResult->fetch_assoc()) {
                        $yearId = $categoryRow['year_id'];
                        $yearName = $categoryRow['year_name'];
                        echo "<option value=\"$yearId\">$yearName</option>";
                    }
                    ?> -->

          <div class="row justify-content-center">
       
        
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>


        </div>


        </div>
      </div>
    </section>


  </main>

  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
   
   <script>
       var myChart;
var xValues = [
    "January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December"
];

function updateChart(data) {
    var yValues = data.map(item => item.production_count);

    var monthColors = [
        'rgba(70, 52, 235)',
        'rgba(162, 52, 235)',
        'rgba(52, 235, 89)',
        'rgba(223, 235, 52)',
        'rgba(0, 128, 0, 1)',
        'rgba(255, 140, 0)',
        'rgba(255, 0, 0, 1)',
        'rgba(255, 215, 0, 1)',
        'rgba(101, 67, 33, 1)',
        'rgba(183, 65, 14, 1)',
        'rgba(139, 0, 0, 1)',
        'rgba(173, 216, 230, 1)'

        // Add additional colors as needed
    ];
    var barColors = xValues.map((month, index) => monthColors[index % monthColors.length]);

    var ctx = document.getElementById('myChart').getContext('2d');

    if (myChart) {
        // Update the existing chart's data
        myChart.data.labels = xValues;
        myChart.data.datasets[0].data = yValues;
        myChart.data.datasets[0].backgroundColor = barColors;
        myChart.update(); // Update the existing chart
    } else {
        myChart = new Chart(ctx, {
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
                    display: true,
                    text: "Total Production"
                }
            }
        });
    }
}

$(document).ready(function() {
    fetchChartData();

    $('#categoryYear').change(function() {
        fetchChartData();
    });

    function fetchChartData() {
        var selectedYear = $('#categoryYear').val();
        $.ajax({
            url: 'barchar.php',
            type: 'GET',
            dataType: 'json',
            data: {
                year: selectedYear
            },
            success: function(data) {
                console.log('Data received:', data);
                updateChart(data);
            },
            error: function(error) {
                console.log('Error fetching data:', error);
            }
        });
    }
});

    </script>




  <?php include '../includes/footer.php' ?>



</body>

</html>