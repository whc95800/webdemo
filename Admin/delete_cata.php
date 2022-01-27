<?php
    require 'logged_check.php';
    require 'util.php';
    
    if(isset($_POST["catalogueId"])){
        $id=$_POST["catalogueId"];
        $re = delete_type($id);
        echo json_encode(array("status"=>$re));
    }else {
        echo json_encode(array("status"=>false));
    }