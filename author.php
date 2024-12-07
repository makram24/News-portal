<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Makram New's </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/theme/favicon.png">
    <!-- NewsBoard CSS  -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/widgets.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>

<?php
session_start();
require_once 'dbConnect.php';
?>

<body>
    <div class="scroll-progress bg-dark"></div>
        <?php require 'header.php'; ?>
  <!-- Start Main content -->
  <?php
  if(isset($_GET["authorid"])) {
    $authorid = $_GET["authorid"];
     ?>
    <main class="mt-30">
        <div class="container">
            <!--archive header-->
            <div class="archive-header text-center">
                <!--author box-->
                  <?php
                  if ($author = $mysqli -> query("SELECT * FROM authors INNER JOIN users ON users.user_id = authors.user_id AND authors.author_id = '$authorid'")) {
                      if ($author ->num_rows > 0) {
                        if ($authordata = mysqli_fetch_row($author)) {
                           ?>
                <div class="author-bio mt-50">
                    <div class="author-image mb-30">
                        <img src="<?php echo $authordata[14]?>" alt="" class="avatar">
                    </div>
                    <div class="author-info">
                        <h3 class="font-weight-bold"><a title="Posted by Barbara Cartland" rel="author"><?php echo $authordata[1]?></a>
                        </h3>
                        <div class="author-description"><?php echo $authordata[2]?></div>
                    </div>
                </div>
              <?php }
                }
              } ?>
            </div>
            <!--Loop Grid 5-->
            <div class="row mb-50">
                <div class="col-lg-9 col-md-12 col-sm-12">
                    <div class="mb-30 pr-50">
                        <div class="loop-grid-3">
                          <?php
                          if ($articlespecific = $mysqli -> query("SELECT * FROM articles where author_id = '$authorid';")) {
                            if ($articlespecific ->num_rows > 0) {
                              while ($rowcountspecific = mysqli_fetch_row($articlespecific)) {
                                  ?>

                                  <article class="row wow fadeIn animated">
                                      <div class="col-md-2 col-sm-12">
                                          <!-- <div class="entry-meta meta-2 font-small color-muted mt-15">
                                              <span class="mr-10 mb-5"> 15 April 2020</span><br><br>
                                          </div> -->
                                          <figure class="mb-15">
                                              <a href="single/<?php echo $rowcountspecific[2]; ?>">
                                                  <img src="<?php echo $rowcountspecific[5]; ?>" alt="">
                                              </a>
                                          </figure>
                                      </div>
                                      <div class="col-md-8 col-sm-12">
                                          <div class="entry-meta meta-0 mb-15 font-small">
                                            <?php
                                            if ($tags = $mysqli -> query("SELECT * FROM tags INNER JOIN article_tags ON tags.tag_id = article_tags.tag_id AND article_tags.article_id = '$rowcountspecific[0]' ORDER BY article_tags.tag_id;")) {
                                              if ($tags ->num_rows > 0) {
                                                while ($tagsdata = mysqli_fetch_row($tags)) {
                                                   ?>
                                                <a><span class="post-cat position-relative"># <?php echo $tagsdata[1]; ?></span></a>
                                          <?php }
                                              }
                                            } ?>
                                          </div>
                                          <h3 class="post-title mb-10">
                                                <a href="single/<?php echo $rowcountspecific[2]; ?>"><?php echo $rowcountspecific[1]; ?></a>
                                          </h3>
                                          <p class="excerpt">
                                            <?php echo $rowcountspecific[3]; ?>
                                          </p>
                                      </div>
                                      <div class="col-md-12">
                                          <div class="horizontal-divider mt-15 mb-15"></div>
                                      </div>
                                  </article>
                                          <?php
                                        }
                                       }
                                     }
                             ?>


                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 primary-sidebar sticky-sidebar">
                    <div class="widget-area">
                        <?php

                        if ($advertisementfooter = $mysqli -> query("SELECT * FROM advertisements WHERE location = 'sidebar'")) {
                           if ($advertisementfooter ->num_rows > 0) {
                             while ($advertisementfooterdata = mysqli_fetch_row($advertisementfooter)) {
                               if (($currentDate >= $advertisementfooterdata[4]) && ($currentDate <= $advertisementfooterdata[5])){

                                ?>
                                    <div class="sidebar-widget widget-latest-posts mb-30 mt-15 wow fadeIn  animated" style="visibility: visible; animation-name: fadeIn;">
                                        <h6 class="widget-header widget-header-style-4 mb-20 text-center text-uppercase border-top-1 border-bottom-1 pt-5 pb-5">
                                          <span>Advertisement</span>
                                        </h6>
                                        <a class="post-block-list post-module-1 post-module-5" target="_blank" href="<?php echo $advertisementfooterdata[3]; ?>">
                                          <ul class="list-post">
                                              <li class="mb-15">
                                                <img src="<?php echo $advertisementfooterdata[2]; ?>" alt="">
                                              </li>
                                          </ul>
                                        </a>
                                      </div>

                                <?php

                               }
                             }
                           }
                         }
                               ?>
                        <?php require 'subscribe.php'; ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
  <?php } ?>
    <!-- End Main content -->
    <!-- Footer Start-->
    <?php require 'footer.php'; ?>
    <!-- End Footer -->
    <div class="dark-mark"></div>
    <!-- Vendor JS-->
    <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./assets/js/vendor/popper.min.js"></script>
    <script src="./assets/js/vendor/bootstrap.min.js"></script>
    <script src="./assets/js/vendor/jquery.slicknav.js"></script>
    <script src="./assets/js/vendor/slick.min.js"></script>
    <script src="./assets/js/vendor/wow.min.js"></script>
    <script src="./assets/js/vendor/jquery.ticker.js"></script>
    <script src="./assets/js/vendor/jquery.vticker-min.js"></script>
    <script src="./assets/js/vendor/jquery.scrollUp.min.js"></script>
    <script src="./assets/js/vendor/jquery.nice-select.min.js"></script>
    <script src="./assets/js/vendor/jquery.magnific-popup.js"></script>
    <script src="./assets/js/vendor/jquery.sticky.js"></script>
    <script src="./assets/js/vendor/perfect-scrollbar.js"></script>
    <script src="./assets/js/vendor/waypoints.min.js"></script>
    <script src="./assets/js/vendor/jquery.theia.sticky.js"></script>
    <!-- NewsBoard JS -->
    <script src="./assets/js/main.js"></script>
</body>

</html>
