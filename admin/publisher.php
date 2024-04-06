<?php require_once('inc/top.php'); ?>
<title>Nhà phát hành</title>
<?php
//del
if (isset($_GET['del']) and isset($_SESSION['usernameadmin'])) {
    $del_id = $_GET['del'];
    $del_query = "DELETE FROM nhaphathanh WHERE Idnph = '$del_id'";
    try {
        $conn->query($del_query);
        echo "<script>alert('Xóa nhà phát hành thành công!');window.location='./publisher.php'</script>";
    } catch (Exception $e) {
        echo "<script>alert('Xóa nhà phát hành thất bại!');window.location='./publisher.php'</script>";
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
                        <li class="breadcrumb-item active">Nhà phát hành</li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-5 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                    <h4>Thêm nhà phát hành</h4>
                                </div>
                                <form id="frm-add" method="post">
                                    <div class="form-group">
                                        <label for="publisher">Tên nhà phát hành:*</label>
                                        <input type="text" placeholder="Tên nhà phát hành..." class="form-control" id="pub-name" required>
                                    </div>
                                    <input type="submit" value="Thêm" name="add-publisher" class="btn btn-primary">
                                </form>
                                <script>
                                    $('#frm-add').submit(function() {
                                        var add_name = $('#pub-name').val();
                                        $.ajax({
                                            method: 'POST',
                                            url: 'inc/process.php',
                                            data: {
                                                add_pub_name: add_name
                                            },
                                            success: function(response) {
                                                alert(response);
                                                fetchdata();
                                            }
                                        });
                                        return false;
                                    });
                                </script>
                            </div>
                        </div>
                        <div class="card" id="output"></div>
                    </div>
                    <div class="col-lg-7 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                    <h3>Nhà phát hành</h3>
                                </div>
                                <div class="pb-3">
                                    <div class="input-group">
                                        <input type="search" id="search" name="search" class="form-control rounded" placeholder="Tìm kiếm" aria-label="Search" aria-describedby="search-addon" />
                                        <button type="submit" id="search" class="btn btn-outline-primary">search</button>
                                    </div>
                                </div>
                                <script>
                                    function fetchdata(page) {
                                        var search = $('#search').val();
                                        $.ajax({
                                            method: 'GET',
                                            url: 'pub-table.php',
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
                                <div class="table-responsive" id="data-output"></div>
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