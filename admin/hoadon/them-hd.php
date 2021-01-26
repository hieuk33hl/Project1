<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
  $con = mysqli_connect("localhost", "root", "", "da1");
  $sql = "Select * from hoa_don";
  $result = mysqli_query($con, $sql);
	
  mysqli_close($con);
  ?>
  <form action="../admin/hoadon/themhd.php" method="get">
	
	  mã khách hàng: <input type="number" name="makh" required><br>
	  tên người nhận:  <input type="text" name="ten" required><br>
	  địa chỉ: <input type="text" name="dc" required><br>
	    sđt: <input type="number" name="sdt"  required><br>
	  ngày: <input type="datetime" name="ngay" required><br>
    
   <br>
    <input type="submit">
  </form>
</body>
</html>