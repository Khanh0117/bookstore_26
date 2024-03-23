<?php require_once('inc/top.php') ?>
<!-- Site title -->
<title>Trang cá nhân</title>
<?php
if (!isset($_SESSION['customer'])) {
    header('location: login.php');
}
?>
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
                                    <li class="breadcrumb-item active" aria-current="page">Tài khoản</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- my account wrapper start -->
        <div class="my-account-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- My Account Page Start -->
                        <div class="myaccount-page-wrapper">
                            <!-- My Account Tab Menu Start -->
                            <div class="row">
                                <div class="col-lg-3 col-md-4">
                                    <div class="myaccount-tab-menu nav" role="tablist">
                                        <a href="#dashboad" class="active" data-toggle="tab"><i class="fa fa-dashboard"></i>Dashboard</a>
                                        <a href="#account-info" data-toggle="tab"><i class="fa fa-user"></i> Thông tin tài khoản</a>
                                        <a href="#payment-method" data-toggle="tab"><i class="fa fa-credit-card"></i> Phương thức thanh toán</a>
                                        <a href="#orders" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Đơn hàng của tôi</a>
                                        <a href="logout.php"><i class="fa fa-sign-out"></i> Đăng xuất</a>
                                    </div>
                                </div>
                                <!-- My Account Tab Menu End -->

                                <!-- My Account Tab Content Start -->
                                <div class="col-lg-9 col-md-8">
                                    <div class="tab-content" id="myaccountContent">
                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>Dashboard</h3>
                                                <div class="saved-message">
                                                    <p>Họ tên: <strong><?php echo $info_name ?></strong></p>
                                                    <p>Email: <strong><?php echo $info_email ?></strong></p>
                                                    <p>Số điện thoại <strong><?php echo $info_phone ?></strong></p>
                                                    <p>Địa chỉ <strong><?php echo $info_address ?></strong></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Single Tab Content End -->

                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="orders" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>Đơn hàng</h3>
                                                <div class="myaccount-table table-responsive text-center">
                                                    <table class="table table-bordered">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th>Stt</th>
                                                                <th>Mã đơn hàng</th>
                                                                <th>Ngày đặt</th>
                                                                <th>Ngày giao</th>
                                                                <th>Tình trạng</th>
                                                                <th>Xem chi tiết</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $query = "SELECT * FROM hoadon where Idtk = '$info_id'";
                                                            $run = $conn->query($query);
                                                            $hd_stt = 0;
                                                            if ($run->num_rows > 0) {
                                                                while ($row = $run->fetch_array()) {
                                                                    $hd_stt++;
                                                                    $hd_id = $row['Idhd'];
                                                                    $ngay_mua = $row['Ngaymua'];
                                                                    $ngay_nhan = $row['Ngaynhan'];
                                                                    $hd_status = $row['StatusHD'];
                                                            ?>
                                                                    <tr>
                                                                        <td><?php echo $hd_stt ?></td>
                                                                        <td><?php echo $hd_id ?></td>
                                                                        <td><?php echo $ngay_mua ?></td>
                                                                        <td><?php echo $ngay_nhan ?></td>
                                                                        <td>
                                                                            <?php
                                                                            if ($hd_status == '1') {
                                                                            ?>
                                                                                <span class="btn btn-info">Chuẩn bị hàng</span>
                                                                            <?php
                                                                            }
                                                                            if ($hd_status == '2') {
                                                                            ?>
                                                                                <span class="btn btn-danger">Đang giao</span>
                                                                            <?php
                                                                            }
                                                                            if ($hd_status == '3') {
                                                                            ?>
                                                                                <span class="btn btn-success">Đã giao</span>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong<?php echo $hd_id ?>"><i class="fa fa-pencil-square-o"></i></button></td>
                                                                    </tr>
                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <?php
                                                $query = $query = "SELECT * FROM hoadon hd 
				                                LEFT JOIN taikhoan tk ON hd.Idtk = tk.Idtk
				                                LEFT JOIN users u ON u.Idtk = tk.Idtk ORDER BY hd.Idhd desc;";
                                                $run = $conn->query($query);
                                                if ($run->num_rows > 0) {
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
                                                                        <h4 class="modal-title" id="exampleModalLongTitle<?php echo $hd_id ?>" style="color:#7571f9; margin: auto;text-align: center;">Chi tiết đơn hàng</h4>
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
                                                                                        <th style="width: 26%">Ảnh sản phẩm</th>
                                                                                        <th style="width: 26%">Sản phẩm</th>
                                                                                        <th style="width: 16%">Đơn giá</th>
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
                                                                                                <td><img src="admin/product-img/<?php echo $pro_img ?>" width="40%"></td>
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
                                                <?php
                                                    }
                                                } else {
                                                    echo "Không có đơn hàng";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <!-- Single Tab Content End -->

                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="payment-method" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>Phương thức thanh toán</h3>
                                                <button type="button" class="btn btn-outline-info" style="float:right; margin-bottom:1em" data-toggle="modal" data-target="#ModalBank">Thêm</button>
                                                <!-- table bank -->
                                                <div class="myaccount-table table-responsive text-center" id="bank-output">
                                                </div>

                                                <!-- Modal -->
                                                <div class="modal fade" id="ModalBank" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Thêm phương thức thanh toán</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form id="add-bank" method="post">
                                                                <div class="modal-body">
                                                                    <div class="single-input-item">
                                                                        <label for="bankname" class="required">Tên ngân hàng</label>
                                                                        <input type="text" id="bankname" placeholder="Nhập tên ngân hàng" required />
                                                                    </div>
                                                                    <div class="single-input-item">
                                                                        <label for="banknum" class="required">Số tài khoản</label>
                                                                        <input type="number" id="banknum" placeholder="Nhập số tài khoản ngân hàng" required />
                                                                    </div>
                                                                    <div class="single-input-item">
                                                                        <label for="bankacc" class="required">Tên tài khoản</label>
                                                                        <input type="text" id="bankacc" placeholder="Nhập tên tài khoản" required />
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                                                    <button type="submit" id="btn-add-bank" class="btn btn-primary">Lưu</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <script>
                                                    function fetchdata() {
                                                        var id = <?php echo $info_id; ?>;
                                                        $.ajax({
                                                            method: 'GET',
                                                            url: 'table-bank.php',
                                                            data: {
                                                                id: id
                                                            },
                                                            success: function(data) {
                                                                $('#bank-output').html(data);
                                                            }
                                                        });
                                                    };
                                                    fetchdata();
                                                    $('#add-bank').submit(function(e) {
                                                        e.preventDefault();
                                                        var bank_name = $('#bankname').val();
                                                        var bank_num = $('#banknum').val();
                                                        var bank_acc = $('#bankacc').val();
                                                        var add_bank = <?php echo $info_id; ?>;
                                                        $.ajax({
                                                            method: 'POST',
                                                            url: 'inc/process.php',
                                                            data: {
                                                                add_bank: add_bank,
                                                                bank_name: bank_name,
                                                                bank_num: bank_num,
                                                                bank_acc: bank_acc
                                                            },
                                                            success: function(response) {
                                                                alert(response);
                                                                $("#ModalBank").modal('hide');
                                                                fetchdata();
                                                            }
                                                        });
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                        <!-- Single Tab Content End -->

                                        <!-- thong tin tai khoan -->
                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="account-info" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>Thông tin tài khoản</h3>
                                                <div class="account-details-form">
                                                    <form id="frm-edit" method="POST" enctype="multipart/form-data">
                                                        <div class="single-input-item">
                                                            <label for="username" class="required">Tài khoản</label>
                                                            <input type="text" id="username" value="<?php echo $info_username ?>" disabled />
                                                        </div>
                                                        <div class="single-input-item">
                                                            <label for="name" class="required">Họ tên</label>
                                                            <input type="text" id="yourname" placeholder="Nhập họ tên" value="<?php echo $info_name ?>" />
                                                        </div>
                                                        <div class="single-input-item">
                                                            <label for="phone" class="required">Số điện thoại</label>
                                                            <input type="number" id="phone" placeholder="Nhập số điện thoại" value="<?php echo $info_phone ?>" />
                                                        </div>
                                                        <div class="single-input-item">
                                                            <label for="email" class="required">Email</label>
                                                            <input type="email" id="email" placeholder="Nhập email" value="<?php echo $info_email ?>" />
                                                        </div>
                                                        <div class="single-input-item">
                                                            <label for="address" class="required">Địa chỉ</label>
                                                            <input type="text" id="address" placeholder="Nhập địa chỉ" value="<?php echo $info_address ?>" />
                                                        </div>
                                                        <fieldset>
                                                            <legend>Đổi mật khẩu</legend>
                                                            <div class="single-input-item">
                                                                <label for="current-pwd" class="required">Mật khẩu hiện tại</label>
                                                                <input type="password" id="current-pwd" placeholder="Nhập mật khẩu hiện tại" value="<?php echo $info_password ?>" />
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="new-pwd" class="required">Mật khẩu mới</label>
                                                                        <input type="password" id="new-pwd" placeholder="Nhập mật khẩu mới" value="<?php echo $info_password ?>" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="confirm-pwd" class="required">Nhập lại mật khẩu mới</label>
                                                                        <input type="password" id="confirm-pwd" placeholder="Nhập lại mật khẩu mới" value="<?php echo $info_password ?>" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        <div class="single-input-item">
                                                            <button type="submit" name="edit-user" value="<?php echo $info_id ?>" class="check-btn sqr-btn ">Lưu</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div> <!-- Single Tab Content End -->
                                        <script>
                                            $('#frm-edit').submit(function() {
                                                var edit_id = <?php echo $info_id; ?>;
                                                var edit_name = $('#yourname').val();
                                                var edit_email = $('#email').val();
                                                var edit_address = $('#address').val();
                                                var edit_phone = $('#phone').val();
                                                var edit_pwd = $('#current-pwd').val();
                                                var edit_new_pwd = $('#new-pwd').val();
                                                var edit_crm_pwd = $('#confirm-pwd').val();

                                                $.ajax({
                                                    method: 'POST',
                                                    url: 'inc/process.php',
                                                    data: {
                                                        edit_user: edit_id,
                                                        edit_name: edit_name,
                                                        edit_phone: edit_phone,
                                                        edit_email: edit_email,
                                                        edit_address: edit_address,
                                                        current_pwd: edit_pwd,
                                                        new_pwd: edit_new_pwd,
                                                        confirm_pwd: edit_crm_pwd
                                                    },
                                                    success: function(response) {
                                                        alert(response);
                                                    }
                                                });
                                                return false;
                                            });
                                        </script>
                                    </div>
                                </div> <!-- My Account Tab Content End -->
                            </div>
                        </div> <!-- My Account Page End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- my account wrapper end -->

        <!-- row start -->

        <!-- row end -->

        <!-- brand area start -->
        <?php require_once('inc/branded.php') ?>
        <!-- brand area end -->

        <!-- footer area start -->
        <?php require_once('inc/footer.php') ?>