 <?php
	if (isset($_POST['ma']) && isset($_POST['fname']) && isset($_POST['sdt']) && isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['gioitinh']) && isset($_POST['diachi'])) {

		$ma_kh = $_POST['ma'];
		$ten_kh = $_POST['fname'];
		$gt = $_POST['gioitinh'];
		$sdt = $_POST['sdt'];
		$password = $_POST['password'];
		$diachi = $_POST['diachi'];

		include("../Connection/open.php");

		$sql = " UPDATE khach_hang SET ten_kh = '$ten_kh', gt = '$gt', sdt = '$sdt',password = '$password',diachi ='$diachi' WHERE ma_kh = '$ma_kh' ";

		$result = mysqli_query($conn, $sql);

		session_start();
		unset($_SESSION['fullname']);
		$_SESSION['fullname'] = $ten_kh;

		header("Location: ../user/edit.php?success=Chỉnh sửa thông tin thành công");
		include("../Connection/close.php");
	} else {

		header("Location: ../user/edit.php?err=1");
	}
