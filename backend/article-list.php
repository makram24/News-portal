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
    require_once '../dbConnect.php'; ?>


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
                                                <li class="breadcrumb-item"><a href="#">Articles</a></li>
                                                <li class="breadcrumb-item active">Article List</li>
                                            </ol>
                                        </div>
                                        <h4 class="page-title">Article List</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- end page title end breadcrumb -->
                            <div class="row">
                                <div class="col-xl-12">
                                  <div class="card">
                                      <div class="card-body">
                                          <h4 class="mt-0 header-title">Filter Table By</h4>
                                          <p class="text-muted mb-4 font-13">You can filter below data by choosing on of the options below</p>
                                          <form id="filterForm">
                                            <div class="row">
                                              <div class="col-xl-6">
                                                <div class="form-group row">
                                                  <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                                  <div class="col-sm-10">
                                                    <input class="form-control" type="text" name="author_name" id="author_name" placeholder="Enter Author Name">
                                                  </div>
                                                </div>
                                                <div class="form-group row">
                                                  <label for="example-search-input" class="col-sm-2 col-form-label">Title</label>
                                                  <div class="col-sm-10">
                                                    <input class="form-control" type="text" name="title" id="title" placeholder="Enter Article Title">
                                                  </div>
                                                </div>
                                                <div class="form-group row">
                                                  <label for="example-date-input" class="col-sm-2 col-form-label">Date</label>
                                                  <div class="col-sm-10">
                                                    <input class="form-control" type="date" placeholder="2011-08-19" name="date" id="date">
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="col-xl-6">
                                                <div class="form-group row">
                                                  <label class="col-sm-2 col-form-label">Status</label>
                                                  <div class="col-sm-10">
                                                    <select class="form-control" name="statusdata" id="statusdata">
                                                      <option value="">All</option>
                                                      <option value="published">Published</option>
                                                      <option value="draft">Drafts</option>
                                                    </select>
                                                  </div>
                                                </div>
                                                <div class="form-group row">
                                                  <label class="col-sm-2 col-form-label">Category</label>
                                                  <div class="col-sm-10">
                                                    <select class="form-control" name="category" id="category">
                                                      <option value="all">All Categories</option>
                                                      <?php
                                                      if ($catarticles = $mysqli -> query("SELECT * FROM categories")) {
                                                          if ($catarticles ->num_rows > 0) {
                                                            while ($catarticlesdata = mysqli_fetch_row($catarticles)) {
                                                              ?>
                                                              <option value="<?php echo $catarticlesdata[0]; ?>"><?php echo $catarticlesdata[1]; ?></option>
                                                              <?php
                                                            }
                                                          }
                                                        }
                                                         ?>
                                                    </select>
                                                  </div>
                                                </div>
                                                <div class="form-group row">
                                                  <button type="submit" class="btn btn-primary ml-2" name="submit">Filter</button>
                                                </div>
                                              </div>
                                            </div>
                                          </form>
                                      </div>
                                  </div>
                                    <div class="card">
                                        <div class="card-body">

                                          <div id="results"></div>

                                          <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                          <script>
                                              $('#filterForm').on('submit', function(e) {
                                                  e.preventDefault();
                                                  $.ajax({
                                                      url: 'filter.php',
                                                      method: 'POST',
                                                      data: $('#filterForm').serialize(),
                                                      success:function(data)
                                                      {
                                                          $('#results').html(data);
                                                          $('#old-table').hide();

                                                      }
                                              });
                                              });
                                          </script>


                                            <div class="table-responsive" id="old-table">
                                                <table class="table table-hover mb-0">
                                                    <thead>
                                                        <tr class="align-self-center">
                                                            <th>#</th>
                                                            <th>Article Name</th>
                                                            <th>Category</th>
                                                            <th>Author Name</th>
                                                            <th>Status</th>
                                                            <th>Published Date</th>
                                                            <th>&nbsp;</th>
                                                            <th>&nbsp;</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                      <?php
                                                      if ($pendingarticles = $mysqli -> query("SELECT * FROM articles")) {
                                                        if ($pendingarticles ->num_rows > 0) {
                                                          $artriclenum = 1;
                                                          while ($pendingarticlesdata = mysqli_fetch_row($pendingarticles)) {
                                                            ?>
                                                        <tr>
                                                          <td> <?php echo $artriclenum; ?></td>
                                                            <td><?php echo $pendingarticlesdata[1]; ?></td>

                                                            <?php
                                                            $artriclenum++;
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
                                                            <td><?php echo $pendingarticlesdata[8]; ?></td>
                                                            <td><?php echo $pendingarticlesdata[9]; ?></td>
                                                            <td class="border-top-0 text-right">
                                                              <a class="btn btn-light btn-sm" href="../single/<?php echo $pendingarticlesdata[2]; ?>">View</a>
                                                            </td>
                                                            <td class="border-top-0 text-right">
                                                                <a href="edit-article.php?articleid=<?php echo $pendingarticlesdata[0]; ?>" class="btn btn-light btn-sm">Edit</a>
                                                            </td>

                                                        </tr>
                                                      <?php }
                                                          }
                                                        } ?>
                                                    </tbody>
                                                </table>
                                            </div><!--end table-responsive-->
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

        <!-- App js -->
        <script src="assets/js/app.js"></script>


    </body>
</html>
