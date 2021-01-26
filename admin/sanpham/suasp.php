<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
  $ma= $_GET["ma_sp"];	
  $con = mysqli_connect("localhost", "root", "", "da1");
  $sql = "SELECT * FROM san_pham where ma_sp=$ma";
  $result = mysqli_query($con, $sql);
 $sanpham= mysqli_fetch_array($result);
  mysqli_close($con);
  ?>
  <form action="suasp2.php" method="post" enctype="multipart/form-data">
	  
     <input type="hidden" name="ma_sp" value="<?php echo $ma; ?>"><br>
    Tên: <input type="text" name="ten" value='<?php echo $sanpham["ten_sp"] ?>'><br>
    thể loại: <input type="number" name="tl" value='<?php echo $sanpham["the_loai"] ?>'><br>
	   hãng: <input type="number" name="hang" value='<?php echo $sanpham["hang_sx"] ?>'><br>
	   số lượng: <input type="number" name="sl" value='<?php echo $sanpham["sl_sp"] ?>'><br>
	   giá: <input type="number" name="gia" value='<?php echo $sanpham["gia_sp"] ?>'><br>
	 thông tin: <textarea name="tt" cols="30" rows="10" > <?php echo $sanpham["ttsp"] ?> </textarea><br>
	  ảnh: <input type="file" name="anh"  value="<?php echo $sanpham["anh_sp"] ?> " alt="hh"  width="100px" height="100px" /><img src="../../upload/<?php echo $sanpham["anh_sp"]; ?> " alt=""  width="100px" height="100px" /> <br>
	  size: <input type="text" name="size" value='<?php echo $sanpham["size"] ?>'><br>
	  
    <button> Sửa </button>
  </form>
</body>
</html>