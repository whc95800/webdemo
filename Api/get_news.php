<?php
require 'util.php';
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $re = get_news_json($id);
    echo $re;
} else {
    header("location:index.php");
}