<?php
session_start();
require_once 'dbConnect.php';

$userid = $_SESSION["id"];
if(isset($_GET['articleid'])){
  $articleid = $_GET["articleid"];
  $slug = $_GET["slug"];
  if(isset($_POST['submit'])){
    $comment = $_POST['comment'];
    $strtolower = strtolower($comment);
    if ((str_contains($strtolower, 'fuck')) || (str_contains($strtolower, 'bitch')) || (str_contains($strtolower, 'motherfucker')) ||
    (str_contains($strtolower, 'bastard')) || (str_contains($strtolower, 'bugger'))) {
      if ($q = $mysqli -> query("INSERT INTO comments (comment_id, article_id, user_id, content, status)
      VALUES (null, '$articleid', '$userid', '$comment', 'pending' );")) {
        header("Location: single/$slug");
      }
    }else {
      if ($q = $mysqli -> query("INSERT INTO comments (comment_id, article_id, user_id, content, status)
      VALUES (null, '$articleid', '$userid', '$comment', 'approved' );")) {
        header("Location: single/$slug");
      }
    }

  }
}
?>
