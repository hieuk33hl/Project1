<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
  $con = mysqli_connect("localhost", "root", "", "da1");
  $sql = "Select * from san_pham";
  $result = mysqli_query($con, $sql);
	
  mysqli_close($con);
  ?>
  <form action="../dan1/sanpham/themsp.php" method="post" enctype="multipart/form-data">
	  Tên: <input type="text" name="ten" required><br>
	  thể loại: <input type="number" name="theloai" required><br>
	  hãng <input type="number" name="hang" required><br>
	  số lượng: <input type="number" name="sl" required><br>
	 Giá : <input type="number" name="gia" required><br>
	  thông tin: <textarea name="tt" cols="30" rows="10"></textarea><br>
	  ảnh: <input type="file" name="anh" required><br>
	    size: <input type="number" name="size"  required><br>
    
   <br>
    <input type="submit">
  </form>
</body>
</html>