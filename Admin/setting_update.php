<?php
include 'logged_check.php';
require 'util.php';

foreach ($_POST as $key => $value) {
    if (! update_setting($key, trim($value))) {
        echo json_encode(array(
            "status" => false
        ));
        exit(0);
    }
}
update_setting("UPDATE_USER", $_SESSION["username"]);
echo json_encode(array(
    "status" => true
));