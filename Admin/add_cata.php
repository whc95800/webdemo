<?php
    require 'logged_check.php';
    require 'util.php';
    
    if(isset($_POST["catalogueName"])){
        $name=$_POST["catalogueName"];
        $re=insert_type($name);
        echo json_encode(array("status"=>$re));
    }else {
        echo json_encode(array("status"=>false));
    }
    
    