<?php require_once('inc/top.php'); ?>
<title>Sửa người dùng</title>

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
                        <li class="breadcrumb-item"><a href="./users.php">Người dùng</a></li>
                        <li class="breadcrumb-item active">Sửa người dùng</li>
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
                                    <h3>Sửa người dùng</h3>
                                </div>
                                <?php
                                $id = $_GET['edit'];
                                $query = "SELECT * FROM taikhoan tk 
                                LEFT JOIN users u ON u.Idtk = tk.Idtk WHERE tk.Idtk ='$id'";
                                $run = $conn->query($query);
                                if ($run->num_rows > 0) {
                                    while ($row = $run->fetch_array()) {
                                        $user_id = $row['Idtk'];
                                        $user_name = $row['Ten'];
                                        $user_email = $row['Mail'];
                                        $user_phone = $row['Sdt'];
                                        $user_address = $row['Diachi'];
                                        $user_username = $row['Username'];
                                        $user_password = $row['Password'];
                                ?>
                                        <form action="./inc/process.php?edit_user=<?php echo $user_id ?>" method="POST" enctype="multipart/form-data">

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label" for="val-yourname">Họ tên <span class="text-danger">*</span> </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" id="val-yourname" name="yourname" placeholder="Họ tên..." value="<?php echo $user_name; ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label" for="val-phoneus">Số điện thoại <span class="text-danger">*</span> </label>
                                                <div class="col-md-8">
                                                    <input type="number" class="form-control" id="val-phoneus" name="phone" placeholder="19008080" value="<?php echo $user_phone; ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label" for="val-email">Email <span class="text-danger">*</span> </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" id="val-email" name="val-email" placeholder="Nhập email của bạn..." value="<?php echo $user_email; ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label" for="val-address">Địa chỉ <span class="text-danger">*</span> </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" id="val-address" name="address" placeholder="Địa chỉ..." value="<?php echo $user_address; ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label" for="val-username">Username <span class="text-danger">*</span> </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" id="val-username" name="username" placeholder="Username..." value="<?php echo $user_username; ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label" for="val-password">Password <span class="text-danger">*</span> </label>
                                                <div class="col-md-8">
                                                    <input type="password" class="form-control" id="val-password" name="password" placeholder="Password..." value="<?php echo $user_password; ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary" name="edit-user" value="<?php echo $id; ?>">Sửa</button>
                                            </div>
                                        </form>
                            </div>
                        </div>
                    </div>
            <?php
                                    }
                                } else {
                                    echo "Không tìm thấy người dùng";
                                }
            ?>

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