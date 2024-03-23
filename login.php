<?php require_once('inc/top.php');

if (isset($_SESSION['customer'])) {
    echo "<script>alert('Bạn đã đăng nhập.');window.history.back();</script>";

} else if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $check_query = "SELECT * from taikhoan where Username = '$username'";
    $check_run = $conn->query($check_query);

    if ($check_run->num_rows > 0) {
        $row = $check_run->fetch_array();
        $db_id = $row['Idtk'];
        $db_username = $row['Username'];
        $db_password = $row['Password'];
        $db_role_id = $row['Idrole'];
        $db_status = $row['StatusTK'];
        if($db_status == '1'){
            if ($username == $db_username && $password == $db_password) {
                session_start();
                $_SESSION['customer'] = $db_id;
                header('location: index.php');	
            } else {
                $error = "Sai mật khẩu!";
            }
        }else{
            $error = "Tài khoản hiện đang bị tạm khóa, xin hãy liên hệ đến bộ phận cskh.";
        }
        
    } else {
        $error = "Tài khoản không tồn tại!";
    }
    // echo $error;
}
?>
<!-- Site title -->
<title>Đăng nhập</title>
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
                                    <li class="breadcrumb-item active" aria-current="page">Đăng nhập</li>
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
                        <!-- Login Content Start -->
                        <div class="col-lg-6">
                            <div class="login-reg-form-wrap  pr-lg-50">
                                <h2 style="margin: 0%;">Đăng nhập</h2>
                                <span>Bạn chưa có tài khoản? <a href="register.php">Đăng ký</a></span>
                                    <?php
                                    if (isset($error)) {
                                        echo "<p style='color:red;'>$error</p>";
                                    }
                                    ?>
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="single-input-item">
                                        <label for="username">Tài khoản</label>
                                        <input type="text" name="username" placeholder="Nhập tài khoản" required />
                                    </div>
                                    <div class="single-input-item">
                                        <label for="password">Mật khẩu</label>
                                        <input type="password" name="password" placeholder="Nhập mật khẩu" required />
                                    </div>
                                    <div class="single-input-item">
                                        <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                            <div class="remember-meta">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="rememberMe">
                                                    <label class="custom-control-label" for="rememberMe">Nhớ tài khoản</label>
                                                </div>
                                            </div>
                                            <a href="#" class="forget-pwd">Quên mật khẩu</a>
                                        </div>
                                    </div>
                                    <div class="single-input-item">
                                        <button type="submit" name="login" class="sqr-btn">Đăng nhập</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Login Content End -->
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