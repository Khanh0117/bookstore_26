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
} else {
    $pages = 1;
}
$start = ($pages - 1) * $limit;

$query = "SELECT * FROM hoadon hd 
LEFT JOIN taikhoan tk ON tk.Idtk = hd.Idtk 
LEFT JOIN users u ON u.Idtk = tk.Idtk
WHERE CONCAT(Idhd,Ten,Diachi,Ngaymua,IFNULL(Ngaynhan, '')) LIKE '%$searchkey%'
ORDER BY hd.statusHD ASC
LIMIT $start, $limit";

$querypage = "SELECT * FROM hoadon hd 
LEFT JOIN taikhoan tk ON tk.Idtk = hd.Idtk 
LEFT JOIN users u ON u.Idtk = tk.Idtk
WHERE CONCAT(Idhd,Ten,Diachi,Ngaymua,IFNULL(Ngaynhan, '')) LIKE '%$searchkey%'
ORDER BY hd.statusHD ASC";

$run_page = $conn->query($querypage);
$num_row_page = $run_page->num_rows;
$total_pages = ceil($num_row_page / $limit);

?>
<style>
    .selectdiv {
        position: relative;
        /*Don't really need this just for demo styling*/

        float: left;
        min-width: 180px;
        /* margin: 50px 33%; */
    }

    /* IE11 hide native button (thanks Matt!) */
    select::-ms-expand {
        display: none;
    }

    .selectdiv:after {
        content: '<>';
        font: 16px "Consolas", monospace;
        color: #333;
        -webkit-transform: rotate(90deg);
        -moz-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        transform: rotate(90deg);
        right: 11px;
        /*Adjust for position however you want*/

        top: 18px;
        padding: 0 0 2px;
        border-bottom: 1px solid #999;
        /*left line */

        position: absolute;
        pointer-events: none;
    }

    .selectdiv select {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        /* Add some styling */

        display: block;
        width: 100%;
        max-width: 320px;
        height: 50px;
        float: right;
        margin: 5px 0px;
        padding: 0px 24px;
        font-size: 14px;
        line-height: 1.75;
        color: #333;
        background-color: #ffffff;
        background-image: none;
        border: 1px solid #cccccc;
        -ms-word-break: normal;
        word-break: normal;
    }
</style>
<table id="order-table" class="table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <th>Mã đơn</th>
            <th>Tên khách hàng</th>
            <th>Địa chỉ</th>
            <th>Ngày mua</th>
            <th>Ngày giao</th>
            <th>Tình trạng</th>
            <th>Chi tiết đơn hàng</th>
            <th>Hủy</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $run = $conn->query($query);
        if ($run->num_rows > 0) {
            while ($row = $run->fetch_array()) {
                $hd_id = $row['Idhd'];
                $name = $row['Ten'];
                $address = $row['Diachi'];
                $ngay_mua = $row['Ngaymua'];
                $ngay_nhan = $row['Ngaynhan'];
                $hd_status = $row['StatusHD'];
        ?>
                <tr>
                    <td><?php echo $hd_id ?></td>
                    <td><?php echo $name ?></td>
                    <td><?php echo $address ?></td>
                    <td><?php echo $ngay_mua ?></td>
                    <td><?php echo $ngay_nhan ?></td>
                    <td>
                        <!-- <a id="hd_upstatus<?php echo $hd_id; ?>">
                            <p hidden id="hd-id<?php echo $hd_id; ?>"><?php echo $hd_id; ?></p>
                            <p hidden id="hd_status<?php echo $hd_id; ?>"><?php echo $hd_status ?></p>
                            <?php
                            if ($hd_status == '1') {
                            ?>
                                <button type="button" class="btn btn-info">Chưa xác nhận</button>
                            <?php
                            }
                            if ($hd_status == '2') {
                            ?>
                                <button type="button" class="btn btn-danger">Đã xác nhận</button>
                            <?php
                            }
                            if ($hd_status == '3') {
                            ?>
                                <button type="button" class="btn btn-success" style="color:#fff;" disabled>Đã giao</button>
                            <?php
                            }
                            ?>
                        </a> -->
                        <div class="selectdiv">
                        <p hidden id="hd-id<?php echo $hd_id; ?>"><?php echo $hd_id; ?></p>
                            <label>
                                <select name="hd_upstatus" id="hd_upstatus<?php echo $hd_id; ?>" <?php if($hd_status == '3' || $hd_status == '4' ) echo "disabled"; ?> >
                                    <option <?php if($hd_status=='1') echo "selected"; ?> value="1">Chưa xác nhận</option>
                                    <option <?php if($hd_status=='2') echo "selected"; ?> value="2">Đã xác nhận</option>
                                    <option <?php if($hd_status=='3') echo "selected"; ?> value="3">Đã giao</option>
                                    <?php if($hd_status=='4') echo '<option selected value="4">Đã hủy</option>' ?>            
                                </select>
                            </label>
                        </div>

                    </td>
                    <script>
                        // $('#hd_upstatus<?php echo $hd_id; ?>').click(function() {
                        //     var hd_id = $('#hd-id<?php echo $hd_id; ?>').text();
                        //     var hd_status = $('#hd_status<?php echo $hd_id; ?>').text();
                        //     $.ajax({
                        //         method: 'GET',
                        //         url: 'inc/process.php',
                        //         data: {
                        //             hd_upstatus: hd_id,
                        //             hd_status: hd_status
                        //         },
                        //         success: function(response) {
                        //             alert(response);
                        //             fetchdata();
                        //         }
                        //     });
                        // });

                        $('#hd_upstatus<?php echo $hd_id; ?>').change(function() {
                            var hd_id = $('#hd-id<?php echo $hd_id; ?>').text();
                            var hd_status = $(this).find('option:selected').val();
                            $.ajax({
                                method: 'GET',
                                url: 'inc/process.php',
                                data: {
                                    hd_upstatus: hd_id,
                                    hd_status: hd_status
                                },
                                success: function(response) {
                                    alert(response);
                                    fetchdata();
                                }
                            });
                        });
                    </script>
                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong<?php echo $hd_id ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></td>
                    <td><button <?php if($hd_status == '3') echo "disabled"; ?> type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?php echo $hd_id ?>"><i class="fa fa-trash-o"></i></button></td>
                </tr>
        <?php
            }
        } else {
            echo "Hiện tại không có đơn hàng";
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