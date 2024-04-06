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

$query = "SELECT * from sanpham sp
LEFT JOIN theloai tl on tl.Idloai = sp.Idloai
LEFT JOIN nhaphathanh nph on nph.Idnph = sp.Idnph 
where CONCAT(Idsp,Tensp,Tacgia,Minhhoa,Dichgia,Tennph,Tenloai,Giasp,Giamgia,Giamoi,Loaibia,Sotrang) LIKE '%$searchkey%'
order by sp.Idsp asc
LIMIT $start, $limit";

$querypage = "SELECT * from sanpham sp
LEFT JOIN theloai tl on tl.Idloai = sp.Idloai
LEFT JOIN nhaphathanh nph on nph.Idnph = sp.Idnph
where CONCAT(Idsp,Tensp,Tacgia,Minhhoa,Dichgia,Tennph,Tenloai,Giasp,Giamgia,Giamoi,Loaibia,Sotrang) LIKE '%$searchkey%'
order by sp.Idsp asc";

$run_page = $conn->query($querypage);
$num_row_page = $run_page->num_rows;
$total_pages = ceil($num_row_page / $limit);

?>
<table id="table-order" class="table table-bordered table-striped table-hover" style="width: 100rem;">
    <thead>
        <tr>
            <th style="width: 5%;">Mã sách</th>
            <th style="width: 15%;">Ảnh</th>
            <th style="width: 20%;">Tên sách</th>
            <th style="width: 5%;">Thể loại</th>
            <th style="width: 5%;">Nhà phát hành</th>
            <th style="width: 5%;">Giá</th>
            <th style="width: 5%;">Sale(%)</th>
            <th style="width: 5%;">Giá mới</th>
            <th style="width: 5%;">Tác giả</th>
            <th style="width: 5%;">Minh họa</th>
            <th style="width: 5%;">Dịch giả</th>
            <th style="width: 5%;">Loại bìa</th>
            <th style="width: 5%;">Số trang</th>
            <th style="width: 5%;">Mô tả</th>
            <th style="width: 5%;">Sửa</th>
            <th style="width: 5%;">Xóa/Ẩn</th>
        </tr>
    </thead>
    <tbody id="table-order-body">
        <?php
        $run = $conn->query($query);
        if ($run->num_rows > 0) {
            while ($row = $run->fetch_array()) {
                $pro_id = $row['Idsp'];
                $pro_img = $row['Img'];
                $pro_name = $row['Tensp'];
                $pro_cat = $row['Tenloai'];
                $pro_pub = $row['Tennph'];
                $pro_price = $row['Giasp'];
                $pro_sale = $row['Giamgia'];
                $pro_newprice = $row['Giamoi'];
                $pro_author = $row['Tacgia'];
                $pro_illu = $row['Minhhoa'];
                $pro_trans = $row['Dichgia'];
                $pro_cover = $row['Loaibia'];
                $pro_page = $row['Sotrang'];
                $pro_desc = $row['Mota'];
                $pro_status = $row['StatusSP'];
        ?>
                <tr>
                    <td><?php echo $pro_id ?></td>
                    <td><img src="./product-img/<?php echo $pro_img ?>" alt="" style="width:70%" /></td>
                    <td><?php echo $pro_name ?></td>
                    <td><?php echo $pro_cat ?></td>
                    <td><?php echo $pro_pub ?></td>
                    <td>$<?php echo $pro_price ?></td>
                    <td><?php echo $pro_sale ?>%</td>
                    <td>$<?php echo $pro_newprice ?></td>
                    <td><?php echo $pro_author ?></td>
                    <td><?php echo $pro_illu ?></td>
                    <td><?php echo $pro_trans ?></td>
                    <td><?php echo $pro_cover ?></td>
                    <td><?php echo $pro_page ?></td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLongdesc<?php echo $pro_id ?>">Đọc mô tả</button>
                    </td>
                    <td><a href="./editproduct.php?id=<?php echo $pro_id ?>"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong<?php echo $pro_id ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a></td>
                    <td>
                        <?php
                        if ($pro_status == '1') {
                        ?>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?php echo $pro_id ?>"><i class="fa fa-trash-o"></i></button>
                        <?php
                        }
                        if ($pro_status == '0') {
                        ?>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal2<?php echo $pro_id ?>">Tắt ẩn</button>
                        <?php
                        }
                        ?>
                    </td>
                </tr>

                <!-- del sách -->
                <div class="modal fade" id="exampleModal<?php echo $pro_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="exampleModalLabel<?php echo $pro_id ?>" style="margin: auto;">
                                    <svg width="24" height="24" class="dialog-content__icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 8.25C12.4142 8.25 12.75 8.58579 12.75 9V13.5C12.75 13.9142 12.4142 14.25 12 14.25C11.5858 14.25 11.25 13.9142 11.25 13.5V9C11.25 8.58579 11.5858 8.25 12 8.25Z" fill="#FC820A"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0052 4.45201C10.8464 2.83971 13.1536 2.83971 13.9948 4.45201L20.5203 16.9592C21.3019 18.4572 20.2151 20.25 18.5255 20.25H5.47447C3.78487 20.25 2.69811 18.4572 3.47966 16.9592L10.0052 4.45201ZM12.6649 5.14586C12.3845 4.60842 11.6154 4.60842 11.335 5.14586L4.80953 17.6531C4.54902 18.1524 4.91127 18.75 5.47447 18.75H18.5255C19.0887 18.75 19.4509 18.1524 19.1904 17.6531L12.6649 5.14586Z" fill="#FC820A"></path>
                                        <path d="M12 17.25C12.6213 17.25 13.125 16.7463 13.125 16.125C13.125 15.5037 12.6213 15 12 15C11.3787 15 10.875 15.5037 10.875 16.125C10.875 16.7463 11.3787 17.25 12 17.25Z" fill="#FC820A"></path>
                                    </svg>
                                    Xóa sản phẩm
                                </h3>
                            </div>
                            <div class="modal-body" style="margin: auto;">
                                <h6 style="font-family: Roboto,Helvetica,Arial,sans-serif; font-size:16px;">Bạn có chắc muốn xóa sách này không?</h6>
                            </div>
                            <div class="modal-footer" style="margin: auto;">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Hủy</button>
                                <a href="products.php?del=<?php echo $pro_id ?>&status=<?php echo $pro_status ?>">
                                    <button type="button" class="btn btn-outline-danger">Xác nhận</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- hiển lại sản phẩm -->
                <div class="modal fade" id="exampleModal2<?php echo $pro_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="exampleModalLabel<?php echo $pro_id ?>" style="margin: auto;">
                                    <svg width="24" height="24" class="dialog-content__icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 8.25C12.4142 8.25 12.75 8.58579 12.75 9V13.5C12.75 13.9142 12.4142 14.25 12 14.25C11.5858 14.25 11.25 13.9142 11.25 13.5V9C11.25 8.58579 11.5858 8.25 12 8.25Z" fill="#FC820A"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0052 4.45201C10.8464 2.83971 13.1536 2.83971 13.9948 4.45201L20.5203 16.9592C21.3019 18.4572 20.2151 20.25 18.5255 20.25H5.47447C3.78487 20.25 2.69811 18.4572 3.47966 16.9592L10.0052 4.45201ZM12.6649 5.14586C12.3845 4.60842 11.6154 4.60842 11.335 5.14586L4.80953 17.6531C4.54902 18.1524 4.91127 18.75 5.47447 18.75H18.5255C19.0887 18.75 19.4509 18.1524 19.1904 17.6531L12.6649 5.14586Z" fill="#FC820A"></path>
                                        <path d="M12 17.25C12.6213 17.25 13.125 16.7463 13.125 16.125C13.125 15.5037 12.6213 15 12 15C11.3787 15 10.875 15.5037 10.875 16.125C10.875 16.7463 11.3787 17.25 12 17.25Z" fill="#FC820A"></path>
                                    </svg>
                                    Tắt ẩn sản phẩm
                                </h3>
                            </div>
                            <div class="modal-body" style="margin: auto;">
                                <h6 style="font-family: Roboto,Helvetica,Arial,sans-serif; font-size:16px;">Bạn có chắc muốn không còn ẩn sách này không?</h6>
                            </div>
                            <div class="modal-footer" style="margin: auto;">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Hủy</button>
                                <a href="products.php?upstatus=<?php echo $pro_id ?>&status=<?php echo $pro_status ?>">
                                    <button type="button" class="btn btn-outline-success">Xác nhận</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Đọc mô tả sách -->
                <div class="modal fade" id="exampleModalLongdesc<?php echo $pro_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Mô tả sách</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div style="white-space: pre-wrap;"><?php echo $pro_desc ?></div>
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
            echo "không tìm thấy sách";
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
                    <li class="page-item" id="<?php echo $pages ?>"><a class="page-link" >Next</a></li>

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