<?php
include "../db_con.php";

// Check if the form is submitted
if (isset($_POST['submit'])) {
  // Get the form data
  
  // Prepare the SQL statement
  $sql = "INSERT INTO users (fullname, username, password, user_type_id)
          VALUES (?, ?, ?, ?)";

  $stmt = $con->prepare($sql);

  // Bind the parameters and execute the statement
  $stmt->bind_param('sssi', $fullname, $username, $password, $userType);

  $fullname = $_POST['fullname'];
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $userType = $_POST['user_type_id'];// Assuming userType is submitted through the form

  $stmt->execute();

  // Check if the insertion was successful
  if ($stmt->affected_rows > 0) {
    echo "User inserted successfully.";
  } else {
    echo "Error in inserting user.";
  }

  // Close the statement and database connection
  $stmt->close();
}
?>