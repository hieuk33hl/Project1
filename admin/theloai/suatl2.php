<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
if (isset($_GET["ma_tl"]) && isset($_GET["ten_tl"])) {
  $ma_tl = $_GET["ma_tl"];
  $ten_tl = $_GET["ten_tl"];
  //Mở connect
  $con = mysqli_connect("localhost", "root", "", "da1");
  $sql = "UPDATE the_loai SET ten_tl='$ten_tl' WHERE ma_tl=$ma_tl";
  mysqli_query($con, $sql);
  //Đóng connect
  mysqli_close($con);
	  header("Location: xem-tl.php");
} else {
  header("Location: sua-hd.php");
}
?>
</body>
</html>