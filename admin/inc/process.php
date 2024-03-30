<?php
require_once('db.php');

session_start();

if (!isset($_SESSION['usernameadmin'])) {
	header('location: ../page-login.php');
}

//////////////////////// ADD CATEGORY //////////////////////

if (isset($_POST['add_cat_name'])) {
	$cat_name = $_POST['add_cat_name'];
	$subcat_id = $_POST['add_subcat_id'];

	if (empty($cat_name)) {
		header('location: ../categories.php?error=Category Name require');
	} else {
		$query = "INSERT INTO theloai(Tenloai, Idpl) VALUES ('$cat_name','$subcat_id')";
		if ($conn->query($query)) {
			echo "Thêm thể loại thành công!";
		} else {
			echo "Thêm thể loại thất bại!";
		}
	}
}

//////////////////////// EDIT CATEGORY //////////////////////

if (isset($_POST['edit_category'])) {
	$edit_id = $_POST['edit_category'];
	$edit_subcat_id = $_POST['edit_subcat_id'];
	$edit_cat_name = $_POST['edit_cat_name'];

	if (empty($edit_cat_name)) {
		header("location: ../categories.php?editerror=Category Name require&edit=$edit_id");
	} else {
		$query = "UPDATE theloai SET Tenloai = '$edit_cat_name', Idpl = '$edit_subcat_id' WHERE Idloai = '$edit_id';";
		if ($conn->query($query)) {
			echo "Sửa thể loại thành công!";
		} else {
			echo "Sửa thể loại thành công!";
		}
	}
}

//////////////////////// ADD SUBCATEGORY //////////////////////

if (isset($_POST['add_subcat_name'])) {
	$subcat_name = $_POST['add_subcat_name'];

	if (empty($subcat_name)) {
		header('location: ../subcategories.php?error=Category Name require');
	} else {
		$query = "INSERT INTO phanloai(Tenphanloai) VALUES ('$subcat_name')";
		if ($conn->query($query)) {
			echo "Thêm phân loại thành công!";
		} else {
			echo "Thêm phân loại thất bại!";
		}
	}
}

//////////////////////// EDIT SUBCATEGORY //////////////////////

if (isset($_POST['edit_subcat_name'])) {
	$edit_id = $_POST['edit_subcategory'];
	$edit_subcat_name = $_POST['edit_subcat_name'];

	if (empty($edit_subcat_name)) {
		header("location: ../subcategories.php?editerror=subcategory Name require&edit=$edit_id");
	} else {
		$query = "UPDATE phanloai SET Tenphanloai = '$edit_subcat_name' WHERE Idpl = '$edit_id';";
		if ($conn->query($query)) {
			echo "Sửa phân loại thành công!";
		} else {
			echo "Sửa phân loại thành công!";
		}
	}
}

//////////////////////// ADD PUBLISHER //////////////////////

if (isset($_POST['add_pub_name'])) {
	$pub_name = $_POST['add_pub_name'];

	if (empty($pub_name)) {
		header('location: ../publisher.php?error=Publisher Name require');
	} else {
		$query = "INSERT INTO nhaphathanh(Tennph) VALUES ('$pub_name')";
		if ($conn->query($query)) {
			echo "Thêm nhà phát hành thành công!";
		} else {
			echo "Thêm nhà phát hành thất bại!";
		}
	}
}

//////////////////////// EDIT PUBLISHER //////////////////////

if (isset($_POST['edit_publisher'])) {
	$edit_id = $_POST['edit_publisher'];
	$edit_pub_name = $_POST['edit_pub_name'];

	if (empty($edit_pub_name)) {
		header("location: ../publisher.php?editerror=Publisher Name require&edit=$edit_id");
	} else {
		$query = "UPDATE nhaphathanh SET Tennph = '$edit_pub_name' WHERE Idnph = '$edit_id';";
		if ($conn->query($query)) {
			echo "Sửa thành công!";
		} else {
			echo "Sửa thất bại!";
		}
	}
}

//////////////////////// EDIT USER //////////////////////

