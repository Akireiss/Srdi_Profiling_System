<?php
// During password reset, hash the new password with MD5
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $newPassword = $_POST['new_password']; 
    $confirmPassword = $_POST['confirm_password'];

    if ($newPassword !== $confirmPassword) {
        echo 'Passwords do not match. Please try again.';
    } else {
        $newPasswordHash = md5($newPassword);

        $con = mysqli_connect('localhost', 'root', '', 'profiling_system') or die(mysqli_error());

        if ($con->connect_error) {
            die("Could not connect to MySQL: " . $con->connect_error);
        }

        $updateQuery = "UPDATE users SET password = ? WHERE username = ?";
        $stmt = $con->prepare($updateQuery);
        $stmt->bind_param('ss', $newPasswordHash, $username);

    if ($stmt->execute()) {
        echo 'Password reset successfully.';
    } else {
        echo 'Error updating password: ' . $conn->error;
    }

        $stmt->close();
        $con->close();
    }
}

if (isset($_GET['username'])) {
    $username = urldecode($_GET['username']);
} else {
    // Handle the case where the username parameter is missing
    echo 'Username is missing.';
    exit;
}

?>

<!-- Your HTML form -->
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
 integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Password Reset</h5>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="username" class=" mt-2">Username</label>
                            <input type="text" disabled name="username" class="form-control" value="<?php echo htmlspecialchars($username); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="new_password" class="mt-2">New Password</label>
                            <input type="password" name="new_password" class="form-control " required>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password" class="mt-2">Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control " required>
                        </div>
                        <div class="text-right mt-2">
                            <button class="btn btn-success" type="submit">Reset Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



</body>
</html>

