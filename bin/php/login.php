<?php
session_start();
include "../db_con.php";

if (isset($_POST['email']) && isset($_POST['pass'])) {

    $email = $_POST['email'];
    $pass = md5($_POST['pass']);

    if (empty($email)) {
        $em = "Email is required";
        header("Location: ../index.php?error=$em");
        exit;
    } else if (empty($pass)) {
        $em = "Password is required";
        header("Location: ../index.php?error=$em");
        exit;
    } else if (strlen($pass) < 8) {
        $em = "Password must be at least 8 characters long";
        header("Location: ../index.php?error=$em");
        exit;
    } else {

        $sql = "SELECT * FROM users
              LEFT JOIN utype 
              ON users.utype_id=utype.utype_id 
              WHERE email = ? and password = ?";

        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $email, $pass);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);

            $userid =  $user['userid'];
            $uemail =  $user['email'];
            $password = $user['password'];
            $fname =  $user['fname'];
            $mname =  $user['mname'];
            $lname =  $user['lname'];
            $pnumber =  $user['pnumber'];
            $utype_id = $user['utype_id'];

            if ($uemail == $email && $pass == $password) {
                $_SESSION['userid'] = $userid;
                $_SESSION['fname'] = $fname;
                $_SESSION['utype_id'] = $utype_id;

                if ($utype_id == 1) {
                    header("Location: ../admin/adminindex.php");
                    exit;
                } else {
                    header("Location: ../staff/staffindex.php");
                    exit;
                }
            } else {
                $em = "Incorrect Email or password";
                header("Location: ../index.php?error=$em");
                exit;
            }
        } else {
            $em = "Incorrect Email or password";
            header("Location: ../index.php?error=$em");
            exit;
        }
    }
}