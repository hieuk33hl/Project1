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
	$ma_hang= $_GET["ma_hang"];	
  $con = mysqli_connect("localhost", "root", "", "da1");
  $sql = "SELECT * FROM hangsx where ma_hang=$ma_hang";
  $result = mysqli_query($con, $sql);
 $hangsx= mysqli_fetch_array($result);
  mysqli_close($con);
  ?>
  <form action="suahang2.php" method="get">
	<font size="+3">  
     <input type="hidden" name="ma_hang" value="<?php echo $ma_hang; ?>"><br>
    Tên: <input type="text" name="ten_hang" value='<?php echo $hangsx["ten_hang"] ?>'><br>
    </font>
    <button> Sửa </button>
  </form>

</body>
</html>