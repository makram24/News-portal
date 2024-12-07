<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>International - Makram New's </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/theme/favicon.png">
    <!-- NewsBoard CSS  -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/widgets.css">
    <link rel="stylesheet" href="assets/css/responsive.css">

    <script src="assets/js/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<?php require_once 'dbConnect.php';

if(isset($_GET["category"])) {
  $category = $_GET["category"];
    ?>
<body>
    <div class="scroll-progress bg-dark"></div>
    <!--Offcanvas sidebar-->
  <?php require 'header.php'; ?>
    <!-- Start Main content -->
    <main class="mt-30">
        <div class="container">
            <!--archive header-->
            <div class="archive-header text-center">
                <div class="breadcrumb font-small">
                    <a href="index.html">Home</a>
                    <span></span> <?php echo $category; ?>
                </div>
                <h2 class="font-weight-bold"><span class="font-family-normal"><?php echo $category; ?></span></h2>
                <!-- <p class="width-50">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure vero qui dolore dolor quo, at, aut iste ad quas, error excepturi nobis, laboriosam sit atque! Laudantium qui porro enim illo.
                </p> -->
                <span class="line-dots mt-30 mb-30"></span>
            </div>
            <!--Loop Grid 3-->
            <div class="the-world mb-30">
            <?php
            $z = 0; $h = 0; $s = 0;
            // if ($catnews = $mysqli -> query("SELECT * FROM articles a , categories b where a.category_id = b.cat_id and a.status = 'published'")) {
                if ($catnews = $mysqli -> query("SELECT * FROM articles a , categories b where a.category_id = b.cat_id and b.cat_name = '$category' and a.status = 'published'")) {
             if ($catnews ->num_rows > 0) {

               while ($categoriesnewsdata = mysqli_fetch_row($catnews)) {
                 if ($z == 0) {
                   ?>
                   <div class="loop-grid-3 row vertical-divider">
                       <div class="col-lg-7 col-md-12">
                           <article class="first-post wow fadeIn animated mb-md-4 mb-lg-0">
                               <figure class="mb-30">
                                   <a href="single/<?php echo $categoriesnewsdata[2]; ?>">
                                       <img src="<?php echo $categoriesnewsdata[5]; ?>" alt="">
                                   </a>
                                   <span class="post-format position-top-right text-uppercase font-small">
                                       <i class="ti-image"></i>
                                   </span>
                               </figure>
                               <div class="post-content text-center plr-5-percent">
                                   <h2 class="post-title mb-30 position-relative">
                                       <a href="single/<?php echo $categoriesnewsdata[2]; ?>"><?php echo $categoriesnewsdata[1]; ?></a>
                                   </h2>
                                   <p class="excerpt">
                                       <?php echo $categoriesnewsdata[3]; ?>
                                   </p>
                                   <div class="entry-meta meta-0 mb-15 font-small">
                                     <?php
                                     if ($tags = $mysqli -> query("SELECT * FROM tags INNER JOIN article_tags ON tags.tag_id = article_tags.tag_id AND article_tags.article_id = '$categoriesnewsdata[0]' ORDER BY article_tags.tag_id;")) {
                                       if ($tags ->num_rows > 0) {
                                         while ($tagsdata = mysqli_fetch_row($tags)) {
                                            ?>
                                         <a><span class="post-cat position-relative"># <?php echo $tagsdata[1]; ?></span></a>
                                   <?php }
                                       }
                                     } ?>
                                 </div>
                               </div>
                           </article>
                       </div>

                   <?php
              }else if ($z > 0 && $z < 5) {
                 if ($h == 0) {
                   ?>
                   <div class="col-lg-5 col-md-12">
                     <div class="row vertical-divider">
                     <?php
                 }
                  if ($h == 2) {
                   ?>
                   <div class="col-12">
                       <div class="horizontal-divider mb-15 mt-15"></div>
                   </div>
                 </div>
                  <div class="row vertical-divider">
               <?php
                }

                ?>

                <article class="col-md-6 wow fadeIn animated">
                    <figure class="mb-15">
                        <a href="single/<?php echo $categoriesnewsdata[2]; ?>">
                            <img src="<?php echo $categoriesnewsdata[5]; ?>" alt="">
                        </a>
                    </figure>
                    <div class="entry-meta meta-0 mb-15 font-small">
                      <?php
                      if ($tags = $mysqli -> query("SELECT * FROM tags INNER JOIN article_tags ON tags.tag_id = article_tags.tag_id AND article_tags.article_id = '$categoriesnewsdata[0]' ORDER BY article_tags.tag_id;")) {
                        if ($tags ->num_rows > 0) {
                          while ($tagsdata = mysqli_fetch_row($tags)) {
                             ?>
                          <a><span class="post-cat position-relative"># <?php echo $tagsdata[1]; ?></span></a>
                    <?php }
                        }
                      } ?>
                  </div>
                    <h6 class="post-title font-weight-bold mb-10">
                        <a href="single/<?php echo $categoriesnewsdata[2]; ?>"><?php echo $categoriesnewsdata[1]; ?></a>
                    </h6>
                    <p class="excerpt">
                        <?php echo $categoriesnewsdata[3]; ?>
                    </p>

                </article>

                <?php

                if ($z == 4) {
                  ?>
                </div>
            </div>
          </div>
          <span class="line-dots mb-15 mt-30"></span>
                  <?php
                 }
                 $h++;
                   ?>




                   <?php
                 }else if ($z > 4) {
                   if ($s == 0) {
                     ?>
                     <div class="recent-new mb-30">
                         <div class="row vertical-divider">
                           <div class="col-lg-9 col-md-12">
                               <div class="loop-grid-3">
                <?php
                $s++;
                   }
                   ?>
                   <article class="row wow fadeIn animated">
                       <div class="col-md-4">
                           <figure class="mb-md-0 mb-sm-3"><a href="single/<?php echo $categoriesnewsdata[2]; ?>"><img src="<?php echo $categoriesnewsdata[5]; ?>" alt=""></a></figure>
                       </div>
                       <div class="col-md-8">
                         <div class="entry-meta meta-0 mb-15 font-small">
                           <?php
                           if ($tags = $mysqli -> query("SELECT * FROM tags INNER JOIN article_tags ON tags.tag_id = article_tags.tag_id AND article_tags.article_id = '$categoriesnewsdata[0]' ORDER BY article_tags.tag_id;")) {
                             if ($tags ->num_rows > 0) {
                               while ($tagsdata = mysqli_fetch_row($tags)) {
                                  ?>
                               <a><span class="post-cat position-relative"># <?php echo $tagsdata[1]; ?></span></a>
                         <?php }
                             }
                           } ?>
                       </div>
                           <h4 class="post-title mb-10 font-weight-bold">
                               <a href="single/<?php echo $categoriesnewsdata[2]; ?>"><?php echo $categoriesnewsdata[1]; ?></a>
                           </h4>
                           <p class="excerpt mb-20">
                               <?php echo $categoriesnewsdata[3]; ?>
                           </p>
                           <div class="entry-meta meta-2 font-x-small color-muted">
                               <p class="mb-5">
                                   By <a href="author.html"><span class="author-name"><?php
                                   $name = $categoriesnewsdata[6];
                                   if ($aurthorname = $mysqli -> query("SELECT name FROM authors where author_id = '$name' ")) {
                                    if ($aurthorname ->num_rows > 0) {

                                      if ($aurthornamedata = mysqli_fetch_row($aurthorname)) {
                                        echo $aurthornamedata[0];
                                      }
                                    }
                                  }
                                    ?></span></a>
                               </p>
                               <span class="mr-10"> <?php echo $categoriesnewsdata[9]; ?></span>
                           </div>
                       </div>
                       <div class="col-md-12">
                           <div class="horizontal-divider mt-15 mb-15"></div>
                       </div>
                   </article>
                   <?php
                 }
                 $z++;
             ?>



                <?php
                 }
                }
              } ?>


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
        </div>
    </main>
    <!-- End Main content -->
    <?php require 'footer.php'; ?>
  <?php } ?>
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
