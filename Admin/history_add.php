<?php
include 'logged_check.php';
require 'util.php';

$code = $_POST["COMPANY_CD"];
$title = $_POST["TITLE"];
$content = $_POST["CONTENT"];

$re = insert_history_set($code, $title, $content, $_SESSION["username"]);
if ($re) {
    echo json_encode(array(
        "status" => true
    ));
}else{
    echo json_encode(array(
        "status" => false
    ));
}