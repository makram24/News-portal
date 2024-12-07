<?php
session_start();
require_once 'dbConnect.php';

    if(isset($_POST['subscribe'])){
      $email = $_POST['email'];
      $phone = $_POST['phone'];

      $sms = 'off';
      $emailsub = 'off';
      $push = 'off';

      if (isset($_POST['sms'])) {
        $sms = $_POST['sms'];
      }
      elseif (isset($_POST['emailsub'])) {
        $emailsub = $_POST['emailsub'];
      }
      elseif (isset($_POST['push'])) {
        $push = $_POST['push'];
      }

      if ($q = $mysqli -> query("INSERT INTO subscribe (id , email,	phone, emaildata, sms, push)
        VALUES (null, '$email', '$phone', '$emailsub', '$sms', '$push')")) {
          header("Location: index.php?subscribe=1");
      }else {
        header("Location: index.php?subscribe=0");
      }
    }
?>
