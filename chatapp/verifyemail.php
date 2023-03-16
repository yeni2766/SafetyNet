<?php
session_start();

require_once 'safety.php';

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $sql = "SELECT * FROM users WHERE activationcode='$token' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $query = "UPDATE users SET activeaccounts=1 WHERE activationcode='$token'";

        if (mysqli_query($conn, $query)) {
           
            echo  "Your email address has been verified successfully";
    
                 header("location: safetynetloginparents.php");
            exit(0);
        }
    } else {
        echo "User not found!";
    }
} else {
    echo "No token provided!";
}
?>