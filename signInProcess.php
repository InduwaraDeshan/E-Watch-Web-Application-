<?php

session_start();
require "connection.php";

$email = $_POST["e"];
$password = $_POST["p"];
$rememberMe = $_POST["rm"];




if (empty($email)) {
    echo "Please Enter Your Email Address.";
} else if (strlen($email) > 100) {
    echo "Email Address should containt less than 100 characters.";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid Email Address.";
} else if (empty($password)) {
    echo "Please Enter Your Password.";
} else if (strlen($password) < 5 || strlen($password) > 20) {
    echo "Invalid Password";
} else {
    $resultset =  Database::search("SELECT * FROM `user` WHERE  `email`='" . $email . "' AND `password`='" . $password . "'");
    $n = $resultset->num_rows;
    if ($n == 1) {
        $user_status = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "'");
        $user_data = $user_status->fetch_assoc();
        $status_number = $user_data["status_id"];

        if ($status_number == 1) {
            echo "success";

            $d = $resultset->fetch_assoc();
            $_SESSION["u"] = $d;
    
    
            if ($rememberMe == "true") {
    
                setcookie("email", $email, time() + (60 * 60 * 24 * 365));
                setcookie("password", $password, time() + (60 * 60 * 24 * 365));
            } else {
                setcookie("email", "", -1);
                setcookie("password", "", -1);
            }

        } else {
            echo "Wrong";
        }


    } else {
        echo "Invalid Email or Password";
    }
}

?>