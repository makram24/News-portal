<?php
session_start();
require_once '../dbConnect.php';
  if(isset($_GET["userid"])) {
    $userid = $_GET["userid"];

    if(isset($_POST['submit'])){
      $name = $_POST['name'];
      $email = $_POST['email'];
      $roledata = $_POST['roledata'];
      $statusdata = $_POST['statusdata'];

      $password = $_POST['password'];
      $rpassword = $_POST['rpassword'];

      if (($password != '') && ($rpassword != '')) {
        if ($password == $rpassword) {
          $imagename = $_FILES["uploadimageuser"]["name"];
          $tempimagename = $_FILES["uploadimageuser"]["tmp_name"];
          $folder = "assets/imgs/users/" . $imagename;
          $actualfolder = '../' . $folder;

          if (move_uploaded_file($tempimagename, $actualfolder)) {
            echo "<h3> Image uploaded and moved successfully!</h3>";
          } else {
            echo "<h3> Failed to upload image!</h3>";
          }
          if ($folder != "assets/imgs/users/") {
            if ($q = $mysqli -> query("UPDATE users SET name = '$name' , email = '$email', image = '$folder',  role = '$roledata',
              password = '$password', subscription_status = '$statusdata' WHERE user_id = '$userid'")) {
                  header("Location: edit-user.php?userid=$userid");
              }
          }else {
            if ($q = $mysqli -> query("UPDATE users SET name = '$name' , email = '$email', role = '$roledata',
              password = '$password', subscription_status = '$statusdata' WHERE user_id = '$userid'")) {
                  header("Location: edit-user.php?userid=$userid");
              }
          }
        }else {
          header("Location: edit-user.php?userid=$userid&perror=1");
        }
      }else {
        $imagename = $_FILES["uploadimageuser"]["name"];
        $tempimagename = $_FILES["uploadimageuser"]["tmp_name"];
        $folder = "assets/imgs/users/" . $imagename;
        $actualfolder = '../' . $folder;

        if (move_uploaded_file($tempimagename, $actualfolder)) {
          echo "<h3> Image uploaded and moved successfully!</h3>";
        } else {
          echo "<h3> Failed to upload image!</h3>";
        }
        if ($folder != "assets/imgs/users/") {
          if ($q = $mysqli -> query("UPDATE users SET name = '$name' , email = '$email', image = '$folder',  role = '$roledata',
            subscription_status = '$statusdata' WHERE user_id = '$userid'")) {
                header("Location: edit-user.php?userid=$userid");
            }
        }else {
          if ($q = $mysqli -> query("UPDATE users SET name = '$name' , email = '$email', role = '$roledata',
            subscription_status = '$statusdata' WHERE user_id = '$userid'")) {
                header("Location: edit-user.php?userid=$userid");
            }
        }
      }


  }
}
?>
