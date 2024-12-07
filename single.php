<!DOCTYPE html>
<html class="no-js" lang="en">
<?php
  session_start();
require_once 'dbConnect.php';
// Determine if the request is HTTPS or HTTP
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

// Get the domain name
$domain = $_SERVER['HTTP_HOST'];

// Get the full request URI (including path and query string, if any)
$request_uri = $_SERVER['REQUEST_URI'];

// Combine to form the full URL
$current_url = $protocol . $domain . $request_uri;

// Parse the URL to extract the path
$parsed_url = parse_url($current_url, PHP_URL_PATH);

// Extract the slug (the last part of the URL)
$slug = basename($parsed_url);

?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Makram's News: <?php echo $slug; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/imgs/theme/favicon.png">
    <!-- NewsBoard CSS  -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/widgets.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">



</head>


<body>
    <div class="scroll-progress bg-dark"></div>
    <!-- Start Preloader -->
    <div class="preloader-2">
        <div class="preloader-2-inner d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative wow animated fadeIn">
                <div class="text-center">
                    <h1 class="font-weight-bold">Makram New's.</h1>
                    <p class="text-uppercase">Loading...</p>
                </div>
            </div>
        </div>
    </div>
    <!--Offcanvas sidebar-->
    <?php require 'headersingle.php'; ?>
    <!-- Start Main content -->
    <?php
    $cat = 0;

    if ($article = $mysqli -> query("SELECT * FROM articles where slug = '$slug' and status = 'published'")) {
        if ($article ->num_rows > 0) {
          if ($articledata = mysqli_fetch_row($article)) {
            $cat = $articledata[7];
            $category = "";


            if ($categorydata = $mysqli -> query("SELECT * FROM categories where cat_id = '$cat'")) {
              if ($categorydata ->num_rows > 0) {
                if ($categorydd = mysqli_fetch_row($categorydata)) {
                  $category = $categorydd[1];
                }
              }
            }


             ?>
    <main class="mt-30">
        <div class="container single-content">
            <div class="entry-header entry-header-style-1 mb-30 mt-50">
                <h1 class="entry-title mb-30 font-weight-500">
                    <?php echo $articledata[1]; ?>
                </h1>
                <div class="row">
                    <div class="col-lg-6">
                      <?php
                      $authorid = $articledata[6];
                      $articleid = $articledata[0];
                      if ($author = $mysqli -> query("SELECT * FROM authors where author_id = '$authorid'")) {
                          if ($author ->num_rows > 0) {
                            if ($authordata = mysqli_fetch_row($author)) {
                               ?>
                        <div class="entry-meta align-items-center meta-2 font-small color-muted">
                            <p class="mb-5">
                                By <a href="../author.php?authorid=<?php echo $authordata[0]; ?>"><span class="author-name font-weight-bold"><?php echo $authordata[1]?></span></a>
                            </p>
                            <span class="mr-10"> <?php echo $articledata[9]; ?></span>
                        </div>
                      <?php }
                        }
                      } ?>
                    </div>
                    <div class="col-lg-6 text-right">
                        <div class="single-tools">
                            <div class="entry-meta align-items-center meta-2 font-small color-muted">
                                <span class="mr-15">
                                    <span class="mr-5">Font size</span>
                                    <i class="fonts-size-zoom-in ti-zoom-in mr-5"></i>
                                    <i class="fonts-size-zoom-out ti-zoom-out"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $iamge;
            if ($media = $mysqli -> query("SELECT * FROM media where article_id = '$articleid'")) {
                if ($media ->num_rows > 0) {
                  while ($mediadata = mysqli_fetch_row($media)) {
                    if ($mediadata[2] == 'video') {
                      ?>
                      <figure class="post-thumb d-flex mb-30 border-radius-2 img-hover-scale animate-conner-box post-thum-video">
                          <a href="../<?php echo $mediadata[3]; ?>" class="play-video" data-animate="zoomIn" data-duration="1.5s" data-delay="0.1s">
                              <img src="http://via.placeholder.com/1200x600" alt="post-title">
                              <span class="btn-play-video">
                                  <i class="ti-control-play"></i>
                              </span>
                          </a>
                      </figure>
                      <?php
                    }else if ($mediadata[2] == 'image'){
                      ?>
                      <img src="../<?php echo $mediadata[3]; ?>" style="width:100%" alt="">
                      <?php
                    }
                     ?>

          <?php }
        }
      } ?>
            <!--figure-->
            <article class="entry-wraper mb-50">
                <div class="entry-main-content dropcap wow fadeIn animated">
                  <?php if (!isset($_SESSION["id"])) { ?>
                    <?php if ($articledata[12] == 1) {
                      ?>
                      <div class="alert alert-danger" id="commentlogin" role="alert">
                        Please <a href="../login.php" class="alert-link">Login / Register account</a> to see the content.
                      </div>
                      <?php
                    }else if ($articledata[12] == 0){ ?>
                      <p><?php echo $articledata[4]; ?></p>
                      <hr class="wp-block-separator is-style-wide">
                    <?php }
                  }else {
                    ?>
                    <p><?php echo $articledata[4]; ?></p>
                    <hr class="wp-block-separator is-style-wide">
                    <?php
                  } ?>

                    <div class="border-radius-5 mb-50 border p-30 wow fadeIn animated">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-md-5 mb-2 mb-md-0">
                                <h5 class="font-weight-bold secondfont mb-0 mt-0">Become a member</h5>
                            </div>
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-12 mt-2">
                                        <a href="../login.php" class="btn btn-info btn-block">Register</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Subcrible-->
                    </div>
                <div class="entry-bottom mt-50 mb-30 wow fadeIn animated">
                    <div class="tags">
                      <?php


                      if ($tags = $mysqli -> query("SELECT tags.tag_name FROM tags INNER JOIN article_tags ON article_tags.tag_id = tags.tag_id INNER JOIN articles ON articles.article_id = article_tags.article_id AND articles.article_id = '$articleid'")) {
                          if ($tags ->num_rows > 0) {
                            while ($tagsdata = mysqli_fetch_row($tags)) {
                               ?>
                               <a href="#" rel="tag"><?php echo $tagsdata[0]; ?></a>
                               <?php
                             }
                           }
                         } ?>
                    </div>
                </div>
                <div class="single-social-share clearfix wow fadeIn animated">
                    <ul class="d-inline-block list-inline float-md-right mt-md-0 mt-4">
                        <li class="list-inline-item"><a class="social-icon facebook-icon text-xs-center " href="https://www.facebook.com/sharer/sharer.php?u=https://makramalmoghrabi.com" target="_blank"><i class="ti-facebook"></i></a></li>
                        <li class="list-inline-item"><a class="social-icon twitter-icon text-xs-center" href="https://x.com/intent/tweet?text=<?php echo $articledata[1]; ?>&url=https://makramalmoghrabi.com" target="_blank">
                          <svg width='1em' height ='1em'; xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z">
                            </path>
                          </svg>
                        </a>
                      </li>
                    </ul>
                </div>
                <div class="bt-1 border-color-1 mt-30 mb-30">
                </div>
                  <?php
                    if ($advertisementfooter = $mysqli -> query("SELECT * FROM advertisements WHERE location = 'article'")) {
                       if ($advertisementfooter ->num_rows > 0) {
                         while ($advertisementfooterdata = mysqli_fetch_row($advertisementfooter)) {
                           if (($currentDate >= $advertisementfooterdata[4]) && ($currentDate <= $advertisementfooterdata[5])){

                            ?>
                            <div class="col-lg-12">
                                <div class="sidebar-widget widget-latest-posts mb-30 mt-15 wow fadeIn  animated" style="visibility: visible; animation-name: fadeIn;">
                                    <h6 class="widget-header widget-header-style-4 mb-20 text-center text-uppercase border-top-1 border-bottom-1 pt-5 pb-5">
                                      <span>Advertisement</span>
                                    </h6>
                                    <a class="post-block-list post-module-1 post-module-5" target="_blank" href="<?php echo $advertisementfooterdata[3]; ?>">
                                      <ul class="list-post">
                                          <li class="mb-15">
                                            <img src="../<?php echo $advertisementfooterdata[2]; ?>" alt="">
                                          </li>
                                      </ul>
                                    </a>
                                  </div>
                              </div>
                              <div class="bt-1 border-color-1 mt-30 mb-30">
                              </div>

                            <?php

                           }
                         }
                       }
                     }
                    ?>

                <!--related posts-->
                <div class="related-posts">
                    <h3 class="mb-30">Related posts</h3>
                    <div class="loop-list">
                      <?php
                      if ($articlerelated = $mysqli -> query("SELECT * FROM articles where category_id = '$cat' and status = 'published' Limit 3")) {
                          if ($articlerelated ->num_rows > 0) {
                            while ($articlerelateddata = mysqli_fetch_row($articlerelated)) {
                               ?>
                                <article class="row mb-30 wow fadeIn animated">
                                    <div class="col-md-4">
                                        <div class="post-thumb position-relative thumb-overlay mb-md-0 mb-3">
                                            <div class="img-hover-slide border-radius-5 position-relative" style="background-image: url('../<?php echo $articlerelateddata[5]; ?>')">
                                                <a class="img-link" href="<?php echo $articlerelateddata[2]; ?>"></a>
                                                <span class="top-right-icon background2">
                                                  <i class="mdi mdi-audiotrack"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8 align-center-vertical">
                                        <div class="post-content">
                                            <div class="entry-meta meta-0 font-small mb-15"><a href="category.php?category=<?php echo $category;?>">
                                              <span class="post-cat background1 color-white">#<?php echo $category ?></span></a></div>
                                            <h4 class="post-title mb-15">
                                                   <a href="<?php echo $articlerelateddata[2]; ?>"><?php echo $articlerelateddata[1]; ?></a>
                                            </h4>
                                            <p class="font-medium excerpt"><?php echo $articlerelateddata[3]; ?></p>
                                        </div>
                                    </div>
                                </article>
                          <?php }
                              }
                            } ?>
                    </div>
                </div>
                <!--More posts-->
                <div class="single-more-articles">
                    <h6 class="widget-title mb-30 font-weight-bold text">You might be interested in</h6>
                    <div class="post-block-list post-module-1 post-module-5">
                        <ul class="list-post">
                          <?php
                          if (isset($_SESSION["id"])) {
                            $userid = $_SESSION["id"];
                            if ($preferencesrecomendation = $mysqli -> query("SELECT * FROM user_preferences WHERE user_id = '$userid' order by count DESC Limit 1")) {
                              if ($preferencesrecomendation ->num_rows > 0) {
                                if ($preferencesrecomendationdata = mysqli_fetch_row($preferencesrecomendation)) {
                                  $recomendedcat = $preferencesrecomendationdata[2];

                                  if ($recomendation = $mysqli -> query("SELECT DISTINCT articles.featured_image, articles.title, articles.published_at, articles.slug FROM articles INNER JOIN article_views ON  article_views.article_id  = articles.article_id and articles.category_id = '$recomendedcat' Limit 2;")) {
                                    if ($recomendation ->num_rows > 0) {
                                      while ($recomendationdata = mysqli_fetch_row($recomendation)) {
                                        ?>
                                        <li class="mb-15">
                                            <div class="d-flex">
                                                <div class="post-thumb post-thumb-80 d-flex mr-15 border-radius-5 img-hover-scale">
                                                    <a class="color-white" href="../single/<?php echo $recomendationdata[3]; ?>">
                                                        <img src="../<?php echo $recomendationdata[0]; ?>" alt="">
                                                    </a>
                                                </div>
                                                <div class="post-content media-body">
                                                    <h6 class="post-title mb-10 text-limit-2-row"><a href="../single/<?php echo $recomendationdata[3]; ?>"><?php echo $recomendationdata[1]; ?></a></h6>
                                                    <div class="entry-meta meta-1 font-x-small color-grey">
                                                        <span class="post-on"><?php echo $recomendationdata[2]; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <?php
                                      }
                                    }
                                  }
                                }
                              }
                            }
                          }else {
                            if ($recomendation = $mysqli -> query("SELECT DISTINCT articles.featured_image, articles.title, articles.published_at, articles.slug FROM articles INNER JOIN article_views ON article_views.article_id  = articles.article_id order by article_views.view_count Limit 2;")) {
                              if ($recomendation ->num_rows > 0) {
                                while ($recomendationdata = mysqli_fetch_row($recomendation)) {
                                  ?>
                                  <li class="mb-15">
                                      <div class="d-flex">
                                          <div class="post-thumb post-thumb-80 d-flex mr-15 border-radius-5 img-hover-scale">
                                              <a class="color-white" href="../single/<?php echo $recomendationdata[3]; ?>">
                                                  <img src="../<?php echo $recomendationdata[0]; ?>" alt="">
                                              </a>
                                          </div>
                                          <div class="post-content media-body">
                                              <h6 class="post-title mb-10 text-limit-2-row"><a href="../single/<?php echo $recomendationdata[3]; ?>"><?php echo $recomendationdata[1]; ?></a></h6>
                                              <div class="entry-meta meta-1 font-x-small color-grey">
                                                  <span class="post-on"><?php echo $recomendationdata[2]; ?></span>
                                              </div>
                                          </div>
                                      </div>
                                  </li>
                                  <?php
                                }
                              }
                            }
                          }
                           ?>
                        </ul>
                    </div>
                </div>
                <!--Comments-->
                    <?php
                    $articleid = $articledata[0];
                    if ($comments = $mysqli -> query("SELECT * FROM comments where article_id = '$articleid' and status = 'approved' ORDER BY comment_id DESC")) {
                      if ($comments ->num_rows > 0) {
                        ?>
                        <div class="comments-area">
                        <h3 class="mb-30">Comments</h3>

                        <?php
                        while ($commentsdata = mysqli_fetch_row($comments)) {

                          $user_id = $commentsdata[2];
                          if ($users = $mysqli -> query("SELECT name, image FROM users where user_id  = '$user_id'")) {
                            if ($users ->num_rows > 0) {
                              if ($usersdata = mysqli_fetch_row($users)) {
                     ?>
                    <div class="comment-list wow fadeIn animated">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user d-flex">
                                <div class="thumb">
                                    <img src="../<?php echo $usersdata[1]; ?>" alt="">
                                </div>
                                <div class="desc">
                                    <p class="comment">
                                        <?php echo $commentsdata[3]; ?>
                                    </p>
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <h5>
                                                <a href="#"><?php echo $usersdata[0]; ?></a>
                                            </h5>
                                            <p class="date"><?php echo $commentsdata[4]; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                      }
                    }
                  }
                      }
                      ?>
                    </div>
                    <?php
                    }
                  } ?>
                <!--comment form-->
                <div class="comment-form wow fadeIn animated">
                    <h3 class="mb-30">Leave a Comment</h3>
                    <div class="alert alert-danger none" id="commentlogin" role="alert">
                      Please <a href="../login.php" class="alert-link">Login / Register</a> account before leaving a Comment.
                    </div>
                    <form class="form-contact comment_form" action="../commentsdata.php?articleid=<?php echo $articleid;?>&&slug=<?php echo $slug;?>" id="commentForm" method="post">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Write Comment"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn button button-contactForm" <?php if (!isset($_SESSION["id"])){ echo "disabled"; } ?>>Post Comment</button>
                        </div>
                    </form>
                </div>
            </article>
        </div>
        <!--container-->
    </main>
  <?php
}
}
} ?>
    <!-- End Main content -->
    <!-- Footer Start-->
  <?php require 'footersingle.php'; ?>
    <!-- End Footer -->
    <div class="dark-mark"></div>

    <?php
    $month = date("F Y");
    if ($views = $mysqli -> query("SELECT * FROM article_views WHERE article_id = '$articleid' and view_date = '$month'")) {
      if ($views ->num_rows > 0) {
        if ($viewsdata = mysqli_fetch_row($views)) {
          $viewscount = $viewsdata[2];
          $viewscount++;
          if ($q = $mysqli -> query("UPDATE article_views SET view_count = '$viewscount' WHERE article_id = '$articleid'")) {}
        }
      }else {
        echo $month;
        if ($q = $mysqli -> query("INSERT INTO article_views (article_id, view_date, view_count) VALUES ('$articleid', '$month', '1')")) {}
      }
    }
    if (isset($_SESSION["id"])) {
      $userid = $_SESSION["id"];
      if ($preferences = $mysqli -> query("SELECT * FROM user_preferences WHERE user_id = '$userid' and category_id = '$cat'")) {
        if ($preferences ->num_rows > 0) {
          if ($preferencesdata = mysqli_fetch_row($preferences)) {
            $preferencescount = $preferencesdata[3];
            $preferencescount++;
            if ($q = $mysqli -> query("UPDATE user_preferences SET count = '$preferencescount' WHERE user_id = '$userid' and category_id = '$cat'")) {}
          }
        }else {
          if ($q = $mysqli -> query("INSERT INTO user_preferences (id, user_id, category_id, count) VALUES (null, '$userid', '$cat', '1')")) {}
        }
      }
    }
    ?>
    <!-- Vendor JS-->
    <script src="./../assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="./../assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./../assets/js/vendor/popper.min.js"></script>
    <script src="./../assets/js/vendor/bootstrap.min.js"></script>
    <script src="./../assets/js/vendor/jquery.slicknav.js"></script>
    <script src="./../assets/js/vendor/slick.min.js"></script>
    <script src="./../assets/js/vendor/wow.min.js"></script>
    <script src="./../assets/js/vendor/jquery.ticker.js"></script>
    <script src="./../assets/js/vendor/jquery.vticker-min.js"></script>
    <script src="./../assets/js/vendor/jquery.scrollUp.min.js"></script>
    <script src="./../assets/js/vendor/jquery.nice-select.min.js"></script>
    <script src="./../assets/js/vendor/jquery.magnific-popup.js"></script>
    <script src="./../assets/js/vendor/jquery.sticky.js"></script>
    <script src="./../assets/js/vendor/perfect-scrollbar.js"></script>
    <script src="./../assets/js/vendor/waypoints.min.js"></script>
    <script src="./../assets/js/vendor/jquery.theia.sticky.js"></script>
    <script src="./../assets/js/vendor/printThis.js"></script>
    <!-- NewsBoard JS -->
    <script src="./../assets/js/main.js"></script>
    <?php if (!isset($_SESSION["id"])){ ?>
      <script>
          $(document).ready(function(){
              $('input').keyup(function(){
                $('#commentlogin').fadeIn();
              });
              $('textarea').keyup(function(){
                $('#commentlogin').fadeIn();
              });
          });
      </script>
    <?php } ?>
</body>

</html>
