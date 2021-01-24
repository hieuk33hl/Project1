<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
  $con = mysqli_connect("localhost", "root", "", "da1");
  $sql = "Select * from hoa_don_ct";
  $result = mysqli_query($con, $sql);
	
  mysqli_close($con);
  ?>
  <form action="../dan1/hdct/themhdct.php" method="get">
	   mã đơn hàng :  <input type="number" name="mahd" required><br>
	  mã sản phẩm: <input type="number" name="masp" required><br>
	  số lượng <input type="number" name="sl" required><br>
	   giá tiền  <input type="number" name="giatien" required><br>
   <br>
    <input type="submit">
  </form>
</body>
</html>