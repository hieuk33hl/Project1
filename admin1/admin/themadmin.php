<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body> 
	<?php
if (isset($_GET["ten"]) && isset($_GET["tk"]) && isset($_GET["mk"]) && isset($_GET["email"]) &&isset($_GET["sdt"]) && isset($_GET["gt"]) && isset($_GET["diachi"]) && isset($_GET["quyen"])) {
  $ten = $_GET["ten"];
  $tk = $_GET["tk"];
  $mk = $_GET["mk"];
  $email = $_GET["email"];
  $sdt = $_GET["sdt"];
  $gt = $_GET["gt"];
  $diachi = $_GET["diachi"];
  $quyen = $_GET["quyen"];
  
  //Mở kết nối csdl
  $con = mysqli_connect("localhost", "root", "", "da1");
  $sql = "INSERT INTO admin(ten_admin,username,password,email,sdt,gt,diachi,quyen,trangthai) values ('$ten','$tk','$mk','$email',$sdt,$gt,'$diachi',$quyen,1)";
  mysqli_query($con, $sql);
  //Đóng kết nối csdl
  mysqli_close($con);
  header("Location:  xem-admin.php");
} else {
  header("Location: them-admin.php");
}?>
</body>
</html>