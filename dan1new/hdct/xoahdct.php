<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
if (isset($_GET["ma_don_hang"])) {
  $ma_don_hang = $_GET["ma_don_hang"];
  $con = mysqli_connect("localhost", "root", "", "da1");
  $sql = "DELETE FROM hoa_don_ct WHERE ma_don_hang = $ma_don_hang";
  mysqli_query($con, $sql);
  mysqli_close($con);
  header("Location:  xem-hdct.php");
} else {
  header("Location: sua-xoa-hdct.php");
}
	?>
</body>
</html>