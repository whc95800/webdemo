<?php
    require 'logged_check.php';
    require 'util.php';
    
    if(isset($_POST["catalogueId"]) && isset($_POST["catalogueName"])){
        $id=$_POST["catalogueId"];
        $name=$_POST["catalogueName"];
        $re=update_type($id, $name);
        echo json_encode(array("status"=>$re));
    }else{
        echo json_encode(array("status"=>false));
    }