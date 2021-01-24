<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
if (isset($_GET["ten"])) {
  $ten = $_GET["ten"];
 
 
  //Mở kết nối csdl
  $con = mysqli_connect("localhost", "root", "", "da1");
  $sql = "INSERT INTO hangsx(ten_hang) values ('$ten')";
  mysqli_query($con, $sql);
  //Đóng kết nối csdl
  mysqli_close($con);
  header("Location: xem-hang.php");
} else {
  header("Location: them-hang.php");
}?>
</body>
</html>