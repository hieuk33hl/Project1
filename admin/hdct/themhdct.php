<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
if (isset($_GET["mahd"]) && isset($_GET["masp"]) && isset($_GET["sl"]) && isset($_GET["giatien"]) ) {
	$mahd= $_GET["mahd"];
	$masp= $_GET["masp"];
	$sl= $_GET["sl"];
	$giatien=$_GET["giatien"];
	$ngay=$_GET["ngay"];
  //Mở kết nối csdl
  $con = mysqli_connect("localhost", "root", "", "da1");
  $sql = "INSERT INTO `hoa_don_ct`(`ma_don_hang`, `ma_sp`, `so_luong`, `gia_tien`, `ngay_nhap`) VALUES ($mahd,$masp,$sl,$giatien,'$ngay')";
  mysqli_query($con, $sql);
  //Đóng kết nối csdl
  mysqli_close($con);
  header("Location: xem-hdct.php");
} else {
  header("Location: them-hdct.php");
}?>
</body>
</html>