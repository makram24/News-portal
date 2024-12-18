<?php
  $categoriesdataarray = [];
  $cdata = 0;
  if ($result = $mysqli -> query("SELECT * FROM categories")) {
   if ($result ->num_rows > 0) {
     while ($categoriesdata = mysqli_fetch_row($result)) {
       $categoriesdataarray[$cdata] = $categoriesdata[1];
       $cdata++;
     }
    }
  }
  $catlenght = count($categoriesdataarray);
  $currentDate = date('Y-m-d');
  $currentDate = date('Y-m-d', strtotime($currentDate));
  $month = date("F Y");
?>

<!--Offcanvas sidebar-->
<aside id="sidebar-wrapper" class="custom-scrollbar offcanvas-sidebar position-left">
    <button class="off-canvas-close"><i class="ti-close"></i></button>
    <div class="sidebar-inner">
        <!--Latest-->
        <div class="sidebar-widget widget-latest-posts mb-30">
            <div class="widget-header position-relative mb-30">
                <h5 class="widget-title mt-5 mb-30">Don't Miss</h5>
            </div>
            <div class="post-block-list post-module-1 post-module-5">
                <ul class="list-post">
                  <?php
                  if ($populararticle = $mysqli -> query("SELECT * FROM articles INNER JOIN article_views ON articles.article_id = article_views.article_id and article_views.view_date = '$month' order by article_views.view_count DESC limit 5")) {
                    if ($populararticle ->num_rows > 0) {
                      while ($populararticledata = mysqli_fetch_row($populararticle)) {
                          ?>

                        <li class="mb-15">
                            <div class="d-flex">
                                <div class="post-thumb post-thumb-80 d-flex mr-15 border-radius-5 img-hover-scale">
                                    <a class="color-white" href="single/<?php echo $populararticledata[2]; ?>">
                                        <img src="<?php echo $populararticledata[5]; ?>" alt="">
                                    </a>
                                </div>
                                <div class="post-content media-body">
                                    <h6 class="post-title mb-10 text-limit-2-row">  <a href="single/<?php echo $populararticledata[2]; ?>"><?php echo $populararticledata[1]; ?></a></h6>
                                    <div class="entry-meta meta-1 font-x-small color-grey">
                                        <span class="post-on"><?php echo $populararticledata[9]; ?></span>
                                        <span class="hit-count has-dot"><?php echo $populararticledata[15]; ?> Views</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                            <?php
                          }
                        }
                      } ?>
                </ul>
            </div>
        </div>
        <!--Categories-->
        <div class="sidebar-widget widget_categories mb-50">
            <div class="widget-header position-relative mb-20">
                <h5 class="widget-title mt-5">All Sections</h5>
            </div>
            <div class="widget_nav_menu">
                <ul class="menu">
                  <?php   for ($i=0; $i <$catlenght ; $i++) { ?>
                    <li class="cat-item"><a href="category.php?category=<?php echo $categoriesdataarray[$i]; ?>"><?php echo $categoriesdataarray[$i]; ?></a></li>
                  <?php }  ?>
                </ul>
            </div>
        </div>
        <!--Ads-->
        <div class="sidebar-widget widget-ads mb-30">
            <a href="assets/imgs/news-1.jpg" class="play-video" data-animate="zoomIn" data-duration="1.5s" data-delay="0.1s">
                <img src="assets/imgs/2.png" alt="">
            </a>
        </div>
    </div>
