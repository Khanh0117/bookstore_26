<?php require_once('inc/top.php');
$subtotal = 0;
$total = 0;

if(!isset($_SESSION['customer'])){
    header('location: login.php');
}
?>
<!-- Site title -->
<title>Giỏ hàng</title>
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
                                    <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- row start -->
        <!-- cart main wrapper start -->
        <div class="cart-main-wrapper">
            <div class="container" id="cart-output">

            </div>
        </div>
        <!-- cart main wrapper end -->
        <!-- row end -->
        <script>
            function fetchdata() {
                $.get("cart-table.php", function(data) {
                    $("#cart-output").html(data);
                });
            };
            fetchdata();
        </script>
        <!-- brand area start -->
        <?php require_once('inc/branded.php') ?>
        <!-- brand area end -->

        <!-- footer area start -->
        <?php require_once('inc/footer.php') ?>