<!-- main content area start -->
<div class="main-content">
    <!-- header area start -->
    <div class="header-area">
        <div class="row align-items-center">
            <!-- profile info & task notification -->
            <div class="col-md-6 col-sm-4 clearfix">
                <div class="nav-btn pull-left">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <ul class="notification-area pull-right">
                    <li id="full-view"><i class="ti-fullscreen"></i></li>
                    <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                    <li class="dropdown">
                        <i class="ti-bell dropdown-toggle" data-toggle="dropdown">
                            <span>2</span>
                        </i>
                        <div class="dropdown-menu bell-notify-box notify-box">
                            <span class="notify-title">You have 3 new notifications <a href="#">view all</a></span>
                            <div class="nofity-list">
                                <a href="#" class="notify-item">
                                    <div class="notify-thumb"><i class="ti-key btn-danger"></i></div>
                                    <div class="notify-text">
                                        <p>You have Changed Your Password</p>
                                        <span>Just Now</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown">
                        <i class="fa fa-envelope-o dropdown-toggle" data-toggle="dropdown"><span>3</span></i>
                        <div class="dropdown-menu notify-box nt-enveloper-box">
                            <span class="notify-title">You have 3 new notifications <a href="#">view all</a></span>
                            <div class="nofity-list">
                                <a href="#" class="notify-item">
                                    <div class="notify-thumb">
                                        <img src="assets/images/author/author-img1.jpg" alt="image">
                                    </div>
                                    <div class="notify-text">
                                        <p>Aglae Mayer</p>
                                        <span class="msg">Hey I am waiting for you...</span>
                                        <span>3:15 PM</span>
                                    </div>
                                </a>

                            </div>
                        </div>
                    </li>
                    <li class="settings-btn">
                        <i class="ti-settings"></i>
                    </li>
                </ul>
            </div>


            <!-- user dat -->
            <div class="col-sm-6 clearfix">
                <div class="user-profile pull-right">
                    <img class="avatar user-thumb" src="<?php if ($_COOKIE["FOTO"] == "") {
                                                            print "imagesUser/3Emexico.png";
                                                        } else {
                                                            print  $_COOKIE["FOTO"];
                                                        }
                                                        ?>" alt="avatar">
                    <h4 class="user-name dropdown-toggle" data-toggle="dropdown"> <?php print $_COOKIE["USER"]; ?> <i class="fa fa-angle-down"></i></h4>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Message</a>
                        <a class="dropdown-item" href="#">Settings</a>

                        <a class="dropdown-item" href="#">Log Out</a>

                        <form action="Auth.php" method="POST">
                            <input type="hidden" name="action" id="action" value="logout">
                            <input type="hidden" name="salir" id="salir" value="salir">
                            <button type="submit" class="dropdown-item"> salir </button>
                        </form>
                    </div>
                </div>
            </div>
            <!--  end user dat -->


        </div>
    </div>
    <!-- header area end -->