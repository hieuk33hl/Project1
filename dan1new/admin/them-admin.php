
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
  $con = mysqli_connect("localhost", "root", "", "da1");
  $sql = "Select * from admin";
  $result = mysqli_query($con, $sql);
	if (isset($_SESSION["quyen"])==0);
  mysqli_close($con);
  ?>
  <form action="../dan1/admin/themadmin.php" method="get">
	  Tên: <input type="text" name="ten" required><br>
	  tk: <input type="text" name="tk" required><br>
	  mk: <input type="text" name="mk" required><br>
	  email: <input type="email" name="email" required><br>
	  sdt: <input type="number" name="sdt" required><br>
 
    Giới tính: <input type="radio" name="gt" value="1" required>Nam
    <input type="radio" name="gt" value="0" required>Nữ
    <br>
	  dia chi: <input type="text" name="diachi" required><br>
	    quyen: <input type="radio" name="quyen" value="1" required>supperadmin
    <input type="radio" name="quyen" value="0" required>admin
    <br>
   <br>
    <button>Thêm</button>
  </form>
</body>
</html>