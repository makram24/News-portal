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
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    </head>

    <?php
    session_start();
    require_once '../dbConnect.php';

    if ($_SESSION["role"] == 'editor') {
      $id = $_SESSION["id"];
    ?>


    <body class="fixed-left">

        <!-- Loader -->

        <!-- Begin page -->
        <div id="wrapper">

          <?php require 'leftmenu.php'; ?>

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
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="icon-contain">
                                                        <div class="row">
                                                            <div class="col-2 align-self-center">
                                                                <i class="fas fa-tasks text-gradient-success"></i>
                                                            </div>
                                                            <div class="col-10 text-right">
                                                                <h5 class="mt-0 mb-1 articles-count"></h5>
                                                                <p class="mb-0 font-12 text-muted">Published Articles</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="icon-contain">
                                                        <div class="row">
                                                            <div class="col-2 align-self-center">
                                                                <i class="fas fa-users text-gradient-warning"></i>
                                                            </div>
                                                            <div class="col-10 text-right">
                                                                <h5 class="mt-0 mb-1 views-count"></h5>
                                                                <p class="mb-0 font-12 text-muted">Views</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                      <div class="card-body">

                                          <h4 class="mt-0 header-title">Articles Views</h4>
                                          <p class="text-muted mb-4 font-13 d-inline-block text-truncate w-100">The total number of times an article is loaded or viewed. </p>

                                          <canvas id="bar-data" height="90"></canvas>

                                      </div>
                                    </div>

                                </div>
                                <div class="col-xl-4  col-lg-6">

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
                                          <h5 class="header-title pb-3 mt-0">Previous Articles</h5>
                                          <div class="table-responsive boxscroll" style="overflow: hidden; outline: none;">
                                              <table class="table mb-0">
                                                  <tbody>
                                                    <?php
                                                      $allarticlestitle = [];
                                                      $allarticlesid = [];
                                                    if ($allarticles = $mysqli -> query("SELECT * FROM articles WHERE status = 'published' and author_id = '$id'")) {
                                                      if ($allarticles ->num_rows > 0) {
                                                        $num = 0;
                                                        while ($allarticlesdata = mysqli_fetch_row($allarticles)) {
                                                           $allarticlestitle[$num] = $allarticlesdata[1];
                                                           $allarticlesid[$num] = $allarticlesdata[0];

                                                          if ($num < 2) {
                                                          ?>
                                                          <tr>
                                                              <td class="border-top-0">
                                                                  <div class="media">
                                                                      <div class="media-body ml-2">
                                                                          <p class="mb-0"><?php echo $allarticlesdata[1]; ?> <span class="badge badge-soft-success">published</span></p>
                                                                      </div>
                                                                  </div>
                                                              </td>
                                                              <td class="border-top-0 text-right">
                                                                  <a href="edit-article.php?articleid=<?php echo $allarticlesdata[0]; ?>" class="btn btn-light btn-sm"><i class="far fa-edit mr-2 text-success"></i>Edit</a>
                                                              </td>
                                                          </tr>
                                                          <?php
                                                          }
                                                          $num++;
                                                         }
                                                        }
                                                      }
                                                        $allarticleslenght = count($allarticlestitle);?>
                                                      <tr>
                                                          <td class="border-top-0">
                                                              <div class="media">
                                                                  <div class="media-body ml-2">
                                                                      <p class="mb-0">&nbsp;</p>
                                                                  </div>
                                                              </div>
                                                          </td>
                                                          <td class="border-top-0 text-right">
                                                              <a data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="text-primary">View all <i class="mdi mdi-arrow-right"></i></a>
                                                          </td>
                                                      </tr>
                                                  </tbody>
                                              </table>
                                          </div>

                                          <!-- Modal -->
                                          <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                              <div class="modal-content">
                                                <div class="modal-body">
                                                  <h5 class="header-title pb-3 mt-0">Previous Articles</h5>
                                                  <div class="table-responsive boxscroll" style="overflow: hidden; outline: none;">
                                                      <table class="table mb-0">
                                                          <tbody>
                                                            <?php
                                                            for ($i=0; $i < $allarticleslenght; $i++) {

                                                                  ?>
                                                                  <tr>
                                                                      <td class="border-top-0">
                                                                          <div class="media">
                                                                              <div class="media-body ml-2">
                                                                                  <p class="mb-0"><?php echo $allarticlestitle[$i]; ?> <span class="badge badge-soft-success">published</span></p>
                                                                              </div>
                                                                          </div>
                                                                      </td>
                                                                      <td class="border-top-0 text-right">
                                                                          <a href="edit-article.php?articleid=<?php echo $allarticlesid[$i]; ?>" class="btn btn-light btn-sm"><i class="far fa-edit mr-2 text-success"></i>Edit</a>
                                                                      </td>
                                                                  </tr>
                                                                  <?php
                                                                    }
                                                                 ?>
                                                          </tbody>
                                                      </table>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                      </div>
                                  </div>
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="container-fluid">
                              <div class="row">
                                  <div class="col-sm-12">
                                    <div class="card">
                                          <div class="card-body">
                                              <h5 class="header-title pb-3 mt-0">Draft Articles</h5>
                                              <div class="table-responsive">
                                                  <table class="table table-hover mb-0">
                                                      <thead>
                                                          <tr class="align-self-center">
                                                              <th>&nbsp;</th>
                                                              <th>Article Name</th>
                                                              <th>Publisher Name</th>
                                                              <th>Category</th>
                                                              <th>Create Date</th>
                                                              <th>Last Updated Date</th>
                                                              <th>&nbsp;</th>
                                                          </tr>
                                                      </thead>
                                                      <tbody>
                                                        <?php

                                                        if ($pendingarticles = $mysqli -> query("SELECT * FROM articles WHERE status = 'draft' and author_id = '$id'")) {
                                                          if ($pendingarticles ->num_rows > 0) {
                                                            while ($pendingarticlesdata = mysqli_fetch_row($pendingarticles)) {
                                                              ?>
                                                          <tr>
                                                            <td class="border-top-0 text-right">
                                                                <a href="edit-article.php?articleid=<?php echo $pendingarticlesdata[0]; ?>" class="btn btn-light btn-sm">Edit</a>
                                                            </td>
                                                              <td><?php echo $pendingarticlesdata[1]; ?></td>

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
                                                              <td><?php echo $pendingarticlesdata[10]; ?></td>
                                                              <td><?php echo $pendingarticlesdata[11]; ?></td>
                                                              <td>
                                                                <select class="custom-select" name="statusdata" id="statusdata<?php echo $pendingarticlesdata[0];?>">
                                                                  <option value="draft" id="<?php echo $pendingarticlesdata[0]; ?>">draft</option>
                                                                  <option value="published" id="<?php echo $pendingarticlesdata[0]; ?>">published</option>
                                                                </select>
                                                                <script>
                                                                    $(document).ready(function(){
                                                                        $('#statusdata<?php echo $pendingarticlesdata[0];?>').change(function() {
                                                                            var statusdata = $(this).val();
                                                                            var articleid = $('#statusdata<?php echo $pendingarticlesdata[0];?> option:selected').attr('id');
                                                                            if(statusdata != '')
                                                                            {
                                                                                $.ajax({
                                                                                    url:"statuschange.php",
                                                                                    method:"POST",
                                                                                    data:{
                                                                                      statusdata: statusdata,
                                                                                      articleid: articleid,
                                                                                    },
                                                                                    success:function(data)
                                                                                    {
                                                                                        $('#statuschangeddata').fadeIn();
                                                                                        $('#statuschangeddata').html(data);
                                                                                    }
                                                                                });
                                                                            }
                                                                        });
                                                                    });
                                                                </script>
                                                              </td>
                                                            </tr>
                                                        <?php }
                                                            }
                                                          } ?>
                                                      </tbody>
                                                  </table>
                                                  <p id="statuschangeddata"></p>
                                              </div><!--end table-responsive-->
                                              <!-- <div class="pt-3 border-top text-right">
                                                  <a href="#" class="text-primary">View all <i class="mdi mdi-arrow-right"></i></a>
                                              </div> -->
                                          </div>
                                      </div>
                                  </div>
                              </div>
                            </div>
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
        <!-- <script src="assets/js/popper.min.js"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
        <script src="assets/js/modernizr.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <!-- Chart JS -->
        <script src="assets/plugins/chart.js/chart.min.js"></script>
        <!-- <script src="assets/pages/chartjs.init.js"></script> -->

        <?php
        $i = 0;
        $j = 0;
        $views = 0;
        $articlescount = 0;
        if ($pendingarticles = $mysqli -> query("SELECT * FROM articles WHERE status = 'published' and author_id = '$id'")) {
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

        <script src="assets/pages/dashboard.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>


    </body>
  <?php
}
  // else{
  //    header("Location: ../404.php")
  // }
  ?>
</html>
