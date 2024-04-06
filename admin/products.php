<?php require_once('inc/top.php'); ?>
<title>Sách</title>
<?php

if (isset($_GET['del']) and isset($_SESSION['usernameadmin'])) {
  $del_id = $_GET['del'];
  $status = $_GET['status'];
  $check = "SELECT * FROM chitiethoadon WHERE Idsp = '$del_id'";
  $del_query = "DELETE FROM Sanpham WHERE Idsp = '$del_id'";
  $check_run = $conn->query($check);
  //check product in chitiethoadon
  if ($check_run->num_rows == 0) {
    // del run
    if ($conn->query($del_query)) {
      echo "<script>alert('Đã xóa thành công!');window.location='./products.php'</script>";
    } else {
      echo "<script>alert('Đã xóa thất bại!');window.location='./products.php'</script>";
    }
  } else {
    $status_new = $status - 1;
    $upstatus_query = "UPDATE sanpham SET StatusSP = '$status_new' WHERE Idsp = '$del_id'";
    if ($conn->query($upstatus_query)) {
      echo "<script>alert('Do sách này đã có người mua, nên sách này sẽ bị ẩn đi.');window.history.back();</script>";
    } else {
      echo "<script>alert('Cập nhật trạng thái sách thất bại.');window.location='./products.php'</script>";
    }
  }
}
if (isset($_GET['upstatus']) and isset($_SESSION['usernameadmin'])) {
  $upstatus = $_GET['upstatus'];
  $status = $_GET['status'];
  $status_new = $status + 1;
  $upstatus_query = "UPDATE sanpham SET StatusSP = '$status_new' WHERE Idsp = '$upstatus'";
  if ($conn->query($upstatus_query)) {
    echo "<script>alert('Cập nhật trạng thái sách thành công.');window.location='./products.php'</script>";
  } else {
    echo "<script>alert('Cập nhật trạng thái sách thất bại.');window.location='./products.php'</script>";
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
            <li class="breadcrumb-item active">Sản phẩm</li>
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
                  <h3>Sách</h3>
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
											url: 'products-table.php',
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
									$(document).on("click",".page-item",function(){
										var page = $(this).attr("id");
										fetchdata(page);
									});
                </script>
                <a href="addproduct.php"><button style="margin-bottom: 20px" class='btn btn-primary'><span style="margin-right: 10px">Thêm sách mới</span><i class="fa fa-plus"></i></button></a>

                <!-- data sach -->
                <div class="table-responsive" id="data-output"></div>
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