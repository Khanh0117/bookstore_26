<?php require_once('inc/top.php') ?>
<!-- Site title -->
<title>BookStore</title>

<?php

$pages = 0;
$limit = 12;

if (isset($_GET['page'])) {
    $pages = $_GET['page'];
} else {
    $pages = 1;
}
$start = ($pages - 1) * $limit;

$max_price = 1000;
$min_price = 0;

if (isset($_POST['price_filter'])) {
    $max_price = $_POST['max_price'];
    $min_price = $_POST['min_price'];
}

$queryshop = "SELECT * FROM sanpham
Where StatusSP = 1 and Giamoi between '$min_price' and '$max_price'
ORDER BY Idsp desc
LIMIT $start, $limit";

$querypage = "SELECT * FROM sanpham
Where StatusSP = 1 and Giamoi between $min_price and $max_price";

$cur_page = '';
$cur_page_name = '';

//phan loai
if (isset($_GET['subcat'])) {
    $id_subcat = $_GET['subcat'];
    $queryshop = "SELECT * FROM sanpham sp
    left join theloai tl on tl.Idloai = sp.Idloai
    left join phanloai pl on tl.Idpl = pl.Idpl
    where StatusSP = 1 and pl.Idpl = '$id_subcat' and Giamoi between '$min_price' and '$max_price'
    ORDER BY Idsp desc
    LIMIT $start, $limit";

    $querypage = "SELECT * FROM sanpham sp
    left join theloai tl on tl.Idloai = sp.Idloai
    left join phanloai pl on tl.Idpl = pl.Idpl
    where StatusSP = 1 and pl.Idpl = '$id_subcat' and Giamoi between '$min_price' and '$max_price'";

    $cur_page = "&subcat=$id_subcat";

    $querysub = "SELECT * from phanloai where Idpl = $id_subcat";
    $runsub = $conn->query($querysub);
    $rowsub = $runsub->fetch_array();
    $cur_page_name = $rowsub['Tenphanloai'];
}


//the loai
if (isset($_GET['cat'])) {
    $id_cat = $_GET['cat'];
    $queryshop = "SELECT * FROM sanpham sp
    where StatusSP = 1 and Idloai = '$id_cat' and Giamoi between '$min_price' and '$max_price'
    ORDER BY Idsp desc
    LIMIT $start, $limit";

    $querypage = "SELECT * FROM sanpham sp
    where StatusSP = 1 and Idloai = '$id_cat' and Giamoi between '$min_price' and '$max_price'";

    $cur_page = "&subcat=$id_cat";

    $querycat = "SELECT * from theloai where Idloai = $id_cat";
    $runcat = $conn->query($querycat);
    $rowcat = $runcat->fetch_array();
    $cur_page_name = $rowcat['Tenloai'];
}

//nha phat hanh
if (isset($_GET['pub'])) {
    $id_pub = $_GET['pub'];
    $queryshop = "SELECT * FROM sanpham
    where StatusSP = 1 and Idnph = '$id_pub' and Giamoi between '$min_price' and '$max_price'
    ORDER BY Idsp desc
    LIMIT $start, $limit";

    $querypage = "SELECT * FROM sanpham
    where StatusSP = 1 and Idnph = '$id_pub' and Giamoi between '$min_price' and '$max_price'";

    $cur_page = "&pub=$id_pub";

    $querypub = "SELECT * from nhaphathanh where Idnph = $id_pub";
    $runpub = $conn->query($querypub);
    $rowpub = $runpub->fetch_array();
    $cur_page_name = $rowpub['Tennph'];
}

$run_page = $conn->query($querypage);
$num_row_page = $run_page->num_rows;
$total_pages = ceil($num_row_page / $limit);

