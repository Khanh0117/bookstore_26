<?php
require_once('inc/db.php');
session_start();
if(isset($_SESSION['usernameadmin'])){
	echo "<script>alert('Bạn đã đăng nhập.');window.location='./dashboard.php'</script>";
}

else if(isset($_POST['login'])){
	$username = $_POST['username'];
	$password = $_POST['password'];		

	$check_query = "SELECT * from taikhoan where Username = '$username' and StatusTK = '1'";
	$check_run = $conn -> query($check_query);

	if($check_run -> num_rows > 0){
		$row = $check_run -> fetch_array();
		$db_id = $row['Idtk'];
		$db_username = $row['Username'];
		$db_password = $row['Password'];				
		$db_role_id = $row['Idrole'];				
		if($username == $db_username && $password == $db_password){
			if($db_role_id == 1){
				session_start();
				$_SESSION['usernameadmin'] = $db_id;
				
				header('location: dashboard.php');	
			}
			else{
				$error = "Tài khoản này không có đủ quyền hạn truy cập!";
			}
		}
		else{
			$error = "Sai mật khẩu!";			
		}
	}
	else{
		$error = "Tài khoản không tồn tại!";		
	}
	// echo $error;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Bookstore - Admin Dashboard Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="post">
					<span class="login100-form-title">
						Đăng nhập
					</span>
                <center>
					<?php
					if(isset($error)){
						echo "<span style='color:red;'>$error</span>";
					}
					?>
				</center>
				</br>
					<div class="wrap-input100 validate-input" data-validate = "Vui lòng nhập tài khoản">
						<input class="input100" type="text" id="inputUsername" name="username" placeholder="Nhập tài khoản">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Vui lòng nhập mật khẩu">
						<input class="input100" type="password" name="password" id="inputPassword" placeholder="Nhập mật khẩu">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="text-center p-t-12">
						<input type="checkbox" onclick="showhide()" style="margin-right: 8px;" id = "showmk"> <label for="showmk">Hiển thị mật khẩu</label>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="login">
							Đăng nhập
						</button>
					</div>
					<div class="text-center p-t-136">
						<a class="txt2" href="#">
							Đăng ký tài khoản
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
<!--**********************************
        Scripts
    ***********************************-->
	<script>
	function showhide() {
	  var x = document.getElementById("inputPassword");
	  if (x.type === "password") {
		x.type = "text";
	  } else {
		x.type = "password";
	  }
	}
	</script>
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>