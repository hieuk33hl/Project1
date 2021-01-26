<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
	$ma_hd= $_GET["ma_hd"];	
  $con = mysqli_connect("localhost", "root", "", "da1");
  $sql = "SELECT * FROM hoa_don where ma_hd=$ma_hd";
  $result = mysqli_query($con, $sql);
 $hoadon= mysqli_fetch_array($result);
  mysqli_close($con);
  ?>
  <form action="suahd2.php" method="get">
	  
     <input type="hidden" name="ma_hd" value="<?php echo $ma_hd; ?>"><br>
    mã khách hàng: <input type="number" name="makh" value='<?php echo $hoadon["ma_kh"] ?>'><br>
	  tên người nhận:  <input type="text" name="ten" value='<?php echo $hoadon["ten_nguoi_nhan"] ?>' ><br>
	  địa chỉ: <input type="text" name="dc" value='<?php echo $hoadon["dia_chi"] ?>'><br>
	    sđt: <input type="number" name="sdt" value='<?php echo $hoadon["sdt"] ?>' ><br>
	  ngày: <input type="datetime" name="ngay" value='<?php echo $hoadon["ngay"] ?>'><br>
    
    
    <button> Sửa </button>
  </form>

</body>
</html>