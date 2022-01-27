<?php
    require 'logged_check.php';
    require 'util.php';
    if (isset($_GET["id"])) {
        $id=$_GET["id"];
        delete_news($id);
  //      clean_uploads("jpg");
  //      clean_uploads("png");
    }
    header("location:blog.php");