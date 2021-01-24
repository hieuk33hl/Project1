<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
if (isset($_GET["ma_sp"])) {
  $ma_sp = $_GET["ma_sp"];
  $con = mysqli_connect("localhost", "root", "", "da1");
  $sql = "DELETE FROM san_pham WHERE ma_sp=$ma_sp";
  mysqli_query($con, $sql);
  mysqli_close($con);
  header("Location: danh-sach-sp.php");
} else {
  header("Location: xoa-sp.php");
}
	?>
</body>
</html>