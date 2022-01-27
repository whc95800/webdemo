<?php
include 'logged_check.php';
require 'util.php';

if (isset($_POST["HISTORY_ID"]) && isset($_POST["COMPANY_CD"]) && isset($_POST["TITLE"]) && isset($_POST["CONTENT"])) {
    $id = $_POST["HISTORY_ID"];
    $code = $_POST["COMPANY_CD"];
    $title = $_POST["TITLE"];
    $content = $_POST["CONTENT"];
    
    $re = insert_history_set($id, $code, $title, $content, $_SESSION["username"]);
    if ($re) {
        echo json_encode(array(
            "status" => true
        ));
    } else {
        echo json_encode(array(
            "status" => false
        ));
    }
}else{
    echo json_encode(array(
        "status" => false
    ));
}

