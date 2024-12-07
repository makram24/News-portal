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

    if (($_SESSION["role"] == 'editor') || ($_SESSION["role"] == 'admin')) {
    ?>


    <body class="fixed-left">

        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Begin page -->
        <div id="wrapper">

          <?php
          if (($_SESSION["role"] == 'editor')) {
            require 'leftmenu.php';
          }elseif (($_SESSION["role"] == 'admin')) {
            require 'leftmenuAdmin.php';
          }
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
                                        <h4 class="page-title">Create Article</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- end page title end breadcrumb -->

                            <div class="row">
                              <div class="col-lg-12">
                                  <div class="card">
                                      <div class="card-body">

                                          <form method="POST" action="create-articledata.php" class="" enctype="multipart/form-data">
                                            <div class="row col-md-12">
                                              <div class="form-group col-md-6">
                                                <label>Title</label>
                                                <input type="text" class="form-control" name="title" required placeholder="Article Title"/>
                                                <span class="font-13 text-muted">e.g "The Impact of 5G Technology"</span>
                                              </div>

                                              <div class="form-group col-md-6">
                                                <label>Slug</label>
                                                <input type="text" class="form-control" name="slug" required placeholder="Article Slug"/>
                                                <span class="font-13 text-muted">e.g "impact-5g-technology"</span>
                                              </div>
                                            </div>

                                              <div class="form-group col-md-12">
                                                  <label>Small Description</label>
                                                  <input type="text" class="form-control" name="smalldes" required placeholder="Article Small Description"/>
                                              </div>

                                              <div class="form-group col-md-12">
                                                  <label>Category</label>
                                                  <select class="custom-select" name="cat">
                                                    <?php
                                                    if ($selectcat = $mysqli -> query("SELECT * FROM categories")) {
                                                      if ($selectcat ->num_rows > 0) {
                                                        while ($selectcatdata = mysqli_fetch_row($selectcat)) {
                                                            ?>
                                                            <option value="<?php echo $selectcatdata[0]; ?>"><?php echo $selectcatdata[1]; ?></option>
                                                            <?php
                                                          }
                                                        }
                                                      } ?>
                                                  </select>
                                              </div>

                                              <div class="form-group col-md-12">
                                                  <label>Article Content</label>
                                                  <div>
                                                      <textarea required name="content" class="form-control" rows="10"></textarea>
                                                  </div>
                                              </div>
                                              <div class="row col-md-12">
                                                <div class="form-group col-md-6">
                                                  <label>Content Type</label>
                                                  <select class="custom-select" name="conttype">
                                                    <option selected value="0">Public</option>
                                                    <option value="1">Private</option>
                                                  </select>
                                                </div>

                                                <div class="form-group col-md-6">
                                                  <label>Tags</label>
                                                  <input type="text" class="form-control" name="tags" value="" required placeholder="Article Tags"/>
                                                  <span class="font-13 text-muted">e.g "Finance,pos,etc.."</span>
                                                </div>
                                              </div>

                                              <div class="col-md-12 row">
                                                <div class="col-md-3">
                                                  <div class="form-group col-md-12">
                                                    <label for="formFile" class="form-label">Upload Your Cover Image</label>
                                                    <input class="form-control" name="uploadimagecover" type="file" name="" id="formFile" accept="image/*">
                                                  </div>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-group col-md-12">
                                                      <label for="formFile" class="form-label">Upload Your Media (Video Or Image)</label>
                                                      <div class="col-md-12 row">
                                                        <div class="col-md-5">
                                                          <select class="custom-select" name="type" id="type">
                                                            <option selected value="image">Image</option>
                                                            <option value="video">Video</option>
                                                          </select>
                                                        </div>
                                                        <div class="col-md-6 offset-md-1">
                                                          <input class="form-control" type="file" name="media" accept="image/*, video/*" id="formFile">
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class='form-group' id="dataDisplay">
                                                      <label for='formFile' class='form-label'>Upload Your Video Cover</label>
                                                      <input class='form-control' type='file' name='video-cover' id='formFile'>
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
  <?php } ?>
</html>
