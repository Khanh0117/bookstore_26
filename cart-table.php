<?php
session_start();
$subtotal = 0;
$total = 0;
?>
<style>
    .pro-remove .del_cart_item:hover {
        cursor: pointer;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <!-- Cart Table Area -->
        <div class="cart-table table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="pro-thumbnail">Ảnh sản phẩm</th>
                        <th class="pro-title">Sách</th>
                        <th class="pro-price">Đơn giá</th>
                        <th class="pro-quantity">Số lượng</th>
                        <th class="pro-subtotal">Thành tiền</th>
                        <th class="pro-remove">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_SESSION['cart'])) {
                        foreach ($_SESSION["cart"] as &$sp) {
                            if ($sp['cusID'] == $_SESSION['customer']) {
                                $id_sp = $sp['id'];
                                $name = $sp['name'];
                                $price = $sp['price'];
                                $quantity = $sp['quantity'];
                                $img = $sp['img'];

                                $subtotal = $price * $quantity;
                                $total += $subtotal;
                    ?>
                                <tr>
                                    <td class="pro-thumbnail"><a href="product.php?id=<?php echo $id_sp ?>"><img class="img-fluid" src="admin/product-img/<?php echo $img ?>" alt="Product" /></a></td>
                                    <td class="pro-title"><a href="product.php?id=<?php echo $id_sp ?>"><?php echo $name ?></a></td>
                                    <td class="pro-price"><span><?php echo $price ?></span></td>
                                    <td class="pro-quantity">
                                        <div class="pro-qty"><input type="text" value="<?php echo $quantity ?>" class="qnty-cart" id="<?php echo $id_sp ?>"></div>
                                    </td>
                                    <td class="pro-subtotal"><span><?php echo $subtotal ?></span></td>
                                    <td class="pro-remove"><a id="<?php echo $id_sp ?>" class="del_cart_item"><i class="fa fa-trash-o"></i></a></td>
                                </tr>
                    <?php
                            }
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Cart Update Option -->
        <div class="cart-update-option d-block d-md-flex justify-content-between">
            <div class="apply-coupon-wrapper">
                <form action="#" method="post" class=" d-block d-md-flex">
                    <input type="text" placeholder="Nhập mã giảm giá (không nhập được đâu, nên kệ dòng này đi nhá)" required />
                    <button class="sqr-btn">Nhập</button>
                </form>
            </div>
            <div class="cart-update mt-sm-16">
                <a href="inc/process.php?del_cart=all&del" class="sqr-btn">Xóa hết</a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-5 ml-auto">
        <!-- Cart Calculation Area -->
        <div class="cart-calculator-wrapper">
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
            <a href="checkout.php" class="sqr-btn d-block">Thanh toán</a>
        </div>
    </div>
</div>

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
                if (oldValue > 0) {
                    var newVal = parseFloat(oldValue) - 1;
                } else {
                    newVal = 0;
                }
            }
            $button.parent().find('input').val(newVal);
            var id = $button.parent().find('input').attr("id");

            $.ajax({
                method: 'POST',
                url: 'inc/process.php',
                data: {
                    up_cart: id,
                    up_cart_qty: newVal
                },
                success: function(response) {
                    fetchdata();
                }
            });

        });

        //update cart quantity
        $('.qnty-cart').change(function() {
            var id = $(this).attr("id");
            var newVal = $(this).val();
            $.ajax({
                method: 'POST',
                url: 'inc/process.php',
                data: {
                    up_cart: id,
                    up_cart_qty: newVal
                },
                success: function(response) {
                    fetchdata();
                }
            });
        });

        //del cart item
        $(document).on("click", ".del_cart_item", function() {
            var id = $(this).attr("id");

            $.ajax({
                method: 'GET',
                url: 'inc/process.php',
                data: {
                    del_cart: id
                },
                success: function(response) {
                    fetchdata();
                }
            });
        });

    });
</script>