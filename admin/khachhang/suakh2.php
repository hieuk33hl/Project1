<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
if (isset($_GET["ma_kh"]) && isset($_GET["status"])) {
	$ma_kh= $_GET["ma_kh"];
	$status= $_GET["status"];
	$con = mysqli_connect("localhost", "root", "", "da1");
  $sql = "UPDATE `khach_hang` SET `status`=$status WHERE ma_kh =$ma_kh";
  mysqli_query($con, $sql);
  //Đóng kết nối csdl
  mysqli_close($con);
  header("Location: xem-kh.php"); 
}?>
</body>
</html>