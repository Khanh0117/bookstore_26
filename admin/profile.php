<?php require_once('inc/top.php'); ?>
<title>Profile</title>

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
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="basic-list-group">
                                    <div class="row">
                                        <div class="col-xl-4 col-md-4 col-sm-3 mb-4 mb-sm-0">
                                            <div class="list-group" id="list-tab" role="tablist"> <a class="list-group-item list-group-item-action active show" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a> <a class="list-group-item list-group-item-action" id="list-edit-profile-list" data-toggle="list" href="#list-edit-profile" role="tab" aria-controls="editprofile" aria-selected="false">Edit Profile</a> </div>
                                        </div>
                                        <div class="col-xl-8 col-md-8 col-sm-9">
                                            <div class="tab-content" id="nav-tabContent">
                                                <div class="tab-pane fade active show" id="list-profile">
                                                    <div class="panel-body">
                                                        <div class="row-title">
                                                            <h4>Tài khoản</h4>
                                                        </div>
                                                        <p><strong>Username:</strong> <?php echo $info_username ?></p>
                                                        <p><strong>Họ tên:</strong> <?php echo $info_name ?></p>
                                                        <p><strong>Số điện thoại:</strong> <?php echo $info_phone ?></p>
                                                        <p><strong>Email:</strong> <?php echo $info_email ?></p>
                                                        <p><strong>Địa chỉ:</strong> <?php echo $info_address ?></p>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="list-edit-profile" role="tabpanel">
                                                    <div class="panel-body">
                                                        <div class="row-title">
                                                            <h4>Sửa thông tin tài khoản</h4>
                                                        </div>
                                                        <div class="form-validation">
                                                            <form class="form-valide" action="inc/process.php" method="post">
                                                                <div class="form-group row">
                                                                    <label class="col-md-2 col-form-label" for="val-yourname">Họ tên <span class="text-danger">*</span> </label>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control" id="val-yourname" name="yourname" placeholder="Họ tên..." value="<?php echo $info_name; ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-md-2 col-form-label" for="val-phoneus">Số điện thoại <span class="text-danger">*</span> </label>
                                                                    <div class="col-md-8">
                                                                        <input type="number" class="form-control" id="val-phoneus" name="phone" placeholder="19008080" value="<?php echo $info_phone; ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-md-2 col-form-label" for="val-email">Email <span class="text-danger">*</span> </label>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control" id="val-email" name="val-email" placeholder="Nhập email của bạn..." value="<?php echo $info_email; ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-md-2 col-form-label" for="val-address">Địa chỉ <span class="text-danger">*</span> </label>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control" id="val-address" name="address" placeholder="Địa chỉ..." value="<?php echo $info_address; ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-md-2 col-form-label" for="val-username">Username <span class="text-danger">*</span> </label>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control" id="val-username" name="username" placeholder="Username..." value="<?php echo $info_username; ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-md-2 col-form-label" for="val-password">Password <span class="text-danger">*</span> </label>
                                                                    <div class="col-md-8">
                                                                        <input type="password" class="form-control" id="val-password" name="password" placeholder="Password..." value="<?php echo $info_password; ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-md-2 col-form-label" for="val-confirm-password">Nhập lại Password <span class="text-danger">*</span> </label>
                                                                    <div class="col-md-8">
                                                                        <input type="password" class="form-control" id="val-confirm-password" name="val-confirm-password" placeholder="Repeat password" value="<?php echo $info_password; ?>" required>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <button type="submit" class="btn btn-primary" name="edit-user" value="<?php echo $info_id; ?>">Sửa</button>
                                                                </div>
                                                            </form>
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