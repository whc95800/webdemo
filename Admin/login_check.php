<?php
if (isset($_POST["login-submit"])) {

    require 'util.php';

    $username = $_POST["username"];
    $password = $_POST["password"];

    if (empty($username) || empty($password)) {
        header("Location:login.php?error=empty");
        exit();
    }

    if (pwd_check($username, $password)) {
        session_start();
        $_SESSION["username"] = $username;
        header("Location:blog.php");
    } else {
        header("Location:login.php?error=wrongpwd&username=" . $username);
        exit();
    }
} else {
    header("Location:login.php");
    exit();
}


    