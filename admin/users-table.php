<?php
require_once('inc/db.php');

session_start();

if (!isset($_SESSION['usernameadmin'])) {
    header('location: ../page-login.php');
}

$pages = 0;
$limit = 8;
$searchkey = $_GET['search'];

if (isset($_GET['page'])) {
    $pages = $_GET['page'];
}else{
    $pages = 1;
}
$start = ($pages - 1) * $limit;

$query = "SELECT * FROM taikhoan tk 
LEFT JOIN `role` r ON tk.Idrole = r.Idrole 
LEFT JOIN users u ON u.Idtk = tk.Idtk
WHERE CONCAT(tk.Idtk,Ten,Mail,Sdt,Diachi,Username,Rolename) LIKE'%$searchkey%'
ORDER BY tk.Idtk asc
LIMIT $start, $limit";

$querypage = "SELECT * FROM taikhoan tk 
LEFT JOIN `role` r ON tk.Idrole = r.Idrole 
LEFT JOIN users u ON u.Idtk = tk.Idtk
WHERE CONCAT(tk.Idtk,Ten,Mail,Sdt,Diachi,Username,Rolename) LIKE'%$searchkey%'
ORDER BY tk.Idtk asc;";

$run_page = $conn->query($querypage);
$num_row_page = $run_page->num_rows;
$total_pages = ceil($num_row_page / $limit);

