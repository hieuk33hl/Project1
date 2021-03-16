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
		select{
			height:30px;
			border-radius: 5px;
		    font-size: 20px;
		}
	</style>

<body>
	<?php
  $con = mysqli_connect("localhost", "root", "", "da1");
  $sql = "SELECT * FROM the_loai";
	$sqll = "SELECT * FROM hangsx";
  $result = mysqli_query($con, $sql);
	$resultt = mysqli_query($con, $sqll);
  mysqli_close($con);
  ?>
  <form action="../admin/sanpham/themsp.php" method="post" enctype="multipart/form-data">
	  Tên: <input type="text" name="ten" required><br>
	  thể loại: <select name="theloai">
      <?php
      while ($sanpham = mysqli_fetch_array($result)) {
      ?>
        <option value="<?php echo $sanpham["ma_tl"] ?>"><?php echo $sanpham["ten_tl"] ?></option>
      <?php
      }
      ?>
    </select><br>
	  hãng <select name="hang">
      <?php
      while ($sanpham = mysqli_fetch_array($resultt)) {
      ?>
        <option value="<?php echo $sanpham["ma_hang"] ?>"><?php echo $sanpham["ten_hang"] ?></option>
      <?php
      }
      ?>
    </select><br>
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