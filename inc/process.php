<?php
require_once('db.php');
session_start();

$cus_id = '';

if(isset($_SESSION['customer'])){
	$cus_id = $_SESSION['customer'];
}

//////////////////////// REGISTER //////////////////////
if (isset($_POST['register'])) {
	$user_yourname = $_POST['name'];
	$user_email = $_POST['email'];
	$user_phone = $_POST['phone'];
	$user_username = $_POST['username'];
	$user_password = $_POST['password'];
	$user_permission = "2";
	$user_status = "1";

	$querycheck_acc = "SELECT * FROM taikhoan where Username = '$user_username'";
	$runcheck_acc = $conn->query($querycheck_acc);
	if ($runcheck_acc->num_rows > 0) {
		echo "<script>alert('Tên tài khoản này đã được sử dụng, xin hãy chọn tên tài khoản khác!');window.location='../login.php'</script>";
	} else {
		$query = "INSERT INTO taikhoan (Username,Password,Idrole,StatusTK) VALUES ('$user_username','$user_password','$user_permission','$user_status');";

		if ($conn->query($query)) {
			$query = "SELECT Idtk FROM taikhoan WHERE Username='$user_username'";
			$runcheck = $conn->query($query);
			$rowcheck = $runcheck->fetch_array();
			$user_id = $rowcheck['Idtk'];
			$query_id = "INSERT INTO users (Ten,Sdt,Mail,Idtk) VALUES ('$user_yourname','$user_phone','$user_email','$user_id')";
			if ($conn->query($query_id)) {
				echo "<script>alert('Đăng ký thành công!');window.location='../login.php'</script>";
			} else {
				echo "<script>alert('Đăng ký thất bại!');window.location='../login.php'</script>";
			}
		} else {
			echo "<script>alert('Đăng ký thất bại!');window.location='../login.php'</script>";
		}
	}
}

//////////////////////// EDIT USER //////////////////////
if (isset($_POST['edit_user'])) {
	$user_idtk = $_POST['edit_user'];
	$user_name = $_POST['edit_name'];
	$user_email = $_POST['edit_email'];
	$user_adress = $_POST['edit_address'];
	$user_phone = $_POST['edit_phone'];
	$user_password = $_POST['current_pwd'];
	$user_new_password = $_POST['new_pwd'];
	$user_crm_password = $_POST['confirm_pwd'];

	$query = "SELECT * from taikhoan where Idtk = '$user_idtk'";
	$runcheck = $conn->query($query);
	$checkpwd = $runcheck->fetch_array();

	if ($checkpwd['Password'] == $user_password) {
		if ($user_new_password == $user_crm_password) {
			$query1 = "UPDATE taikhoan SET
			`Password` = '$user_new_password'
			where Idtk = '$user_idtk';";

			$query2 = "UPDATE users SET
			Mail='$user_email',
			Sdt='$user_phone',
			Diachi='$user_adress',
			Ten='$user_name'
			WHERE Idtk='$user_idtk';";

			if ($conn->query($query1) && $conn->query($query2)) {
				echo "Lưu thành công!";
			} else {
				echo "Lưu thất bại!";
			}
		} else {
			echo "Mật khẩu mới nhập lại không khớp, xin hãy nhập kỹ lại";
		}
	} else {
		echo "Sai mật khẩu hiện tại!";
	}
}

//////////////////////// ADD BANK //////////////////////
if (isset($_POST['add_bank'])) {
	$add_tk_id = $_POST['add_bank'];
	$add_bankname = $_POST['bank_name'];
	$add_banknum = $_POST['bank_num'];
	$add_bankacc = $_POST['bank_acc'];
	$query = "INSERT INTO users_payment(Idtk,Bank,Sotk,Tentk) VALUES ('$add_tk_id','$add_bankname','$add_banknum','$add_bankacc')";
	if ($conn->query($query)) {
		echo "Thêm ngân hàng này thành công!";
	} else {
		echo "Thêm ngân hàng này thất bại!";
	}
}


//////////////////////// DEL BANK //////////////////////
if (isset($_POST['del_bank'])) {
	$del_id = $_POST['del_bank'];
	$query = "DELETE FROM users_payment WHERE Idpay = '$del_id'";
	if ($conn->query($query)) {
		echo "Xóa ngân hàng này thành công!";
	} else {
		echo "Xóa ngân hàng này thất bại!";
	}
}

//////////////////////// ADD TO CART //////////////////////
if (isset($_POST['add_cart_sp'])) {
	if (isset($_SESSION['cart'])) {
		$array_cart = array_column($_SESSION['cart'], "id", "cusID");
		if (!in_array($_POST['add_cart_sp'], $array_cart) && !in_array($_POST['add_cart_cusID'], $array_cart)) {
			$item_array = array(
				"id" => $_POST['add_cart_sp'],
				"name" => $_POST['add_cart_name'],
				"price" => (float)$_POST['add_cart_price'],
				"img" => $_POST['add_cart_img'],
				"quantity" => (int)$_POST['add_cart_quantity'],
				"cusID" => (int)$_POST['add_cart_cusID']
			);
			$_SESSION['cart'][] = $item_array;
		} else {
			foreach ($_SESSION["cart"] as &$val) {
				if ($val["id"] == $_POST['add_cart_sp'] && $val["cusID"] == $cus_id) {
					$val["quantity"] += (int)$_POST["add_cart_quantity"];
				}
			}
		}
	} else {
		$item_array = array(
			"id" => $_POST['add_cart_sp'],
			"name" => $_POST['add_cart_name'],
			"price" => (float)$_POST['add_cart_price'],
			"img" => $_POST['add_cart_img'],
			"quantity" => (int)$_POST['add_cart_quantity'],
			"cusID" => (int)$_POST['add_cart_cusID']
		);
		$_SESSION['cart'][] = $item_array;
	}
	echo "thêm vào giỏ hàng công";
}

