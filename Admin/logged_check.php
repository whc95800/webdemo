<?php
session_start();
if (! isset($_SESSION["username"]) || $_SESSION["username"] == null) {
    header("location:login.php");
    exit();
}
