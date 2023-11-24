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
      <h1>System Users</h1><br>
      <div class="row">
        <div class="col-lg-8">
          <a href = "add_system_user.php">
            <button type="button" class="btn btn-warning">Add System Users</button>
          </a>
        </div>
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
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">User Type</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
    <?php
    $result = $db->getUser();
    while ($row = mysqli_fetch_array($result)) {
        echo '<tr>';
        echo '<td>' . $row['fullname'] . '</a></td>';
        echo '<td>' . $row['username'] . '</td>';
        echo '<td>' . $row['user_type_name'] . '</td>';
        
        echo '<td>' . $row['user_status'] . '</td>';

        echo '<td>';
        echo '<a href="view_systemuser.php?user_id=' . $row['user_id'] . '"><i class="ri-eye-line"></i></a>';
        echo '<a href="edit_systemuser.php?user_id=' . $row['user_id'] . '"><i class="bi bi-pencil-square"></i></a>';
        echo '</td>';
        echo '</tr>';
    }
    ?>
</tbody>
        </table>
    </div>
</div>

          </div>

        </div>

    </section>

  </main><!--END MAIN-->
  <?php include '../includes/footer.php' ?>
  </body>
</html>