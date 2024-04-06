<?php
require_once('inc/db.php');

session_start();

if (!isset($_SESSION['usernameadmin'])) {
    header('location: ../page-login.php');
}

if (isset($_GET['edit'])) {
    $edit_id = $_GET['edit'];
    $get_subcat_id = "SELECT * from phanloai where Idpl = '$edit_id'";
    $run_edit_id = $conn->query($get_subcat_id);
    if ($run_edit_id->num_rows > 0) {
        $row_edit_id = $run_edit_id->fetch_array();
        $edit_name = $row_edit_id['Tenphanloai'];
?>

        <div class="card-body">
            <div class="card-title">
                <h4>Sửa phân loại</h4>
            </div>
            <form id="frm-edit" method="post">
                <div class="form-group">
                    <label for="subcategory">Tên phân loại mới:*</label>
                    <input type="text" placeholder="Tên phân loại..." id="edit-subcat-name" class="form-control" name="edit-subcat-name" value="<?php echo $edit_name; ?>" required>
                </div>
                <input type="submit" value="Sửa" name="edit-subcategory" class="btn btn-primary">
            </form>
        </div>
        <script>
            $('#frm-edit').submit(function() {
                var edit_id = <?php echo $edit_id; ?>;
                var edit_name = $('#edit-subcat-name').val();
                $.ajax({
                    method: 'POST',
                    url: 'inc/process.php',
                    data: {
                        edit_subcategory: edit_id,
                        edit_subcat_name: edit_name
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