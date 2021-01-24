<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	
	<?php
  $con = mysqli_connect("localhost", "root", "", "da1");
  $sql = "Select * from the_loai";
  $result = mysqli_query($con, $sql);
  mysqli_close($con);
  ?>
  <form action="../dan1/theloai/themtl.php" method="get">
	  
	  Tên: <input type="text" name="ten" required><br>
	  
 
  
    <br>
   <br>
    <button>Thêm</button>
  </form>
</body>
</html>