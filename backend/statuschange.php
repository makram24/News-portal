<?php
session_start();
require_once '../dbConnect.php';

    if((isset($_POST["statusdata"])) && (isset($_POST["articleid"]))) {
        $output = '';
        $statusdata = $_POST["statusdata"];
        $articleid = $_POST["articleid"];
        $t = date("Y-m-d");
        if ($mysqli -> query("UPDATE articles SET status = '$statusdata' , published_at = '$t' WHERE article_id = '$articleid'")) {
            $output = 'Status Updated';
        }else{
            $output = 'Status Update Failed';
        }

    echo $output;
    }
?>
