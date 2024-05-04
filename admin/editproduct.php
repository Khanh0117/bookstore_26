<?php require_once('inc/top.php'); ?>
<title>Sửa sách sách</title>
</head>

<body>
    <?php require_once('inc/preload.php'); ?>

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
        <?php require_once('inc/web-form.php'); ?>

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="./dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="./products.php">Sách</a></li>
                        <li class="breadcrumb-item active">Sửa sách</li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                    <h3>Sửa sách</h3>
                                </div>
                                <?php
                                $id = $_GET['id'];
                                $query = "SELECT * FROM sanpham where Idsp ='$id'";
                                $run = $conn->query($query);
                                if ($run->num_rows > 0) {
                                    while ($row = $run->fetch_array()) {
                                        $pro_id = $row['Idsp'];
                                        $pro_name = $row['Tensp'];
                                        $pro_author = $row['Tacgia'];
                                        $pro_illu = $row['Minhhoa'];
                                        $pro_trans = $row['Dichgia'];
                                        $pro_cover = $row['Loaibia'];
                                        $pro_pages = $row['Sotrang'];
                                        $pro_price = $row['Giasp'];
                                        $pro_sale = $row['Giamgia'];
                                        $pro_newprice = $row['Giamoi'];
                                        $pro_cat = $row['Idloai'];
                                        $pro_pub = $row['Idnph'];
                                        $pro_des = $row['Mota'];
                                        $pro_image = $row['Img'];
                                ?>

                                        <form action="./inc/process.php?edit_product=<?php echo $pro_id ?>" method="POST" enctype="multipart/form-data">

                                            <div class="form-group">
                                                <label for="product">Tên sách:*</label>
                                                <input type="hidden" value="<?php echo $pro_id ?>" class="form-control" name="e-pro-id" required>
                                                <input type="text" value="<?php echo $pro_name ?>" class="form-control" name="e-pro-name" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="products">Tác giả:*</label>
                                                <input type="text" value="<?php echo $pro_author ?>" class="form-control" name="e-pro-author" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="products">Minh họa:*</label>
                                                <input type="text" value="<?php echo $pro_illu ?>" class="form-control" name="e-pro-illu">
                                            </div>

                                            <div class="form-group">
                                                <label for="products">Dịch giả:*</label>
                                                <input type="text" value="<?php echo $pro_trans ?>" class="form-control" name="e-pro-trans">
                                            </div>

                                            <div class="form-group">
                                                <label for="products">Loại bìa:*</label>
                                                <input type="text" value="<?php echo $pro_cover ?>" class="form-control" name="e-pro-cover">
                                            </div>

                                            <div class="form-group">
                                                <label for="products">Số trang:*</label>
                                                <input type="number" value="<?php echo $pro_pages ?>" class="form-control" name="e-pro-pages">
                                            </div>

                                            <div class="form-group">
                                                <label for="product">Nhà phát hành:*</label>
                                                <div class="box">
                                                    <select name="e-pro-pub">
                                                        <?php

                                                        $querypub = "SELECT * FROM nhaphathanh ORDER BY Idnph asc";
                                                        $runpub = $conn->query($querypub);
                                                        if ($runpub->num_rows > 0) {
                                                            while ($rowpub = $runpub->fetch_array()) {
                                                                $pub_id = $rowpub['Idnph'];
                                                                $pub_name = $rowpub['Tennph'];
                                                                $selected = "";
                                                                if ($pub_id == $pro_pub) {
                                                                    $selected = "selected";
                                                                }
                                                        ?>
                                                                <option <?php echo $selected; ?> value="<?php echo $pub_id ?>"><?php echo $pub_id ?>. <?php echo $pub_name ?></option>
                                                        <?php
                                                            }
                                                        } else {
                                                            echo "Không tìm thấy nhà phát hành";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="product">thể loại:*</label>
                                                <div class="box">
                                                    <select name="e-pro-cat">
                                                        <?php
                                                        $querycat = "SELECT * FROM theloai ORDER BY Idloai asc";
                                                        $runcat = $conn->query($querycat);
                                                        if ($runcat->num_rows > 0) {
                                                            while ($rowcat = $runcat->fetch_array()) {
                                                                $cat_id = $rowcat['Idloai'];
                                                                $cat_name = $rowcat['Tenloai'];
                                                                $selected = "";
                                                                if ($cat_id == $pro_cat) {
                                                                    $selected = "selected";
                                                                }
                                                        ?>
                                                                <option <?php echo $selected; ?> value="<?php echo $cat_id ?>"><?php echo $cat_id ?>. <?php echo $cat_name ?></option>
                                                        <?php
                                                            }
                                                        } else {
                                                            echo "Không tìm thấy thể loại";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="product">Giá:*</label>
                                                <input type="number" value="<?php echo $pro_price ?>" class="form-control" name="e-pro-price" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="product">Sale:*</label>
                                                <input type="number" value="<?php echo $pro_sale ?>" class="form-control" name="e-pro-sale" min="0" max="100" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="product">Mô tả sản phẩm:*</label>
                                                <textarea cols="30" rows="10" class="form-control" name="e-pro-des" required><?php echo $pro_des ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="product">Image:*</label>
                                                <?php
                                                if ($pro_image != "") {
                                                ?>
                                                    <div name="old" value="<?php $pro_image ?>" style="margin-bottom: 15px;"><img id="thumb" src="product-img/<?php echo $pro_image ?>" width="300px"></div>
                                                <?php
                                                } else {
                                                    echo "Không tìm thấy ảnh sách";
                                                }
                                                ?>
                                                <label>Nếu bạn muốn đổi ảnh sách, thì hãy click vào đây:</label>
                                                <input type="file" class="form-control" name="image" onchange="preview()" value="./product-img/<?php echo $pro_image; ?>">
                                            </div>
                                            <script>
                                                function preview() {
                                                    thumb.src = URL.createObjectURL(event.target.files[0]);
                                                }
                                            </script>
                                            <div class="form-group">
                                                <input type="submit" value="Sửa sách" name="edit-product" class="btn btn-primary">
                                            </div>
                                        </form>
                            </div>
                        </div>
                    </div>
            <?php
                                    }
                                } else {
                                    echo "Không tìm thấy sách";
                                }
            ?>

                </div>
            </div>
            <!-- container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <?php require_once('inc/footer.php'); ?>