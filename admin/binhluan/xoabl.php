<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
if (isset($_GET["ma_bl"])) {
  $ma_bl = $_GET["ma_bl"];
  $con = mysqli_connect("localhost", "root", "", "da1");
  $sql = "DELETE FROM binh_luan WHERE ma_bl = $ma_bl";
  mysqli_query($con, $sql);
  mysqli_close($con);
  header("Location:  xem-bl.php");
} 
  
	?>
</body>
</html>