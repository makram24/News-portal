<?php
  if (isset($_GET['subscribe'])) {
    $subscribe = $_GET['subscribe'];
    if ($subscribe == 1) {
      ?>
      <div class="alert alert-success" role="alert">
        You are successfuly Subscribed
      </div>
      <?php
    }else {
      ?>
      <div class="alert alert-danger" role="alert">
        Subscribtion has not been marked
      </div>
      <?php
    }
  }
?>

<div class="sidebar-widget widget_newsletter wow fadeIn animated">
    <h6 class="widget-header widget-header-style-4 mb-20 text-center text-uppercase border-top-1 border-bottom-1 pt-5 pb-5">
        <span>Newsletter</span>
    </h6>
    <div class="newsletter">
        <p class="">Continue reading uninterrupted with a subscription</p>
        <div class="subscribe_form relative mail_part">
            <div class="form-newsletter-cover" data-bs-toggle="modal" data-bs-target="#subscribe">
                <div class="form-newsletter">
                    <p>Subscribe</p>
                    <button >
                        <span class="long-arrow long-arrow-right"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="subscribe" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="subscribeLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-md-12">
                    <div class="login_wrap widget-taber-content p-30 background-white border-radius-5">
                        <div class="padding_eight_all bg-white">
                            <h2 class="mb-50 text-center position-relative divider-wave">SUBSCRIBE</h2>
                            <p class="text-muted">* All information is encrypted and confidential</p>
                            <form action="subscribedata.php" method="post">
                              <div class="form-group">
                                <input type="text" required="" class="form-control" name="email" placeholder="Email Address">
                              </div>
                              <div class="form-group">
                                  <input type="text" required="" class="form-control" name="phone" placeholder="Phone Number">
                              </div>
                              <div class="form-group row checkbox-dd">
                                <div class="form-check form-switch col-md-12">
                                  <input class="form-check-input" type="checkbox" role="switch" name="sms" id="flexSwitchCheckDefault">
                                  <label class="form-check-label" for="flexSwitchCheckDefault">SMS</label>
                                </div>
                                <div class="form-check form-switch col-md-12">
                                  <input class="form-check-input" type="checkbox" role="switch" name="emailsub" id="flexSwitchCheckChecked" checked>
                                  <label class="form-check-label" for="flexSwitchCheckChecked">EMAIL</label>
                                </div>
                                <div class="form-check form-switch col-md-12">
                                  <input class="form-check-input" type="checkbox" role="switch" name="push" id="flexSwitchCheckChecked">
                                  <label class="form-check-label" for="flexSwitchCheckChecked">PUSH NOTIFICATION</label>
                                </div>
                              </div>
                              <div class="form-group">
                                  <button type="submit" class="btn btn-dark btn-block" name="subscribe">Subscribe</button>
                              </div>
                            </form>
                          </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
