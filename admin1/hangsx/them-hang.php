<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
	<style>
		input{
			height:30px;
			border-radius: 5px;
		    font-size: 20px;
		}
		button{
			height:30px;
			width: 70px;
			border-radius: 5px;
		}
	</style>
<body>
	<?php
  $con = mysqli_connect("localhost", "root", "", "da1");
  $sql = "Select * from hangsx";
  $result = mysqli_query($con, $sql);
  mysqli_close($con);
  ?>
  <form action="../admin/hangsx/themhang.php" method="get">
	  
	  Tên: <input type="text" name="ten" required><br>
	  
 
  
    <br>
   <br>
    <button>Thêm</button>
</body>
</html>