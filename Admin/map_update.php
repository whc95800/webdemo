<?php
include 'logged_check.php';
require 'util.php';
foreach ($_POST as $key => $value) {
    if (! update_map_set($key, trim($value))) {
        echo json_encode(array(
            "status" => false
        ));
        exit(0);
    }
}
update_map_set("UPDATE_USER", $_SESSION["username"]);
echo json_encode(array(
    "status" => true
));