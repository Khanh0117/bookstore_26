<?php
session_start();

$count = 0;
if (isset($_SESSION['cart']) && isset($_SESSION['customer'])) {
    foreach ($_SESSION["cart"] as $temp) {
        if ($temp['cusID'] == $_SESSION['customer']) {
            $count += 1;
        }
    }
}
$submoney = 0;
$money = 0;
?>

<div class="mini-cart-btn">
    <i class="fa fa-shopping-cart"></i>
    <span class="cart-notification"><?php echo $count ?></span>
</div>
<div class="cart-total-price">
    <span>Giỏ hàng</span>
</div>
<ul class="cart-list">
    <?php
    if (isset($_SESSION['cart']) && isset($_SESSION['customer'])) {
        foreach ($_SESSION["cart"] as &$sp) {
            if ($sp['cusID'] == $_SESSION['customer']) {
                $id_sp = $sp['id'];
                $name = $sp['name'];
                $price = $sp['price'];
                $quantity = $sp['quantity'];
                $img = $sp['img'];

                $submoney = $price * $quantity;
                $money += $submoney;
        ?>

                <li>
                    <div class="cart-img">
                        <a href="product.php?id=<?php echo $id_sp ?>"><img src="admin/product-img/<?php echo $img ?>" alt=""></a>
                    </div>
                    <div class="cart-info">
                        <h4><a href="product.php?id=<?php echo $id_sp ?>"><?php echo $name ?></a></h4>
                        <span>$<?php echo $price ?></span>
                        <p>Số lượng: <?php echo $quantity ?></p>
                    </div>
                    <div class="del-icon" id="<?php echo $id_sp ?>">
                        <i class="fa fa-times"></i>
                    </div>
                </li>
        <?php
            }
        }
    }
    ?>
    <li class="mini-cart-price">
        <span class="subtotal">Thành tiền : </span>
        <span class="subtotal-price"><?php echo $money ?></span>
    </li>
    <li class="checkout-btn">
        <a href="cart.php">Xem giỏ hàng</a>
    </li>
</ul>

<script>
    // mini cart toggler
	$(".mini-cart-btn, .cart-total-price").on("click", function (event) {
		event.stopPropagation();
		event.preventDefault();
		$(".cart-list").slideToggle();
	});

    //del cart item
    $(document).on("click", ".del-icon", function() {
            var id = $(this).attr("id");

            $.ajax({
                method: 'GET',
                url: 'inc/process.php',
                data: {
                    del_cart: id
                },
                success: function(response) {
                    fetchcartmini();
                }
            });
        });
</script>