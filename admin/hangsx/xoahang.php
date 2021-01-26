<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
if (isset($_GET["ma_hang"])) {
  $ma_hang = $_GET["ma_hang"];
  $con = mysqli_connect("localhost", "root", "", "da1");
  $sql = "DELETE FROM hangsx WHERE ma_hang=$ma_hang";
  mysqli_query($con, $sql);
  mysqli_close($con);
  header("Location:  xem-hang.php");
} else {
  header("Location: xoa-hang.php");
}
	?>
</body>
</html>