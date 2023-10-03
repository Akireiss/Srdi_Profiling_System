<?php
  session_start();
  include '../db_con.php';
  $db = new db;
  if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">



<body>
<?php include '../includes/header.php' ?>
<?php include '../includes/sidebar.php' ?>



  <main id="main" class="main">
  <div class="pagetitle">
    <h1>Production</h1><br>
        <div class="row">
          <div class="col-lg-8 mt-0">
            <a href="add_production.php">
              <button type="button" class="btn btn-warning">Add Production</button>
            </a>
          </div>
        </div>
      </div>
   



    <section class="section dashboard mt-2">

       
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
$result = $db->getAllProduction();
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

      $totalPIncome += $row['p_income'];
      // Net Income
      $totalNIncome += $row['n_income'];

  
}
?>

                      <tbody>
                       
                           
                          </td>
                        </tr>
          
                      </tbody>
                    </table>
                    <div class="mx-2 fw-bold">
    <?php 
    echo '<td class="text-uppercase">Total Production Income: </td>';
    echo '<td colspan="2">PHP ' . number_format($totalPIncome, 2, '.', ',') . '</td>';
    ?>  
</div>


<!-- Net Income -->

<div class="mx-2 fw-bold">
<?php 
    echo '<td class="text-uppercase">Total Net Income: </td>';
    echo '<td colspan="2">PHP ' . number_format($totalNIncome, 2, '.', ',') . '</td>';
    ?>  
</div>

                  </div>
                </div>
              </div>
            </div>


            <!-- Another Table -->
            
         
     
             
</section>


  </main><!-- End #main -->
  <?php include '../includes/footer.php' ?>
</body>

</html>