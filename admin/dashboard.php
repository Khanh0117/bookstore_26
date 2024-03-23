<?php require_once('inc/top.php'); ?>
<title>Dashbroad</title>
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
            <div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h3 class="card-title text-white">Sách</h3>
                                <div class="d-inline-block">
                                    <?php
                                    $query_pro = "SELECT * FROM sanpham WHERE StatusSP ='1'";
                                    $res_pro = $conn->query($query_pro);
                                    if ($res_pro->num_rows > 0) {
                                        $count_pro = $res_pro->num_rows;
                                    } else {
                                        $count_pro = "Không có sách";
                                    }
                                    ?>
                                    <h2 class="text-white"><?php echo $count_pro ?></h2>
                                    <a href="./products.php">
                                        <p class="text-white mb-0">Xem chi tiết...</p>
                                    </a>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-book"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-2">
                            <div class="card-body">
                                <h3 class="card-title text-white">Phân loại</h3>
                                <div class="d-inline-block">
                                    <?php
                                    $query_subcat = "SELECT * FROM phanloai";
                                    $res_subcat = $conn->query($query_subcat);
                                    if ($res_subcat->num_rows > 0) {
                                        $count_subcat = $res_subcat->num_rows;
                                    } else {
                                        $count_subcat = "Không có phân loại";
                                    }
                                    ?>
                                    <h2 class="text-white"><?php echo $count_subcat ?></h2>
                                    <a href="./subcate.php">
                                        <p class="text-white mb-0">Xem chi tiết...</p>
                                    </a>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-th-large"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-2">
                            <div class="card-body">
                                <h3 class="card-title text-white">Thể loại</h3>
                                <div class="d-inline-block">
                                    <?php
                                    $query_cat = "SELECT * FROM theloai";
                                    $res_cat = $conn->query($query_cat);
                                    if ($res_cat->num_rows > 0) {
                                        $count_cat = $res_cat->num_rows;
                                    } else {
                                        $count_cat = "Không có thể loại";
                                    }
                                    ?>
                                    <h2 class="text-white"><?php echo $count_cat ?></h2>
                                    <a href="./categories.php">
                                        <p class="text-white mb-0">Xem chi tiết...</p>
                                    </a>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-tags"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-3">
                            <div class="card-body">
                                <h3 class="card-title text-white">Nhà phát hành</h3>
                                <div class="d-inline-block">
                                    <?php
                                    $query_pub = "SELECT * FROM nhaphathanh";
                                    $res_pub = $conn->query($query_pub);
                                    if ($res_pub->num_rows > 0) {
                                        $count_pub = $res_pub->num_rows;
                                    } else {
                                        $count_pub = "Không có nhà phát hành";
                                    }
                                    ?>
                                    <h2 class="text-white"><?php echo $count_pub ?></h2>
                                    <a href="./publisher.php">
                                        <p class="text-white mb-0">Xem chi tiết...</p>
                                    </a>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-building"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-4">
                            <div class="card-body">
                                <h3 class="card-title text-white">Khách hàng</h3>
                                <div class="d-inline-block">
                                    <?php
                                    $query_users = "SELECT * FROM users u LEFT JOIN taikhoan tk on u.Idtk = tk.Idtk where tk.Idrole = '2'";
                                    $res_users = $conn->query($query_users);
                                    if ($res_users->num_rows > 0) {
                                        $count_users = $res_users->num_rows;
                                    } else {
                                        $count_users = "Không có người dùng nào";
                                    }
                                    ?>
                                    <h2 class="text-white"><?php echo $count_users ?></h2>
                                    <a href="./users.php">
                                        <p class="text-white mb-0">Xem chi tiết...</p>
                                    </a>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                    Đơn hàng mới
                                </div>
                                <div class="pb-3">
                                    <div class="input-group">
                                        <input type="search" id="search" name="search" class="form-control rounded" placeholder="Tìm kiếm" aria-label="Search" aria-describedby="search-addon" />
                                        <button type="submit" id="btn-search" class="btn btn-outline-primary">search</button>
                                    </div>
                                </div>
                                <script>
                                    function fetchdata() {
                                        var search = $('#search').val();
                                        $.ajax({
                                            method: 'GET',
                                            url: 'orders-table.php',
                                            data: {
                                                search: search
                                            },
                                            success: function(data) {
                                                $('#data-output').html(data);
                                            }
                                        });
                                    }

                                    $('#search').keypress(function() {
                                        fetchdata();
                                    });
                                    $('#btn-search').click(function() {
                                        fetchdata();
                                    });
                                    $(document).ready(function() {
                                        fetchdata();
                                    });
                                </script>
                                <div class="table-responsive" id="data-output"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $query = $query = "SELECT * FROM hoadon hd 
				LEFT JOIN taikhoan tk ON hd.Idtk = tk.Idtk
				LEFT JOIN users u ON u.Idtk = tk.Idtk ORDER BY hd.Idhd desc;";
                $run = $conn->query($query);
                if (mysqli_num_rows($run) > 0) {
                    while ($row = $run->fetch_array()) {
                        $hd_id = $row['Idhd'];
                        $email = $row['Mail'];
                        $phonenumber = $row['Sdt'];
                        $ghichu = $row['Ghichu'];
                ?>
                        <div class="modal fade" id="exampleModalLong<?php echo $hd_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle<?php echo $hd_id ?>" style="color:#7571f9;">Chi tiết đơn hàng</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h6 style="color:#ea5774;font-weight:500;">Mã đơn hàng:</h6>
                                                <p> <?php echo $hd_id ?></p>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 style="color:#ea5774;font-weight:500;">Email:</h6>
                                                <p> <?php echo $email ?></p>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 style="color:#ea5774;font-weight:500;">Số điện thoại:</h6>
                                                <p> <?php echo $phonenumber ?></p>
                                            </div>
                                            <div class="col-md-12">
                                                <h6 style="color:#ea5774;font-weight:500;">Ghi chú:</h6>
                                                <p> <?php echo nl2br($ghichu) ?></p>
                                            </div>
                                            <div class="table-responsive">
                                                <table id="table-detail-<?php echo $hd_id ?>" class="table table-bordered table-striped table-hover">
                                                    <tr>
                                                        <th style="width: 16%">Ảnh sản phẩm</th>
                                                        <th style="width: 36%">Sản phẩm</th>
                                                        <th style="width: 16%">Giá</th>
                                                        <th style="width: 16%">Số lượng</th>
                                                        <th style="width: 16%">Tổng tiền</th>
                                                    </tr>
                                                    <?php
                                                    $total_price = 0;
                                                    $querydetail = "SELECT * FROM chitiethoadon cthd 
                                                    LEFT JOIN hoadon hd ON hd.Idhd = cthd.Idhd 
                                                    LEFT JOIN sanpham sp ON sp.Idsp = cthd.Idsp 
                                                    WHERE cthd.Idhd = '$hd_id'";
                                                    $rundetail = $conn->query($querydetail);
                                                    if ($rundetail->num_rows > 0) {
                                                        while ($rowdetail = $rundetail->fetch_array()) {
                                                            $pro_img = $rowdetail['Img'];
                                                            $pro_name = $rowdetail['Tensp'];
                                                            $pro_quantity = $rowdetail['Soluong'];
                                                            $pro_price = $rowdetail['Giamoi'];
                                                            $pro_total = $pro_quantity * $pro_price;
                                                    ?>
                                                            <tr>
                                                                <td><img src="./product-img/<?php echo $pro_img ?>" width="70%"></td>
                                                                <td><?php echo $pro_name ?></td>
                                                                <td>$ <?php echo $pro_price ?></td>
                                                                <td><?php echo $pro_quantity ?></td>
                                                                <td>$ <?php echo $pro_total ?></td>
                                                            </tr>
                                                    <?php
                                                            $total_price += $pro_total;
                                                        }
                                                    }
                                                    ?>
                                                    <tr>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th style="color: #ea5774;">Tính tạm:</th>
                                                        <th style="color: #ea5774;">$ <?php echo $total_price ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th style="color: #ea5774;">Phí ship:</th>
                                                        <th style="color: #ea5774;">$ 5</th>
                                                    </tr>
                                                    <tr>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th style="color: #ea5774;">Tổng:</th>
                                                        <th style="color: #ea5774;">$ <?php echo $total_price + 5 ?></th>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Đóng</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- del order -->
                        <div class="modal fade" id="exampleModal<?php echo $hd_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="exampleModalLabel<?php echo $hd_id ?>" style="margin: auto;">
                                            <svg width="24" height="24" class="dialog-content__icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 8.25C12.4142 8.25 12.75 8.58579 12.75 9V13.5C12.75 13.9142 12.4142 14.25 12 14.25C11.5858 14.25 11.25 13.9142 11.25 13.5V9C11.25 8.58579 11.5858 8.25 12 8.25Z" fill="#FC820A"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0052 4.45201C10.8464 2.83971 13.1536 2.83971 13.9948 4.45201L20.5203 16.9592C21.3019 18.4572 20.2151 20.25 18.5255 20.25H5.47447C3.78487 20.25 2.69811 18.4572 3.47966 16.9592L10.0052 4.45201ZM12.6649 5.14586C12.3845 4.60842 11.6154 4.60842 11.335 5.14586L4.80953 17.6531C4.54902 18.1524 4.91127 18.75 5.47447 18.75H18.5255C19.0887 18.75 19.4509 18.1524 19.1904 17.6531L12.6649 5.14586Z" fill="#FC820A"></path>
                                                <path d="M12 17.25C12.6213 17.25 13.125 16.7463 13.125 16.125C13.125 15.5037 12.6213 15 12 15C11.3787 15 10.875 15.5037 10.875 16.125C10.875 16.7463 11.3787 17.25 12 17.25Z" fill="#FC820A"></path>
                                            </svg>
                                            Xóa đơn hàng
                                        </h3>
                                    </div>
                                    <div class="modal-body" style="margin: auto;">
                                        <h6 style="font-family: Roboto,Helvetica,Arial,sans-serif; font-size:16px;">Bạn có chắc muốn xóa đơn hàng này không?</h6>
                                    </div>
                                    <div class="modal-footer" style="margin: auto;">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Hủy</button>
                                        <a href="orders.php?del=<?php echo $hd_id ?>">
                                            <button type="button" class="btn btn-outline-danger">Xác nhận</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "Không có đơn hàng";
                }
                ?>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body px-0">
                                <h4 class="card-title px-4 mb-3">Todo</h4>
                                <div class="todo-list">
                                    <div class="tdl-holder">
                                        <div class="tdl-content">
                                            <ul id="todo_list">
                                                <li><label><input type="checkbox"><i></i><span>Get up</span><a href='#' class="ti-trash"></a></label></li>
                                                <li><label><input type="checkbox" checked><i></i><span>Stand up</span><a href='#' class="ti-trash"></a></label></li>
                                                <li><label><input type="checkbox"><i></i><span>Don't give up the fight.</span><a href='#' class="ti-trash"></a></label></li>
                                                <li><label><input type="checkbox" checked><i></i><span>Do something else</span><a href='#' class="ti-trash"></a></label></li>
                                            </ul>
                                        </div>
                                        <div class="px-4">
                                            <input type="text" class="tdl-new form-control" placeholder="Write new item and hit 'Enter'...">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="social-graph-wrapper widget-facebook">
                                <span class="s-icon"><i class="fa fa-facebook"></i></span>
                            </div>
                            <div class="row">
                                <div class="col-6 border-right">
                                    <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                        <h4 class="m-1">89k</h4>
                                        <p class="m-0">Friends</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                        <h4 class="m-1">119k</h4>
                                        <p class="m-0">Followers</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="social-graph-wrapper widget-linkedin">
                                <span class="s-icon"><i class="fa fa-linkedin"></i></span>
                            </div>
                            <div class="row">
                                <div class="col-6 border-right">
                                    <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                        <h4 class="m-1">89k</h4>
                                        <p class="m-0">Friends</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                        <h4 class="m-1">119k</h4>
                                        <p class="m-0">Followers</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="social-graph-wrapper widget-googleplus">
                                <span class="s-icon"><i class="fa fa-google-plus"></i></span>
                            </div>
                            <div class="row">
                                <div class="col-6 border-right">
                                    <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                        <h4 class="m-1">89k</h4>
                                        <p class="m-0">Friends</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                        <h4 class="m-1">119k</h4>
                                        <p class="m-0">Followers</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="social-graph-wrapper widget-twitter">
                                <span class="s-icon"><i class="fa fa-twitter"></i></span>
                            </div>
                            <div class="row">
                                <div class="col-6 border-right">
                                    <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                        <h4 class="m-1">89k</h4>
                                        <p class="m-0">Friends</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                        <h4 class="m-1">119k</h4>
                                        <p class="m-0">Followers</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
    </div>

    <!--**********************************
        Main wrapper end
    ***********************************-->
    <?php require_once('inc/footer.php'); ?>