<?php
session_start();
require_once '../dbConnect.php';

if(($_SESSION["role"] == 'editor') || ($_SESSION["role"] == 'admin')){
  if(isset($_GET["type"])) {
    $type = $_GET["type"];
    if ($type == 'media') {
      if((isset($_GET["mediaid"])) && isset($_GET["article"])) {
        $mediaid = $_GET["mediaid"];
        $articleid = $_GET["article"];

        if ($q = $mysqli -> query("DELETE FROM media WHERE media_id = '$mediaid' and article_id = '$articleid'")) {
          header("Location: edit-article.php?articleid=$articleid");
        }else {
          echo "Error: " .$result->error . "<br>" ;
          header("Location: edit-article.php?articleid=$articleid");
        }
      }
    }

    if ($type == 'cover'){
      if(isset($_GET["article"])) {
        $articleid = $_GET["article"];

        if ($q = $mysqli -> query("UPDATE articles SET featured_image = '' WHERE article_id = '$articleid'")) {
          header("Location: edit-article.php?articleid=$articleid");
        }else {
          echo "Error: " .$result->error . "<br>" ;
          header("Location: edit-article.php?articleid=$articleid");
        }
      }
    }

    if ($type == 'user'){
      if(isset($_GET["userid"])) {
        $userid = $_GET["userid"];

        if ($q = $mysqli -> query("UPDATE users SET image = '' WHERE user_id = '$userid'")) {
          header("Location: edit-user.php?userid=$userid");
        }else {
          echo "Error: " .$result->error . "<br>" ;
          header("Location: edit-user.php?userid=$userid");
        }
      }
    }

    if ($type == 'ad'){
      if(isset($_GET["id"])) {
        $id = $_GET["id"];

        if ($q = $mysqli -> query("UPDATE advertisements SET ad_image = '' WHERE ad_id = '$id'")) {
          header("Location: edit-promotion.php?id=$id");
        }else {
          echo "Error: " .$result->error . "<br>" ;
          header("Location: edit-promotion.php?id=$id");
        }
      }
    }
  }
}
?>
