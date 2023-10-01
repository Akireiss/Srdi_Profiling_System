<?php
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
require '../vendor/autoload.php';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userEmail = $_POST['email'];
    
    // Create a MySQLi connection
    $conn = new mysqli('localhost', 'root', '', 'profiling_system');
    
    // Check connection
    if ($conn->connect_error) {
        die("Could not connect to MySQL: " . $conn->connect_error);
    }
    
    // Prepare and execute the query
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $userEmail); // 's' represents string type
    $stmt->execute();
    
    // Get the result
    $result = $stmt->get_result();
    
    // Close the statement and connection
    $stmt->close();
    $conn->close();
    
    // Initialize the user variable
    $user = null;
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc(); // Fetch the user data
        $username = $user['username']; // Assuming 'username' is the column name in your 'users' table
    }
    
    if (!$user) {
        echo 'Email not found in the database. Password reset email was not sent.';
    } else {
        $resetToken = bin2hex(random_bytes(16));
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'reissathena64@gmail.com';
            $mail->Password   = 'jjvqrhyxbqefixoy'; // Replace with your email password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;

            $mail->setFrom('reissathena64@gmail.com', 'Admin');
            $mail->addAddress($userEmail);
            
            $resetLink = 'http://localhost/dmmmsu_srdi_profilings/auth/resetPass.php?token=' . $resetToken . '&username=' . urlencode($user['username']);

            $mail->Subject = 'Password Reset';
            $mail->Body = "Click the link below to reset your password:<br><a href='$resetLink'>$resetLink</a>";
            $mail->AltBody = 'Copy and paste the following URL in your browser: ' . $resetLink;

            $mail->send();
            
            header(location: login.php)
            echo 'Password reset email sent successfully.';
        
        } catch (Exception $e) {
            echo 'An error occurred while sending the email: ' . $e->getMessage();
        }
    }
}
?>






