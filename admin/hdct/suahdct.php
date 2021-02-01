<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
	$ma_don_hang= $_GET["ma_don_hang"];	
  $con = mysqli_connect("localhost", "root", "", "da1");
  $sql = "SELECT * FROM hoa_don_ct where ma_don_hang=$ma_don_hang";
  $result = mysqli_query($con, $sql);
 $hoadonct= mysqli_fetch_array($result);
  mysqli_close($con);
  ?>
  <form action="suahdct2.php" method="get">
	  
     <input type="hidden" name="ma_don_hang" value="<?php echo $ma_don_hang; ?>"><br>
    mã sản phẩm: <input type="number" name="masp" value='<?php echo $hoadonct["ma_sp"] ?>'><br>
	  số lượng sản phẩm <input type="number" name="sl"  value='<?php echo $hoadonct["so_luong"] ?>'><br>
	     giá tiền  <input type="number" name="giatien"  value='<?php echo $hoadonct["gia_tien"] ?>'><br>
	    ngày nhập  <input type="datetime" name="ngay"  value='<?php echo $hoadonct["ngay_nhap"] ?>'><br>
    <button> Sửa </button>
  </form>
</body>
</html>