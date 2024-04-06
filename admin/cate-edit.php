<?php
require_once('inc/db.php');

session_start();

if (!isset($_SESSION['usernameadmin'])) {
    header('location: ../page-login.php');
}

if (isset($_GET['edit'])) {
    $edit_id = $_GET['edit'];
    $get_cat_id = "SELECT *  from theloai 
    where Idloai = '$edit_id'";
    $run_edit_id = $conn->query($get_cat_id);
    if ($run_edit_id->num_rows > 0) {
        $row_edit_id = $run_edit_id->fetch_array();
        $edit_name = $row_edit_id['Tenloai'];
        $edit_subcat = $row_edit_id['Idpl'];
?>

        <div class="card-body">
            <div class="card-title">
                <h4>Sửa thể loại</h4>
            </div>
            <form id="frm-edit" method="post">
                <div class="form-group">
                    <label for="subcategory">Tên phân loại:*</label>
                    <div class="box">
                        <select name="subcat" id="edit-subcat-id">
                            <?php
                            $query = "SELECT * from phanloai order by Idpl asc";
                            $run = $conn->query($query);
                            if ($run->num_rows > 0) {
                                while ($row = $run->fetch_array()) {
                                    $edit_subcat_id = $row['Idpl'];
                                    $edit_subcat_name = $row['Tenphanloai'];
                                    $selected = "";
                                    if($edit_subcat_id == $edit_subcat){
                                        $selected = "selected";
                                    } 
                            ?>
                                    <option <?php echo $selected ?> value="<?php echo $edit_subcat_id ?>"><?php echo $edit_subcat_id ?>. <?php echo $edit_subcat_name ?></option>
                            <?php
                                }
                            } else {
                                echo "Không tìm thấy phân loại";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="category">Tên thể loại mới:*</label>
                    <input type="text" placeholder="Tên thể loại..." id="edit-cat-name" class="form-control" name="edit-cat-name" value="<?php echo $edit_name; ?>" required>
                </div>
                <input type="submit" value="Sửa" name="edit-category" class="btn btn-primary">
            </form>
        </div>
        <script>
            $('#frm-edit').submit(function() {
                var edit_id = <?php echo $edit_id; ?>;
                var edit_name = $('#edit-cat-name').val();
                var edit_subcat = $('#edit-subcat-id').val();
                $.ajax({
                    method: 'POST',
                    url: 'inc/process.php',
                    data: {
                        edit_category: edit_id,
                        edit_cat_name: edit_name,
                        edit_subcat_id: edit_subcat
                    },
                    success: function(response) {
                        alert(response);
                        fetchdata();
                    }
                });
                return false;
            });
        </script>
<?php
    }
}
?>