<!-- Footer Start-->
<footer>
    <div class="footer-area">
        <div class="container">
            <div class="row pb-30">
                <div class="col-12">
                    <div class="divider-2 mb-30"></div>
                </div>
                <div class="col-lg-5 col-md-6 mb-lg-0 mb-md-4 mb-sm-4">
                    <div class="sidebar-widget widget-latest-posts pr-50">
                        <h4 class="widget-header text-uppercase font-weight-bold color-black">
                            <span>Makram New's.</span>
                        </h4>
                        <div class="textwidget">
                            <p>
                                Start writing, no matter what. The water does not flow until the faucet is turned on.
                            </p>
                            <p><strong class="color-black">Address</strong><br>
                                123 Main Street<br>
                                Budapest , Hungary</p>
                            <p><strong class="color-black">Hours</strong><br>
                                Monday—Friday: 9:00AM–5:00PM<br>
                                Saturday &amp; Sunday: 11:00AM–3:00PM</p>
                            <ul class="header-social-network d-inline-block list-inline font-small">
                                <li class="list-inline-item"><span class="text-uppercase "><strong class="color-black">Follow us:</strong></span></li>
                                <li class="list-inline-item"><a class="social-icon facebook-icon text-xs-center" target="_blank" href="#"><i class="ti-facebook"></i></a></li>
                                <li class="list-inline-item"><a class="social-icon instagram-icon text-xs-center" target="_blank" href="#"><i class="ti-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 mb-lg-0 mb-md-4 mb-sm-4">
                    <h5 class="mb-20">Top Authors</h5>
                    <ul class="list-post">
                      <?php
                      if ($result = $mysqli -> query("SELECT * FROM authors limit 5")) {
                       if ($result ->num_rows > 0) {
                         while ($authorsdata = mysqli_fetch_row($result)) {
                       ?>
                        <li class="mb-15">
                            <div class="d-flex">
                                <div class="post-content media-body">
                                    <h6 class="post-title mb-0 font-weight-bold color-black"><a href="../author.php?authorid=<?php echo $authorsdata[0]; ?>"><?php echo $authorsdata[1]; ?></a></h6>
                                </div>
                            </div>
                        </li>
                      <?php }
                    }
                  } ?>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h5 class="mb-15">Navigate</h5>
                    <ul class="float-left mr-30 font-small">
                        <li class="cat-item cat-item-2"><a href="index.php">Home</a></li>
                        <?php
                        if ($result = $mysqli -> query("SELECT * FROM categories")) {
                         if ($result ->num_rows > 0) {
                           while ($categoriesdata = mysqli_fetch_row($result)) {
                             ?>
                             <li class="cat-item cat-item-3"><a href="category.php?category=<?php echo $categoriesdata[1]; ?>"><?php echo $categoriesdata[1]; ?></a></li>
                             <?php

                           }
                          }
                        }
                         ?>
                        <li class="cat-item cat-item-3"><a href="Contact.php">Contact</a></li>
                    </ul>
                </div>
            </div>

            <?php

            if ($advertisementfooter = $mysqli -> query("SELECT * FROM advertisements WHERE location = 'footer'")) {
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
                                    <img src="../<?php echo $advertisementfooterdata[2]; ?>" alt="">
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
            </div>
        </div>

    <!-- footer-bottom aera -->
    <div class="footer-bottom-area text-center text-muted">
        <div class="container">
            <div class="footer-border pt-20 pb-20">
                <div class="row d-flex align-items-center justify-content-between">
                    <div class="col-12">
                        <div class="footer-copy-right">
                            <p class="font-small text-muted">© 2024, Makram's News | All rights reserved</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>
