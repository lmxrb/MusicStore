<?php
    session_start();
    require_once('../php/connection.php');
    date_default_timezone_set('Europe/Lisbon');
    mysqli_set_charset($connection, "utf8");
    $email = mysqli_real_escape_string($connection, $_POST["email"]);
    $_SESSION["email"] = $email;
    $sql = "SELECT * FROM users WHERE resetID IS NULL and email = '" . $email . "'";
    $result = mysqli_query($connection, $sql);
    $resetID = substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', mt_rand(1,10))), 1, 32);;
    if (mysqli_num_rows($result) == 1) {
       $sql = "UPDATE users SET resetID = '".$resetID."' WHERE email = '". $email. "'";
       $result = mysqli_query($connection, $sql);
    }
?>