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

    if ( $_SESSION["role"] == 'admin') {
    ?>


    <body class="fixed-left">

        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Begin page -->
        <div id="wrapper">

          <?php
            require 'leftmenuAdmin.php';
          ?>

            <!-- Start right Content here -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">

                    <div class="page-content-wrapper ">

                        <div class="container-fluid">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="page-title-box">
                                        <h4 class="page-title">Create Promotion</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- end page title end breadcrumb -->

                            <div class="row">
                              <div class="col-lg-12">
                                  <div class="card">
                                      <div class="card-body">
                                        <?php
                                          if(isset($_GET["error"])) {
                                            if ($_GET["error"] == 1) {
                                            ?>
                                              <div class="alert alert-danger" role="alert">
                                                Promotion not created
                                              </div>
                                            <?php }
                                          } ?>
                                          <form method="POST" action="create-addata.php" class="" enctype="multipart/form-data">
                                            <div class="row col-md-12">
                                              <div class="form-group col-md-6">
                                                <label>Title</label>
                                                <input type="text" class="form-control" name="title" required placeholder="AD Title"/>
                                              </div>

                                              <div class="form-group col-md-6">
                                                <label>Link</label>
                                                <input type="text" class="form-control" name="link" required placeholder="AD Link"/>
                                                <span class="font-13 text-muted">e.g "https://google.com"</span>
                                              </div>
                                            </div>

                                              <div class="col-md-12 row">
                                                <div class="form-group col-md-4">
                                                  <label>Start Date</label>
                                                  <div>
                                                    <input class="form-control" type="date" name="sdate" id="sdate">
                                                  </div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                  <label>End Date</label>
                                                  <div>
                                                    <input class="form-control" type="date" name="edate" id="edate">
                                                  </div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                  <label>Location</label>
                                                  <select class="custom-select" name="loc">
                                                    <option selected value="homepage">Home Page</option>
                                                    <option value="sidebar">Sidebar</option>
                                                    <option value="article">Article</option>
                                                    <option value="footer">Footer</option>
                                                  </select>
                                                </div>
                                              </div>

                                              <div class="col-md-12 row">
                                                <div class="col-md-4">
                                                  <div>
                                                      <img style="width: 100%;" src="http://via.placeholder.com/1080x1080" alt="post-title">
                                                  </div>
                                                  <div class="form-group col-md-12">
                                                    <label>Add Your AD Image</label>
                                                    <input class="form-control" name="uploadimagecover" type="file" name="" id="formFile" accept="image/*">

                                                  </div>
                                                </div>
                                              </div>


                                              <div class="form-group mb-0">
                                                  <div>
                                                      <button type="submit" name="submit" class="btn btn-primary waves-effect waves-light">
                                                          Submit
                                                      </button>
                                                      <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                                          Cancel
                                                      </button>
                                                  </div>
                                              </div>
                                          </form>

                                      </div>
                                  </div>
                              </div> <!-- end col -->
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
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/modernizr.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <!-- Parsley js -->
        <script src="assets/plugins/parsleyjs/parsley.min.js"></script>
        <script src="assets/pages/validation.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>

    </body>
  <?php
      }?>
</html>
