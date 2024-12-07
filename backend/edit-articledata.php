<?php
session_start();
require_once '../dbConnect.php';
  if(isset($_GET["article"])) {
    $article_id = $_GET["article"];

    if(isset($_POST['submit'])){
      $title = $_POST['title'];
      $slug = $_POST['slug'];
      $smalldes = $_POST['smalldes'];
      $cat = $_POST['cat'];
      $content = $_POST['content'];
      $content = nl2br($content);
      $conttype = $_POST['conttype'];

      $tags = $_POST['tags'];
      $tagname = explode(',', $tags);

      $imagename = $_FILES["uploadimagecover"]["name"];
      $tempimagename = $_FILES["uploadimagecover"]["tmp_name"];
      $folder = "assets/imgs/articles/" . $imagename;
      $actualfolder = '../' . $folder;

      if (move_uploaded_file($tempimagename, $actualfolder)) {
        echo "<h3> Image uploaded and moved successfully!</h3>";
      } else {
        echo "<h3> Failed to upload image!</h3>";
      }
      if ($folder != "assets/imgs/articles/") {
        if ($q = $mysqli -> query("UPDATE articles SET title = '$title' , slug = '$slug', featured_image = '$folder',  small_des = '$smalldes',
          category_id = '$cat', content = '$content', type = '$conttype' WHERE article_id = '$article_id'")) {
            if ($a = $mysqli -> query("DELETE FROM article_tags WHERE article_id = '$article_id'")) {
              foreach ($tagname as $t) {
                if ($tagsnames = $mysqli -> query("SELECT tag_id FROM tags WHERE tag_name = '$t'")) {
                  if ($tagsnames ->num_rows > 0) {
                    if ($tagsnamesdata = mysqli_fetch_row($tagsnames)) {
                      $tagid = $tagsnamesdata[0];
                      if ($b = $mysqli -> query("INSERT INTO article_tags (article_id, tag_id) VALUES ('$article_id', '$tagid')")) {
                      }
                    }
                  }else {
                    if ($d = $mysqli -> query("INSERT INTO tags (tag_id, tag_name) VALUES (null, '$t')")) {
                      if ($tagscon = $mysqli -> query("SELECT tag_id FROM tags WHERE tag_name = '$t'")) {
                        if ($tagscon ->num_rows > 0) {
                          if ($tagscondata = mysqli_fetch_row($tagscon)) {
                            $tagid = $tagscondata[0];
                            if ($b = $mysqli -> query("INSERT INTO article_tags (article_id, tag_id) VALUES ('$article_id', '$tagid')")) {
                            }
                          }
                        }
                      }
                    }
                  }
                }
              }
            }
          }
      }else {
        if ($q = $mysqli -> query("UPDATE articles SET title = '$title' , slug = '$slug', small_des = '$smalldes',
          category_id = '$cat', content = '$content', type = '$conttype' WHERE article_id = '$article_id'")) {
            if ($a = $mysqli -> query("DELETE FROM article_tags WHERE article_id = '$article_id'")) {
              foreach ($tagname as $t) {
                if ($tagsnames = $mysqli -> query("SELECT tag_id FROM tags WHERE tag_name = '$t'")) {
                  if ($tagsnames ->num_rows > 0) {
                    if ($tagsnamesdata = mysqli_fetch_row($tagsnames)) {
                      $tagid = $tagsnamesdata[0];
                      if ($b = $mysqli -> query("INSERT INTO article_tags (article_id, tag_id) VALUES ('$article_id', '$tagid')")) {
                      }
                    }
                  }else {
                    if ($d = $mysqli -> query("INSERT INTO tags (tag_id, tag_name) VALUES (null, '$t')")) {
                      if ($tagscon = $mysqli -> query("SELECT tag_id FROM tags WHERE tag_name = '$t'")) {
                        if ($tagscon ->num_rows > 0) {
                          if ($tagscondata = mysqli_fetch_row($tagscon)) {
                            $tagid = $tagscondata[0];
                            if ($b = $mysqli -> query("INSERT INTO article_tags (article_id, tag_id) VALUES ('$article_id', '$tagid')")) {
                            }
                          }
                        }
                      }
                    }
                  }
                }
              }
            }
          }
      }



          $type = $_POST['type'];

          $medianame = $_FILES["media"]["name"];
          $tempmedianame = $_FILES["media"]["tmp_name"];
          $mediafolder = "assets/imgs/articles/" . $medianame;

          if ($mediafolder != "assets/imgs/articles/") {
              $actualmediafolder = '../' . $mediafolder;
          if (move_uploaded_file($tempmedianame, $actualmediafolder)) {
            if ($a = $mysqli -> query("DELETE FROM media WHERE article_id = '$article_id'")) {
              if ($b = $mysqli -> query("INSERT INTO media (media_id, article_id , media_type, media_url) VALUES (null, '$article_id', '$type', '$mediafolder')")) {

                if ($type == 'video') {
                  $videocover = $_FILES["video-cover"]["name"];
                  $tempvideocover = $_FILES["video-cover"]["tmp_name"];
                  $videocoverfolder = "assets/imgs/articles/" . $videocover;
                  echo $videocoverfolder;
                  $actualvideocoverfolder = '../' . $videocoverfolder;
                  if (move_uploaded_file($tempvideocover, $actualvideocoverfolder)) {
                      if ($c = $mysqli -> query("INSERT INTO media (media_id, article_id , media_type, media_url) VALUES (null, '$article_id', 'cover', '$videocoverfolder')")) {
                        header("Location: edit-article.php?articleid=$article_id");
                      }
                  } else {
                    echo "<h3> Failed to upload image cover!</h3>";
                  }
                }
                else {
                  header("Location: edit-article.php?articleid=$article_id");
                }
              } else {
                echo "<h3> Failed to upload media</h3>";
              }
            }
          } else {
            echo "<h3> Failed to move media!</h3>";
          }
        }else {
          header("Location: edit-article.php?articleid=$article_id");
        }
  }
}
?>