$runshop = $conn->query($queryshop);
?>
<style>
    .error_text {
        color: red;
        margin: auto;
        width: 50%;
        text-align: center;
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
                                    <?php
                                    if ($cur_page_name != '') {
                                    ?>
                                        <li class="breadcrumb-item"><a href="shop.php">Sản phẩm</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"><?php echo $cur_page_name ?></li>
                                    <?php
                                    } else {
                                    ?>
                                        <li class="breadcrumb-item active" aria-current="page">Sản phẩm</li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- row start -->
        <!-- page wrapper start -->
        <div class="page-main-wrapper">
            <div class="container">
                <div class="row">
                    <!-- sidebar start -->
                    <div class="col-lg-3 order-2 order-lg-1">
                        <div class="shop-sidebar-wrap mt-md-28 mt-sm-28">
                            <!-- sidebar categorie start -->
                            <div class="sidebar-widget mb-30">
                                <div class="sidebar-category">
                                    <ul>
                                        <li class="title"><i class="fa fa-bars"></i> Danh mục sản phẩm</li>
                                        <?php
                                        $query = "SELECT * FROM phanloai";
                                        $run = $conn->query($query);
                                        if ($run->num_rows > 0) {
                                            while ($row = $run->fetch_array()) {
                                                $idpl = $row['Idpl'];
                                                $tenpl = $row['Tenphanloai'];
                                        ?>
                                                <li><a href="shop.php?subcat=<?php echo $idpl ?>"><?php echo $tenpl ?></a></li>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <!-- sidebar categorie start -->

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

                            <!-- pricing filter start -->
                            <div class="sidebar-widget mb-30">
                                <div class="sidebar-title mb-10">
                                    <h3>Lọc theo giá tiền</h3>
                                </div>
                                <div class="sidebar-widget-body">
                                    <div class="price-range-wrap">
                                        <div class="price-range" data-min="0" data-max="1000"></div>
                                        <div class="range-slider">
                                            <form method="POST" enctype="multipart/form-data" class="d-flex justify-content-between">
                                                <button type="submit" name="price_filter" class="filter-btn">Lọc</button>
                                                <div class="price-input d-flex align-items-center">
                                                    <label for="amount">Giá: </label>
                                                    <input type="text" name="min_price" id="amount">
                                                    <span>-</span>
                                                    <input type="text" name="max_price" id="amountmax">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- pricing filter end -->

                        </div>
                    </div>
                    <!-- sidebar end -->

                    <!-- product main wrap start -->
                    <div class="col-lg-9 order-1 order-lg-2">
                        <div class="shop-banner img-full">
                            <img src="assets/img/banner/banner_ln3.png" alt="">
                        </div>
                        <!-- product view wrapper area start -->
                        <div class="shop-product-wrapper pt-34">
                            <!-- shop product top wrap start -->
                            <div class="shop-top-bar">
                                <div class="row">
                                    <div class="col-lg-7 col-md-6">
                                        <div class="top-bar-left">
                                            <div class="product-view-mode mr-70 mr-sm-0">
                                                <a class="active" href="#" data-target="grid"><i class="fa fa-th"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-6">
                                        <div class="top-bar-right">
                                            <div class="product-short">
                                                <p>Sắp xếp theo : </p>
                                                <select class="nice-select" name="sortby">
                                                    <option value="name-asc">Tên: A - Z</option>
                                                    <option value="name-desc">Tên: Z - A</option>
                                                    <option value="price-asc">Giá: Tăng dần</option>
                                                    <option value="price-desc">Giá: Giảm dần</option>
                                                    <option value="pro-asc">Cũ nhất</option>
                                                    <option value="pro-desc">Mới nhất</option>
                                                    <option value="sales">bán chạy nhất</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- shop product top wrap start -->

                            <!-- product item start -->
                            <div class="shop-product-wrap grid row">
                                <?php
                                if ($runshop->num_rows > 0) {
                                    while ($row = $runshop->fetch_array()) {
                                        $idsp = $row['Idsp'];
                                        $tensp = $row['Tensp'];
                                        $giasp = $row['Giasp'];
                                        $giamgia = $row['Giamgia'];
                                        $giamoi = $row['Giamoi'];
                                        $img = $row['Img'];
                                ?>
                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <!-- product single grid item start -->
                                            <div class="product-item fix mb-30">
                                                <div class="product-thumb">
                                                    <a href="product.php?id=<?php echo $idsp ?>">
                                                        <img src="admin/product-img/<?php echo $img ?>" class="img-pri" alt="">
                                                    </a>
                                                    <div class="product-label">
                                                        <span><?php echo $giamgia ?>%</span>
                                                    </div>
                                                    <div class="product-action-link">
                                                        <a href="#" data-toggle="modal" data-target="#quick_view"> <span data-toggle="tooltip" data-placement="left" title="Quick view"><i class="fa fa-search"></i></span> </a>
                                                        <a data-toggle="tooltip" data-placement="left" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                        <a data-toggle="tooltip" data-placement="left" title="Compare"><i class="fa fa-refresh"></i></a>
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
                                                </div><!-- hidden data -->
                                                <input type="text" value="<?php echo $tensp ?>" id='name-sp<?php echo $idsp ?>' hidden>
                                                <input type="number" value="<?php echo $giamoi ?>" id='price-sp<?php echo $idsp ?>' hidden>
                                                <input type="text" value="<?php echo $img ?>" id='img-sp<?php echo $idsp ?>' hidden>
                                                <!-- hidden data end -->
                                            </div>
                                            <!-- product single grid item end -->
                                        </div> <!-- product single column end -->
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <div class="error_text">Hiện tại đang cập nhật, bạn vui lòng quay lại sau nhé!</div>
                                <?php
                                }
                                ?>
                            </div>
                            <!-- product item end -->
                        </div>
                        <!-- product view wrapper area end -->

                        <!-- start pagination area -->
                        <div class="paginatoin-area text-center pt-28">
                            <div class="row">
                                <div class="col-12">
                                    <ul class="pagination-box">
                                        <?php
                                        if ($pages > 1) {
                                            $previous = $pages - 1;
                                        ?>
                                            <li><a href="shop.php?page=<?php echo $previous . $cur_page ?>">Previous</a></li>
                                        <?php
                                        }
                                        for ($i = 1; $i <= $total_pages; $i++) {
                                            $active_class = "";
                                            if ($i == $pages) {
                                                $active_class = "active";
                                            }
                                        ?>
                                            <li class="<?php echo $active_class ?>"><a href="shop.php?page=<?php echo $i . $cur_page ?>"><?php echo $i ?></a></li>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        if ($pages < $total_pages) {
                                            $pages++; {
                                        ?>
                                                <li><a href="shop.php?page=<?php echo $pages . $cur_page ?>">Next</a></li>

                                        <?php
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- end pagination area -->

                    </div>
                    <!-- product main wrap end -->
                </div>
            </div>
        </div>
        <!-- page wrapper end -->
        <!-- row end -->

        <!-- brand area start -->
        <?php require_once('inc/branded.php') ?>
        <!-- brand area end -->

        <!-- footer area start -->
        <?php require_once('inc/footer.php') ?>