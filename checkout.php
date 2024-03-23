<?php require_once('inc/top.php');

if (!isset($_SESSION['customer']) && !isset($_SESSION['cart'][$info_id])) {
    header('location: login.php');
}

$query = "SELECT * from taikhoan tk
left join users u on u.Idtk = tk.Idtk
where tk.Idtk = $info_id";

$run = $conn->query($query);
$row = $run->fetch_array();
$id_tk = $row['Idtk'];
$name = $row['Ten'];
$address = $row['Diachi'];
$phone = $row['Sdt'];
$email = $row['Mail'];

$subtotal = 0;
$total = 0;
?>
<!-- Site title -->
<title>Thanh toán</title>

<style>
    .img-checkout {
        width: 5em;
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
                                    <li class="breadcrumb-item"><a href="cart.php">Giỏ hàng</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Thanh toán</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- row start -->
        <!-- checkout main wrapper start -->
        <div class="checkout-page-wrapper">
            <div class="container">

                <div class="row">
                    <!-- Checkout Billing Details -->
                    <div class="col-lg-12">
                        <h2>Thông tin thanh toán</h2>
                        <br>
                        <!-- Checkout Login Coupon Accordion Start -->
                        <div class="checkoutaccordion" id="checkOutAccordion">

                            <div class="card">
                                <h3> <strong><?php echo $name ?> | <?php echo $phone ?></strong> <br> Địa chỉ: <?php echo $address ?> <span data-toggle="collapse" data-target="#couponaccordion">Nhấp vào đây để sửa địa chỉ</span></h3>
                                <div id="couponaccordion" class="collapse" data-parent="#checkOutAccordion">
                                    <div class="card-body">
                                        <div class="cart-update-option">
                                            <div class="apply-coupon-wrapper">
                                                <form action="inc/process.php" method="get" class=" d-block d-md-flex">
                                                    <input type="text" name="edit_address" placeholder="Nhập địa chỉ mới tại đây..." required />
                                                    <button type="submit" class="check-btn sqr-btn">Sửa</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Checkout Login Coupon Accordion End -->

                        <div class="checkout-billing-details-wrap">
                            <div class="billing-form-wrap">
                                <form action="#">
                                    <div class="checkout-box-wrap">
                                        <div class="single-input-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="create_pwd">
                                                <label class="custom-control-label" for="create_pwd">Thêm ghi chú đơn hàng</label>
                                            </div>
                                        </div>
                                        <div class="account-create single-form-row">
                                            <div class="single-input-item">
                                                <label for="ordernote">Ghi chú đơn hàng</label>
                                                <textarea name="ordernote" id="ordernote" cols="30" rows="3" placeholder="Nhập ghi chú của bạn..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <!-- Order Summary Details -->
                    <div class="col-lg-12">
                        <div class="order-summary-details mt-md-26 mt-sm-26">
                            <h2>Kiểm tra lại đơn hàng</h2>
                            <div class="order-summary-content mb-sm-4">
                                <!-- Order Summary Table -->
                                <div class="order-summary-table table-responsive text-center">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Sản phẩm</th>
                                                <th>Đơn giá</th>
                                                <th>Số lượng</th>
                                                <th>Thành tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($_SESSION['cart'])) {
                                                foreach ($_SESSION["cart"] as &$sp) {
                                                    if ($sp['cusID'] == $_SESSION['customer']) {
                                                        $id_sp = $sp['id'];
                                                        $name_pro = $sp['name'];
                                                        $price = $sp['price'];
                                                        $quantity = $sp['quantity'];
                                                        $img = $sp['img'];

                                                        $subtotal = $price * $quantity;
                                                        $total += $subtotal;

                                            ?>
                                                        <tr>
                                                            <td style="text-align: left;"><a href="product.php?id=<?php echo $id_sp ?>"><img class="img-checkout" src="admin/product-img/<?php echo $img ?>" alt=""> <span style="margin-left: 1em;"><?php echo $name_pro ?></span></a> </td>
                                                            <td>$<?php echo $price ?></td>
                                                            <td><?php echo $quantity ?></td>
                                                            <td>$<?php echo $subtotal ?></td>
                                                        </tr>
                                            <?php
                                                    }
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Order Payment Method -->
                                <div class="order-payment-method">
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <div class="single-payment-method show">
                                                <div class="payment-method-name">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="cashon" name="paymentmethod" value="cash" class="custom-control-input" checked />
                                                        <label class="custom-control-label" for="cashon">Thanh toán tiền mặt khi nhân hàng (COD)</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="single-payment-method">
                                                <div class="payment-method-name">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="paypalpayment" name="paymentmethod" value="paypal" class="custom-control-input" />
                                                        <label class="custom-control-label" for="paypalpayment">Thanh toán bằng thẻ quốc tế Visa, Master, JCB <img src="assets/img/paypal-card.jpg" class="img-fluid paypal-card" alt="Paypal" /></label>
                                                    </div>
                                                </div>
                                                <div class="payment-method-details" data-method="paypal">
                                                    <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                                                </div>
                                            </div>
                                            <div class="single-payment-method">
                                                <div class="payment-method-name">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="directbank" name="paymentmethod" value="bank" class="custom-control-input" />
                                                        <label class="custom-control-label" for="directbank">Thanh toán bằng ATM nội địa</label>
                                                    </div>
                                                </div>
                                                <div class="payment-method-details" data-method="bank">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <select id="choose_bank">
                                                                <?php
                                                                $q_bank = "SELECT * from users_payment where Idtk = $info_id";
                                                                $run_bank = $conn->query($q_bank);
                                                                if ($run_bank->num_rows > 0) {
                                                                    while ($row_bank = $run_bank->fetch_array()) {
                                                                        $id_bank = $row_bank['Idpay'];
                                                                        $bank_name = $row_bank['Bank'];
                                                                        $bank_num = $row_bank['Sotk'];
                                                                        $bank_acc = $row_bank['Tentk'];
                                                                ?>
                                                                        <option value="<?php echo $id_bank ?>"><?php echo $bank_name ?> - <?php echo $bank_num ?></option>
                                                                <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <button type="button" class="btn btn-outline-info"><a href="./profile.php">Thêm</a></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="summary-footer-area">
                                                <button type="button" class="check-btn sqr-btn">Đặt hàng</button>
                                            </div>
                                        </div>

                                        <div class="col-lg-5">
                                            <div class="cart-calculator-wrapper" style="margin-top: 0;">
                                                <div class="cart-calculate-items">
                                                    <h3>Tổng tiền</h3>
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <tr>
                                                                <td>Tạm tính</td>
                                                                <td>$<?php echo $total ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Phí ship</td>
                                                                <td>$
                                                                    <?php
                                                                    if ($total != 0) {
                                                                        echo "5";
                                                                    } else {
                                                                        echo "0";
                                                                    }
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <tr class="total">
                                                                <td>Thành tiền</td>
                                                                <td class="total-amount">$
                                                                    <?php
                                                                    if ($total != 0) {
                                                                        $total += 5;
                                                                        echo $total;
                                                                    } else {
                                                                        echo $total;
                                                                    }
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                        </table>
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
            </div>
        </div>
        <!-- checkout main wrapper end -->
        <!-- row end -->

        <script>
            $(document).ready(function() {
                $('.sqr-btn').click(function() {
                    bank_payment ='COD';
                    check = $('#directbank');
                    if(check.is(':checked')){
                        var bank_payment = $('#choose_bank').val();
                    }

                    var note = $('#ordernote').val();
                    $.ajax({
                        method: 'POST',
                        url: 'inc/process.php',
                        data: {
                            checkout_bank: bank_payment,
                            checkout_note: note
                        },
                        success: function(response) {
                            alert(response);
                            window.location.href= "/index.php";
                        }

                    });
                });
            });
        </script>

        <!-- brand area start -->
        <?php require_once('inc/branded.php') ?>
        <!-- brand area end -->

        <!-- footer area start -->
        <?php require_once('inc/footer.php') ?>