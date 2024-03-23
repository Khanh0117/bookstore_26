<header>
    <!-- header top start -->
    <div class="header-top-area bg-gray text-center text-md-left">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-5">
                    <div class="header-call-action">
                        <a href="#">
                            <i class="fa fa-envelope"></i>
                            info@website.com
                        </a>
                        <a href="#">
                            <i class="fa fa-phone"></i>
                            0123456789
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-7">
                    <div class="header-top-right float-md-right float-none">
                        <nav>
                            <ul>
                                <li>
                                    <div class="dropdown header-top-dropdown">
                                        <?php
                                        if (isset($_SESSION['customer'])) {
                                        ?>
                                            <a href="./profile.php" class="dropdown-toggle" id="myaccount" aria-haspopup="true" aria-expanded="false">
                                                <?php echo $info_name ?>
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="profile">
                                                <a class="dropdown-item" href="profile.php">Tài khoản</a>
                                                <a class="dropdown-item" href="logout.php">Đăng xuất</a>
                                            </div>
                                            <input value="<?php echo $info_id ?>" id="info-id" hidden>
                                        <?php
                                        } else {
                                        ?>
                                            <a href="./login.php" class="dropdown-toggle" id="myaccount" aria-haspopup="true" aria-expanded="false">
                                                Tài khoản
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="profile">
                                                <a class="dropdown-item" href="login.php">Đăng nhập</a>
                                                <a class="dropdown-item" href="register.php">Đăng ký</a>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </li>
                                <li>
                                    <a href="#">my wishlist</a>
                                </li>
                                <li>
                                    <a href="#">my cart</a>
                                </li>
                                <li>
                                    <a href="#">checkout</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <style>
                    .dropdown:hover .dropdown-menu {
                        display: block;
                    }
                </style>
            </div>
        </div>
    </div>
    <!-- header top end -->

    <!-- header middle start -->
    <div class="header-middle-area pt-20 pb-20">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="brand-logo">
                        <a href="index.php">
                            <img src="assets/img/logo/book-logo.png" alt="brand logo">
                        </a>
                    </div>
                </div> <!-- end logo area -->
                <div class="col-lg-9">
                    <div class="header-middle-right">
                        <div class="header-middle-shipping mb-20">
                            <div class="single-block-shipping">
                                <div class="shipping-icon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <div class="shipping-content">
                                    <h5>Working time</h5>
                                    <span>Mon- Sun: 8.00 - 18.00</span>
                                </div>
                            </div> <!-- end single shipping -->
                            <div class="single-block-shipping">
                                <div class="shipping-icon">
                                    <i class="fa fa-truck"></i>
                                </div>
                                <div class="shipping-content">
                                    <h5>free shipping</h5>
                                    <span>On order over $199</span>
                                </div>
                            </div> <!-- end single shipping -->
                            <div class="single-block-shipping">
                                <div class="shipping-icon">
                                    <i class="fa fa-money"></i>
                                </div>
                                <div class="shipping-content">
                                    <h5>money back 100%</h5>
                                    <span>Within 30 Days after delivery</span>
                                </div>
                            </div> <!-- end single shipping -->
                        </div>
                        <div class="header-middle-block">
                            <div class="header-middle-searchbox">
                                <form action="search.php" method="get">
                                    <input type="text" name="search" placeholder="Nhập từ khóa tìm kiếm..." required>
                                    <button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                            <div class="header-mini-cart" id="cart-mini"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header middle end -->

    <!-- main menu area start -->
    <div class="main-header-wrapper bdr-bottom1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-header-inner">
                        <div class="category-toggle-wrap">
                            <div class="category-toggle">
                                Danh mục
                                <div class="cat-icon">
                                    <i class="fa fa-angle-down"></i>
                                </div>
                            </div>
                            <nav class="category-menu category-style-2">
                                <ul>
                                    <?php
                                    $query = "SELECT * from phanloai";
                                    $run = $conn->query($query);
                                    if ($run->num_rows > 0) {
                                        while ($rowsubcat = $run->fetch_array()) {
                                            $subcat_id = $rowsubcat['Idpl'];
                                            $subcat_name = $rowsubcat['Tenphanloai'];

                                    ?>
                                            <li class="menu-item-has-children"><a href="shop.php?subcat=<?php echo $subcat_id ?>"><i class="fa fa-book"></i><?php echo $subcat_name ?></a>
                                                <?php
                                                $querycat = "SELECT * from theloai where Idpl = '$subcat_id'";
                                                $runcat = $conn->query($querycat);
                                                if ($runcat->num_rows > 0) {
                                                ?>
                                                    <!-- Mega Category Menu Start -->
                                                    <ul class="category-mega-menu" style="width: max-content;">
                                                        <li class="menu-item-has-children" style="width: max-content;">
                                                            <a href="shop.php?subcat=<?php echo $subcat_id ?>"><?php echo $subcat_name ?></a>
                                                            <ul>
                                                                <?php
                                                                while ($rowcat = $runcat->fetch_array()) {
                                                                    $cat_id = $rowcat['Idloai'];
                                                                    $cat_name = $rowcat['Tenloai'];
                                                                    $subcat_id = $rowcat['Idpl'];
                                                                ?>
                                                                    <li><a href="shop.php?cat=<?php echo $cat_id ?>"><?php echo $cat_name ?></a></li>
                                                                <?php
                                                                }
                                                                ?>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                        <?php
                                                }
                                                echo "</li>";
                                            }
                                        }
                                        ?>
                                </ul>
                            </nav>
                        </div>

                        <div class="main-menu">
                            <nav id="mobile-menu">
                                <ul>
                                    <li class="active"><a href="index.php"><i class="fa fa-home"></i>Trang chủ</a></li>
                                    <li><a href="shop.php">sản phẩm <i class="fa fa-angle-down"></i></a>
                                        <ul class="dropdown">
                                            <li><a href="shop.php">Sản phẩm </a></li>
                                            <li><a href="cart.php">Giỏ hàng </a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Tin tức <i class="fa fa-angle-down"></i></a>
                                        <ul class="dropdown">
                                            <li><a href="Blog.php">Blog</a></li>
                                            <li><a href="about-us.php">Giới thiệu</a></li>
                                            <li><a href="contact.php">Liên hệ</a></li>
                                            <li><a href="page-404.php">404</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="about-us.php">Giới thiệu</a></li>
                                    <li><a href="contact.php">Liên hệ</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-12 d-block d-lg-none">
                    <div class="mobile-menu"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- main menu area end -->
    <script>
        function fetchcartmini() {
            $.get("cart-mini.php", function(data) {
                $("#cart-mini").html(data);
            });
        };
        fetchcartmini();
    </script>
</header>