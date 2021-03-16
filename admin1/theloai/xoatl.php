<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
if (isset($_GET["ma_tl"])) {
  $ma_tl = $_GET["ma_tl"];
  $con = mysqli_connect("localhost", "root", "", "da1");
  $sql = "DELETE FROM the_loai WHERE ma_tl=$ma_tl";
  mysqli_query($con, $sql);
  mysqli_close($con);
  header("Location:  xem-tl.php");
} else {
  header("Location: xoa-tl.php");
}
	?>
</body>
</html>