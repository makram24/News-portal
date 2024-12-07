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

    if ($_SESSION["role"] == 'editor' || $_SESSION["role"] == 'admin') {
      if(isset($_GET["articleid"])) {
        $articleid = $_GET["articleid"];
    ?>


    <body class="fixed-left">

        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Begin page -->
        <div id="wrapper">

          <?php
          if ($_SESSION["role"] == 'editor') {
            require 'leftmenu.php';
          }elseif ($_SESSION["role"] == 'admin') {
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
                                        <h4 class="page-title">Edit Article</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- end page title end breadcrumb -->

                            <div class="row">
                              <div class="col-lg-12">
                                  <div class="card">
                                      <div class="card-body">

                                          <form method="POST" action="edit-articledata.php?article=<?php echo $articleid ?>" class="" enctype="multipart/form-data">
                                            <?php
                                              if ($articles = $mysqli -> query("SELECT * FROM articles WHERE article_id = '$articleid'")) {
                                               if ($articles ->num_rows > 0) {
                                                 if ($articlesdata = mysqli_fetch_row($articles)) {
                                                   ?>
                                            <div class="row col-md-12">
                                              <div class="form-group col-md-6">
                                                <label>Title</label>
                                                <input type="text" class="form-control" name="title" required placeholder="Article Title" value="<?php echo $articlesdata[1]; ?>"/>
                                                <span class="font-13 text-muted">e.g "The Impact of 5G Technology"</span>
                                              </div>

                                              <div class="form-group col-md-6">
                                                <label>Slug</label>
                                                <input type="text" class="form-control" name="slug" value="<?php echo $articlesdata[2]; ?>" required placeholder="Article Slug"/>
                                                <span class="font-13 text-muted">e.g "impact-5g-technology"</span>
                                              </div>
                                            </div>

                                              <div class="form-group col-md-12">
                                                  <label>Small Description</label>
                                                  <input type="text" class="form-control" name="smalldes" value="<?php echo $articlesdata[3]; ?>" required placeholder="Article Small Description"/>
                                              </div>

                                              <div class="form-group col-md-12">
                                                  <label>Category</label>
                                                  <select class="custom-select" name="cat">
                                                    <?php
                                                    if ($selectcat = $mysqli -> query("SELECT * FROM categories")) {
                                                      if ($selectcat ->num_rows > 0) {
                                                        while ($selectcatdata = mysqli_fetch_row($selectcat)) {
                                                          if ($selectcatdata[0] == $articlesdata[7]) {
                                                            ?>
                                                            <option selected value="<?php echo $selectcatdata[0]; ?>"><?php echo $selectcatdata[1]; ?></option>
                                                            <?php
                                                          }else {
                                                            ?>
                                                            <option value="<?php echo $selectcatdata[0]; ?>"><?php echo $selectcatdata[1]; ?></option>
                                                            <?php
                                                          }
                                                        }
                                                      }
                                                    } ?>
                                                  </select>
                                              </div>

                                              <div class="form-group col-md-12">
                                                  <label>Article Content</label>
                                                  <div>
                                                      <textarea required name="content" class="form-control" rows="10"><?php
                                                        $text = str_replace('<br />', "\n", $articlesdata[4]);
                                                          echo htmlspecialchars($text);?></textarea>
                                                  </div>
                                              </div>
                                              <div class="row col-md-12">
                                                <div class="form-group col-md-6">
                                                  <label>Content Type</label>
                                                  <select class="custom-select" name="conttype">
                                                    <option <?php if ($articlesdata[12] == 0){ echo 'selected'; } ?> value="0">Public</option>
                                                    <option <?php if ($articlesdata[12] == 1){ echo 'selected'; } ?> value="1">Private</option>
                                                  </select>
                                                </div>

                                                <div class="form-group col-md-6">
                                                  <label>Tags</label>
                                                  <?php
                                                  $tagsarray = '';
                                                    if ($tagscon = $mysqli -> query("SELECT tag_id FROM article_tags WHERE article_id = '$articleid'")) {
                                                      if ($tagscon ->num_rows > 0) {
                                                        while ($tagscondata = mysqli_fetch_row($tagscon)) {
                                                          $tagid = $tagscondata[0];
                                                          if ($tagsnames = $mysqli -> query("SELECT tag_name FROM tags WHERE tag_id = '$tagid'")) {
                                                            if ($tagsnames ->num_rows > 0) {
                                                              if ($tagsnamesdata = mysqli_fetch_row($tagsnames)) {
                                                                $tagsarray = $tagsarray . ',' . $tagsnamesdata[0];
                                                              }
                                                            }
                                                          }
                                                        }
                                                      }
                                                    } ?>
                                                  <input type="text" class="form-control" name="tags" value="<?php echo $tagsarray; ?>" required placeholder="Article Tags"/>
                                                  <span class="font-13 text-muted">e.g "Finance,pos,etc.."</span>
                                                </div>
                                              </div>

                                              <div class="col-md-12 row">
                                                <div class="col-md-3">
                                                  <div class="form-group col-md-12">
                                                    <?php if ($articlesdata[5] != ''){ ?>
                                                      <a class="delete-image-btn" href="delete.php?type=cover&&article=<?php echo $articleid; ?>">X</a>
                                                      <img src="../<?php echo $articlesdata[5]; ?>" style="width: 100%;" alt="">
                                                  <?php }else{
                                                    ?>
                                                    <img style="width: 100%;" src="http://via.placeholder.com/1080x1080" alt="post-title">
                                                    <?php
                                                  } ?>
                                                  </div>
                                                  <div class="form-group col-md-12">
                                                    <label for="formFile" class="form-label">Change Your Cover Image</label>
                                                    <input class="form-control" name="uploadimagecover" type="file" name="" id="formFile" accept="image/*">

                                                  </div>
                                                </div>
                                                <div class="col-md-9">
                                                  <div class="form-group col-md-6 row">
                                                    <?php
                                                    if ($articlemedia = $mysqli -> query("SELECT * FROM media WHERE article_id = '$articleid'")) {
                                                      if ($articlemedia ->num_rows > 0) {
                                                        while ($articlemediadata = mysqli_fetch_row($articlemedia)) {
                                                          if ($articlemediadata[2] == 'video') {
                                                            ?>
                                                            <a href="<?php echo $articlemediadata[3]; ?>" class="play-video col-md-6" data-animate="zoomIn" data-duration="1.5s" data-delay="0.1s">
                                                              <a class="delete-image-btn" href="delete.php?type=media&&mediaid=<?php echo $articlemediadata[0]; ?>&&article=<?php echo $articleid; ?>">X</a>

                                                            <?php
                                                          }elseif ($articlemediadata[2] == 'cover') {
                                                            ?>
                                                            <img style="width: 100%;" src="../<?php echo $articlemediadata[3]; ?>" alt="post-title">
                                                            <span class="btn-play-video">
                                                                <i class="ti-control-play"></i>
                                                            </span>
                                                        </a>
                                                            <?php
                                                          }
                                                          else if ($articlemediadata[2] == 'image'){
                                                            ?>
                                                            <div class="col-md-6">
                                                              <a class="delete-image-btn" href="delete.php?type=media&&mediaid=<?php echo $articlemediadata[0]; ?>&&article=<?php echo $articleid; ?>">X</a>
                                                              <img style="width: 100%;" src="../<?php echo $articlemediadata[3]; ?>" alt="">
                                                            </div>
                                                            <?php
                                                          }
                                                            ?>


                                                    <?php }
                                                        }
                                                      } ?>
                                                  </div>
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
                                            <?php }
                                                }
                                              } ?>
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

        <script type="text/javascript">
        $(document).ready(function() {
          $('#type').change(function() {
              const selectedOption = $(this).val();
              const dataDisplay = $('#dataDisplay');

              if (selectedOption === "video") {
                  $('#dataDisplay').toggle();
              }else {
                $('#dataDisplay').toggle();
              }
          });
        });
        </script>

    </body>
  <?php }
      }?>
</html>
