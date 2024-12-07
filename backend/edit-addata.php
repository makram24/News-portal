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
        if ($q = $mysqli -> query("UPDATE advertisements SET title = '$title' , link = '$link', start_date = '$sdate',  end_date = '$edate',
          location = '$loc', ad_image = '$folder' WHERE ad_id = '$id'")) {
            header("Location: edit-promotion.php?id=$id");
          }else {
              header("Location: edit-promotion.php?id=$id&error=1");
          }
        }else {
          if ($q = $mysqli -> query("UPDATE advertisements SET title = '$title' , link = '$link', start_date = '$sdate',  end_date = '$edate',
            location = '$loc' WHERE ad_id = '$id'")) {
              header("Location: edit-promotion.php?id=$id");
            }else {
                header("Location: edit-promotion.php?id=$id&error=1");
            }
        }
      }
  }
?>
