<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
if (isset($_GET["ma_hd"])) {
  $ma_hd = $_GET["ma_hd"];
  $con = mysqli_connect("localhost", "root", "", "da1");
  $sql = "DELETE FROM hoa_don WHERE ma_hd=$ma_hd";
  mysqli_query($con, $sql);
  mysqli_close($con);
  header("Location:  xem-hd.php");
} else {
  header("Location: xoa-sua-hd.php");
}
	?>
</body>
</html>