<?php
  session_start();
  include '../db_con.php';
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
    <h1>Cocoon Producers</h1><br>
        <div class="row">
          <div class="col-lg-8 mt-0">
            <a href="cocoonproducers.php">
              <button type="button" class="btn btn-warning">Add Cocoon Producer</button>
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
                          <th scope="col">Name</th>
                          <th scope="col">Address</th>
                          <th scope="col">Status</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                    

<?php
$result = $db->getProducer();
while ($row = mysqli_fetch_array($result)) {
    echo '<tr>';
    echo '<td>' . $row['name'] . '</a></td>';
    echo '<td>' . $row['citymunDesc'] . ', ' . $row['provDesc'] . ', ' . $row['regDesc'] . '</td>';
    echo '<td>' . $row['status'] . '</td>';
    echo '<td>';
    echo '<a href="view_producer.php?cocoon_id=' . $row['cocoon_id'] . '"><i class="ri-eye-line bigger-icon"></i></a>';
    // Fix the edit link
    echo '<a href="edit_producer.php?cocoon_id=' . $row['cocoon_id'] . '"><i class="bi bi-pencil-square bigger-icon"></i></a>';
    echo '<a target="_blank" href="../pdf/index.php?cocoon_id=' . $row['cocoon_id'] . '" id=' . $row['cocoon_id'] . '"><i class="bi bi-file-pdf-fill bigger-icon red"></i></a>';
    echo '</td>';
    echo '</tr>';
}
?>

                      <tbody>
                       
                           
                          </td>
                        </tr>
          
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
         
     
             
</section>


  </main><!-- End #main -->
  <?php include '../includes/footer.php' ?>
</body>

</html>

<style>
    .bigger-icon {
        font-size: 24px; /* Adjust the font size as needed */
        margin-left: 2px;
        margin-right: 2px;
    }
    
    .red {
        color: red; /* Set the text color to red */
    }
</style>