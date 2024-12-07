<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login - Makram New's </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/theme/favicon.png">
    <!-- NewsBoard CSS  -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/widgets.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body>
  <?php require 'dbConnect.php'; ?> 
    <div class="scroll-progress bg-dark"></div>
    <!--Offcanvas sidebar-->
  <?php require 'header.php'; ?>
    <!-- Start Main content -->
    <main class="mt-100 mb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-10">
                    <div class="login_wrap widget-taber-content p-30 background-white border-radius-5">
                        <div class="padding_eight_all bg-white">
                            <h2 class="mb-50 text-center position-relative divider-wave">Login To Your Account</h2>
                            <form method="post" action="logindata.php">
                                <?php
                                  if(isset($_GET["error"])) {
                                    if ($_GET["error"] == 1) {
                                    ?>
                                      <div class="alert alert-danger" role="alert">
                                        Wrong email or password
                                      </div>
                                    <?php }} ?>
                                <div class="divider-text-center mt-15 mb-15 text-muted">
                                    <span> Email & Password </span>
                                </div>
                                <div class="plr-5-percent">
                                    <div class="form-group">
                                        <input type="email" required="" class="form-control" name="email" placeholder="Email address">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" required="" type="password" name="password" placeholder="Password">
                                    </div>
                                    <div class="login_footer form-group">
                                        <div class="chek-form">
                                            <div class="custome-checkbox">
                                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="">
                                                <label class="form-check-label" for="exampleCheckbox1"><span>Remember me</span></label>
                                            </div>
                                        </div>
                                        <a class="text-muted" href="#">Forgot password?</a>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-dark btn-block" name="login">Log in</button>
                                    </div>
                                </div>
                            </form>
                            <div class="text-muted text-center">Don't have an account? <a href="signup.html">Sign up now</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
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
