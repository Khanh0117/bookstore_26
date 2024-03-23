<?php require_once('inc/top.php') ?>
<!-- Site title -->
<title>Đăng ký</title>
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
                                    <li class="breadcrumb-item active" aria-current="page">Đăng ký</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- row start -->
        <!-- login register wrapper start -->
        <div class="login-register-wrapper">
            <div class="container">
                <div class="member-area-from-wrap">
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <!-- Register Content Start -->
                        <div class="col-lg-6">
                            <div class="login-reg-form-wrap mt-md-34 mt-sm-34">
                                <h2 style="margin: 0%;">Đăng ký</h2>
                                <span>Bạn đã có tài khoản? <a href="login.php">Đăng nhập</a></span>
                                <form action="./inc/process.php?register" method="POST" enctype="multipart/form-data">
                                    <div class="single-input-item">
                                        <label for="name">Họ tên</label>
                                        <input type="text" name="name" placeholder="Nhập họ tên" required />
                                    </div>
                                    <div class="single-input-item">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" placeholder="Nhập Email" required />
                                    </div>
                                    <div class="single-input-item">
                                        <label for="phone">Số điện thoại</label>
                                        <input type="number" name="phone" placeholder="Nhập số điện thoại" required />
                                    </div>
                                    <div class="single-input-item">
                                        <label for="username">Tài khoản</label>
                                        <input type="text" name="username" placeholder="Nhập tài khoản" required />
                                    </div>
                                    <div class="single-input-item">
                                        <label for="password">Mật khẩu</label>
                                        <input type="password" name="password" placeholder="Nhập mật khẩu" required />
                                    </div>
                                    <div class="single-input-item">
                                        <button type="submit" name="register" class="sqr-btn">Đăng ký</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Register Content End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- login register wrapper end -->
        <!-- row end -->

        <!-- brand area start -->
        <?php require_once('inc/branded.php') ?>
        <!-- brand area end -->

        <!-- footer area start -->
        <?php require_once('inc/footer.php') ?>