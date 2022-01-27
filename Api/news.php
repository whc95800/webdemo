<?php
require 'util.php';
if (isset($_GET["page"])) {
    $page=$_GET["page"];
    $result=get_news_list_json("ニュース",$page);
    echo $result;    
}

