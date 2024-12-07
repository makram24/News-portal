<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Makram's News</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Mannatthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />


        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    </head>

    <?php
    session_start();
    require_once '../dbConnect.php';
    $currentDate = date('Y-m-d');
    $currentDate = date('Y-m-d', strtotime($currentDate));
    ?>


    <body class="fixed-left">

        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Begin page -->
        <div id="wrapper">


          <?php require 'leftmenuAdmin.php'; ?>
            <!-- Start right Content here -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">

                    <div class="page-content-wrapper ">

                        <div class="container-fluid">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="page-title-box">
                                        <div class="btn-group float-right">
                                            <ol class="breadcrumb hide-phone p-0 m-0">
                                                <li class="breadcrumb-item"><a href="#">Makram's News</a></li>
                                                <li class="breadcrumb-item active">Dashboard</li>
                                            </ol>
                                        </div>
                                        <h4 class="page-title">Dashboard</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- end page title end breadcrumb -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="icon-contain">
                                                        <div class="row">
                                                            <div class="col-2 align-self-center">
                                                                <i class="fas fa-tasks text-gradient-success"></i>
                                                            </div>
                                                            <div class="col-10 text-right">
                                                              <h5 class="mt-0 mb-1 articles-count"></h5>
                                                              <p class="mb-0 font-12 text-muted">Articles</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="card">
                                                <div class="card-body justify-content-center">
                                                    <div class="icon-contain">
                                                        <div class="row">
                                                            <div class="col-2 align-self-center">
                                                                <i class="far fa-gem text-gradient-danger"></i>
                                                            </div>
                                                            <div class="col-10 text-right">
                                                              <h5 class="mt-0 mb-1 views-count"></h5>
                                                              <p class="mb-0 font-12 text-muted">Articles Views</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="icon-contain">
                                                        <div class="row">
                                                            <div class="col-2 align-self-center">
                                                                <i class="fas fa-users text-gradient-warning"></i>
                                                            </div>
                                                            <div class="col-10 text-right">
                                                                <h5 class="mt-0 mb-1 users-count"></h5>
                                                                <p class="mb-0 font-12 text-muted">Active Users</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="card ">
                                                <div class="card-body">
                                                    <div class="icon-contain">
                                                        <div class="row">
                                                            <div class="col-2 align-self-center">
                                                                <i class="fas fa-database text-gradient-primary"></i>
                                                            </div>
                                                            <div class="col-10 text-right">
                                                                <h5 class="mt-0 mb-1 active-promotions"></h5>
                                                                <p class="mb-0 font-12 text-muted">Active Promotions</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-xl-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="header-title pb-3 mt-0">New Users</h5>
                                            <div class="table-responsive boxscroll" style="overflow: hidden; outline: none;">
                                                <table class="table mb-0">
                                                    <tbody>
                                                          <?php
                                                          if ($user = $mysqli -> query("SELECT * FROM users order by user_id DESC limit 7")) {
                                                           if ($user ->num_rows > 0) {
                                                             while ($userdata = mysqli_fetch_row($user)) {
                                                                ?>
                                                          <tr>
                                                            <td class="border-top-0">
                                                                <div class="media">
                                                                    <div class="media-body ml-2">
                                                                        <p class="mb-0"><?php echo $userdata[1]; ?> <span class="badge badge-soft-danger"><?php echo $userdata[4]; ?></span></p>
                                                                        <span class="font-12 text-muted"><?php echo $userdata[2]; ?></span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                          </tr>
                                                          <?php }
                                                          }
                                                        } ?>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4  col-lg-6">
                                    <div class="card timeline-card">
                                        <div class="card-body p-0">
                                            <div class="bg-gradient2 text-white text-center py-3 mb-4">
                                                <p class="mb-0 font-18"><i class="mdi mdi-clock-outline font-20"></i>Latest Published Articles</p>
                                            </div>
                                        </div>
                                        <div class="card-body boxscroll">
                                          <?php
                                          if ($user = $mysqli -> query("SELECT * FROM articles order by published_at DESC limit 5")) {
                                           if ($user ->num_rows > 0) {
                                             while ($userdata = mysqli_fetch_row($user)) {
                                                ?>
                                            <div class="timeline">
                                                <div class="entry">
                                                    <div class="title">
                                                        <h6><?php echo $userdata[9]; ?></h6>
                                                    </div>
                                                    <div class="body">
                                                        <p><?php echo $userdata[1]; ?><a href="../single/<?php echo $userdata[3]; ?>" class="text-primary"> Read Article</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                          }
                                        }
                                      } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                  <div class="card">
                                      <div class="card-body">
                                          <div class="d-sm-flex align-self-center">
                                                  <img src="assets/images/widgets/code.svg" alt="" class="" height="100">
                                              <div class="media-body ml-3">
                                                  <h6>Create Article</h6>
                                                  <p class="text-muted font-13 ">Creating articles boosts knowledge, engages audiences, and strengthens online presence effectively</p>
                                                  <a href="create-article.php" class="btn btn-gradient-secondary">Create</a>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="card">
                                      <div class="card-body">
                                          <h5 class="header-title pb-3 mt-0">Current Advertisements</h5>
                                          <div class="table-responsive boxscroll" style="overflow: hidden; outline: none;">
                                              <table class="table mb-0">
                                                  <tbody>
                                                        <?php
                                                        if ($advertisement = $mysqli -> query("SELECT * FROM advertisements order by end_date ASC")) {
                                                         if ($advertisement ->num_rows > 0) {
                                                           while ($advertisementdata = mysqli_fetch_row($advertisement)) {
                                                             if (($currentDate >= $advertisementdata[4]) && ($currentDate <= $advertisementdata[5])){
                                                                  ?>
                                                                  <tr>
                                                                    <td class="border-top-0">
                                                                        <div class="media">
                                                                          <img src="../<?php echo $advertisementdata[2]; ?>" alt="" class="thumb-md rounded-circle">
                                                                            <div class="media-body ml-2">
                                                                                <p class="mb-0"><?php echo $advertisementdata[1]; ?> <span class="badge badge-soft-danger"><?php echo $advertisementdata[6]; ?></span></p>
                                                                                <span class="font-12 text-muted"><?php echo $advertisementdata[3]; ?></span>
                                                                            </div>
                                                                            <td class="border-top-0 text-right">
                                                                                <a href="edit-promotion.php?id=<?php echo $advertisementdata[0]; ?>" class="btn btn-light btn-sm"><i class="far fa-edit mr-2 text-success"></i>edit</a>
                                                                            </td>
                                                                        </div>
                                                                    </td>
                                                                  </tr>
                                                                  <?php
                                                              }
                                                            }
                                                        }
                                                      } ?>

                                                      <tr>
                                                        <td class="border-top-0 text-right">
                                                            <a href="create-promotion.php" class="text-primary">Create Promotion</a>
                                                        </td>
                                                      </tr>
                                                  </tbody>
                                              </table>
                                          </div>

                                      </div>
                                  </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="header-title pb-3 mt-0">Pending Articles</h5>
                                            <div class="table-responsive">
                                                <table class="table table-hover mb-0">
                                                    <thead>
                                                        <tr class="align-self-center">
                                                            <th>Article Name</th>
                                                            <th>Category</th>
                                                            <th>Publisher Name</th>
                                                            <th>Create Date</th>
                                                            <th>Last Updated Date</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                      <?php
                                                      if ($pendingarticles = $mysqli -> query("SELECT * FROM articles WHERE status = 'draft'")) {
                                                        if ($pendingarticles ->num_rows > 0) {
                                                          while ($pendingarticlesdata = mysqli_fetch_row($pendingarticles)) {
                                                            ?>
                                                        <tr>
                                                            <td><?php echo $pendingarticlesdata[1]; ?></td>

                                                            <?php
                                                            $category =  $pendingarticlesdata[7];
                                                            if ($pendingcatarticles = $mysqli -> query("SELECT * FROM categories WHERE cat_id = '$category'")) {
                                                              if ($pendingcatarticles ->num_rows > 0) {
                                                                if ($pendingcatarticlesdata = mysqli_fetch_row($pendingcatarticles)) {
                                                                  ?>
                                                            <td><?php echo $pendingcatarticlesdata[1]; ?></td>
                                                          <?php }
                                                              }
                                                            }  ?>

                                                            <td>
                                                              <?php
                                                              $author =  $pendingarticlesdata[6];
                                                              if ($pendingauthorarticles = $mysqli -> query("SELECT * FROM authors WHERE author_id = '$author'")) {
                                                                if ($pendingauthorarticles ->num_rows > 0) {
                                                                  if ($pendingauthorarticlesdata = mysqli_fetch_row($pendingauthorarticles)) {
                                                                    ?>
                                                                <?php echo $pendingauthorarticlesdata[1] ?>
                                                              <?php }
                                                                  }
                                                                } ?>
                                                            </td>
                                                            <td><?php echo $pendingarticlesdata[10]; ?></td>
                                                            <td><?php echo $pendingarticlesdata[11]; ?></td>
                                                            <td>
                                                                <div class="media">
                                                                    <div class="media-body ml-2">
                                                                        <p class="mb-0"><span class="badge badge-soft-danger">Draft</span></p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                      <?php }
                                                          }
                                                        } ?>
                                                    </tbody>
                                                </table>
                                            </div><!--end table-responsive-->
                                            <div class="pt-3 border-top text-right">
                                                <a href="#" class="text-primary">View all <i class="mdi mdi-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->

                        </div><!-- container -->

                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->

                <footer class="footer">
                    © 2022 Makram's News .
                </footer>

            </div>
            <!-- End Right content here -->

        </div>
        <!-- END wrapper -->


        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/modernizr.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <script src="assets/plugins/chart.js/chart.min.js"></script>
        <script src="assets/pages/dashboard.js"></script>


                <?php

                $i = 0;
                $j = 0;
                $views = 0;
                $articlescount = 0;
                $userscount = 0;
                $activepromotions = 0;
                if ($usersnumber = $mysqli -> query("SELECT COUNT(name) FROM users WHERE subscription_status = 'active';")) {
                  if ($usersnumber ->num_rows > 0) {
                    if ($usersnumberdata = mysqli_fetch_row($usersnumber)) {
                      $userscount = $usersnumberdata[0];
                    }
                  }
                }
                if ($advertisementdata = $mysqli -> query("SELECT * FROM advertisements;")) {
                  if ($advertisementdata ->num_rows > 0) {
                    while ($advertisementdatadata = mysqli_fetch_row($advertisementdata)) {
                      if (($currentDate >= $advertisementdatadata[4]) && ($currentDate <= $advertisementdatadata[5])){
                          $activepromotions++;
                      }
                    }
                  }
                }
                if ($pendingarticles = $mysqli -> query("SELECT * FROM articles WHERE status = 'published'")) {
                  if ($pendingarticles ->num_rows > 0) {
                    while ($pendingarticlesdata = mysqli_fetch_row($pendingarticles)) {
                      $articleid = $pendingarticlesdata[0];
                      $articlescount++;

                      if ($articleviews = $mysqli -> query("SELECT * FROM article_views WHERE article_id = '$articleid'")) {
                        if ($articleviews ->num_rows > 0) {
                          if ($articleviewsdata = mysqli_fetch_row($articleviews)) {
                            $articleviewsdatanameArray[$j] = $pendingarticlesdata[1];
                            $articleviewsdataArray[$i] = $articleviewsdata[2];
                            $views += $articleviewsdata[2];
                            $i++;
                          }
                        }
                      }
                      $j++;
                    }
                  }
                } ?>
                <script type="text/javascript">

                $(".views-count").append(<?php echo $views; ?>);
                $(".articles-count").append(<?php echo $articlescount; ?>);
                $(".users-count").append(<?php echo $userscount; ?>);
                $(".active-promotions").append(<?php echo $activepromotions; ?>);

                //Bar

                 var ctx = document.getElementById("bar-data").getContext('2d');


                 var gradientStroke12 = ctx.createLinearGradient(0, 0, 0, 300);
                     gradientStroke12.addColorStop(0, '#5ecbf6');
                     gradientStroke12.addColorStop(1, '#8d44ad');

                     var cornerRadius = 20;

                     var myChart = new Chart(ctx, {
                       type: 'bar',
                       data: {
                         labels: <?php echo json_encode($articleviewsdatanameArray);?>,
                         datasets: [{
                           label: 'Views',
                           data: <?php echo json_encode($articleviewsdataArray, JSON_NUMERIC_CHECK);?>,
                           borderColor: gradientStroke12,
                           backgroundColor: gradientStroke12,
                           hoverBackgroundColor: gradientStroke12,
                           pointRadius: 0,
                           fill: true,
                           borderWidth: 0
                         },]
                       },

                       options: {

                         legend: {
                           position: 'bottom',
                           display:true,
                           labels: {
                            boxWidth:12
                          }
                         },
                         tooltips: {
                           displayColors:true,
                           intersect: true,
                         },
                         scales: {
                           xAxes: [{
                               ticks: {
                                   max: 100,
                                   min: 20,
                                   stepSize: 10
                               },
                               gridLines: {
                                   display: true ,
                                   color: "#FFFFFF"
                               },
                               ticks: {
                                display: true,
                                fontFamily: "'Rubik', sans-serif"
                                },

                           }],
                           yAxes: [{
                               gridLines: {
                                 color: '#fff',
                                 display: true ,
                               },
                               ticks: {
                                   display: true,
                                   fontFamily: "'Rubik', sans-serif"
                               },

                           }]
                       },
                      }
                     });






                </script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>


    </body>
</html>