if (isset($_POST['edit-user'])) {
	$user_id = $_POST['edit-user'];
	$user_name = $_POST['yourname'];
	$user_email = $_POST['val-email'];
	$user_phone = $_POST['phone'];
	$user_username = $_POST['username'];
	$user_password = $_POST['password'];
	$user_address =	$_POST['address'];

	$query = "UPDATE taikhoan SET
		Username='$user_username',
		Password='$user_password' 
		WHERE Idtk='$user_id';";

	$query2 = "UPDATE users SET
		Mail='$user_email',
		Sdt='$user_phone',
		Ten='$user_name',
		Diachi='$user_address' 
		WHERE Idtk='$user_id';";

	if ($conn->query($query) && $conn->query($query2)) {
		echo "<script>alert('Sửa thành công!');window.location='../users.php'</script>";
	} else {
		echo "<script>alert('Sửa thất bại!');window.location='../users.php'</script>";
	}
}

//////////////////////// ADD USER //////////////////////

if (isset($_POST['add-user'])) {
	$user_yourname = $_POST['yourname'];
	$user_email = $_POST['val-email'];
	$user_phone = $_POST['phone'];
	$user_username = $_POST['username'];
	$user_password = $_POST['password'];
	$user_address = $_POST['address'];
	$user_permission = "2";

	$query = "INSERT INTO taikhoan (Username,Password,Idrole) VALUES ('$user_username','$user_password','$user_permission');";

	if ($conn->query($query)) {
		$query = "SELECT Idtk FROM taikhoan WHERE Username='$user_username'";
		$runcheck = $conn->query($query);
		$rowcheck = $runcheck->fetch_array();
		$user_id = $rowcheck['Idtk'];
		$query_id = "INSERT INTO users (Ten,Sdt,Diachi,Mail,Idtk) VALUES ('$user_yourname','$user_phone','$user_address','$user_email','$user_id')";
		if ($conn->query($query_id)) {
			echo "<script>alert('Thêm người dùng thành công!');window.location='../users.php'</script>";
		} else {
			echo "<script>alert('Thêm người dùng thất bại!');window.location='../users.php'</script>";
		}
	} else {
		echo "<script>alert('Thêm người dùng thất bại!');window.location='../users.php'</script>";
	}
}

//////////////////////// EDIT PRODUCT //////////////////////

if (isset($_POST['edit-product'])) {
	$pro_id = $_POST['e-pro-id'];
	$pro_name = $_POST['e-pro-name'];
	$pro_author = $_POST['e-pro-author'];
	$pro_illu = $_POST['e-pro-illu'];
	$pro_trans = $_POST['e-pro-trans'];
	$pro_cover = $_POST['e-pro-cover'];
	$pro_pages = $_POST['e-pro-pages'];
	$pro_price = $_POST['e-pro-price'];
	$pro_sale = $_POST['e-pro-sale'];
	$pro_newprice = $pro_price - ($pro_price * ($pro_sale / 100));
	$pro_pub = $_POST['e-pro-pub'];
	$pro_cat = $_POST['e-pro-cat'];
	$pro_des = $_POST['e-pro-des'];

	$tmp_name = $_FILES['image']['tmp_name'];

	if ($tmp_name != '') {
		$img_name = $_FILES['image']['name'];
		$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
		$img_ex_lc = strtolower($img_ex);

		$allowed_exs = array("jpg", "jpeg", "png");
		if (in_array($img_ex_lc, $allowed_exs)) {
			$new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
			$img_upload_path = '../product-img/' . $new_img_name;
			move_uploaded_file($tmp_name, $img_upload_path);



			$update_query = "UPDATE sanpham SET `Tensp`='$pro_name', `Tacgia`='$pro_author', `Minhhoa`='$pro_illu', `Dichgia`='$pro_trans', `Loaibia`='$pro_cover', `Sotrang`='$pro_pages', `Giasp`='$pro_price', `Giamgia`='$pro_sale', `Giamoi`='$pro_newprice', `Idloai`='$pro_cat', `Idnph`='$pro_pub', `Mota`='$pro_des', `Img`='$new_img_name' WHERE `Idsp` = '$pro_id';";

			if ($conn->query($update_query)) {
				echo "<script>alert('Sửa thành công!');window.location='../products.php'</script>";
			} else {
				echo "<script>alert('Sửa thất bại!');window.location='../products.php'</script>";
			}
		} else {
			echo "<script>alert('Sai định dạng file!');window.location='../products.php'</script>";
		}
	} else {
		$update_query = "UPDATE sanpham SET `Tensp`='$pro_name', `Tacgia`='$pro_author', `Minhhoa`='$pro_illu', `Dichgia`='$pro_trans', `Loaibia`='$pro_cover', `Sotrang`='$pro_pages', `Giasp`='$pro_price', `Giamgia`='$pro_sale', `Giamoi`='$pro_newprice', `Idloai`='$pro_cat', `Idnph`='$pro_pub', `Mota`='$pro_des' WHERE `Idsp` = '$pro_id';";
		if ($conn->query($update_query)) {
			echo "<script>alert('Sửa thành công!');window.location='../products.php'</script>";
		} else {
			echo "<script>alert('Sửa thất bại!');window.location='../products.php'</script>";
		}
	}
}
//////////////////////// ADD PRODUCT //////////////////////

