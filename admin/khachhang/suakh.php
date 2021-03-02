<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
	<style>
		
		button{
			height:30px;
			width: 70px;
			border-radius: 5px;
		}
	</style>

<body>
	<?php
  $ma= $_GET["ma_kh"];	
  $con = mysqli_connect("localhost", "root", "", "da1");
  $sql = "SELECT * FROM khach_hang where ma_kh=$ma";
  $result = mysqli_query($con, $sql);
 $khachhang = mysqli_fetch_array($result);
  mysqli_close($con);
  ?>
  <form action="suakh2.php" method="get">
	  
     <input type="hidden" name="ma_kh" value="<?php echo $ma; ?>"><br>
    status<input type="radio" name="status" value="1" <?php
                                                                if ($khachhang["status"] == 1) {
                                                                  echo "checked";
                                                                }
                                                                ?>>on
      <input type="radio" name="status" value="0" <?php
                                                      if ($khachhang["status"] == 0) {
                                                        echo "checked";
                                                      }
                                                      ?>>off <br>
    <button> Sửa </button>
  </form>
</body>
</html>