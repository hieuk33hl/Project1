<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
if (isset($_GET["makh"])  && isset($_GET["ten"]) && isset($_GET["dc"]) && isset($_GET["sdt"]) && isset($_GET["ngay"])) {
	$makh= $_GET["makh"];
	$ten= $_GET["ten"];
	$sdt= $_GET["sdt"];
	$dc= $_GET["dc"];
	$ngay= $_GET["ngay"];
  //Mở kết nối csdl
  $con = mysqli_connect("localhost", "root", "", "da1");
  $sql = "INSERT INTO `hoa_don`(`ma_kh`, `ten_nguoi_nhan`, `dia_chi`, `sdt`, `ngay_nhap`) VALUES ($makh,'$ten','$dc',$sdt,'$ngay')";
  mysqli_query($con, $sql);
  //Đóng kết nối csdl
  mysqli_close($con);
  header("Location: xem-hd.php");
} else {
  header("Location: them-hd.php");
}?>
</body>
</html>