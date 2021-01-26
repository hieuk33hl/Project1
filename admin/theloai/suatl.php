<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
	$ma_tl= $_GET["ma_tl"];	
  $con = mysqli_connect("localhost", "root", "", "da1");
  $sql = "SELECT * FROM the_loai where ma_tl=$ma_tl";
  $result = mysqli_query($con, $sql);
 $the_loai= mysqli_fetch_array($result);
  mysqli_close($con);
  ?>
  <form action="suatl2.php" method="get">
	  
     <input type="hidden" name="ma_tl" value="<?php echo $ma_tl; ?>"><br>
    Tên: <input type="text" name="ten_tl" value='<?php echo $the_loai["ten_tl"] ?>'><br>
    
    <button> Sửa </button>
  </form>

</body>
</html>