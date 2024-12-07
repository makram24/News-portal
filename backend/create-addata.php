<?php
session_start();
require_once '../dbConnect.php';
  if(isset($_GET["id"])) {
    $id = $_GET["id"];

    if(isset($_POST['submit'])){
      $title = $_POST['title'];
      $link = $_POST['link'];
      $sdate = $_POST['sdate'];
      $edate = $_POST['edate'];
      $loc = $_POST['loc'];

      $imagename = $_FILES["uploadimagecover"]["name"];
      $tempimagename = $_FILES["uploadimagecover"]["tmp_name"];
      $folder = "assets/imgs/Advertise/" . $imagename;
      $actualfolder = '../' . $folder;

      if (move_uploaded_file($tempimagename, $actualfolder)) {
        echo "<h3> Image uploaded and moved successfully!</h3>";
      } else {
        echo "<h3> Failed to upload image!</h3>";
      }
      if ($folder != "assets/imgs/Advertise/") {
        if ($q = $mysqli -> query("INSERT INTO advertisements (ad_id , title, ad_image, link, start_date, end_date, location)
        VALUES (null, '$title', '$folder', '$link', '$sdate', '$edate', '$loc');")) {
            header("Location: create-promotion.php");
          }else {
              header("Location: create-promotion.php?error=1");
          }
        }else {
          header("Location: create-promotion.php?error=1");
        }
      }
  }
?>
