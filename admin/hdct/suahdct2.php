<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
if (isset($_GET["ma_don_hang"]) && isset($_GET["masp"]) && isset($_GET["sl"]) && isset($_GET["giatien"]) ) {
	$ma_don_hang= $_GET["ma_don_hang"];
	$masp= $_GET["masp"];
	$sl= $_GET["sl"];
	$giatien=$_GET["giatien"];
	$ngay=$_GET["ngay"];
	
	$con = mysqli_connect("localhost", "root", "", "da1");
  $sql = "UPDATE `hoa_don_ct` SET `ma_sp`=$masp,`so_luong`=$sl,`gia_tien`=$giatien,`ngay_nhap`='$ngay' WHERE `ma_don_hang`=$ma_don_hang";
  mysqli_query($con, $sql);
  //Đóng kết nối csdl
  mysqli_close($con);
	
 header("Location: xem-hdct.php");
}?>
</body>
</html>