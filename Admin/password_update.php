<?php
include 'logged_check.php';
require 'util.php';

update_user($_SESSION["username"],$_POST["PASSWORD"]);
echo json_encode(array(
    "status" => true
));