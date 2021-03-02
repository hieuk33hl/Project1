
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
	<style>
		input{
			height:30px;
			border-radius: 5px;
		    font-size: 20px;
		}
		button{
			height:30px;
			width: 70px;
			border-radius: 5px;
		}
	</style>

<body>
	<div>
	<?php
	include("gg.php");
	?>
	
	<?php
  $con = mysqli_connect("localhost", "root", "", "da1");
  $sql = "Select * from admin";
  $result = mysqli_query($con, $sql);
	if (isset($_SESSION["quyen"])==0);
  mysqli_close($con);
  ?>
  <form action="../admin/admin/themadmin.php" method="get"  >
	  Tên: <input type="text" name="ten" required ><br><br>
	  tài khoản: <input type="text" name="tk" required><br><br>
	  mật khẩu: <input type="text" name="mk" required><br><br>
	  email: <input type="email" name="email" required><br><br>
	  sdt: <input type="number" name="sdt" required><br><br>
 
    Giới tính: <input type="radio" name="gt" value="1" required > Nam
    <input type="radio" name="gt" value="0" required> Nữ
    <br><br>
	  địa chỉ: <input type="text" name="diachi" required><br><br>
	   quyền : <input type="radio" name="quyen" value="1" required> supperadmin
    <input type="radio" name="quyen" value="0" required> admin
    <br>
   <br>
    <button>Thêm</button>
  </form>
		</div>
</body>
</html>