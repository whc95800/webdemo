<?php
require 'logged_check.php';
require 'util.php';

$id = $_POST["id"];
$title = trim($_POST["title"]);
$catalogue = $_POST["catalogue"];
$content = $_POST["content"];
$file = $_FILES["capture"];

if (empty($file["name"])) {
    if($id>0){        
    $img = get_news($id)[0][4];        #return url
    }else {
        $img="";
    }
} else{
    $img = file_upload($file)[1];      # return (boolean,url)
}

if (empty($title) || empty($catalogue) || empty($content)) {
    header("location:form_editors.php?error=empty");
} else {
    if ($id) {
        update_news($id, $title, $catalogue, $content, $img);
        header("location:blog.php");
    } else {
        $re = insert_news($title, $catalogue, $content, $img);
        if ($re != false) {
            header("location:blog.php");
        } else {
            header("location:form_editors.php?error=insert");
        }
    }
}
    