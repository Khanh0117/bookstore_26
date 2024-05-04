<?php require_once('inc/top.php'); ?>
<title>Thêm sách</title>
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
                        <li class="breadcrumb-item active">Thêm sách mới</li>
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
                                    <h3>Thêm sách mới</h3>
                                </div>
                                <form action="./inc/process.php" method="POST" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label for="products">Tên sách:*</label>
                                        <input type="text" class="form-control" name="add-pro-name" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="products">Tác giả:*</label>
                                        <input type="text" class="form-control" name="add-pro-author" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="products">Minh họa:*</label>
                                        <input type="text" class="form-control" name="add-pro-illu">
                                    </div>

                                    <div class="form-group">
                                        <label for="products">Dịch giả:*</label>
                                        <input type="text" class="form-control" name="add-pro-trans">
                                    </div>

                                    <div class="form-group">
                                        <label for="products">Loại bìa:*</label>
                                        <input type="text" class="form-control" name="add-pro-cover">
                                    </div>

                                    <div class="form-group">
                                        <label for="products">Số trang:*</label>
                                        <input type="number" class="form-control" name="add-pro-pages">
                                    </div>

                                    <div class="form-group">
                                        <label for="products">Nhà phát hành:*</label>
                                        <div class="box">
                                            <select name="add-pro-pub">
                                                <?php
                                                $querypub = "SELECT * FROM nhaphathanh ORDER BY Idnph asc";
                                                $runpub = $conn -> query($querypub);
                                                if ($runpub ->num_rows > 0) {
                                                    while ($rowpub = $runpub ->fetch_array()) {
                                                        $pub_id = $rowpub['Idnph'];
                                                        $pub_name = $rowpub['Tennph'];
                                                ?>
                                                        <option value="<?php echo $pub_id ?>"><?php echo $pub_id ?>. <?php echo $pub_name ?></option>
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
                                        <label for="products">Thể loại:*</label>
                                        <div class="box">
                                            <select name="add-pro-cat">
                                                <?php
                                                $querycat = "SELECT * FROM theloai ORDER BY Idloai asc";
                                                $runcat = $conn -> query($querycat);
                                                if ($runcat ->num_rows > 0) {
                                                    while ($rowcat = $runcat ->fetch_array()) {
                                                        $cat_id = $rowcat['Idloai'];
                                                        $cat_name = $rowcat['Tenloai'];
                                                ?>
                                                        <option value="<?php echo $cat_id ?>"><?php echo $cat_id ?>. <?php echo $cat_name ?></option>
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
                                        <label for="products">Giá:*</label>
                                        <input type="number" class="form-control" name="add-pro-price" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="products">Sale:*</label>
                                        <input type="number" class="form-control" name="add-pro-sale" min="0" max="100" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="products">Mô tả sản phẩm:*</label>
                                        <textarea cols="30" rows="10" class="form-control" name="add-pro-des" required></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="products">Image:*</label>
                                        <input type="file" class="form-control" name="image" onchange="preview()" required>
                                        <img id="thumb" src="" width="300px"/>
                                    </div>
                                    <script>
                                        function preview(){
                                            thumb.src=URL.createObjectURL(event.target.files[0]);
                                        }
                                    </script>
                                    <div class="form-group">
                                        <input type="submit" value="Thêm sách" name="add-product" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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