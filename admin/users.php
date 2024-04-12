<?php require_once('inc/top.php'); ?>
<title>Người dùng</title>
<?php
//lock/unlock user
if (isset($_GET['lockon']) and isset($_SESSION['usernameadmin'])) {
    $upstatus = $_GET['lockon'];
    $status = $_GET['status'];
    if ($status == '1') {
        $status_new = $status - 1;
    } else {
        $status_new = $status + 1;
    }
    $upstatus_query = "UPDATE taikhoan SET StatusTK = '$status_new' WHERE Idtk = '$upstatus'";
    if ($conn->query($upstatus_query)) {
        echo "<script>alert('Cập nhật trạng thái người dùng thành công.');window.location='./users.php'</script>";
    } else {
        echo "<script>alert('Cập nhật trạng thái người dùng thất bại.');window.location='./users.php'</script>";
    }
}
?>
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
                        <li class="breadcrumb-item active">Người dùng</li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid ">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h3>Người dùng</h3>
                            </div>
                            <div class="pb-3">
                                <div class="input-group">
                                    <input type="search" id="search" name="search" class="form-control rounded" placeholder="Tìm kiếm" aria-label="Search" aria-describedby="search-addon" />
                                    <button type="submit" id="btn-search" class="btn btn-outline-primary">search</button>
                                </div>
                            </div>
                            <script>
                                function fetchdata(page) {
                                    var search = $('#search').val();
                                    $.ajax({
                                        method: 'GET',
                                        url: 'users-table.php',
                                        data: {
                                            search: search,
                                            page: page
                                        },
                                        success: function(data) {
                                            $('#data-output').html(data);
                                        }
                                    });
                                }
                                fetchdata();
                                $('#search').keypress(function() {
                                    fetchdata();
                                });
                                $('#btn-search').click(function() {
                                    fetchdata();
                                });
                                $(document).on("click", ".page-item", function() {
                                    var page = $(this).attr("id");
                                    fetchdata(page);
                                });
                            </script>
                            <a href='user-add.php'>
                                <button style="margin-bottom: 20px" class='btn btn-primary'><span style="margin-right: 10px">Thêm người dùng</span><i class="fa fa-plus"></i></button>
                                </span></a>
                            <div class="table-responsive" id="data-output"></div>
                        </div>
                    </div>
                    <?php
                    $query = "SELECT * FROM users u
                    LEFT JOIN users_payment upay ON u.Idtk = upay.Idtk";
                    $run = $conn->query($query);
                    if ($run->num_rows > 0) {
                        while ($row = $run->fetch_array()) {
                            $user_id = $row['Idtk'];
                            $user_name = $row['Ten'];
                            $user_email = $row['Mail'];
                            $user_phone = $row['Sdt'];
                            $user_address = $row['Diachi'];
                    ?>
                            <div class="modal fade" id="exampleModalLong<?php echo $user_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle<?php echo $user_id ?>" style="color:#7571f9;">Danh sách ngân hàng của <?php echo $user_name ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="table-responsive">
                                                    <table id="table-detail-<?php echo $user_id ?>" class="table table-bordered table-striped table-hover">
                                                        <tr>
                                                            <th>Stt</th>
                                                            <th>Ngân hàng</th>
                                                            <th>Số tài khoản</th>
                                                            <th>Tên tài khoản</th>
                                                        </tr>
                                                        <?php
                                                        $querybank = "SELECT * FROM users_payment
                                                                            WHERE Idtk = '$user_id'";
                                                        $runbank = $conn->query($querybank);
                                                        $bank_count = 0;
                                                        if ($runbank->num_rows > 0) {
                                                            while ($rowbank = $runbank->fetch_array()) {
                                                                $bank_count++;
                                                                $bank_name = $rowbank['Bank'];
                                                                $bank_num = $rowbank['Sotk'];
                                                                $bank_acc = $rowbank['Tentk'];
                                                        ?>
                                                                <tr>
                                                                    <td><?php echo $bank_count ?></td>
                                                                    <td><?php echo $bank_name ?></td>
                                                                    <td> <?php echo $bank_num ?></td>
                                                                    <td> <?php echo $bank_acc ?></td>
                                                                </tr>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
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
                        echo "0";
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