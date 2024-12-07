<?php
session_start();
require_once '../dbConnect.php';

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

            if ($q = $mysqli -> query("INSERT INTO users (user_id , name, email , password	, role	, subscription_status, image)
            VALUES (null, '$name', '$email', '$password', '$roledata', '$statusdata', '$folder' )")) {
              if ($roledata == 'editor') {
                if ($users = $mysqli -> query("SELECT * FROM users ORDER BY user_id DESC LIMIT 1")) {
                  if ($users ->num_rows > 0) {
                    if ($usersdata = mysqli_fetch_row($users)) {
                      $userid = $usersdata[0];
                      if ($q = $mysqli -> query("INSERT INTO authors (author_id , name, bio , email	, profile_image	, user_id)
                      VALUES (null, '$name', '', '$email', '$folder', '$userid')")) {
                        header("Location: users-list.php");
                      }
                    }
                  }
                }
              }else {

                header("Location: users-list.php");
              }
            }
          }else {
            if ($q = $mysqli -> query("INSERT INTO users (user_id , name, email , password	, role	, subscription_status, image)
            VALUES (null, '$name', '$email', '$password', '$roledata', '$statusdata', 'assets/imgs/user.png' )")) {
                  header("Location: users-list.php");
              }
          }
        }else {
          header("Location: users-list.php?perror=1");
        }
      }


  }
?>
