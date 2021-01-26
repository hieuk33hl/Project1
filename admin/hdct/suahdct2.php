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
	$con = mysqli_connect("localhost", "root", "", "da1");
  $sql = "UPDATE `hoa_don_ct` SET `ma_sp`=$masp,`slsp`=$sl `gia_tien`= $giatien WHERE ma_don_hang =$mahd";
  mysqli_query($con, $sql);
  //Đóng kết nối csdl
  mysqli_close($con);
  header("Location: xem-hdct.php");
} else {
  header("Location: sua-xoa-hd.php");
}?>
</body>
</html>