<?php
require_once 'dbConnect.php';
session_start();

if(isset($_POST["login"])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if ($result = $mysqli -> query("SELECT * FROM users WHERE email = '$email' and password = '$password'")) {
     if ($result ->num_rows > 0) {
       if ($row = mysqli_fetch_row($result)) {
         $id = $row[0];
         $_SESSION["id"] = $id;
         $_SESSION["username"] = $row[1];
         $_SESSION["role"] = $row[4];

         if ($row[4] == "subscriber") {
           header("Location: index.php");
         }
         if ($row[4] == "editor") {
           if ($author = $mysqli -> query("SELECT * FROM authors WHERE user_id = '$id'")) {
            if ($author ->num_rows > 0) {
              if ($authdata = mysqli_fetch_row($author)) {
               $_SESSION["authorid"] = $authdata[6];
               header("Location: backend/editor.php");
               }
             }
           }
         }
         if ($row[4] == "admin") {
           header("Location: backend/index.php");
         }
       }
     }else{
       header("Location: login.php?error=1");
     }
   }
 }
 ?>