</aside>
<!-- Start Header -->
<header class="main-header header-style-2 header-sticky">
    <div class="container pt-30 pb-30 position-relative text-center header-top">
        <div class="mobile_menu d-lg-none d-block"></div>
        <!--Header tools-->
        <div class="header-tools position-absolute position-absolute-center">
            <button type="submit" class="search search-icon search-btn mr-15">
                <i class="ti-close"></i>
                <i class="ti-search"></i>
            </button>
            <div class="off-canvas-toggle-cover d-inline-block">
                <div class="off-canvas-toggle hidden d-inline-block" id="off-canvas-toggle">
                    <span></span>
                    <p class="font-small d-none d-lg-inline font-weight-bold offcanvas-more-text">MORE</p>
                </div>
            </div>
        </div>
        <!--Header logo-->
        <div class="logo-text">
            <h1 class="logo text-uppercase d-md-inline d-none"><a href="index.php">Makram New's.</a></h1>
            <h1 class="logo logo-mobile text-uppercase d-inline d-md-none"><a href="index.php">MN.</a></h1>
            <p class="head-line font-heading text-muted d-none d-lg-block">Fresh & Reliable Newspaper</p>
        </div>
        <!--Header right-->
        <div class="position-absolute-center font-small d-none d-lg-block position-absolute position-right mr-10">
            <ul class="list-inline text-right">
              <?php
              if (isset($_SESSION["id"])) {
                $id = $_SESSION["id"];
                ?>
                <li class="list-inline-item mr-15"><i class="ti-user font-x-small mr-5"></i>
                  <?php
                  if ($specusers = $mysqli -> query("SELECT name FROM users WHERE user_id = '$id';")) {
                      if ($specusers ->num_rows > 0) {
                        if ($specusersdata = mysqli_fetch_row($specusers)) {
                          echo $specusersdata[0];
                        }
                      }
                    }?>
                </a></li>
                <li class="list-inline-item mr-15"><a href="signout.php"><i class="ti-door font-x-small mr-5"></i>Sign Out</a></li>
                <?php }else { ?>
                <li class="list-inline-item mr-15"><a href="login.php"><i class="ti-user font-x-small mr-5"></i>Login / Register</a></li>
                <?php } ?>

            </ul>
        </div>
    </div>
    <div class="main-navigation text-center text-uppercase font-heading">
        <div class="container">
            <div class="horizontal-divider-black"></div>
        </div>
        <div class="main-nav d-none d-lg-block">
            <nav>
                <!--Desktop menu-->
                <ul class="main-menu d-none d-lg-inline">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <?php   for ($i=0; $i <$catlenght ; $i++) { ?>
                      <li><a href="category.php?category=<?php echo $categoriesdataarray[$i]; ?>"><?php echo $categoriesdataarray[$i]; ?></a></li>
                    <?php }  ?>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
                <!--Mobile menu-->
                <ul id="mobile-menu" class="d-block d-lg-none">
                  <li>
                      <a href="index.php">Home</a>
                  </li>
                  <?php   for ($i=0; $i <$catlenght ; $i++) { ?>
                    <li><a href="category.php?category=<?php echo $categoriesdataarray[$i]; ?>"><?php echo $categoriesdataarray[$i]; ?></a></li>
                  <?php }  ?>
                  <li><a href="contact.php">Contact</a></li>
                  <?php
                  if (isset($_SESSION["id"])) {
                    $id = $_SESSION["id"];
                    ?>
                    <li class="list-inline-item mr-15"><i class="ti-user font-x-small mr-5"></i>
                      <?php
                      if ($specusers = $mysqli -> query("SELECT name FROM users WHERE user_id = '$id';")) {
                          if ($specusers ->num_rows > 0) {
                            if ($specusersdata = mysqli_fetch_row($specusers)) {
                              echo $specusersdata[0];
                            }
                          }
                        }?>
                    </a></li>
                    <li class="list-inline-item mr-15"><a href="signout.php"><i class="ti-door font-x-small mr-5"></i>Sign Out</a></li>
                    <?php }else { ?>
                    <li class="list-inline-item mr-15"><a href="login.php"><i class="ti-user font-x-small mr-5"></i>Login / Register</a></li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
        <div class="container">
            <div class="horizontal-divider-black mb-1px"></div>
        </div>
        <div class="container">
            <div class="horizontal-divider-black"></div>
        </div>
    </div>
</header>
<!--Start search form-->
<div class="main-search-form">
    <div class="container">
        <div class="main-search-form-cover pt-50 pb-50 m-auto">
            <div class="row mb-20">
                <div class="col-12">
                    <div class="search-header">
                        <div class="input-group w-100">
                            <input type="text" class="form-control" name="searchbar" id="searchbar" placeholder="Type your key words and hit enter">
                            <div class="input-group-append">
                                <button class="btn btn-black" id="searchsubmit">
                                    <i class="ti-search mr-5"></i> Search
                                </button>
                            </div>
                        </div>
                    </div>
                    <div id="userList"></div>

                        <script>
                            $(document).ready(function(){
                                $('#searchsubmit').click(function(){
                                    var query = $('#searchbar').val();
                                    if(query != '')
                                    {
                                        $.ajax({
                                            url:"searchdata.php",
                                            method:"POST",
                                            data:{query:query},
                                            success:function(data)
                                            {
                                                $('#userList').fadeIn();
                                                $('#userList').html(data);
                                            }
                                        });
                                    }else if(query == ''){
                                      $('#userList').html(" ");
                                    }
                                });
                            });
                        </script>
                </div>
            </div>
        </div>
    </div>
</div>
