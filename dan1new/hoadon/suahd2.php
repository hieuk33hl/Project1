<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
if (isset($_GET["ma_hd"]) && isset($_GET["makh"])  && isset($_GET["ten"]) && isset($_GET["dc"]) && isset($_GET["sdt"]) && isset($_GET["ngay"])) {
	$ma_hd= $_GET["ma_hd"];
	$makh= $_GET["makh"];
	$ten= $_GET["ten"];
	$sdt= $_GET["sdt"];
	$dc= $_GET["dc"];
	$ngay= $_GET["ngay"];
  //Mở kết nối csdl
  $con = mysqli_connect("localhost", "root", "", "da1");
  $sql = "UPDATE `hoa_don` SET `ma_kh`=$makh,`ten_nguoi_nhan`='$ten',`dia_chi`='$dc',`sdt`=$sdt,`ngay`='$ngay'	 WHERE ma_hd=$ma_hd";
  mysqli_query($con, $sql);
  //Đóng kết nối csdl
  mysqli_close($con);
  header("Location: xem-hd.php");
} else {
  header("Location: xoa-sua-hd.php");
}?>
</body>
</html>