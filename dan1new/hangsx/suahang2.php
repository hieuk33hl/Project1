<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
if (isset($_GET["ma_hang"]) && isset($_GET["ten_hang"])) {
  $ma_hang = $_GET["ma_hang"];
  $ten_hang = $_GET["ten_hang"];
  
  //Mở connect
  $con = mysqli_connect("localhost", "root", "", "da1");
  $sql = "UPDATE hangsx SET ten_hang='$ten_hang' WHERE ma_hang=$ma_hang";
  mysqli_query($con, $sql);
  //Đóng connect
  mysqli_close($con);
	  header("Location: xem-hang.php");
} else {
  header("Location: sua-hang.php");
}
?>
</body>
</html>