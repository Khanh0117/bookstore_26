<?php require_once('inc/top.php') ?>
<!-- Site title -->
<title>Bookstore</title>
</head>
<style>
    .imgsp {
        width: 192px;
        height: 300px;
        object-fit: contain;
    }

    .imgsp4col {
        width: 88px;
        height: 130px;
        object-fit: contain;
    }

    .giamgia {
        color: white;
        background-color: red;
        font-size: 16px;
        font-weight: 700;
        display: inline-block;
        padding: 2px;
        border-radius: 20%;
    }
</style>

<body>

    <!-- color switcher start -->
    <?php require_once('inc/color-switcher.php') ?>

    <!-- color switcher end -->

    <div class="wrapper box-layout">

        <!-- header area start -->
        <?php require_once('inc/header.php') ?>
        <!-- header area end -->

        <!-- hero slider start -->
        <div class="hero-slider-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="slider-wrapper-area2 mt-30">
                            <div class="hero-slider-active hero__2 slick-dot-style hero-dot">
                                <div class="single-slider d-flex align-items-center" style="background-image: url(assets/img/slider/slider_ln.jpeg);">
                                    <div class="container">
                                        <div class="slider-main-content">
                                            <div class="slider-text text-center">
                                                <h2>Nhiều loại sách mới</h2>
                                                <h3>Nhận ưu đãi lên đến 50%</h3>
                                                <p>Hãy nhanh tay và chốt deal ngay nào! </p>
                                                <a class="home-btn" href="shop.php">Xem thêm</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-slider d-flex align-items-center" style="background-image: url(assets/img/slider/slider_ln5.jpg);">
                                    <div class="container">
                                        <div class="slider-main-content">
                                            <div class="slider-text text-center">
                                                <h2>Nhiều loại sách mới</h2>
                                                <h3>Nhận ưu đãi lên đến 50%</h3>
                                                <p>Hãy nhanh tay và chốt deal ngay nào!</p>
                                                <a class="home-btn" href="shop.php">Xem thêm</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- hero slider end -->

        <!-- home banner area start -->
        <div class="banner-area mt-30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 order-1">
                        <div class="img-container fix img-full imgs-res mb-sm-30">
                            <a href="#">
                                <img src="assets/img/banner/banner_ln_left.jpg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5 order-sm-3">
                        <div class="img-container fix img-full mb-30">
                            <a href="#">
                                <img src="assets/img/banner/banner_ln1.jpg" alt="">
                            </a>
                        </div>
                        <div class="img-container fix img-full mb-30">
                            <a href="#">
                                <img src="assets/img/banner/banner_ln2.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 order-2 order-md-3">
                        <div class="img-container fix img-full ">
                            <a href="#">
                                <img src="assets/img/banner/banner_ln_left2.jpg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- home banner area end -->

        <!-- page wrapper start -->
        <div class="page-wrapper pt-6 pb-28 pb-md-6 pb-sm-6 pt-xs-36">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12">
                        <!-- featured category area start -->
                        <div class="feature-category-area mt-md-70">
                            <div class="section-title mb-30">
                                <div class="title-icon">
                                    <i class="fa fa-bookmark"></i>
                                </div>
                                <h3>Sản phẩm khuyến mãi</h3>
                            </div> <!-- section title end -->
                            <!-- sales -->
                            <div class="featured-carousel-active slick-padding slick-arrow-style">
                                <!-- product single item start -->
                                <?php
                                $query = "SELECT * from sanpham
                                where StatusSP = 1
                                order by Giamgia desc
                                LIMIT 12 OFFSET 0";
                                $run = $conn->query($query);
                                if ($run->num_rows > 0) {
                                    while ($row = $run->fetch_array()) {
                                        $idsp = $row['Idsp'];
                                        $tensp = $row['Tensp'];
                                        $giasp = $row['Giasp'];
                                        $giamgia = $row['Giamgia'];
                                        $giamoi = $row['Giamoi'];
                                        $img = $row['Img'];

                                ?>

                                        <div class="product-item fix">
                                            <div class="product-thumb">
                                                <a href="product.php?id=<?php echo $idsp ?>">
                                                    <img src="./admin/product-img/<?php echo $img ?>" class="imgsp" alt="">
                                                </a>
                                                <div class="product-label">
                                                    <span><?php echo $giamgia ?>%</span>
                                                </div>
                                                <div class="product-action-link">
                                                    <a href="#" data-toggle="modal" data-target="#quick_view"> <span data-toggle="tooltip" data-placement="left" title="Quick view"><i class="fa fa-search"></i></span> </a>
                                                    <a href="#" data-toggle="tooltip" data-placement="left" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                    <a href="#" data-toggle="tooltip" data-placement="left" title="Compare"><i class="fa fa-refresh"></i></a>
                                                    <a data-toggle="tooltip" data-placement="left" title="Thêm vào giỏ" id="<?php echo $idsp ?>" class="add-cart"><i class="fa fa-shopping-cart"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h4><a href="product.php?id=<?php echo $idsp ?>"><?php echo $tensp ?></a></h4>
                                                <div class="pricebox">
                                                    <p style="text-decoration: line-through;">$<?php echo $giasp ?></p>
                                                    <span class="regular-price">$<?php echo $giamoi ?></span>
                                                    <div class="ratings">
                                                        <span class="good"><i class="fa fa-star"></i></span>
                                                        <span class="good"><i class="fa fa-star"></i></span>
                                                        <span class="good"><i class="fa fa-star"></i></span>
                                                        <span class="good"><i class="fa fa-star"></i></span>
                                                        <span><i class="fa fa-star"></i></span>
                                                        <div class="pro-review">
                                                            <span>1 review(s)</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- hidden data -->
                                            <input type="text" value="<?php echo $tensp ?>" id='name-sp<?php echo $idsp ?>' hidden>
                                            <input type="number" value="<?php echo $giamoi ?>" id='price-sp<?php echo $idsp ?>' hidden>
                                            <input type="text" value="<?php echo $img ?>" id='img-sp<?php echo $idsp ?>' hidden>
                                            <!-- hidden data end -->
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                                <!-- product single item end -->

                                <!-- featured category end -->
                            </div>
                            <!-- sales area end -->

                            <!-- banner statistic start -->
                            <div class="banner-statistic pt-28 pb-36">
                                <div class="img-container fix img-full">
                                    <a href="#">
                                        <img src="assets/img/banner/banner_ln3.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <!-- banner statistic end -->

                            <!-- featured category area start -->
                            <div class="feature-category-area">
                                <div class="section-title mb-30">
                                    <div class="title-icon">
                                        <i class="fa fa-flask"></i>
                                    </div>
                                    <h3>Sản phẩm mới nhất</h3>
                                </div> <!-- section title end -->
                                <!-- featured category start -->
                                <div class="featured-carousel-active slick-padding slick-arrow-style">
                                    <!-- product single item start -->
                                    <?php
                                    $query = "SELECT * from sanpham
                                    where StatusSP = 1
                                    order by Idsp desc
                                    LIMIT 12 OFFSET 0";
                                    $run = $conn->query($query);
                                    if ($run->num_rows > 0) {
                                        while ($row = $run->fetch_array()) {
                                            $idsp = $row['Idsp'];
                                            $tensp = $row['Tensp'];
                                            $giasp = $row['Giasp'];
                                            $giamgia = $row['Giamgia'];
                                            $giamoi = $row['Giamoi'];
                                            $img = $row['Img'];

                                    ?>
                                            <div class="product-item fix">
                                                <div class="product-thumb">
                                                    <a href="product.php?id=<?php echo $idsp ?>">
                                                        <img src="admin/product-img/<?php echo $img ?>" class="imgsp" alt="">
                                                    </a>
                                                    <div class="product-label">
                                                        <span>New</span>
                                                    </div>
                                                    <div class="product-action-link">
                                                        <a href="#" data-toggle="modal" data-target="#quick_view"> <span data-toggle="tooltip" data-placement="left" title="Quick view"><i class="fa fa-search"></i></span> </a>
                                                        <a href="#" data-toggle="tooltip" data-placement="left" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                        <a href="#" data-toggle="tooltip" data-placement="left" title="Compare"><i class="fa fa-refresh"></i></a>
                                                        <a data-toggle="tooltip" data-placement="left" title="Thêm vào giỏ" id="<?php echo $idsp ?>" class="add-cart"><i class="fa fa-shopping-cart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h4><a href="product.php?id=<?php echo $idsp ?>"><?php echo $tensp ?></a></h4>
                                                    <div class="pricebox">
                                                        <p style="text-decoration: line-through;">$<?php echo $giasp ?></p>
                                                        <span class="regular-price">$<?php echo $giamoi ?></span>
                                                        <div class="giamgia">-<?php echo $giamgia ?>%</div>
                                                        <div class="ratings">
                                                            <span class="good"><i class="fa fa-star"></i></span>
                                                            <span class="good"><i class="fa fa-star"></i></span>
                                                            <span class="good"><i class="fa fa-star"></i></span>
                                                            <span class="good"><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star"></i></span>
                                                            <div class="pro-review">
                                                                <span>1 review(s)</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- hidden data -->
                                                <input type="text" value="<?php echo $tensp ?>" id='name-sp<?php echo $idsp ?>' hidden>
                                                <input type="number" value="<?php echo $giamoi ?>" id='price-sp<?php echo $idsp ?>' hidden>
                                                <input type="text" value="<?php echo $img ?>" id='img-sp<?php echo $idsp ?>' hidden>
                                                <!-- hidden data end -->
                                            </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                    <!-- product single item end -->
                                </div>
                                <!-- featured category end -->
                            </div>
                            <!-- featured category area end -->

                            <!-- banner statistic start -->
                            <div class="banner-statistic pt-28 pb-30 pb-sm-0">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="img-container fix img-full mb-sm-30">
                                            <a href="#">
                                                <img src="assets/img/banner/banner_ln4.jpg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="img-container fix img-full mb-sm-30">
                                            <a href="#">
                                                <img src="assets/img/banner/banner_ln5.jpg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- banner statistic end -->

                            <!-- category features area start -->
                            <div class="category-feature-area">
                                <div class="row">
                                    <!-- New Products area start -->
                                    <div class="col-lg-4">
                                        <div class="category-wrapper mb-md-24 mb-sm-24">
                                            <div class="section-title-2 d-flex justify-content-between mb-28">
                                                <h3>Văn học</h3>
                                                <div class="category-append"></div>
                                            </div> <!-- section title end -->
                                            <div class="category-carousel-active row" data-row="4">
                                                <?php
                                                $query = "SELECT * from sanpham sp
                                                left join theloai tl on tl.Idloai = sp.Idloai
                                                left join phanloai pl on tl.Idpl = pl.Idpl
                                                where pl.Idpl = '1'
                                                LIMIT 12 OFFSET 0";
                                                $run = $conn->query($query);
                                                if ($run->num_rows > 0) {
                                                    while ($row = $run->fetch_array()) {
                                                        $idsp = $row['Idsp'];
                                                        $tensp = $row['Tensp'];
                                                        $giasp = $row['Giasp'];
                                                        $giamgia = $row['Giamgia'];
                                                        $giamoi = $row['Giamoi'];
                                                        $img = $row['Img'];
                                                ?>
                                                        <div class="col">
                                                            <div class="category-item">
                                                                <div class="category-thumb">
                                                                    <a href="product.php?id=<?php echo $idsp ?>">
                                                                        <img src="admin/product-img/<?php echo $img ?>" class="imgsp4col" alt="">
                                                                    </a>
                                                                </div>
                                                                <div class="category-content">
                                                                    <h4><a href="product.php?id=<?php echo $idsp ?>"><?php echo $tensp ?></a></h4>
                                                                    <div class="price-box">
                                                                        <div class="regular-price">
                                                                            $<?php echo $giamoi ?>
                                                                        </div>
                                                                        <div class="old-price">
                                                                            <del>$<?php echo $giasp ?></del>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ratings">
                                                                        <span class="good"><i class="fa fa-star"></i></span>
                                                                        <span class="good"><i class="fa fa-star"></i></span>
                                                                        <span class="good"><i class="fa fa-star"></i></span>
                                                                        <span class="good"><i class="fa fa-star"></i></span>
                                                                        <span><i class="fa fa-star"></i></span>
                                                                        <div class="pro-review">
                                                                            <span>1 review(s)</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div> <!-- end single item -->
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                                <!-- end single item column -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- New Products area end -->
                                    <!-- Most viewed area start -->
                                    <div class="col-lg-4">
                                        <div class="category-wrapper mb-md-24 mb-sm-24">
                                            <div class="section-title-2 d-flex justify-content-between mb-28">
                                                <h3>Truyện tranh</h3>
                                                <div class="category-append"></div>
                                            </div> <!-- section title end -->
                                            <div class="category-carousel-active row" data-row="4">
                                                <?php
                                                $query = "SELECT * from sanpham sp
                                                left join theloai tl on tl.Idloai = sp.Idloai
                                                left join phanloai pl on tl.Idpl = pl.Idpl
                                                where pl.Idpl = '2'
                                                LIMIT 12 OFFSET 0";
                                                $run = $conn->query($query);
                                                if ($run->num_rows > 0) {
                                                    while ($row = $run->fetch_array()) {
                                                        $idsp = $row['Idsp'];
                                                        $tensp = $row['Tensp'];
                                                        $giasp = $row['Giasp'];
                                                        $giamgia = $row['Giamgia'];
                                                        $giamoi = $row['Giamoi'];
                                                        $img = $row['Img'];
                                                ?>
                                                        <div class="col">
                                                            <div class="category-item">
                                                                <div class="category-thumb">
                                                                    <a href="product.php?id=<?php echo $idsp ?>">
                                                                        <img src="admin/product-img/<?php echo $img ?>" class="imgsp4col" alt="">
                                                                    </a>
                                                                </div>
                                                                <div class="category-content">
                                                                    <h4><a href="product.php?id=<?php echo $idsp ?>"><?php echo $tensp ?></a></h4>
                                                                    <div class="price-box">
                                                                        <div class="regular-price">
                                                                            $<?php echo $giamoi ?>
                                                                        </div>
                                                                        <div class="old-price">
                                                                            <del>$<?php echo $giasp ?></del>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ratings">
                                                                        <span class="good"><i class="fa fa-star"></i></span>
                                                                        <span class="good"><i class="fa fa-star"></i></span>
                                                                        <span class="good"><i class="fa fa-star"></i></span>
                                                                        <span class="good"><i class="fa fa-star"></i></span>
                                                                        <span><i class="fa fa-star"></i></span>
                                                                        <div class="pro-review">
                                                                            <span>1 review(s)</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div> <!-- end single item -->
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                                <!-- end single item column -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Most viewed area end -->
                                    <!-- Most viewed area start -->
                                    <div class="col-lg-4">
                                        <div class="category-wrapper mb-md-24 mb-sm-24">
                                            <div class="section-title-2 d-flex justify-content-between mb-28">
                                                <h3>Tâm lý - kỹ năng sống</h3>
                                                <div class="category-append"></div>
                                            </div> <!-- section title end -->
                                            <div class="category-carousel-active row" data-row="4">
                                                <?php
                                                $query = "SELECT * from sanpham sp
                                                left join theloai tl on tl.Idloai = sp.Idloai
                                                left join phanloai pl on tl.Idpl = pl.Idpl
                                                where pl.Idpl = '6'
                                                LIMIT 12 OFFSET 0";
                                                $run = $conn->query($query);
                                                if ($run->num_rows > 0) {
                                                    while ($row = $run->fetch_array()) {
                                                        $idsp = $row['Idsp'];
                                                        $tensp = $row['Tensp'];
                                                        $giasp = $row['Giasp'];
                                                        $giamgia = $row['Giamgia'];
                                                        $giamoi = $row['Giamoi'];
                                                        $img = $row['Img'];
                                                ?>
                                                        <div class="col">
                                                            <div class="category-item">
                                                                <div class="category-thumb">
                                                                    <a href="product.php?id=<?php echo $idsp ?>">
                                                                        <img src="admin/product-img/<?php echo $img ?>" class="imgsp4col" alt="">
                                                                    </a>
                                                                </div>
                                                                <div class="category-content">
                                                                    <h4><a href="product.php?id=<?php echo $idsp ?>"><?php echo $tensp ?></a></h4>
                                                                    <div class="price-box">
                                                                        <div class="regular-price">
                                                                            $<?php echo $giamoi ?>
                                                                        </div>
                                                                        <div class="old-price">
                                                                            <del>$<?php echo $giasp ?></del>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ratings">
                                                                        <span class="good"><i class="fa fa-star"></i></span>
                                                                        <span class="good"><i class="fa fa-star"></i></span>
                                                                        <span class="good"><i class="fa fa-star"></i></span>
                                                                        <span class="good"><i class="fa fa-star"></i></span>
                                                                        <span><i class="fa fa-star"></i></span>
                                                                        <div class="pro-review">
                                                                            <span>1 review(s)</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div> <!-- end single item -->
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                                <!-- end single item column -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Most viewed area end -->
                                </div>
                            </div>
                            <!-- category features area end -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- page wrapper end -->

            <!-- latest product start -->
            <div class="latest-product">
                <div class="container">
                    <div class="section-title mb-30">
                        <div class="title-icon">
                            <i class="fa fa-flash"></i>
                        </div>
                        <h3>Sản phẩm bán chạy nhất</h3>
                    </div> <!-- section title end -->
                    <!-- featured category start -->
                    <div class="latest-product-active slick-padding slick-arrow-style">
                        <!-- product single item start -->
                        <?php
                        $query = "SELECT sp.Idsp, Tensp, Giasp, Giamgia, Giamoi, Img, COUNT(cthd.Idsp)  FROM sanpham sp, chitiethoadon cthd 
                        where StatusSP = 1 and cthd.Idsp = sp.Idsp
                        GROUP by sp.Idsp
                        ORDER by COUNT(cthd.Idsp) DESC
                        LIMIT 8 OFFSET 0";

                        $run = $conn->query($query);
                        if ($run->num_rows > 0) {
                            while ($row = $run->fetch_array()) {
                                $idsp = $row['Idsp'];
                                $tensp = $row['Tensp'];
                                $giasp = $row['Giasp'];
                                $giamgia = $row['Giamgia'];
                                $giamoi = $row['Giamoi'];
                                $img = $row['Img'];

                        ?>
                                <div class="product-item fix">
                                    <div class="product-thumb">
                                        <a href="product.php?id=<?php echo $idsp ?>">
                                            <img src="./admin/product-img/<?php echo $img ?>" class="imgsp" alt="">
                                        </a>
                                        <div class="product-label">
                                            <span>Hot</span>
                                        </div>
                                        <div class="product-action-link">
                                            <a href="#" data-toggle="modal" data-target="#quick_view"> <span data-toggle="tooltip" data-placement="left" title="Quick view"><i class="fa fa-search"></i></span> </a>
                                            <a href="#" data-toggle="tooltip" data-placement="left" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="left" title="Compare"><i class="fa fa-refresh"></i></a>
                                            <a data-toggle="tooltip" data-placement="left" title="Thêm vào giỏ" id="<?php echo $idsp ?>" class="add-cart"><i class="fa fa-shopping-cart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h4><a href="product.php?id=<?php echo $idsp ?>"><?php echo $tensp ?></a></h4>
                                        <div class="pricebox">
                                            <p style="text-decoration: line-through;">$<?php echo $giasp ?></p>
                                            <span class="regular-price">$<?php echo $giamoi ?></span>
                                            <span class="giamgia">-<?php echo $giamgia ?>%</span>
                                            <div class="ratings">
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                                <div class="pro-review">
                                                    <span>1 review(s)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- hidden data -->
                                    <input type="text" value="<?php echo $tensp ?>" id='name-sp<?php echo $idsp ?>' hidden>
                                    <input type="number" value="<?php echo $giamoi ?>" id='price-sp<?php echo $idsp ?>' hidden>
                                    <input type="text" value="<?php echo $img ?>" id='img-sp<?php echo $idsp ?>' hidden>
                                    <!-- hidden data end -->
                                </div>
                        <?php
                            }
                        }
                        ?>
                        <!-- product single item end -->
                    </div>
                    <!-- featured category end -->
                </div>
            </div>
            <!-- latest product end -->

            <!-- latest blog area start -->
            <div class="latest-blog-area pt-28">
                <div class="container">
                    <div class="section-title mb-30">
                        <div class="title-icon">
                            <i class="fa fa-book"></i>
                        </div>
                        <h3>latest news</h3>
                    </div> <!-- section title end -->
                    <!-- blog wrapper start -->
                    <div class="blog-carousel-active2 slick-padding slick-arrow-style">
                        <div class="blog-item">
                            <div class="blog-thumb img-full fix">
                                <a href="blog.php">
                                    <img src="assets/img/blog/img_blog1.jpg" alt="">
                                </a>
                            </div>
                            <div class="blog-content">
                                <h3><a href="blog-details.html">post format audio</a></h3>
                                <div class="blog-meta">
                                    <span class="posted-author">by: admin</span>
                                    <span class="post-date">25 Nov, 2018</span>
                                </div>
                                <p>Curabitur sed diam enim. Sed varius faucibus lectus, a scelerisque massa posuere ac. Quisque dapibus, est ac...</p>
                            </div>
                            <a href="blog.php">read more <i class="fa fa-long-arrow-right"></i></a>
                        </div> <!-- end single blog item -->
                        <div class="blog-item">
                            <div class="blog-thumb img-full fix">
                                <a href="blog.php">
                                    <img src="assets/img/blog/img_blog2.jpg" alt="">
                                </a>
                            </div>
                            <div class="blog-content">
                                <h3><a href="blog.php">post format image</a></h3>
                                <div class="blog-meta">
                                    <span class="posted-author">by: admin</span>
                                    <span class="post-date">25 Nov, 2018</span>
                                </div>
                                <p>Curabitur sed diam enim. Sed varius faucibus lectus, a scelerisque massa posuere ac. Quisque dapibus, est ac...</p>
                            </div>
                            <a href="blog.php">read more <i class="fa fa-long-arrow-right"></i></a>
                        </div> <!-- end single blog item -->
                        <div class="blog-item">
                            <div class="blog-thumb img-full fix">
                                <a href="blog.php">
                                    <img src="assets/img/blog/img_blog3.jpg" alt="">
                                </a>
                            </div>
                            <div class="blog-content">
                                <h3><a href="blog.php">post format audio</a></h3>
                                <div class="blog-meta">
                                    <span class="posted-author">by: admin</span>
                                    <span class="post-date">25 Nov, 2018</span>
                                </div>
                                <p>Curabitur sed diam enim. Sed varius faucibus lectus, a scelerisque massa posuere ac. Quisque dapibus, est ac...</p>
                            </div>
                            <a href="blog.php">read more <i class="fa fa-long-arrow-right"></i></a>
                        </div> <!-- end single blog item -->
                        <div class="blog-item">
                            <div class="blog-thumb img-full fix">
                                <a href="blog.php">
                                    <img src="assets/img/blog/img_blog4.jpg" alt="">
                                </a>
                            </div>
                            <div class="blog-content">
                                <h3><a href="blog.php">post format image</a></h3>
                                <div class="blog-meta">
                                    <span class="posted-author">by: admin</span>
                                    <span class="post-date">25 Nov, 2018</span>
                                </div>
                                <p>Curabitur sed diam enim. Sed varius faucibus lectus, a scelerisque massa posuere ac. Quisque dapibus, est ac...</p>
                            </div>
                            <a href="blog.php">read more <i class="fa fa-long-arrow-right"></i></a>
                        </div> <!-- end single blog item -->
                        <div class="blog-item">
                            <div class="blog-thumb img-full fix">
                                <a href="blog.php">
                                    <img src="assets/img/blog/img_blog3.jpg" alt="">
                                </a>
                            </div>
                            <div class="blog-content">
                                <h3><a href="blog.php">post format audio</a></h3>
                                <div class="blog-meta">
                                    <span class="posted-author">by: admin</span>
                                    <span class="post-date">25 Nov, 2018</span>
                                </div>
                                <p>Curabitur sed diam enim. Sed varius faucibus lectus, a scelerisque massa posuere ac. Quisque dapibus, est ac...</p>
                            </div>
                            <a href="blog.php">read more <i class="fa fa-long-arrow-right"></i></a>
                        </div> <!-- end single blog item -->
                        <div class="blog-item">
                            <div class="blog-thumb img-full fix">
                                <a href="blog-details.html">
                                    <img src="assets/img/blog/img_blog2.jpg" alt="">
                                </a>
                            </div>
                            <div class="blog-content">
                                <h3><a href="blog.php">post format image</a></h3>
                                <div class="blog-meta">
                                    <span class="posted-author">by: admin</span>
                                    <span class="post-date">25 Nov, 2018</span>
                                </div>
                                <p>Curabitur sed diam enim. Sed varius faucibus lectus, a scelerisque massa posuere ac. Quisque dapibus, est ac...</p>
                            </div>
                            <a href="blog.php">read more <i class="fa fa-long-arrow-right"></i></a>
                        </div> <!-- end single blog item -->
                    </div>
                    <!-- blog wrapper end -->
                </div>
            </div>
            <!-- latest blog area end -->

            <!-- brand area start -->
            <?php require_once('inc/branded.php') ?>
            <!-- brand area end -->

            <!-- footer area start -->
            <?php require_once('inc/footer.php') ?>