if (isset($_POST['add-product'])) {
	$add_pro_name = $_POST['add-pro-name'];
	$add_pro_author = $_POST['add-pro-author'];
	$add_pro_illu = $_POST['add-pro-illu'];
	$add_pro_trans = $_POST['add-pro-trans'];
	$add_pro_cover = $_POST['add-pro-cover'];
	$add_pro_pages = $_POST['add-pro-pages'];
	$add_pro_price = $_POST['add-pro-price'];
	$add_pro_sale = $_POST['add-pro-sale'];
	$add_pro_newprice = $add_pro_price - ($add_pro_price * ($add_pro_sale / 100));
	$add_pro_pub = $_POST['add-pro-pub'];
	$add_pro_cat = $_POST['add-pro-cat'];
	$add_pro_des = $_POST['add-pro-des'];

	$tmp_name = $_FILES['image']['tmp_name'];
	$img_name = $_FILES['image']['name'];
	$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
	$img_ex_lc = strtolower($img_ex);

	$allowed_exs = array("jpg", "jpeg", "png");
	if (in_array($img_ex_lc, $allowed_exs)) {
		$new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
		$img_upload_path = '../product-img/' . $new_img_name;
		move_uploaded_file($tmp_name, $img_upload_path);

		$insert_pro = "INSERT INTO sanpham( `Tensp`, `Tacgia`, `Minhhoa`, `Dichgia`, `Loaibia`, `Sotrang`, `Giasp`, `Giamgia`, `Giamoi`, `Idloai`, `Idnph`, `Mota`, `Img`, `StatusSP`) 
		VALUES ('$add_pro_name', '$add_pro_author', '$add_pro_illu', '$add_pro_trans', '$add_pro_cover', '$add_pro_pages', '$add_pro_price','$add_pro_sale','$add_pro_newprice','$add_pro_cat', '$add_pro_pub', '$add_pro_des', '$new_img_name' , '1');";

		if ($conn->query($insert_pro)) {
			echo "<script>alert('Thêm sách mới thành công!');window.location='../products.php'</script>";
		} else {
			echo "<script>alert('Thêm sách mới thất bại!');window.location='../products.php'</script>";
		}
	} else {
		echo "<script>alert('Sai định dạng file!');window.location='../products.php'</script>";
	}
}

//////////////////////// UPSTATUS ORDER //////////////////////
if (isset($_GET['hd_upstatus']) and isset($_SESSION['usernameadmin'])) {
	$upstatus = $_GET['hd_upstatus'];
	$status = $_GET['hd_status'];
	$status_new = $status + 1;
	$upstatus_query = "UPDATE hoadon SET StatusHD = '$status_new' WHERE Idhd = '$upstatus'";
	if ($status_new == '3') {
		$finish_date = date("Y-m-d");
		$finish = "UPDATE hoadon SET
            	Ngaynhan = '$finish_date'
        		where Idhd = '$upstatus'";
		$runfinish = $conn->query($finish);
	}
	if ($conn->query($upstatus_query)) {
		echo "Cập nhật tình trạng đơn hàng thành công.";
	} else {
		echo "Cập nhật tình trạng đơn hàng thất bại.";
	}
}