//////////////////////// DELETE ITEM CART //////////////////////
if (isset($_GET['del_cart'])) {
	if ($_GET['del_cart'] == "all") {
		foreach ($_SESSION["cart"] as $key => $value) {
			if ($value["cusID"] == $cus_id) {
				unset($_SESSION['cart'][$key]);
			}
		}
		echo "<script>alert('Xóa toàn bộ sản phẩm khỏi giỏ hàng thành công!');</script>";
		header('Location: ' . $_SERVER["HTTP_REFERER"]);
	} else {
		foreach ($_SESSION["cart"] as $key => $value) {
			if ($value["id"] == $_GET['del_cart'] && $value["cusID"] == $cus_id) {
				unset($_SESSION['cart'][$key]);
			}
		}
	}
}

//////////////////////// UPDATE ITEM CART //////////////////////
if (isset($_POST['up_cart'])) {
	$upsp = $_POST['up_cart_qty'];
	if (isset($_SESSION['cart'])) {
		foreach ($_SESSION["cart"] as &$val) {
			if ($val["id"] == $_POST['up_cart'] && $val["cusID"] == $cus_id) {
				$val["quantity"] = (int)$upsp;
				echo "thanh cong";
			}
		}
	}
}

//////////////////////// EDIT ADDRESS //////////////////////
if (isset($_GET['edit_address'])) {
	$edit_address = $_GET['edit_address'];
	$query_address = "UPDATE users SET 
		Diachi = '$edit_address'
		where Idtk = $cus_id";

	if ($conn->query($query_address)) {
		echo "<script>alert('Sửa thành công!');window.location='../checkout.php'</script>";
	} else {
		echo "<script>alert('Sửa thất bại!');window.location='../checkout.php'</script>";
	}
}

//////////////////////// CHECKOUT //////////////////////
if (isset($_POST['checkout_bank'])) {
	$bank_payment = $_POST['checkout_bank'];
	$bank_note = $_POST['checkout_note'];
	$new_order = '';
	$buydate = date("Y-m-d");

	if ($bank_payment == 'COD') {
		$bank_note .= '\nThanh toán COD';
		$querynew = "INSERT INTO `hoadon` (`Idhd`, `Ngaymua`, `Ngaynhan`, `Idtk`, `Ghichu`, `StatusHD`) VALUES (NULL, '$buydate', '$buydate', '$cus_id', '$bank_note', '1');";

		$run_neworder = $conn->query($querynew);

		$query_new_order = "SELECT max(Idhd) FROM `hoadon`";
		$run_order = $conn->query($query_new_order);
		$row = $run_order->fetch_array();
		$new_order = $row['max(Idhd)'];

		foreach ($_SESSION["cart"] as $key => $val) {
			$pro_id = $val['id'];
			$price = $val['price'];
			$qty = $val['quantity'];

			$subtotal = $price * $qty;

			$query_cthd = "INSERT INTO chitiethoadon(Idhd, Idsp, Soluong, Tongtien) VALUES ('$new_order','$pro_id','$qty','$subtotal')";
			$run_cthd = $conn->query($query_cthd);
			unset($_SESSION['cart'][$key]);
		}

		echo "Đặt hàng thành công";
	} else {
		$q_payment = "SELECT * FROM users_payment where Idpay = $bank_payment";
		$run_bank_payment = $conn->query($q_payment);
		$row_bank = $run_bank_payment->fetch_array();
		$bank_name = $row_bank['Bank'];
		$bank_num = $row_bank['Sotk'];
		$bank_acc = $row_bank['Tentk'];

		$bank_note .= '\nĐã thanh toán online \nNgân hàng: ' . $bank_name . '\nSố tài khoản: ' . $bank_num . '\nTên tài khoản: ' . $bank_acc;

		$querynew = "INSERT INTO `hoadon` (`Idhd`, `Ngaymua`, `Ngaynhan`, `Idtk`, `Ghichu`, `StatusHD`) VALUES (NULL, '$buydate', '$buydate', '$cus_id', '$bank_note', '1');";

		$run_neworder = $conn->query($querynew);

		$query_new_order = "SELECT max(Idhd) FROM `hoadon`";
		$run_order = $conn->query($query_new_order);
		$row = $run_order->fetch_array();
		$new_order = $row['max(Idhd)'];

		foreach ($_SESSION["cart"] as $key => $val) {
			$pro_id = $val['id'];
			$price = $val['price'];
			$qty = $val['quantity'];

			$subtotal = $price * $qty;

			$query_cthd = "INSERT INTO chitiethoadon(Idhd, Idsp, Soluong, Tongtien) VALUES ('$new_order','$pro_id','$qty','$subtotal')";
			$run_cthd = $conn->query($query_cthd);
			unset($_SESSION['cart'][$key]);
		}
		echo "Đặt hàng thành công";
	}
}
