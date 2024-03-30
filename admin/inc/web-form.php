<!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="dashboard.php">
                    <b class="logo-abbr"><img src="images/logo.png" alt=""> </b>
                    <span class="logo-compact"><img src="images/logo-compact.png" alt=""></span>
                    <span class="brand-title">
                        
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">    
            <div class="header-content clearfix">
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
						<li class="icons dropdown">Hi, <?php echo $info_name?></li>
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="images/user/1.png" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="./profile.php"><i class="icon-user"></i> <span>Profile</span></a>
                                        </li>
                                        <li>
                                            <a href="page-error-404.php">
                                                <i class="icon-envelope-open"></i> <span>Inbox</span> <div class="badge gradient-3 badge-pill gradient-1">3</div>
                                            </a>
                                        </li>
                                        
                                        <hr class="my-2">
                                        <li><a href="page-logout.php"><i class="icon-key"></i> <span>Logout</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Dashboard</li>
                    <li>
						<a href="./dashboard.php">
                            <i class="fa fa-wpexplorer" aria-hidden="true"></i> <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-label">Apps</li>
                    <li>
                        <a href="./subcate.php">
                            <i class="fa fa-th-large"></i> <span class="nav-text">Phân loại</span>
                        </a>
                    </li>
                    <li>
                        <a href="./categories.php">
                            <i class="fa fa-tags"></i> <span class="nav-text">Thể loại</span>
                        </a>
                    </li>
					<li>
                        <a href="./products.php">
                            <i class="fa fa-book"></i><span class="nav-text">Sách</span>
                        </a>
                    </li>
                    <li>
                        <a href="./publisher.php">
                            <i class="fa fa-industry"></i> <span class="nav-text">Nhà phát hành</span>
                        </a>
                    </li>
					<li>
                        <a href="./users.php">
                        <i class="fa fa-user"></i> <span class="nav-text">Người dùng</span>
                        </a>
                    </li>
		    		<li>
                        <a href="./orders.php">
                            <i class="fa fa-shopping-cart"></i> <span class="nav-text">Đơn hàng</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->