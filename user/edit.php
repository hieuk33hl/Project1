<?php 
	session_start();
	$id = $_SESSION['id_customer']; //lấy mã khách hàng từ đăng nhập	
	$conn = mysqli_connect('localhost','root','','da1');
	$sql = "SELECT *FROM khach_hang where ma_kh= '$id'";
	$result = mysqli_query($conn, $sql);
	$each_khach_hang = mysqli_fetch_array($result);
	mysqli_close($conn); 
	if(isset($_GET['success'])) {
		$notice = $_GET['success'];
		echo "
		<script>
			alert('$notice');
		</script>
		";
	}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="../img/logo.ico"/>
	<title>Document</title>
</head>
<body>
	<?php include("header.php"); ?>
	<?php include("menu.php"); ?>
	<div class="edit">
		<div class="grid grid-form">
			<span class="gird-title">Chỉnh sửa thông tin cá nhân</span>
			<div class="form_edit">
				<form action="../process/edit_process.php" method="POST">
					<input type="hidden" name="ma" value="<?php echo $id ;?>">
					<table cellspacing="0" cellpadding="0">
						<tr>
							<td class="left-input">Họ và tên</td>
							<td class="right-input"> 
								<input type="text" name="fname" value="<?php echo $each_khach_hang['ten_kh'] ?>" >
							</td>
						</tr>
						<tr>
							<td class="left-input">Số điện thoại</td>
							<td class="right-input">
								<input type="text" name="sdt" value="<?php echo $each_khach_hang['sdt'] ?>">
							</td>
						</tr>
						<tr>
							<td class="left-input">Email</td>
							<td class="right-input">
								<input type="text" name="email" readonly value="<?php echo $each_khach_hang['email'] ?>" >
							</td class="right-input">
						</tr>
						<tr>
							<td class="left-input">Tên đăng nhập</td>
							<td class="right-input">
								<input type="text" name="username" readonly="" value="<?php echo $each_khach_hang['username'] ?>">
							</td class="right-input">
						</tr>
						<tr>
							<td class="left-input">Mật khẩu</td>
							<td class="right-input">
								<input type="password" id="pass" name="password" value="<?php echo $each_khach_hang['password'] ?>" >
								<i class="far fa-eye" onclick="an_hien_pass()"></i>
							</td class="right-input">
						</tr>
						<tr>
							<td class="left-input">Giới tinh</td>
							<td class="right-input">
								<input type="radio" name="gioitinh" value="1" <?php if($each_khach_hang["gt"] == 1){ echo "checked";} ?> > <span class="text">Nam</span> 	
								<input type="radio" name="gioitinh" value="0" <?php if($each_khach_hang["gt"] == 0){ echo "checked";} ?> > <span class="text">Nu</span>
							</td>
						</tr>
						<tr>
							<td class="left-input">Địa chỉ</td>
							<td class="right-input">
								<input type="text" name="diachi" value="<?php echo $each_khach_hang['diachi'] ?>">
							</td>
						</tr>
						<tr>
							<td colspan="2"><button class="capnhat" >Cập nhật</button></td>
						</tr>
					</table>			
						
				</form>			
			</div>
		</div>
	</div>

	<?php include("footer.php"); ?>

	<script type="text/javascript">
		var check = true;
		function an_hien_pass() {
			
			if(check) {
				document.getElementById('pass').type = "text";
				check = false;
			} else {
				document.getElementById('pass').type = "password";
				check = true;
			}
		}
	</script>
</body>
</html>