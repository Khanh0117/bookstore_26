<?php require_once('inc/top.php');
if (isset($_GET['id'])) {
    $id_sp = $_GET['id'];

    $query = "SELECT * from sanpham sp
    LEFT JOIN nhaphathanh nph on nph.Idnph = sp.Idnph
    where StatusSP = 1 and sp.Idsp = $id_sp";

    $run = $conn->query($query);
    $row = $run->fetch_array();

    $pro_id = $row['Idsp'];
    $pro_img = $row['Img'];
    $pro_name = $row['Tensp'];
    $pro_cat = $row['Idloai'];
    $pro_pubname = $row['Tennph'];
    $pro_price = $row['Giasp'];
    $pro_sale = $row['Giamgia'];
    $pro_newprice = $row['Giamoi'];
    $pro_author = $row['Tacgia'];
    $pro_illu = $row['Minhhoa'];
    $pro_trans = $row['Dichgia'];
    $pro_cover = $row['Loaibia'];
    $pro_page = $row['Sotrang'];
    $pro_desc = $row['Mota'];
}
?>
<!-- Site title -->
<title><?php echo $pro_name ?></title>
<style>
    .giamgia {
        color: white;
        background-color: red;
        font-size: 16px;
        font-weight: 700;
        display: inline-block;
        padding: 5px;
        border-radius: 20%;
        margin-left: 1em;
    }

    .giacu {
        font-size: 20px;
        line-height: 24px;
    }

    .buy-btn {
        cursor: pointer;
    }
</style>
</head>

