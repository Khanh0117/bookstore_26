<?php require_once('inc/db.php');
session_start();
if(!isset($_SESSION['usernameadmin'])){	
	header('location: page-login.php');
}
if(isset($_SESSION['usernameadmin'])){
	$info_id = $_SESSION['usernameadmin'];
	$info_query = "SELECT * from taikhoan tk left join users u on tk.Idtk = u.Idtk  where tk.Idtk = '$info_id'";
	$info_run = $conn->query($info_query);
	
	if($info_run -> num_rows > 0){
		$info_row = $info_run -> fetch_array();
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
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
	
    <!-- Pignose Calender -->
    <link href="plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
    <link href="./plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
    <!-- Page plugins css -->
    <link href="./plugins/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">
    <!-- Color picker plugins css -->
    <link href="./plugins/jquery-asColorPicker-master/css/asColorPicker.css" rel="stylesheet">
    <!-- Date picker plugins css -->
    <link href="./plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    
    <script src="./js/jquery-3.6.4.min.js"></script>

<style>
	.box{
		padding: 0;	
	}
    .box select {
        background-color: #7571f9;
		color: white;
		padding: 12px;
		width: 100%;
		font-size: 0.875rem;
		box-shadow: 0 5px 25px rgba(0, 0, 0, 0.2);
		-webkit-appearance: button;
		appearance: button;
		outline: none;
    }

    .box:hover::before {
        color: rgba(255, 255, 255, 0.6);
        background-color: rgba(255, 255, 255, 0.2);
    }

    .box select option {
        padding: 30px;
    }
</style>