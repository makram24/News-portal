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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/widgets.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <script src="assets/js/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<?php
session_start();
require_once 'dbConnect.php';
?>



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
    <?php require 'header.php'; ?>
    <!-- Start Main content -->
    <main class="mt-30">
        <div class="container">
            <!--Featured post Start-->
            <div class="post-featured-1 mb-30">
                <div class="slide-face">
                  <?php
                  if ($populararticle = $mysqli -> query("SELECT * FROM articles INNER JOIN article_views ON articles.article_id = article_views.article_id and article_views.view_date = '$month' order by article_views.view_count DESC limit 1")) {
                    if ($populararticle ->num_rows > 0) {
                      while ($populararticledata = mysqli_fetch_row($populararticle)) {
                          ?>
                            <article class="row slide-fade-item" style="visibility: visible; animation-name: fadeIn;">
                                <div class="col-md-6 mb-md-0 mb-sm-3">
                                    <figure class="mb-0">
                                        <a href="single/<?php echo $populararticledata[2]; ?>">
                                            <img src="<?php echo $populararticledata[5]; ?>" style="width: 100%;" alt="">
                                        </a>
                                        <span class="post-format position-top-right text-uppercase font-small">
                                            <i class="ti-stats-up"></i>
                                        </span>
                                    </figure>
                                </div>
                                <div class="col-md-6 align-self-center">
                                    <div class="post-content text-center plr-5-percent">
                                      <?php
                                      if ($tags = $mysqli -> query("SELECT * FROM tags INNER JOIN article_tags ON tags.tag_id = article_tags.tag_id AND article_tags.article_id = '$populararticledata[0]' ORDER BY article_tags.tag_id;")) {
                                        if ($tags ->num_rows > 0) {
                                          while ($tagsdata = mysqli_fetch_row($tags)) {
                                             ?>
                                          <a><span class="post-cat position-relative"># <?php echo $tagsdata[1]; ?></span></a>
                                    <?php }
                                        }
                                      } ?>
                                        <h2 class="post-title mb-30 position-relative divider-wave">
                                            <a href="single/<?php echo $populararticledata[2]; ?>"><?php echo $populararticledata[1]; ?></a>
                                        </h2>

                                        <p class="excerpt">
                                            <?php echo $populararticledata[3]; ?>
                                        </p>

                                    </div>
                                </div>
                            </article>
                            <?php
                          }
                        }
                      } ?>
                </div>
            </div>
            <?php
            if (isset($_SESSION["id"])) {
                $userid = $_SESSION["id"];
                ?>
            <!--Loop Grid 4-->
            <section class="editor-picked mb-30">
                <h6 class="font-weight-bold widget-header widget-header-style-3 mb-20">
                    <span class="d-inline-block block mb-10 widget-title font-family-normal"># For You</span>
                    <span class="line-dots"></span>
                </h6>
                <div class="loop-grid-3 row vertical-divider">
                  <div class="col-lg-12 col-md-12">
                    <div class="row vertical-divider">

                  <?php
                  if ($articlespecific = $mysqli -> query("SELECT * FROM articles INNER JOIN user_preferences ON articles.category_id = user_preferences.category_id AND user_preferences.user_id = '$userid' ORDER BY user_preferences.count LIMIT 4;")) {
                    if ($articlespecific ->num_rows > 0) {
                      $rowcountspecific = mysqli_num_rows($articlespecific);
                      $z = 0;
                      $pr = false;
                      $pr1 = false;
                      while ($rowcountspecific = mysqli_fetch_row($articlespecific)) {
                          ?>

                                  <article class="col-md-3 wow fadeIn animated">
                                      <figure class="mb-15">
                                          <a href="single/<?php echo $rowcountspecific[2]; ?>">
                                              <img src="<?php echo $rowcountspecific[5]; ?>" alt="">
                                          </a>
                                      </figure>
                                      <h6 class="post-title font-weight-bold mb-10">
                                          <a href="single/<?php echo $rowcountspecific[2]; ?>"><?php echo $rowcountspecific[1]; ?></a>
                                      </h6>
                                      <p class="excerpt">
                                          <?php echo $rowcountspecific[3]; ?>
                                      </p>
                                      <?php
                                      if ($tags = $mysqli -> query("SELECT * FROM tags INNER JOIN article_tags ON tags.tag_id = article_tags.tag_id AND article_tags.article_id = '$rowcountspecific[0]' ORDER BY article_tags.tag_id;")) {
                                        if ($tags ->num_rows > 0) {
                                          while ($tagsdata = mysqli_fetch_row($tags)) {
                                             ?>
                                          <a><span class="post-cat position-relative"># <?php echo $tagsdata[1]; ?></span></a>
                                    <?php }
                                        }
                                      } ?>
                                  </article>
                                  <?php
                                }
                               }
                             }
                     ?>
                   </div>
                 </div>
                </div>
            </section>
          <?php } ?>

            <!--Loop Grid 4-->
            <section class="editor-picked mb-30">
                <h6 class="font-weight-bold widget-header widget-header-style-3 mb-20">
                    <span class="d-inline-block block mb-10 widget-title font-family-normal"># Editor Picked</span>
                    <span class="line-dots"></span>
                </h6>
                <div class="loop-grid-3 row vertical-divider">
                  <?php
                  if ($article = $mysqli -> query("SELECT * FROM articles limit 5")) {
                    if ($article ->num_rows > 0) {
                      $rowcount = mysqli_num_rows($article);
                      $z = 0;
                      $pr = false;
                      $pr1 = false;
                      while ($articledata = mysqli_fetch_row($article)) {
                        if ($z == 0) {
                          ?>
                          <div class="col-lg-7 col-md-12">
                              <div class="row vertical-divider">
                          <?php
                          }
                          if ($z < 2) {
                          ?>

                                  <article class="col-md-6 wow fadeIn animated">
                                      <figure class="mb-15">
                                          <a href="single/<?php echo $articledata[2]; ?>">
                                              <img src="<?php echo $articledata[5]; ?>" alt="">
                                          </a>
                                      </figure>
                                      <h6 class="post-title font-weight-bold mb-10">
                                          <a href="single/<?php echo $articledata[2]; ?>"><?php echo $articledata[1]; ?></a>
                                      </h6>
                                      <p class="excerpt">
                                          <?php echo $articledata[3]; ?>
                                      </p>
                                      <div class="entry-meta meta-0 mb-15 font-small">
                                        <?php
                                        if ($tags = $mysqli -> query("SELECT * FROM tags INNER JOIN article_tags ON tags.tag_id = article_tags.tag_id AND article_tags.article_id = '$articledata[0]' ORDER BY article_tags.tag_id;")) {
                                          if ($tags ->num_rows > 0) {
                                            while ($tagsdata = mysqli_fetch_row($tags)) {
                                               ?>
                                            <a><span class="post-cat position-relative"># <?php echo $tagsdata[1]; ?></span></a>
                                      <?php }
                                          }
                                        } ?>
                                    </div>
                                  </article>
                                  <?php

                                }else if($z == 2){
                                  ?>
                                </div>
                              </div>
                                <?php
                                  $pr = true;
                                }
                                 ?>

                          <?php

                        if($z > 1) {
                          if ($z == 2) {
                            ?>  <div class="col-lg-5 col-md-12 d-none d-lg-block"><?php
                          }
                          if ($z != $rowcount) {
                          ?>
                          <article class="row wow fadeIn animated" style="padding: 10px 0;">
                              <div class="col-md-6">
                                <div class="entry-meta meta-0 mb-15 font-small">
                                  <?php
                                  if ($tags = $mysqli -> query("SELECT * FROM tags INNER JOIN article_tags ON tags.tag_id = article_tags.tag_id AND article_tags.article_id = '$articledata[0]' ORDER BY article_tags.tag_id;")) {
                                    if ($tags ->num_rows > 0) {
                                      while ($tagsdata = mysqli_fetch_row($tags)) {
                                         ?>
                                      <a><span class="post-cat position-relative"># <?php echo $tagsdata[1]; ?></span></a>
                                <?php }
                                    }
                                  } ?>
                              </div>
                                  <h6 class="post-title mb-20 font-weight-bold">
                                      <a href="single/<?php echo $articledata[2]; ?>"><?php echo $articledata[1]; ?></a>
                                  </h6>
                                  <p class="excerpt mb-0">
                                    <?php echo $articledata[3]; ?>
                                  </p>
                              </div>
                              <div class="col-md-6">
                                  <figure class="mb-0">
                                        <img src="<?php echo $articledata[5]; ?>" style="height: 130px;width: 100vw;" alt="">
                                  </figure>
                              </div>
                          </article>
                          <?php
                        }else {
                          ?>
                        </div>
                        <?php
                        }

                        ?>


                  <?php }
                  $z++;
                      }
                    }
                  } ?>
                </div>
            </section>
            <?php
            if ($advertisementfooter = $mysqli -> query("SELECT * FROM advertisements WHERE location = 'homepage'")) {
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
                                    <img src="<?php echo $advertisementfooterdata[2]; ?>" alt="">
                                  </li>
                              </ul>
                            </a>
                          </div>
                      </div>

                    <?php

                   }
                 }
               }
             }
                   ?>
            <!--Hightlight news-->
            <section class="hightlight-today mb-30">
                <h6 class="font-weight-bold widget-header widget-header-style-5 mb-10">
                    <span class="d-inline-block block mb-10 widget-title font-family-normal">Today Highlight</span>
                </h6>
                <?php
                if ($article = $mysqli -> query("SELECT * FROM articles limit 10")) {
                  if ($article ->num_rows > 0) {
                    $num = 0;
                    $ss = 0;
                    while ($articledata = mysqli_fetch_row($article)) {
                      $rowcount = mysqli_num_rows($article);
                      if ($num  % 5 == 0) {
                        ?><div class="loop-grid-5 row vertical-divider"><?php
                      }
                 ?>

                    <article class="col-1-5 col-sm-12 wow fadeIn animated">
                        <figure class="mb-15">
                            <a href="single/<?php echo $articledata[2]; ?>">
                                <img src="<?php echo $articledata[5]; ?>" alt="">
                            </a>
                        </figure>
                        <h6 class="font-weight-500 mb-20"><a href="single/<?php echo $articledata[2]; ?>"><?php echo $articledata[1]; ?></a></h6>
                    </article>
                    <?php
                    if ($num % 5 == 4) {
                      ?></div><?php
                    }
                     ?>

                <?php  $num++;}
                    }
                  } ?>

                </section>

            <!--Recent news-->
            <section class="recent-news mb-30">
                <div class="row vertical-divider">
                    <div class="col-lg-9 col-md-12">
                        <h5 class="font-weight-bold widget-header widget-header-style-3 mb-20">
                            <span class="d-inline-block block mb-10 widget-title font-family-normal"># Recent posts</span>
                            <span class="line-dots"></span>
                        </h5>
                        <div class="loop-grid-3">
                          <?php
                          if ($articlerecent = $mysqli -> query("SELECT * FROM articles order by published_at ASC limit 12")) {
                            if ($articlerecent ->num_rows > 0) {
                              $num1 = 0;
                              $ss1 = 0;
                              while ($articledatarecent = mysqli_fetch_row($articlerecent)) {

                                $rowcount = mysqli_num_rows($articlerecent);
                                if ($num1 == 0) {
                                  ?>

                                  <article class="row wow fadeIn animated">
                                      <div class="col-md-6 mb-md-0 mb-sm-3">
                                          <figure class="mb-0">
                                              <a href="single/<?php echo $articledatarecent[2]; ?>">
                                                  <img src="<?php echo $articledatarecent[5]; ?>" alt="">
                                              </a>
                                              <span class="post-format position-top-right text-uppercase font-small">
                                                  <i class="ti-stats-up"></i>
                                              </span>
                                          </figure>
                                      </div>
                                      <div class="col-md-6 align-self-center">
                                          <div class="post-content">
                                            <div class="entry-meta meta-0 mb-15 font-small">
                                              <?php
                                              if ($tags = $mysqli -> query("SELECT * FROM tags INNER JOIN article_tags ON tags.tag_id = article_tags.tag_id AND article_tags.article_id = '$articledatarecent[0]' ORDER BY article_tags.tag_id;")) {
                                                if ($tags ->num_rows > 0) {
                                                  while ($tagsdata = mysqli_fetch_row($tags)) {
                                                     ?>
                                                  <a><span class="post-cat position-relative"># <?php echo $tagsdata[1]; ?></span></a>
                                            <?php }
                                                }
                                              } ?>
                                          </div>
                                              <h3 class="mb-30 position-relative">
                                                  <a href="single/<?php echo $articledatarecent[2]; ?>"><?php echo $articledatarecent[1]; ?></a>
                                              </h3>
                                              <p class="excerpt">
                                                  <a href="single/<?php echo $articledatarecent[2]; ?>"><?php echo $articledatarecent[3]; ?></a>
                                              </p>

                                          </div>
                                      </div>
                                      <div class="col-md-12">
                                          <div class="horizontal-divider mt-15 mb-15"></div>
                                      </div>
                                  </article>

                                  <?php
                                }
                                if ($num1 > 1 && $num1 < 5) {
                                  if ($num1 == 2) {
                                    ?>
                                    <div class="row vertical-divider">
                                      <div class="col-md-8">
                                    <?php
                                  }
                                  ?>
                                          <article class="row wow fadeIn animated">
                                              <div class="col-md-4">
                                                  <figure class="mb-md-0 mb-sm-3">
                                                        <img src="<?php echo $articledatarecent[5]; ?>" alt="">
                                                  </figure>
                                              </div>
                                              <div class="col-md-8 pl-0">
                                                    <div class="entry-meta meta-0 mb-15 font-small">
                                                      <?php
                                                      if ($tags = $mysqli -> query("SELECT * FROM tags INNER JOIN article_tags ON tags.tag_id = article_tags.tag_id AND article_tags.article_id = '$articledatarecent[0]' ORDER BY article_tags.tag_id;")) {
                                                        if ($tags ->num_rows > 0) {
                                                          while ($tagsdata = mysqli_fetch_row($tags)) {
                                                             ?>
                                                          <a><span class="post-cat position-relative"># <?php echo $tagsdata[1]; ?></span></a>
                                                    <?php }
                                                        }
                                                      } ?>
                                                  </div>
                                                  <h6 class="post-title mb-20 font-weight-bold">
                                                      <a href="single/<?php echo $articledatarecent[2]; ?>"><?php echo $articledatarecent[1]; ?></a>
                                                  </h6>
                                                  <p class="excerpt mb-0">
                                                      <a href="single/<?php echo $articledatarecent[2]; ?>"><?php echo $articledatarecent[3]; ?></a>
                                                  </p>
                                              </div>
                                              <div class="col-md-12">
                                                  <div class="horizontal-divider mt-15 mb-15"></div>
                                              </div>
                                          </article>

                                          <?php
                                          if ($num1 == 4) {
                                            ?>
                                              <!-- </div> -->
                                            </div>
                                            <?php
                                          }
                                }else if ($num1 >= 5) {
                                  if ($num1 == 5) {
                                    ?><div class="col-md-4"><?php
                                  }
                                    ?>
                                    <article class="wow fadeIn animated">
                                        <h6 class="post-title font-weight-bold mb-10">
                                            <a href="single/<?php echo $articledatarecent[2]; ?>"><?php echo $articledatarecent[1]; ?></a>
                                        </h6>
                                        <p class="excerpt">
                                            <a href="single/<?php echo $articledatarecent[2]; ?>"><?php echo $articledatarecent[3]; ?></a>
                                        </p>
                                        <div class="horizontal-divider mt-15 mb-15"></div>
                                    </article>
                                    <?php
                                }

                                $num1++;
                              }
                            }
                          }
                           ?>

                                </div>
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
            </section>
        </div>
    </main>

    <!-- End Main content -->
    <?php require 'footer.php'; ?>
    <!-- End Footer -->
    <div class="dark-mark"></div>
    <!-- Vendor JS-->
    <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./assets/js/vendor/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
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