<body>

    <!-- color switcher start -->
    <?php require_once('inc/color-switcher.php') ?>

    <!-- color switcher end -->

    <div class="wrapper box-layout">

        <!-- header area start -->
        <?php require_once('inc/header.php') ?>
        <!-- header area end -->

        <!-- breadcrumb area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item"><a href="shop.php">Sản phẩm</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><?php echo $pro_name ?></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- row start -->
        <!-- product details wrapper start -->
        <div class="product-details-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <!-- product details inner end -->
                        <div class="product-details-inner">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="product-large-slider mb-20 slick-arrow-style_2">
                                        <div class="pro-large-img img-zoom" id="img1">
                                            <img src="admin/product-img/<?php echo $pro_img ?>" alt="" />
                                        </div>
                                    </div>
                                </div>
                                <input id="img-sp" value="<?php echo $pro_img ?>" hidden>
                                <div class="col-lg-6">
                                    <div class="product-details-des mt-md-34 mt-sm-34">
                                        <h3><a href="product.php?id=<?php echo $pro_id ?>"><?php echo $pro_name ?></a></h3>
                                        <input type="text" id="name-sp" value="<?php echo $pro_name ?>" hidden>
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
                                        <div class="customer-rev">
                                            <a href="#">(1 customer review)</a>
                                        </div>
                                        <div class="availability mt-10">
                                            <h5>Availability:</h5>
                                            <span>1 in stock</span>
                                        </div>
                                        <div class="pricebox">
                                            <span style="text-decoration: line-through;" class="giacu">$<?php echo $pro_price ?></span>
                                            <div class="giamgia">-<?php echo $pro_sale ?>%</div>
                                            <p class="regular-price">$ <span id="price-sp"><?php echo $pro_newprice ?></span></p>
                                        </div>
                                        <div class="quantity-cart-box d-flex align-items-center">
                                            <div class="quantity">
                                                <div class="pro-qty"><input type="text" value="1" id="qty-sp"></div>
                                            </div>
                                            <div class="action_link">
                                                <a class="buy-btn add-cart-pro" id="<?php echo $pro_id ?>">Thêm vào giỏ<i class="fa fa-shopping-cart"></i></a>
                                            </div>
                                        </div>
                                        <div class="useful-links mt-20">
                                            <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i>compare</a>
                                            <a href="#" data-toggle="tooltip" data-placement="top" title="Wishlist"><i class="fa fa-heart-o"></i>wishlist</a>
                                        </div>
                                        <div class="share-icon mt-20">
                                            <a class="facebook" href="#"><i class="fa fa-facebook"></i>like</a>
                                            <a class="twitter" href="#"><i class="fa fa-twitter"></i>tweet</a>
                                            <a class="pinterest" href="#"><i class="fa fa-pinterest"></i>save</a>
                                            <a class="google" href="#"><i class="fa fa-google-plus"></i>share</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product details inner end -->

                        <!-- product details reviews start -->
                        <div class="product-details-reviews mt-34">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="product-review-info">
                                        <ul class="nav review-tab">
                                            <li>
                                                <a class="active" data-toggle="tab" href="#tab_one">Nội dung</a>
                                            </li>
                                            <li>
                                                <a data-toggle="tab" href="#tab_two">Mô tả</a>
                                            </li>
                                            <li>
                                                <a data-toggle="tab" href="#tab_three">Đánh giá</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content reviews-tab">
                                            <div class="tab-pane fade show active" id="tab_one">
                                                <div class="tab-one">
                                                    <div class="review-description">
                                                        <?php echo nl2br($pro_desc) ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tab_two">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td>Nhà phát hành</td>
                                                            <td><?php echo $pro_pubname ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tác giả</td>
                                                            <td><?php echo $pro_author ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Minh họa</td>
                                                            <td><?php echo $pro_illu ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Dịch giả</td>
                                                            <td><?php echo $pro_trans ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Loại bìa</td>
                                                            <td><?php echo $pro_cover ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Số trang</td>
                                                            <td><?php echo $pro_page ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade" id="tab_three">
                                                <form action="#" class="review-form">
                                                    <h5>1 review for Simple product 12</h5>
                                                    <div class="total-reviews">
                                                        <div class="rev-avatar">
                                                            <img src="assets/img/about/avatar.jpg" alt="">
                                                        </div>
                                                        <div class="review-box">
                                                            <div class="ratings">
                                                                <span class="good"><i class="fa fa-star"></i></span>
                                                                <span class="good"><i class="fa fa-star"></i></span>
                                                                <span class="good"><i class="fa fa-star"></i></span>
                                                                <span class="good"><i class="fa fa-star"></i></span>
                                                                <span><i class="fa fa-star"></i></span>
                                                            </div>
                                                            <div class="post-author">
                                                                <p><span>admin -</span> 30 Nov, 2018</p>
                                                            </div>
                                                            <p>Aliquam fringilla euismod risus ac bibendum. Sed sit amet sem varius ante feugiat lacinia. Nunc ipsum nulla, vulputate ut venenatis vitae, malesuada ut mi. Quisque iaculis, dui congue placerat pretium, augue erat accumsan lacus</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col">
                                                            <label class="col-form-label"><span class="text-danger">*</span> Your Name</label>
                                                            <input type="text" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col">
                                                            <label class="col-form-label"><span class="text-danger">*</span> Your Email</label>
                                                            <input type="email" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col">
                                                            <label class="col-form-label"><span class="text-danger">*</span> Your Review</label>
                                                            <textarea class="form-control" required></textarea>
                                                            <div class="help-block pt-10"><span class="text-danger">Note:</span> HTML is not translated!</div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col">
                                                            <label class="col-form-label"><span class="text-danger">*</span> Rating</label>
                                                            &nbsp;&nbsp;&nbsp; Bad&nbsp;
                                                            <input type="radio" value="1" name="rating">
                                                            &nbsp;
                                                            <input type="radio" value="2" name="rating">
                                                            &nbsp;
                                                            <input type="radio" value="3" name="rating">
                                                            &nbsp;
                                                            <input type="radio" value="4" name="rating">
                                                            &nbsp;
                                                            <input type="radio" value="5" name="rating" checked>
                                                            &nbsp;Good
                                                        </div>
                                                    </div>
                                                    <div class="buttons">
                                                        <button class="sqr-btn" type="button">Continue</button>
                                                    </div>
                                                </form> <!-- end of review-form -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product details reviews end -->

                        <!-- related products area start -->
                        <div class="related-products-area mt-34">
                            <div class="section-title mb-30">
                                <div class="title-icon">
                                    <i class="fa fa-book"></i>
                                </div>
                                <h3>Sản phẩm liên quan</h3>
                            </div> <!-- section title end -->
                            <!-- featured category start -->
                            <div class="featured-carousel-active slick-padding slick-arrow-style">
                                <!-- product single item start -->
                                <?php
                                $query = "SELECT * from sanpham
                                where StatusSP = 1 and Idloai = $pro_cat
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
                            <!-- featured category end -->
                        </div>
                        <!-- related products area end -->
                    </div>

                    <!-- sidebar start -->
                    <div class="col-lg-3">
                        <div class="shop-sidebar-wrap fix mt-md-22 mt-sm-22">
                            <!-- featured category start -->
                            <div class="sidebar-widget mb-22">
                                <div class="section-title-2 d-flex justify-content-between mb-28">
                                    <h3>Khuyến mãi</h3>
                                    <div class="category-append"></div>
                                </div> <!-- section title end -->
                                <div class="category-carousel-active row" data-row="4">
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
                            <!-- featured category end -->

                            <!-- manufacturer start -->
                            <div class="sidebar-widget mb-30">
                                <div class="sidebar-title mb-10">
                                    <h3>Thương hiệu</h3>
                                </div>
                                <div class="sidebar-widget-body">
                                    <ul>
                                        <?php
                                        $querypub = "SELECT * FROM nhaphathanh";
                                        $runpub = $conn->query($querypub);
                                        if ($runpub->num_rows > 0) {
                                            while ($rowpub = $runpub->fetch_array()) {
                                                $idnph = $rowpub['Idnph'];
                                                $tennph = $rowpub['Tennph'];
                                        ?>
                                                <li><i class="fa fa-angle-right"></i><a href="shop.php?pub=<?php echo $idnph ?>"><?php echo $tennph ?></a></li>
                                        <?php
                                            }
                                        }
                                        ?>
                                </div>
                            </div>
                            <!-- manufacturer end -->

                            <!-- sidebar banner start -->
                            <div class="sidebar-widget mb-22">
                                <div class="img-container fix img-full mt-30">
                                    <a href="#"><img src="assets/img/banner/banner_shop.jpg" alt=""></a>
                                </div>
                            </div>
                            <!-- sidebar banner end -->
                        </div>
                    </div>
                    <!-- sidebar end -->
                </div>
            </div>
        </div>
        <!-- product details wrapper end -->
        <!-- row end -->
        <script>
            $(document).ready(function() {
                // quantity change js
                var proQty = $('.pro-qty');
                proQty.prepend('<span class="dec qtybtn">-</span>');
                proQty.append('<span class="inc qtybtn">+</span>');

                proQty.on('click', '.qtybtn', function() {
                    var $button = $(this);
                    var oldValue = $button.parent().find('input').val();
                    if ($button.hasClass('inc')) {
                        var newVal = parseFloat(oldValue) + 1;
                    } else {
                        // Don't allow decrementing below zero
                        if (oldValue > 1) {
                            var newVal = parseFloat(oldValue) - 1;
                        } else {
                            newVal = 1;
                        }
                    }
                    $button.parent().find('input').val(newVal);
                });
            });
        </script>
        <!-- brand area start -->
        <?php require_once('inc/branded.php') ?>
        <!-- brand area end -->

        <!-- footer area start -->
        <?php require_once('inc/footer.php') ?>