<?php require_once('db.php');
session_start();

if (isset($_SESSION['customer'])) {
    $info_id = $_SESSION['customer'];
    $info_query = "SELECT * from taikhoan tk left join users u on tk.Idtk = u.Idtk  where tk.Idtk = '$info_id'";
    $info_run = $conn->query($info_query);

    if ($info_run->num_rows > 0) {
        $info_row = $info_run->fetch_array();
        $info_username = $info_row['Username'];
        $info_password = $info_row['Password'];
        $info_name = $info_row['Ten'];
        $info_address = $info_row['Diachi'];
        $info_email = $info_row['Mail'];
        $info_phone = $info_row['Sdt'];
    }
}
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="meta description">

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon" />
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font-Awesome CSS -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <!-- helper class css -->
    <link href="assets/css/helper.min.css" rel="stylesheet">
    <!-- Plugins CSS -->
    <link href="assets/css/plugins.css" rel="stylesheet">
    <!-- Main Style CSS -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/skin-default.css" rel="stylesheet" id="galio-skin">
    <!-- jquery  -->
    <script src="admin/js/jquery-3.6.4.min.js"></script>