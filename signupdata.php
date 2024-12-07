<?php
require_once 'dbConnect.php';
session_start();

if(isset($_POST["submit"])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];

  if ($password == $cpassword) {
      if ($q = $mysqli -> query("INSERT INTO users (user_id , name, email , password	, role	, subscription_status, image)
      VALUES (null, '$name', '$email', '$password', 'subscriber', 'active', 'assets/imgs/user.png' )")) {
          header("Location: login.php");
      }
  }else {
    header("Location: signup.php?error=1");
  }
 }
 ?>
