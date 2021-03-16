<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
	include("gg.php");
	
	?>
	<?php
if (isset($_GET["maadmin"])) {
  $maadmin = $_GET["maadmin"];
  $con = mysqli_connect("localhost", "root", "", "da1");
  $sql = "DELETE FROM admin WHERE maadmin=$maadmin";
  mysqli_query($con, $sql);
  mysqli_close($con);
  header("Location: xem-admin.php");
} else {
  header("Location: xoa-admin.php");
}
	?>
</body>
</html>