?>
<table class="table table-bordered table-striped table-hover" style="width: 100rem;">
    <thead>
    </thead>
    <thead>
        <tr>
            <th style="width: 5%;">ID</th>
            <th style="width: 13%;">Tên</th>
            <th style="width: 13%;">Email</th>
            <th style="width: 10%;">Số điện thoại</th>
            <th style="width: 15%;">Địa chỉ</th>
            <th style="width: 5%;">Payment</th>
            <th style="width: 11%;">Username</th>
            <th style="width: 11%;">Password</th>
            <th style="width: 7%;">Quyền hạn</th>
            <th style="width: 5%;">Sửa</th>
            <th style="width: 5%;">Khóa/Mở</th>
        </tr>
    </thead>
    <tbody>
        <?php
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
                $user_permission = $row['Rolename'];
                $user_password = md5($user_password);
                $user_status = $row['StatusTK'];
        ?>
                <tr>
                    <td><?php echo $user_id ?></a></td>
                    <td><?php echo $user_name ?></a></td>
                    <td><?php echo $user_email ?></td>
                    <td><?php echo $user_phone ?></td>
                    <td><?php echo $user_address ?></td>
                    <td>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalLong<?php echo $user_id ?>">Bank</button>
                    </td>
                    <td><?php echo $user_username ?></td>
                    <td id="pw<?php echo $user_id ?>" onClick="showhidepw<?php echo $user_id ?>()">******</td>
                    <script>
                        function showhidepw<?php echo $user_id ?>() {
                            var passwork = document.getElementById("pw<?php echo $user_id ?>").innerHTML;
                            if (passwork == ("******")) {
                                $("#pw<?php echo $user_id ?>").html("<?php echo $user_password ?>");
                            } else {
                                $("#pw<?php echo $user_id ?>").html("******");
                            }
                        }
                    </script>

                    <td><span class="label gradient-5 rounded"><?php echo $user_permission ?></span></td>
                    <td><a <?php echo "href='user-edit.php?edit=$user_id'"; ?>>
                            <button class="btn btn-primary"><i class="fa fa-pencil"></i></button>
                        </a></td>
                    <td>
                        <?php
                        if ($user_status == '1') {
                        ?>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?php echo $user_id ?>"><i class="fa fa-lock"></i></button>
                        <?php
                        }
                        if ($user_status == '0') {
                        ?>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal2<?php echo $user_id ?>"><i class="fa fa-unlock-alt"></i></button>
                        <?php
                        }
                        ?>
                    </td>
                </tr>

                <!-- lock user -->
                <div class="modal fade" id="exampleModal<?php echo $user_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="exampleModalLabel<?php echo $user_id ?>" style="margin: auto;text-align: center;">
                                    <svg width="24" height="24" class="dialog-content__icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 8.25C12.4142 8.25 12.75 8.58579 12.75 9V13.5C12.75 13.9142 12.4142 14.25 12 14.25C11.5858 14.25 11.25 13.9142 11.25 13.5V9C11.25 8.58579 11.5858 8.25 12 8.25Z" fill="#FC820A"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0052 4.45201C10.8464 2.83971 13.1536 2.83971 13.9948 4.45201L20.5203 16.9592C21.3019 18.4572 20.2151 20.25 18.5255 20.25H5.47447C3.78487 20.25 2.69811 18.4572 3.47966 16.9592L10.0052 4.45201ZM12.6649 5.14586C12.3845 4.60842 11.6154 4.60842 11.335 5.14586L4.80953 17.6531C4.54902 18.1524 4.91127 18.75 5.47447 18.75H18.5255C19.0887 18.75 19.4509 18.1524 19.1904 17.6531L12.6649 5.14586Z" fill="#FC820A"></path>
                                        <path d="M12 17.25C12.6213 17.25 13.125 16.7463 13.125 16.125C13.125 15.5037 12.6213 15 12 15C11.3787 15 10.875 15.5037 10.875 16.125C10.875 16.7463 11.3787 17.25 12 17.25Z" fill="#FC820A"></path>
                                    </svg>
                                    Khóa người dùng
                                </h3>
                            </div>
                            <div class="modal-body" style="margin: auto;">
                                <h6 style="font-family: Roboto,Helvetica,Arial,sans-serif; font-size:16px;">Bạn có chắc muốn khóa người dùng này không?</h6>
                            </div>
                            <div class="modal-footer" style="margin: auto;">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Hủy</button>
                                <a href="users.php?lockon=<?php echo $user_id ?>&status=<?php echo $user_status ?>">
                                    <button type="button" class="btn btn-outline-danger">Xác nhận</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- unlock user -->
                <div class="modal fade" id="exampleModal2<?php echo $user_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="exampleModalLabel<?php echo $user_id ?>" style="margin: auto;">
                                    <svg width="24" height="24" class="dialog-content__icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 8.25C12.4142 8.25 12.75 8.58579 12.75 9V13.5C12.75 13.9142 12.4142 14.25 12 14.25C11.5858 14.25 11.25 13.9142 11.25 13.5V9C11.25 8.58579 11.5858 8.25 12 8.25Z" fill="#FC820A"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0052 4.45201C10.8464 2.83971 13.1536 2.83971 13.9948 4.45201L20.5203 16.9592C21.3019 18.4572 20.2151 20.25 18.5255 20.25H5.47447C3.78487 20.25 2.69811 18.4572 3.47966 16.9592L10.0052 4.45201ZM12.6649 5.14586C12.3845 4.60842 11.6154 4.60842 11.335 5.14586L4.80953 17.6531C4.54902 18.1524 4.91127 18.75 5.47447 18.75H18.5255C19.0887 18.75 19.4509 18.1524 19.1904 17.6531L12.6649 5.14586Z" fill="#FC820A"></path>
                                        <path d="M12 17.25C12.6213 17.25 13.125 16.7463 13.125 16.125C13.125 15.5037 12.6213 15 12 15C11.3787 15 10.875 15.5037 10.875 16.125C10.875 16.7463 11.3787 17.25 12 17.25Z" fill="#FC820A"></path>
                                    </svg>
                                    Mở khóa người dùng
                                </h3>
                            </div>
                            <div class="modal-body" style="margin: auto;">
                                <h6 style="font-family: Roboto,Helvetica,Arial,sans-serif; font-size:16px;">Bạn có chắc muốn mở khóa người dùng này?</h6>
                            </div>
                            <div class="modal-footer" style="margin: auto;">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Hủy</button>
                                <a href="users.php?lockon=<?php echo $user_id ?>&status=<?php echo $user_status ?>">
                                    <button type="button" class="btn btn-outline-success">Xác nhận</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "Người dùng: 0";
        }
        ?>
    </tbody>

</table>

<div class="page-info">
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <?php
            if ($pages > 1) {
                $previous = $pages - 1;
            ?>
                <li class="page-item" id="<?php echo $previous ?>"><a class="page-link">Previous</a></li>
            <?php
            } else {
            ?>
                <li class="page-item disable"><a class="page-link">Previous</a></li>
            <?php
            }
            for ($i = 1; $i <= $total_pages; $i++) {
                $active_class = "";
                if ($i == $pages) {
                    $active_class = "active";
                }
            ?>
                <li class="page-item <?php echo $active_class ?>" id="<?php echo $i ?>"><a class="page-link"><?php echo $i ?></a></li>
            <?php
            }
            ?>
            <?php
            if ($pages < $total_pages) {
                $pages++; {
            ?>
                    <li class="page-item" id="<?php echo $pages ?>"><a class="page-link">Next</a></li>

                <?php
                }
            } else {
                ?>
                <li class="page-item disable"><a class="page-link">Next</a></li>
            <?php
            }
            ?>
        </ul>
    </nav>
</div>