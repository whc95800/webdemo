<?php
require 'logged_check.php';
require 'util.php';

$file = $_FILES["file"];
if (isset($file)) {
    $re = file_upload($file);
    if($re[0]){
        echo json_encode(array("status"=>$re[0],"url"=>$re[1]));
    }else{
        echo json_encode(array("status"=>$re[0],"msg"=>$re[1]));
    }
}