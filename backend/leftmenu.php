<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
        <i class="ion-close"></i>
    </button>

    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center bg-logo">
            <a href="index.html" class="logo">Makram's News</a>
            <!-- <a href="index.html" class="logo"><img src="assets/images/logo.png" height="24" alt="logo"></a> -->
        </div>
    </div>
    <div class="sidebar-user">
      <?php
      $uid = $_SESSION["id"];
      if ($users = $mysqli -> query("SELECT * FROM users WHERE user_id = '$uid' ")) {
        if ($users ->num_rows > 0) {
          if ($usersdata = mysqli_fetch_row($users)) {
             ?>
              <img src="../<?php echo $usersdata[7]; ?>" alt="user" class="rounded-circle img-thumbnail mb-1">
            <?php }
          }
        } ?>
        <h6 class=""><?php echo $_SESSION["username"]; ?></h6>
    </div>

    <div class="sidebar-inner slimscrollleft">

        <div id="sidebar-menu">
            <ul>

                <li>
                    <a href="editor.php" class="waves-effect">
                        <i class="dripicons-device-desktop"></i>
                        <span> Dashboard </span>
                    </a>
                </li>
                <li>
                    <a href="create-article.php" class="waves-effect"><i class="dripicons-plus"></i><span> Create Article </span></a>
                </li>

                <li>
                    <a href="profile.php" class="waves-effect">
                        <i class="dripicons-user "></i>
                        <span> Profile </span>
                    </a>
                </li>

                <li>
                    <a href="signout.php" class="waves-effect">
                      <i class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-left" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0z"/>
                          <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
                        </svg>
                      </i>
                      <span> Sign Out </span>
                    </a>
                </li>

            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>
<!-- Left Sidebar End -->
